<?php

use App\Category;
use App\Menu;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Spatie\Analytics\Period;

function settings($key, $haveTranslate = false)
{

    if (!request()->is('admin/*') && $haveTranslate) {
        $lang = app()->getLocale();
        if ($lang == 'ar') {
            $key = $key . "_ar";
        }
    }
    $settings = Cache::remember('settings', 5,
        function () {
            return \App\Setting::get()->pluck('value', 'key')->toArray();
        }
    );
    return $settings[$key] ?? '';
}


function settings_image($key, $size = '150x150')
{

    $settings = Cache::remember('settings_image', 5,
        function () {
            return \App\Setting::with('image_media')->get()->keyBy('key');
        }
    );

    if (isset($settings[$key])) {
        if ($size == 'full') {
            return $settings[$key]->image($size) ?? 'images-show/not-found.png';
        }
        return $settings[$key]->image($size) ?? 'images-show/not-found.png/150x150';
    }
    if ($size == 'full') {
        return 'images-show/not-found.png';
    }
    return 'images-show/not-found.png/150x150';
}


function getMonths($lang = 'en')
{
    if ($lang == 'en')
        return ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", 'November', 'Desember'];
    else
        return [1 => "يناير", 2 => "فبراير", 3 => "مارس", 4 => "أبريل", 5 => "مايو", 6 => "يونيو", 7 => "يوليو", 8 => "أغسطس", 9 => "سبتمبر", 10 => "أكتوبر", 11 => "نوفمبر", 12 => "ديسمبر"];
}

function fillDataStatisic($data, $period, $type = 'month')
{

    if ($type == 'month') {
        $start = $period[0]->month;
        $end = $period[1]->month;
        $last = 12;
    } else {
        $start = $period[0]->day;
        $month_current = $period[0]->month;
        $startDate = clone $period[0];
        $last = $startDate->endOfMonth()->day;

        $end = $period[1]->day;
        $month_end = $period[1]->month;

    }

    $loop = 0;
    $rt = [];
//    dd($start);
    $i = $start;
    if ($start > $end)
        $count = $last - $start + $end;
    else
        $count = $end - $start;
    for ($j = 0; $j <= $count; $j++) {
        $current = $i;
        if ($i > $last) {
            $current = $i % $last;
        }

        if (!isset($data[$current])) {
            $rt[$current] = 0;
        } else {
            $rt[$current] = intval($data[$current]['count']);
        }
        $i++;
    }

    return $rt;
}


function get_constant_route($type = 'index')
{


    $route = request()->route()->getName();
    if (!$route)
        return '';
    $routes = explode('.', $route);
    $controller = $routes[1];


    if ($type == 'controller') {
        if (sizeof($routes) >= 4) {
            return $controller . '/' . $routes[2];
        } else {
            return $controller;
        }
    }

    if ($controller == 'dashboard' || $controller == 'profile' || $controller == 'comments' || $routes[2] == 'list') {
        return "#";
    }

    $param = request('parent_id') ? request('parent_id') : request('blog_id');
    if (sizeof($routes) >= 4) {
        return route('admin.' . $controller . '.' . $routes[2] . '.' . $type, $param);
    } else {
        return route('admin.' . $controller . '.' . $type);
    }

}


function fillDay($data, $period)
{
    $months = getMonths('ar');
    foreach ($months as $key => $val) {
        if (!isset($data[$key])) {
            $rt[] = 0;
        } else {
            $rt[] = $data[$val]['count'];
        }
    }
    return $rt;
}

function analytics($source)
{
    $data = [];
    if (is_array($source)) {

        foreach ($source as $item) {
            $data[strtolower($item[0])] = $item[1];
        }
    }
    return $data;
}

function get_vistors($startDate, $endDate)
{

//    dd($startDate);
    $period = Period::create($startDate, $endDate);

    $data = \Analytics::fetchTotalVisitorsAndPageViews($period);

    $months = $startDate->diffInMonths($endDate);


    $vistor = [];
    $page_view = [];
    foreach ($data as $key => $datum) {
        if ($months > 1) {
            if (isset($vistor[$datum['date']->month])) {
                $vistor[$datum['date']->month][1] += intval($datum['visitors']);
                $page_view[$datum['date']->month][1] += intval($datum['pageViews']);

            } else {
                $vistor[$datum['date']->month] = [$datum['date']->month, intval($datum['visitors'])];
                $page_view[$datum['date']->month] = [$datum['date']->month, intval($datum['pageViews'])];

            }

        } else {
            $vistor[] = [$datum['date']->day, $datum['visitors']];
            $page_view[] = [$datum['date']->day, $datum['pageViews']];
        }
    }

    return [array_values($vistor), array_values($page_view)];
}

function array_sum_a($array)
{
    $sum = array_sum($array);
    return $sum ? $sum : 1;
}

function getVedioUrl()
{
//    if(\Illuminate\Support\Str::contains(settings('home_vedio_url'),'watch')){
    return \Illuminate\Support\Str::replaceFirst('watch?v=', 'embed/', settings('home_vedio_url'));
//    }
}

function slugify($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);


    // remove unwanted characters
//    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, '-');

    // remove duplicate -
    $text = preg_replace('~-+~', '-', $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}

function custom_sort($arr, $key, $order)
{
    $data = [];
    foreach ($arr as $k => $item) {
        $data[$k] = $item[$key] ?? 0;
    }
    if ($order == 'desc')
        arsort($data);
    else
        Arr::sort($data);
    return ($data);
}


function get_all_category_price($package)
{

    $categories = Category::whereNotIn('id', $package->categories->pluck('id')->toArray())->get();
    $sum = $categories->sum('added_price');
    return ceil(($sum * (100 - intval(settings('all_discount_rate')))) / 100);
}


function getGenders()
{
    return collect([
        'male' => 'ذكر',
        'female' => 'انثى',
    ]);
}

function getSocialStatus()
{
    return collect([
        'single' => 'اعزب',
        'married' => 'متزوج',
    ]);
}

function checkRecaptcha($token)
{
    $data['secret'] = env('NOCAPTCHA_SECRET');
    $data['response'] = $token;
    $data['remoteip'] = $_SERVER['REMOTE_ADDR'];
    $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $data['secret'] . "&response=" . $data['response'] . "&remoteip=" . $data['remoteip']), true);
    if ($response['success']) {
        return true;
    } else {
        return false;
    }
}

function isRTL(){
    return app()->getLocale()=='ar';
}

<?php

namespace App\Http\Controllers\admin;

use App;
use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingsController extends Controller
{
    public function edit($type = 'general')
    {
        Cache::forget('settings');
        $title = __('الاعدادات');
        $subTitle = __('تعديل');
        $settings = Setting::all()->pluck('value', 'key');
        if (!isset(Setting::getMenu()[$type]))
            abort(404);
        return view('admin.settings.index', compact('title', 'subTitle', 'settings', 'type'));
    }

    public function update(Request $request)
    {
        $data = $request->all();
        if ($request->logo) {
            $data['logo'] = $request->logo->store('images');
        }

        if ($request->icon) {
            $data['icon'] = $request->icon->store('images');
        }

        if ($request->share_photo) {
            $data['share_photo'] = $request->share_photo->store('images');
        }


        foreach ($data as $key => $value) {
            if ($value) {
                Setting::updateOrCreate([
                    'key' => $key
                ], [
                    'key' => $key,
                    'value' => $value,
                ]);
            }
        }
        Cache::forget('settings');

        return redirect()->back()->with('success', __('تم تعديل الاعدادات'));
    }

    function translate_en()
    {
        $title = __('الاعدادات');
        $subTitle = __('الترجمة');

        $file = base_path('resources/lang/words.json');
        $file_en = base_path('resources/lang/en.json');
        if (!file_exists($file_en))
            file_put_contents($file_en, json_encode([]));
        $array = json_decode(file_get_contents($file));
        $array_en = (array)json_decode(file_get_contents($file_en));
        $lang = 'en';
        return view('admin.settings.translate_en', compact('array', 'array_en', 'title', 'subTitle', 'lang'));
    }

    function translate_ar()
    {
        $title = __('الاعدادات');
        $subTitle = 'الترجمة عربي';

        $file = base_path('resources/lang/words.json');
        $file_en = base_path('resources/lang/ar.json');
        if (!file_exists($file_en))
            file_put_contents($file_en, json_encode([]));
        $array = json_decode(file_get_contents($file));
        $array_en = (array)json_decode(file_get_contents($file_en));
        $lang = 'ar';
        return view('admin.settings.translate_en', compact('array', 'array_en', 'title', 'subTitle', 'lang'));
    }

    function translatePost($lang, Request $request)
    {
        $file = base_path('resources/lang/words.json');
        $array = json_decode(file_get_contents($file));
        if ($lang == 'ar') {
            $file = base_path('resources/lang/ar.json');
        } else {
            $file = base_path('resources/lang/en.json');
        }
        $newArray = (array)json_decode(file_get_contents($file)) ?? [];

        $data = $request->except('_token');

        foreach ($array as $key => $value) {
            if ($data['key_' . $key] ?? 0) {
                $newArray[$value] = $data['key_' . $key];
            }
        }


        $rs = file_put_contents($file, json_encode($newArray));

        return redirect()->back()->with('msg', __('تم التعديل بنجاح'));
    }


}

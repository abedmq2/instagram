<?php

namespace App\Http\Controllers\Admin;

use App\Account;
use App\Http\Controllers\Controller;
use App\Image;
use App\Order;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use InstagramScraper\Instagram;
use Phpfastcache\Helper\Psr16Adapter;

class HomeController extends Controller
{
    //
    const MEDIA_COUNT=5;
    function index()
    {
        $title = 'لوحة التحكم';
        $subTitle = '';

        $account = Account::find(request()->id);
        $medias = [];
        $images_id=Image::select('instagram_id')->get()->pluck('instagram_id')->toArray();
        if ($account) {
            $instagram = Instagram::withCredentials('abedmq2', '0598700543Aa!@', new Psr16Adapter('Files'));
            $instagram->login(); // will use cached session if you can force login $instagram->login(true)
            $medias = $instagram->getMedias($account->name, self::MEDIA_COUNT);
        }
        $accounts = Account::all();


        return view('admin.home', compact('title', 'subTitle', 'medias', 'account', 'accounts','images_id'));
    }

    function images(Request $request)
    {
        $account = Account::findOrFail($request->id);
        if ($account) {
            $instagram = Instagram::withCredentials('abedmq2', '0598700543Aa!@', new Psr16Adapter('Files'));
            $instagram->login(); // will use cached session if you can force login $instagram->login(true)
            $medias = $instagram->getMedias($account->name, self::MEDIA_COUNT);
            $data = [];

            $images_id=Image::select('instagram_id')->get()->pluck('instagram_id')->toArray();
            foreach ($medias as $media) {
                if(in_array($media->getId(),$request->medias)&&(!in_array($media->getId(),$images_id))) {
                    $content=file_get_contents( $media->getImageThumbnailUrl());

                    $name=$media->getId()."_".Str::random(16).'.jpeg';
                    Storage::put('images/thumb/'.$name,$content);
                    $tumpLocalPath='images/thumb/'.$name;
                    $highLocalPath='images/'.$name;
                    $content=file_get_contents( $media->getImageHighResolutionUrl());
                    Storage::put('images/'.$name,$content);
                    $data[] = [
                        'category_id' => $account->category_id,
                        'account_id' => $account->id,
                        'instagram_id' => $media->getId(),
                        'shortCode' => $media->getShortCode(),
                        'type' => $media->getType(),
                        'imageThumbnailUrl' => $tumpLocalPath,
                        'imageHighResolutionUrl' => $highLocalPath,
                        'caption' => $media->getCaption(),
                        'created_at' => Carbon::today(),
                        'updated_at' => Carbon::today(),
                    ];
                }
            }

            $rs=Image::insert($data);

            return redirect()->back()->with('msg','تمت اضافة الصور بنجاح');

        } else {
            return redirect()->back()->with('msg','الرجاء اختر الحساب');
        }


    }

}

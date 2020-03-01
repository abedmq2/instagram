<?php

namespace App\Http\Controllers;

use App\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImagesController extends Controller
{

    private $photos_path;

    public function __construct()
    {
        $this->photos_path = storage_path('app/images');
        $this->cache = storage_path('app/cache');
    }


    /**
     * Display all of the images.
     *
     * @return \Illuminate\Http\Response
     */

    function show($id, $size = '')
    {
        $path = $this->photos_path . '/' . $id;
        if (!is_file($path)) {
            $path = 'images/not-found.png';
        }
        try {
            $img = Image::make($path);

            if ($size) {
                if(!file_exists($this->cache )){
                    mkdir($this->cache ,0777);
                }
                $tmp = $this->cache . '/' . Str::replaceFirst('x', '-', $size) . "-" . $id;
                if (is_file($tmp)) {
                    return Image::make($tmp)->response();
                }
                $sizes = explode('x', $size);
                if (sizeof($sizes) == 2) {
                    $img->resize($sizes[0], $sizes[1]);
                } else {
                    $img->resize($sizes[0], null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
                $img->save($tmp);
            }


            return $img->response();
        } catch (\Intervention\Image\Exception\NotReadableException $e) {
            $file = File::get($path);
            $type = File::mimeType($path);

            $response = Response::make($file, 200);
            $response->header("Content-Type", $type);

            return $response;

        }
    }

    /**
     * Show the form for creating uploading new images.
     *
     * @return \Illuminate\Http\Response
     */

    public function store($id=0, Request $request)
    {
        $path = $request->qqfile->store('images');
        $image = new \App\Image();
        $image->value = $path;
        $image->uuid = $request->qquuid;
        $image->size = $request->qqtotalfilesize;
        $image->extension = $request->qqfile->clientExtension() ?? '';
        $image->name = $request->qqfile->getClientOriginalName() ?? '';
        if ($id) {
            $image->type_id = $id;
            $image->type = 'App\Order';
        }
        $image->save();
        return response(['success' => true, 'id' => $image->id]);
    }

    public function uploadImage( Request $request)
    {

        $path = $request->file->store('temp');
        $image = new \App\Image();
        $image->value = $path;
        $image->uuid = Str::random(40);
        $image->size = $request->file->getSize();
        $image->extension = $request->file->clientExtension() ?? '';
        $image->name = $request->file->getClientOriginalName() ?? '';

        $image->save();
        return response(['status' => 'success', 'name' => $path]);
    }

    public function destroy($order_id,$uuid,Request $request)
    {

        dd(        $request->uuid);

        if($order_id){
            Image::where('type_id',$order_id)->where('uuid',$uuid)->delete();
        }else{
            Image::where('uuid',$uuid)->delete();
        }
        return \response(['success'=>true]);
    }

    function imageText($text = '-')
    {

        $img = Image::canvas(200, 200, '#d8ba3c');
        $img->text($text, 100, 150, function ($font) {
            $font->file(public_path('panel/fonts/DIN_NEXT_ARABIC_REGULAR.otf'));
            $font->size(150);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
//            $font->angle(90);
        });
        return $img->response();
//        $img->save(public_path('images/hardik3.jpg'));
    }
}

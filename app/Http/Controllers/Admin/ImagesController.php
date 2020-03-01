<?php

namespace App\Http\Controllers\Admin;

use App\Account;
use App\Admin;
use App\Blog;
use App\BlogImage;
use App\Category;
use App\ImageJob;
use App\Http\Controllers\Controller;
use App\Image;
use App\Notifications\approvedImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ImagesController extends Controller
{
    //
    function show()
    {
        return redirect()->back();
    }
//
    function edit()
    {
        return redirect()->back();
    }

    public function index($type = '', Request $request)

    {
        $title = __('الصور');
        $subTitle = __('عرض');
        if (\request()->ajax()) {
            return datatables()->of(Image::query()->with('category','account')->search($request->search_abedmq)->latest())->toJson();
        }

        $accounts = Account::all();
        $categories = Category::all();
        return view('admin.images.index', compact('title', 'subTitle','categories','accounts'));
    }

    function create()
    {

        $title = __('الصور');
        $subTitle = __('اضافة');
        return view('admin.images.create', compact('title', 'subTitle', 'images'));
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:30',
        ]);
        $item = new Image();
        if($request->id)
            $item=Image::findOrFail($request->id);
        $item->name = $request->name;

        $item->save();
        if($request->ajax())
            return response(['status'=>'success','msg'=>'تم الحفظ بنجاح']);

        return redirect()->route('admin.images.index')->with('msg', __('تمت الاضافة بنجاح'));
    }




    function destroy($id)
    {
        Image::whereId($id)->delete();
        if(\request()->ajax())
            return response(['status'=>'success','msg'=>'تم الحذف بنجاح']);
        return redirect()->route('admin.images.index')->with('msg', __('تم الحذف بنجاح'));
    }


}

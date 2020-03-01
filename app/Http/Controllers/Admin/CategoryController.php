<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Blog;
use App\BlogCategory;
use App\CategoryJob;
use App\Http\Controllers\Controller;
use App\Category;
use App\Notifications\approvedCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    //
    function show()
    {
        return redirect()->back();
    }

    public function index($type = '', Request $request)

    {
        $title = __('التصنيفات');
        $subTitle = __('عرض');
        if (\request()->ajax()) {
            return datatables()->of(Category::query())->toJson();

        }
        return view('admin.categories.index', compact('title', 'subTitle'));
    }

    function create()
    {

        $title = __('التصنيفات');

        $subTitle = __('اضافة');
        return view('admin.categories.create', compact('title', 'subTitle'));
    }

    function edit($id)
    {

        $title = __('التصنيفات');

        $subTitle = __('تعديل');
        $item = Category::findOrFail($id);
        return view('admin.categories.edit', compact('title', 'subTitle', 'item'));
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:30',
            'image' => 'nullable|image',
        ]);
        $item = new Category();
        if($request->id)
            $item=Category::findOrFail($request->id);
        $item->name = $request->name;
        if($request->image)
            $item->image = $request->image->store('images');

        $item->save();
        if($request->ajax())
            return response(['status'=>'success','msg'=>'تم الحفظ بنجاح']);

        return redirect()->route('admin.categories.index')->with('msg', __('تمت الاضافة بنجاح'));
    }



    function update($id,Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:30',
            'image' => 'nullable|image',
        ]);
        $item =  Category::findOrFail($id);
        $item->name = $request->name;
        if($request->image)
            $item->image = $request->image->store('images');

        $item->save();
        if($request->ajax())
            return response(['status'=>'success','msg'=>'تم الحفظ بنجاح']);

        return redirect()->route('admin.categories.index')->with('msg', __('تمت الاضافة بنجاح'));
    }




    function destroy($id)
    {
        Category::whereId($id)->delete();
        if(\request()->ajax())
            return response(['status'=>'success','msg'=>'تم الحذف بنجاح']);
        return redirect()->route('admin.categories.index')->with('msg', __('تم الحذف بنجاح'));
    }


}

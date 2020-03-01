<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Blog;
use App\BlogAccount;
use App\AccountJob;
use App\Category;
use App\Http\Controllers\Controller;
use App\Account;
use App\Notifications\approvedAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AccountsController extends Controller
{
    //
    function show()
    {
        return redirect()->back();
    }

    public function index($type = '', Request $request)

    {
        $title = __('الحسابات');
        $subTitle = __('عرض');
        if (\request()->ajax()) {
            return datatables()->of(Account::query()->with('category')->search(\request('search_abedmq')))->toJson();

        }
        $categories = Category::all();

        return view('admin.accounts.index', compact('title', 'subTitle','categories'));
    }

    function create()
    {

        $title = __('الحسابات');

        $subTitle = __('اضافة');
        $categories = Category::all();
        return view('admin.accounts.create', compact('title', 'subTitle', 'categories'));
    }

    function edit($id)
    {
        $title = __('الحسابات');

        $subTitle = __('تعديل');
        $categories = Category::all();
        $item = Account::findOrFail($id);
        return view('admin.accounts.edit', compact('title', 'subTitle', 'categories','item'));
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:30',
            'category_id' => 'required|exists:categories,id',
        ]);
        $item = new Account();

        $item->name = $request->name;
        $item->category_id = $request->category_id;

        $item->save();
        if($request->ajax())
            return response(['status'=>'success','msg'=>'تم الحفظ بنجاح']);

        return redirect()->route('admin.accounts.index')->with('msg', __('تمت الاضافة بنجاح'));
    }
    function update($id,Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:30',
            'category_id' => 'required|exists:categories,id',
        ]);
        $item = Account::findOrFail($id);

        $item->name = $request->name;
        $item->category_id = $request->category_id;

        $item->save();
        if($request->ajax())
            return response(['status'=>'success','msg'=>'تم الحفظ بنجاح']);

        return redirect()->route('admin.accounts.index')->with('msg', __('تم التعديل بنجاح'));
    }




    function destroy($id)
    {
        Account::whereId($id)->delete();
        if(\request()->ajax())
            return response(['status'=>'success','msg'=>'تم الحذف بنجاح']);
        return redirect()->route('admin.accounts.index')->with('msg', __('تم الحذف بنجاح'));
    }


}

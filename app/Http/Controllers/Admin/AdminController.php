<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    //


    function index(Request $request)
    {
        $title = __('المشرفين');
        $subTitle = __('عرض');

        $role = Role::where('name','Super Admin')->first();

        if (\request()->ajax()) {
            return datatables()->of(Admin::query()->with('roles', 'permissions'))->toJson();
        }
        return view('admin.admins.index', compact( 'title', 'subTitle'));
    }

    function create()
    {
        $title = __('المشرفين');
        $subTitle = __('اضافة');

        $roles = Role::where('guard_name', 'admin')->get();
        return view('admin.admins.create', compact('title', 'subTitle', 'roles'));
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:admins,email',
            'role_id' => 'required',
            'password' => 'nullable|confirmed',
        ]);

        $data = $request->only('name', 'email');

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }
        $admin = Admin::create($data);
        $admin->assignRole(Role::find($request->role_id));
        return redirect()->route('admin.admins.index')->with('msg', __('تمت اضافة المشرف بنجاح'));
    }

    function edit($id)
    {
        $title = __('المشرفين');
        $subTitle = __('تعديل');
        $item = Admin::findOrFail($id);

        if (request()->action) {
            if (request()->action == 'upgrade')
                $item->givePermissionTo('automatic add');
            else
                $item->revokePermissionTo('automatic add');

            $item->save();
            return redirect()->back()->with('msg', 'تم تغير حالة المشرف');
        }
        if ($id == 1) {
            return redirect()->back()->with('errors', __('لا يمكن تعديل هذا المشرف'));

        }

        $roles = Role::where('guard_name', 'admin')->get();


        return view('admin.admins.edit', compact('title', 'subTitle', 'item', 'roles'));
    }


    function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'role_id' => 'required',
            'email' => 'required|email|unique:admins,email,' . $id,
            'password' => 'nullable|confirmed',
        ]);

        $data = $request->only('name', 'email');

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }
        $admin = Admin::findOrFail($id);
        $admin->update($data);
        $admin->syncRoles(Role::find($request->role_id));

        return redirect()->route('admin.admins.index')->with('msg', __('تمت تعديل المشرف بنجاح'));
    }


    function profile()
    {
        $title = __('الاعدادات');
        $subTitle = __('تعديل بيانات الأدمن');
        return view('admin.settings.profile', compact('title', 'subTitle'));
    }


    function updateProfile(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|confirmed',
        ]);

        $data = $request->only('first_name','last_name', 'email');

        $data['name']=$request->first_name.' '.$request->last_name;
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }
        Admin::where('id', auth('admin')->id())->update($data);
        return redirect()->back()->with('msg', __('تم تعديل بياناتك بنجاح'));
    }


    function destroy($id)
    {
        if ($id == 1)
            return redirect()->back()->with('error', __('لا يمكن حذف هذا المشرف'));

        $admin = Admin::whereId($id)->delete();
        if (\request()->ajax())
            return response(['status' => 'success', 'msg' => 'تم الحذف بنجاح']);
        return redirect()->back()->with('msg', __('تم الحذف بنجاح'));
    }

    function changeStatus($id, Request $request)
    {


        $data['is_blocked'] = $request->status == 'Success' ? 1 : 0;
        $item = Admin::whereId($id)->update($data);
        return response(['status' => 'success', 'msg' => ""]);
    }

}

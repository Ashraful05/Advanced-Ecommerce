<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminUserRoleController extends Controller
{
    public function allAdminUserRole()
    {
        $adminUser = Admin::where('type',2)->latest()->get();
        return view('admin.role.admin_role_all',compact('adminUser'));
    }
    public function adminUserRoleAdd()
    {
        return view('admin.role.add_admin_role');
    }
    public function adminUserRoleSave(Request $request)
    {
        $this->validate($request,[
           'name'=>'required|min:3',
            'email'=>'required|unique:admins',
        ]);
        $image = $request->file('profile_photo_path');
        $name_gen = date('Y_m_d_Hi_').$image->getClientOriginalName();
        Image::make($image)->resize(300,200)->save('upload/admin_images/'.$name_gen);
        $save_url = 'upload/admin_images/'.$name_gen;
        Admin::insert([
            'profile_photo_path'=>$save_url,
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'phone'=>$request->phone,
            'brand'=>$request->brand,
            'category'=>$request->category,
            'product'=>$request->product,
            'slider'=>$request->slider,
            'coupons'=>$request->coupons,
            'shipping'=>$request->shipping,
            'orders'=>$request->orders,
            'stock'=>$request->stock,
            'blog'=>$request->blog,
            'setting'=>$request->setting,
            'returns'=>$request->returns,
            'review'=>$request->review,
            'reports'=>$request->reports,
            'all_user'=>$request->all_user,
            'admin_user_role'=>$request->admin_user_role,
            'type'=>2,
            'created_at'=>Carbon::now(),
        ]);
        $notification = [
          'alert-type'=>'success',
          'message'=>'Admin User Role Created!!'
        ];
        return redirect()->route('all.admin.user')->with($notification);
    }
}

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
            'password'=>'required|min:8'
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
    public function adminUserRoleEdit($id)
    {
        $role = Admin::findOrFail($id);
        return view('admin.role.edit_admin_role',compact('role'));
    }
    public function adminUserRoleUpdate(Request $request,$id)
    {
        $this->validate($request,[
            'name'=>'required|min:3',
            'email'=>'required'
        ]);
        $oldImage = $request->old_image;

        if($request->file('profile_photo_path'))
        {
            unlink($oldImage);
            $image = $request->file('profile_photo_path');
            $name_gen = date('Y_m_d_Hi_').$image->getClientOriginalName();
            Image::make($image)->resize(200,200)->save('upload/admin_images/'.$name_gen);
            $save_url = 'upload/admin_images/'.$name_gen;
            Admin::findOrFail($id)->update([
                'profile_photo_path'=>$save_url,
                'name'=>$request->name,
                'email'=>$request->email,
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
            ]);
            $notification = [
                'alert-type'=>'info',
                'message'=>'Admin User Role Updated!!'
            ];
            return redirect()->route('all.admin.user')->with($notification);

        }else{
            Admin::findOrFail($id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
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
            ]);
            $notification = [
                'alert-type'=>'info',
                'message'=>'Admin User Role Updated without Image!!'
            ];
            return redirect()->route('all.admin.user')->with($notification);
        }
    }
    public function adminUserRoleDelete($id)
    {
        $adminImage = Admin::findOrFail($id);
        $image = $adminImage->profile_photo_path;
        if($image)
        {
            unlink($image);
        }
       Admin::findOrFail($id)->delete();
        $notification = [
            'alert-type'=>'error',
            'message'=>'Admin User Role Deleted!!'
        ];
        return redirect()->route('all.admin.user')->with($notification);

    }

}

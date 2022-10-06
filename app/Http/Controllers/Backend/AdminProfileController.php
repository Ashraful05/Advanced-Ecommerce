<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminProfileController extends Controller
{
    public function profileInfo()
    {
        $id = Auth::user()->id;
        $admin = Admin::find($id);
        return view('admin.profile.admin_profile',compact('admin'));
    }
    public function editProfileInfo()
    {
        $id = Auth::user()->id;
        $editData = Admin::find($id);
        return view('admin.profile.admin_profile_edit',compact('editData'));
    }
    public function updateProfileInfo(Request $request)
    {
        $id = Auth::user()->id;
        $data = Admin::find($id);
        $data->name = $request->name;
        $data->email = $request->email;

        if($request->file('profile_photo_path'))
        {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
            $fileName = date('Y_m_d_Hi_').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$fileName);
            $data->profile_photo_path = $fileName;

        }
        $data->save();
        $notification = array(
            'message'=>"Admin Profile Updated Successfully!!!",
            'alert-type'=>'success'
        );
        return redirect()->route('admin.profile')->with($notification);
    }
    public function changeAdminPassword()
    {
        return view('admin.profile.admin_change_password');
    }
    public function updateAdminPassword(Request $request)
    {
        $this->validate($request,[
           'old_password'=>'required',
            'password'=>'required|confirmed',
        ]);
//        $hashedPassword = Admin::find(1)->password;
        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->old_password,$hashedPassword))
        {
//            $admin = Admin::find(1);
            $admin = Admin::find(Auth::id());
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            $notification = array(
                'message'=>"Admin Password changed now login with your new password!!!",
                'alert-type'=>'success'
            );
            return redirect()->route('admin.logout')->with($notification);
        }else{
            return redirect()->back();
        }
    }
    public function allUsers()
    {
        $users = User::latest()->get();
        return view('admin.user.all_user',compact('users'));
    }
}

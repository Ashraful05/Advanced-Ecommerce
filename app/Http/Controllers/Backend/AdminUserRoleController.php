<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminUserRoleController extends Controller
{
    public function allAdminRole()
    {
        $adminUser = Admin::where('type',2)->latest()->get();
        return view('admin.role.admin_role_all',compact('adminUser'));
    }
}

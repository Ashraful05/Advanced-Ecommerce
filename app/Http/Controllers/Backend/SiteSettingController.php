<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use App\Models\SiteSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SiteSettingController extends Controller
{
    public function siteSetting()
    {
        $setting = SiteSetting::find(1);
        return view('admin.setting.setting_update',compact('setting'));
    }
    public function updateSiteSetting(Request $request,$id)
    {
        if($request->file('logo'))
        {
            $image = $request->file('logo');
            $name_gen = date('Y_m_d_Hi_').$image->getClientOriginalName();
            Image::make($image)->resize(139,36)->save('upload/logo/'.$name_gen);
            $save_url = 'upload/logo/'.$name_gen;
            SiteSetting::find($id)->update([
               'logo'=>$save_url,
                'phone_one'=>$request->phone_one,
                'phone_two'=>$request->phone_two,
                'email'=>$request->email,
                'company_name'=>$request->company_name,
                'company_address'=>$request->company_address,
                'facebook'=>$request->facebook,
                'twitter'=>$request->twitter,
                'linkedin'=>$request->linkedin,
                'youtube'=>$request->youtube,
            ]);
            $notification=[
              'message'=>'Site Setting Updated with image',
              'alert-type'=>'info'
            ];
            return redirect()->back()->with($notification);
        }
        else{
            SiteSetting::find($id)->update([
                'phone_one'=>$request->phone_one,
                'phone_two'=>$request->phone_two,
                'email'=>$request->email,
                'company_name'=>$request->company_name,
                'company_address'=>$request->company_address,
                'facebook'=>$request->facebook,
                'twitter'=>$request->twitter,
                'linkedin'=>$request->linkedin,
                'youtube'=>$request->youtube,
            ]);
            $notification=[
                'message'=>'Site Setting Updated without image',
                'alert-type'=>'info'
            ];
            return redirect()->back()->with($notification);
        }
    }
    public function seoSetting()
    {
        $seo = Seo::find(1);
        return view('admin.setting.seo_update',compact('seo'));
    }
    public function updateSeo(Request $request,$id)
    {
        Seo::find($id)->update([
           'meta_title'=>$request->meta_title,
           'meta_author'=>$request->meta_author,
            'meta_keyword'=>$request->meta_keyword,
            'meta_description'=>$request->meta_description,
            'google_analytics'=>$request->google_analytics,
        ]);
        $notification=[
            'message'=>'Seo Setting Updated!!',
            'alert-type'=>'info'
        ];
        return redirect()->back()->with($notification);
    }
}

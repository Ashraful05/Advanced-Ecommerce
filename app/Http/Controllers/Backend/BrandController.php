<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function allBrand()
    {
        $brands = Brand::latest()->get();
        return view('admin.brand.all_brand', compact('brands'));
    }

    public function saveBrand(Request $request)
    {
        $this->validate($request,[
            'brand_name_english'=>'required',
            'brand_name_hindi'=>'required',
            'brand_name_bangla'=>'required',
            'brand_image'=>'required'
        ],
            //custom messages.....
            [
                'brand_name_english.required'=>'Input brand name in english',
                'brand_name_hindi.required'=>'Input brand name in hindi',
                'brand_name_bangla.required'=>'Input brand name in bangla',
                'brand_image.required'=>'Brand image is required'
            ]);
        $brand = new Brand();
        $brand->brand_name_english=$request->brand_name_english;
        $brand->brand_name_hindi=$request->brand_name_hindi;
        $brand->brand_name_bangla=$request->brand_name_bangla;
        $brand->brand_slug_english=strtolower(str_replace(' ','-',$request->brand_name_english));
        $brand->brand_slug_bangla=str_replace(' ','-',$request->brand_name_bangla);
        $brand->brand_slug_hindi=str_replace(' ','-',$request->brand_name_hindi);
        $image = $request->file('brand_image');
        $name_gen = date('Y_m_d_Hi_').$image->getClientOriginalName();
        Image::make($image)->resize(300,200)->save('upload/brand_images/'.$name_gen);
        $save_url = 'upload/brand_images/'.$name_gen;
        $brand->brand_image = $save_url;
//         if($request->file('brand_image'))
//        {
//            $file = $request->file('brand_image');
//            @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
//            $fileName = date('Y_m_d_Hi_').$file->getClientOriginalName();
//            $file->move(public_path('upload/brand_images'),$fileName);
//            $brand->brand_image = $fileName;
//        }
        $brand->save();
        $notification=array(
            'message'=>"Brand Info Saved!!",
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    public function editBrand($id)
    {
        $brand = Brand::find($id);
        return view('admin.brand.edit_brand',compact('brand'));
    }
    public function updateBrand(Request $request, $id=null)
    {
        $brand_id = $request->id;
//        $brand = $brand_id;
        $olg_img = $request->old_image;
        if($request->file('brand_image'))
        {
            unlink($olg_img);
            $image = $request->file('brand_image');
            $name_gen = date('Y_m_d_Hi_').$image->getClientOriginalName();
            Image::make($image)->resize(300,200)->save('upload/brand_images/'.$name_gen);
            $save_url = 'upload/brand_images/'.$name_gen;
            Brand::findOrFail($brand_id)->update([
                'brand_name_english' =>$request->brand_name_english,
                'brand_name_hindi' =>$request->brand_name_hindi,
                'brand_name_bangla' =>$request->brand_name_bangla,
                'brand_slug_english'=>strtolower(str_replace(' ','-',$request->brand_name_english)),
                'brand_slug_bangla'=>str_replace(' ','-',$request->brand_name_bangla),
                'brand_slug_hindi'=>str_replace(' ','-',$request->brand_name_hindi),
                'brand_image'=>$save_url,
            ]);
            $notification=array(
                'message'=>"Brand Info Updated with image!!",
                'alert-type'=>'info'
            );
            return redirect()->route('all-brand')->with($notification);
        }else{
            Brand::findOrFail($brand_id)->update([
                'brand_name_english' =>$request->brand_name_english,
                'brand_name_hindi' =>$request->brand_name_hindi,
                'brand_name_bangla' =>$request->brand_name_bangla,
                'brand_slug_english'=>strtolower(str_replace(' ','-',$request->brand_name_english)),
                'brand_slug_bangla'=>str_replace(' ','-',$request->brand_name_bangla),
                'brand_slug_hindi'=>str_replace(' ','-',$request->brand_name_hindi),
            ]);
            $notification=array(
                'message'=>"Brand Info Updated without image !!",
                'alert-type'=>'success'
            );
            return redirect()->route('all-brand')->with($notification);
        }
    }
    public function deleteBrand($id)
    {
        $brand = Brand::findOrFail($id);
        $image = $brand->brand_image;
        unlink($image);
        Brand::findOrFail($id)->delete();

        $notification = array(
            'message'=>"Brand Info Deleted With image!!",
            'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function manageSlider()
    {
        $sliders = Slider::latest()->get();
        return view('admin.slider.manage_slider',compact('sliders'));
    }
    public function saveSlider(Request $request)
    {
        $this->validate($request,[
           'slider_image'=>'required',
        ],[
            'slider_image.required'=>'please select an image'
        ]);
        $sliderImage = $request->file('slider_image');
        $name_gen = date('Y_m_d_Hi_').$sliderImage->getClientOriginalName();
        Image::make($sliderImage)->resize(300,200)->save('upload/slider_images/'.$name_gen);
        $save_url = 'upload/slider_images/'.$name_gen;
        Slider::create([
           'title'=>$request->title,
           'description'=>$request->description,
            'slider_image'=>$save_url,
            'status'=>1
        ]);
        $notification = array(
            'message'=>'Slider info is Saved!!',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    public function editSlider($id)
    {
        $editSlider = Slider::findOrFail($id);
        return view('admin.slider.edit_slider',compact('editSlider'));
    }
    public function updateSlider(Request $request, $id)
    {
        $oldImage = $request->old_img;
        if($request->file('slider_image'))
        {
            unlink($oldImage);
            $sliderImage = $request->file('slider_image');
            $name_gen = date('Y_m_d_Hi_').$sliderImage->getClientOriginalName();
            Image::make($sliderImage)->resize(300,200)->save('upload/slider_images/'.$name_gen);
            $save_url = 'upload/slider_images/'.$name_gen;
            Slider::findOrFail($id)->update([
                'title'=>$request->title,
                'description'=>$request->description,
                'slider_image'=>$save_url,
                'status'=>1
            ]);
            $notification = array(
                'message'=>'Slider info is updated with image!!',
                'alert-type'=>'info'
            );
            return redirect()->route('manage-slider')->with($notification);
        }else{
            Slider::findOrFail($id)->update([
                'title'=>$request->title,
                'description'=>$request->description,
            ]);
            $notification = array(
                'message'=>'Slider info is updated without image!!',
                'alert-type'=>'info'
            );
            return redirect()->route('manage-slider')->with($notification);
        }
    }
    public function inActiveSlider($id)
    {
        Slider::where('id',$id)->update(['status'=>0]);
        $notification = array(
            'message'=>'Slider info is Inactive!!',
            'alert-type'=>'warning'
        );
        return redirect()->back()->with($notification);
    }
    public function activeSlider($id)
    {
        Slider::where('id',$id)->update(['status'=>1]);
        $notification = array(
            'message'=>'Slider info is Active!!',
            'alert-type'=>'warning'
        );
        return redirect()->back()->with($notification);
    }
    public function deleteSlider($id)
    {
        $slider = Slider::find($id);
        $image = $slider->slider_image;
        unlink($image);
        Slider::findOrFail($id)->delete();
        $notification = array(
            'message'=>'Slider info is Deleted!!',
            'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
    }
}

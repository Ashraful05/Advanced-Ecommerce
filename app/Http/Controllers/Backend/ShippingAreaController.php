<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShippingArea;
use App\Models\ShippingDistrict;
use App\Models\ShippingDivision;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ShippingAreaController extends Controller
{
    public function manageDivision()
    {
        $divisions = ShippingDivision::orderby('id','desc')->get();
        return view('admin.ship.division.manage_division',compact('divisions'));
    }
    public function saveDivision(Request $request)
    {
        $this->validate($request,[
           'division_name'=>'required|string|max:100'
        ]);
        ShippingDivision::create([
            'division_name'=>$request->division_name
        ]);
        $notification = array(
            'message'=>'Division name saved!!',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    public function editDivision($id)
    {
        $division = ShippingDivision::find($id);
        return view('admin.ship.division.edit_division',compact('division'));
    }
    public function updateDivision(Request $request, $id)
    {
        $this->validate($request,[
            'division_name'=>'required|string|max:100'
        ],[
            'division_name.required'=>'division name required in string'
        ]);
        ShippingDivision::find($id)->update([
            'division_name'=>$request->division_name
        ]);
        $notification = array(
            'message'=>'Division name updated!!',
            'alert-type'=>'success'
        );
        return redirect()->route('manage-division')->with($notification);
    }
    public function deleteDivision($id)
    {
        ShippingDivision::find($id)->delete();
        $notification = array(
            'message'=>'Division name deleted!!',
            'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
    }
    public function manageDistrict()
    {
        $divisions = ShippingDivision::orderby('id','asc')->get();
        $districts = ShippingDistrict::with('division')->orderby('id','desc')->get();
//        return $districts;
        return view('admin.ship.district.manage_district',compact('districts','divisions'));
    }
    public function saveDistrict(Request $request)
    {
        $this->validate($request,[
            'division_id'=>'required',
            'district_name'=>'required|string|max:100'
        ],[
            'division_id.required'=>'Division name is required'
        ]);
        ShippingDistrict::create([
            'division_id'  => $request->division_id,
            'district_name'=> $request->district_name,
        ]);
        $notification = array(
            'message'=>'District name saved!!',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    public function editDistrict($id)
    {
        $divisions = ShippingDivision::orderby('id','asc')->get();
        $district = ShippingDistrict::find($id);
        return view('admin.ship.district.edit_district',compact('divisions','district'));
    }
    public function updateDistrict(Request $request,$id)
    {
        $this->validate($request,[
            'division_id'=>'required',
            'district_name'=>'required|string|max:100'
        ],[
            'division_id.required'=>'Division name is required'
        ]);
        ShippingDistrict::find($id)->update([
            'division_id'  => $request->division_id,
            'district_name'=> $request->district_name,
        ]);
        $notification = array(
            'message'=>'District info updated!!',
            'alert-type'=>'info'
        );
        return redirect()->route('manage-district')->with($notification);
    }
    public function deleteDistrict($id)
    {
        ShippingDistrict::find($id)->delete();
        $notification = array(
            'message'=>'District info deleted!!',
            'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
    }
    public function manageArea()
    {
        $divisions = ShippingDivision::orderby('id','asc')->get();
        $districts = ShippingDistrict::orderby('id','asc')->get();
        $areas = ShippingArea::with('division','district')->orderBy('id','desc')->get();
//        return $districts;
        return view('admin.ship.area.manage_area',compact('districts','divisions','areas'));
    }
    public function saveArea(Request $request)
    {
        $this->validate($request,[
           'division_id'=>'required',
           'district_id'=>'required',
            'area_name'=>'required|string|max:200'
        ],[
            'division_id.required'=>'division name is required',
            'district_id.required'=>'district name is required',
        ]);
        ShippingArea::insert([
           'division_id'=>$request->division_id,
            'district_id'=>$request->district_id,
            'area_name'=>$request->area_name,
            'created_at'=>Carbon::now()
        ]);
        $notification = array(
            'message'=>'area info saved!!',
            'alert-type'=>'success'
        );
        return redirect()->route('manage-area')->with($notification);
    }
    public function editArea($id)
    {
        $divisions = ShippingDivision::orderby('id','asc')->get();
        $districts = ShippingDistrict::orderby('id','asc')->get();
        $area = ShippingArea::find($id);
        return view('admin.ship.area.edit_area',compact('area','divisions','districts'));
    }
    public function updateArea(Request $request,$id)
    {
        $this->validate($request,[
            'division_id'=>'required',
            'district_id'=>'required',
            'area_name'=>'required|string|max:200'
        ],[
            'division_id.required'=>'division name is required',
            'district_id.required'=>'district name is required',
        ]);
        ShippingArea::find($id)->update([
            'division_id'=>$request->division_id,
            'district_id'=>$request->district_id,
            'area_name'=>$request->area_name,
        ]);
        $notification = array(
            'message'=>'area info updated!!',
            'alert-type'=>'info'
        );
        return redirect()->route('manage-area')->with($notification);
    }
    public function deleteArea($id)
    {
        ShippingArea::find($id)->delete();
        $notification = array(
            'message'=>'area info deleted!!',
            'alert-type'=>'error'
        );
        return redirect()->route('manage-area')->with($notification);
    }

}

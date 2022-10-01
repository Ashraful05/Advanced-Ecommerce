<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use DateTime;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function allReports()
    {
        return view('admin.report.all_report');
    }
    public function reportByDate(Request $request)
    {
        $date = new DateTime($request->date);
        $dateFormat = $date->format('d F Y');
        $orders = Order::where('order_date',$dateFormat)->latest()->get();
        return view('admin.report.show_report',compact('orders'));
    }
    public function reportByMonth(Request $request)
    {
       $orders = Order::where(['order_month'=>$request->month,'order_year'=>$request->year_name])->latest()->get();
       return view('admin.report.show_report',compact('orders'));
    }
    public function reportByYear(Request $request)
    {
        $orders = Order::where(['order_year'=>$request->year])->latest()->get();
        return view('admin.report.show_report',compact('orders'));
    }
}

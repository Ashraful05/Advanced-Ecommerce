<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function englishLanguage()
    {
//        session()->get('language');
//        session()->forget('language');
        session()->get('language');
        session()->forget('language');
        Session::put('language','english');
        return redirect()->back();


    }
    public function banglaLanguage()
    {
//        session()->get('language');
////        session()->forget('language');
//        Session::get('language');
//        Session::forget('language');
//        Session::put('language','bangla');
//        return redirect()->back();

        session()->get('language');
        session()->forget('language');
        Session::put('language','bangla');
        return redirect()->back();
    }
}

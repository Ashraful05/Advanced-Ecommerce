<?php

namespace App\Http\View\Composers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Facades\View;

class ViewComposer
{
    public function compose(View $view)
    {
//        $view->with([
//            'categories'=>Category::all(),
//            'brands'=>Brand::all(),
//
//        ]);
    }
}

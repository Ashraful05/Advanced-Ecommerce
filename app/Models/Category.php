<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable=[
        'category_name_english',
        'category_name_bangla',
        'category_slug_english',
        'category_slug_bangla',
    ];
//    public function subcategories()
//    {
//        $this->hasMany(SubCategory::class,'category_id');
//    }
}

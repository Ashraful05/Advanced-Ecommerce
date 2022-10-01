<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable=[
      'category_id',
      'subcategory_name_english',
      'subcategory_name_bangla',
      'subcategory_slug_english',
      'subcategory_slug_bangla',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}

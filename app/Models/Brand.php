<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable=[
      'brand_name_english',
      'brand_name_hindi',
      'brand_slug_english',
      'brand_slug_hindi',
      'brand_image'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function division()
    {
        return $this->belongsTo(ShippingDivision::class,'division_id','id');
    }
    public function district()
    {
        return $this->belongsTo(ShippingDistrict::class,'district_id','id');
    }
    public function area()
    {
        return $this->belongsTo(ShippingArea::class,'area_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}

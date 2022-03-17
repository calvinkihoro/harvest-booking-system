<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_no',
        'description',
        'price',
        'roomType',
        'roomRate',
        'images',
        'bookingStatus',
        'customer_id',
        'phone',
    ];
    //accesors
//    public function getPriceAttribute($value)
//    {
//        return number_format($value);
//    }
    public function getImagesAttribute($value)
    {
        return json_decode($value);
    }

}

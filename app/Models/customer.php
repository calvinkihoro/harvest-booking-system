<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'address',
        'arrivingFrom',
        'occupation',
        'numberOfDays',
        'user_id',
        'start_date',
        'lastDate',
        'added_by',
    ];


}

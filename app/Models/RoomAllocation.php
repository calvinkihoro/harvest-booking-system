<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomAllocation extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'fromDate',
        'toDate',
        'room_id',
    ];
}

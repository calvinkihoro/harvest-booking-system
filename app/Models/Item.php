<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'itemName',
        'photo',
        'amount',
        'type',
        'visible',
        'current_stock',
        'original_stock',
    ];
}

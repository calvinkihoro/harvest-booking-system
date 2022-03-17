<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffRecord extends Model
{
    use HasFactory;
    protected $fillable = [
        'dob',
        'current_position',
        'current_salary',
        'id_number',
        'home_address',
        'user_id'
    ];
}

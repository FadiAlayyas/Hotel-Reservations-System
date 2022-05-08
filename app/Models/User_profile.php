<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'province',
        'gender',
        'Phone_number',
        'user_id',
    ];
}

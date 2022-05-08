<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room_type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description','hotel_id','image'
    ];

    public function feature()
    {
        return $this->belongsToMany('App\Models\Feature');
    }

    public function image()
    {
        return $this->hasMany('App\Models\Room_type_image');
    }

}

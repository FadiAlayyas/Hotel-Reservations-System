<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
         'number',
         'description',
         'status',
         'price',
         'image',
         'person_count',
         'room_type_id'
    ];

    public function roomtype()
    {
        return $this->belongsTo(Room_type::class, 'room_type_id');
    }

    

}

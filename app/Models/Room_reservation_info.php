<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room_reservation_info extends Model
{
    public $table='all_rooms_reservation_info';
            protected $fillable = [
                'person_name',
                'person_name_after_edit',
                'phone_number',
                'phone_number_after_edit',
                'room_id',
                'user_id',
                'reservation_id',
                'reservation_date',
                'reservation_exDate',
            ];
    use HasFactory;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomDate extends Model
{
    use HasFactory;
    public $table='room_reservation_date';
    protected $fillable = [
        'room_id',
        'reservation_id',
        'date',
   ];
   public function room()
   {
       return $this->belongsTo('App\Models\Room');
   }
}

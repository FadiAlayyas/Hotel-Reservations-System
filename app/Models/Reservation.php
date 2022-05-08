<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public $table='reservations';

    protected $fillable = [
        'persons_count',
        'night_count',
        'phone_number',
        'reservation_date',
        'reservation_exDate',
        'reservation_status',
        'user_id',
        'room_id',
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function room()
    {
        return $this->belongsTo('App\Models\Room');
    }

    public function persons()
    {
        return $this->hasMany('App\Models\Person_details');
    }




}

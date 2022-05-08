<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person_details extends Model
{
    use HasFactory;

    public $table='persons_details';

    protected $fillable = [
        'full_name',
        'age',
        'reservation_id'
    ];


    public function reservation()
    {
        return $this->belongsTo('App\Models\Reservation');
    }
}

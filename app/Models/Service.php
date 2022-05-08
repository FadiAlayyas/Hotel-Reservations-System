<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'description','hotel_id','image'
    ];

    public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel');
    }
}

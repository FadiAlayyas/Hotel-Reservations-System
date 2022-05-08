<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable=['contact','type','hotel_id'];

    public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel');
    }
}

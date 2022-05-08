<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;
    protected $fillable = [
        'feature'
    ];

    public function roomType()
    {
        return $this->belongsToMany('App\Models\Room_type');
    }
}

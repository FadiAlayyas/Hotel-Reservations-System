<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class gallery extends Model
{

    use HasFactory;
    protected $table='gallery';

    protected $fillable = [
        'image', 'hotel_id'
    ];

    public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel');
    }
}

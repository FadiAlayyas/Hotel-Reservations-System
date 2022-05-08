<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image_description_header extends Model
{
    use HasFactory;

    public $table='image_description_header';

    protected $fillable = [
        'pageName', 'headerImage','headerDescription'
    ];
}

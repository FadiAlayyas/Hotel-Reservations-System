<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    public $table='conversation';

    protected $fillable = [
        'user_id'
    ];
    public function message()
    {
        return $this->hasMany('App\Models\Message');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


}

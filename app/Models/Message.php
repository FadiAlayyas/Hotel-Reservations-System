<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public $table='message';

    protected $fillable = [
        'content',
        'readCheck',
        'owner_id',
        'owner_type',
        'conversation_id',
    ];
    // public function user()
    // {
    //     return $this->belongsTo('App\Models\User');
    // }
    // public function admin()
    // {
    //     return $this->belongsTo('App\Models\Admin');
    // }
    public function conversation()
    {
        return $this->belongsTo('App\Models\Conversation');
    }
}

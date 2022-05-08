<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table='admins';
    protected $guard='admin';

    protected $fillable = [
        'full_name',
        'email',
        'password',
        'image',
        'gender',
        'Phone_number',
        'age',
        'SNN',
        'Role',
    ];


    protected $hidden = [
        'password',
    ];


}

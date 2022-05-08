<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class Admin extends Seeder
{

    public function run()
    {
        DB::table('admins')->insert([
            'full_name' => 'fadi',
            'email' =>  'fadi_admin@gmail.com',
            'password' => Hash::make('123456'),
            'gender' => 'male',
            'Role' => 'Boss',
            'Phone_number' => '0936893977',
            'image' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.facebook.com%2F100590698282039%2Fphotos%2Fd41d8cd9%2F128604245480684%2F&psig=AOvVaw26m_cMMYuusk_7zOk1zAxV&ust=1629738750795000&source=images&cd=vfe&ved=0CAgQjRxqFwoTCMCey46QxfICFQAAAAAdAAAAABAD',
            'age' => '1999/2/2',
            'SNN' => '2354',
        ]);
    }
}

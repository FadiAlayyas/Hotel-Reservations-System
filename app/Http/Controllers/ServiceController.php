<?php

namespace App\Http\Controllers;
use App\Http\Controllers\controller;
use App\Models\Service;
use App\Models\Contact;
use App\Models\Room_type;
use App\Models\Post;
use App\Models\Hotel;
use App\Models\Image_description_header;
class ServiceController extends Controller
{

    public function index()
    {
        $hotelInfo=Hotel::all();
        $contacts=Contact::all();
        $services=Service::all();
        $header=Image_description_header::where('pageName','Services')->first();
        return view('services.index',compact('hotelInfo','contacts','services','header'));
    }

}

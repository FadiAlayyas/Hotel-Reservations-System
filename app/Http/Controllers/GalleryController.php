<?php

namespace App\Http\Controllers;

use App\Http\Controllers\controller;
use App\Models\Gallery;
use App\Models\Contact;
use App\Models\Hotel;
use App\Models\Image_description_header;
class GalleryController extends Controller
{

    public function index()
    {
        $gallery = Gallery::all();
        $hotelInfo=Hotel::all();
        $contacts=Contact::all();
        $header=Image_description_header::where('pageName','Gallary')->first();
        return view('gallery.index',compact('gallery','hotelInfo','contacts','header'));
    }
}

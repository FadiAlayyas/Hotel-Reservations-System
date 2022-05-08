<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\auth;
use App\Http\Controllers\controller;
use App\Models\gallery;
use App\Models\Hotel;
use Illuminate\Http\Request;

class GalleryController extends Controller
{

    public function index()
    {
        $photos = Gallery::all();
        return view('admin.gallery.index')->with('photos', $photos);
    }


    //Add photo
    public function create()
    {
        $Hotels = Hotel::all();
        if ($Hotels->count() ==0) {

            return redirect()->route('Hotel.create');

        }

        return view('admin.gallery.create')->with('Hotels',$Hotels);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image'
        ]);

        $photo = $request->image;

        $newphoto = time().$photo->getClientOriginalName();
        $photo->move('upload/gallery',$newphoto);


        Gallery::create([
            'hotel_id' => $request->hotel_id,
            'image' => 'upload/gallery/'.$newphoto,
        ]);

        return redirect()->back();
    }

    public function destroy( $id)
    {
        $photo=Gallery::find($id);
        $photo->delete();
        return redirect()->back();
    }


}

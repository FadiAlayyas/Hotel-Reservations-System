<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\controller;
use App\Models\Hotel;
use App\Models\Image_description_header;
use Illuminate\Http\Request;

class HotelController extends Controller
{

    public function create()
    {
        $hotels = Hotel::all();
        if ($hotels->count() == 0) {
            return view('admin.hotel.create');
        }else{
            return redirect()->route('dashboard')->with('Unauthorised','You have already added hotel information');
        }
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'location'=>'required',
            'Lat'=>'required',
            'status'=>'required',
            'Lng'=>'required',
            'headerDescription'=>'required',
            'headerImage'=>'required|image',
            'aboutUsMedia'=>'required|image'
      ]);
      $photo = $request->headerImage;
        $newPhoto = time() . $photo->getClientOriginalName();
        $photo->move('upload/Hotel', $newPhoto);

        $video = $request->aboutUsMedia;
        $newvideo = time() . $video->getClientOriginalName();
        $video->move('upload/Hotel', $newvideo);

        $roomType = Hotel::create([
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'Lat' => $request->Lat,
            'status' => $request->status,
            'Lng' => $request->Lng,
            'headerDescription' => $request->headerDescription,
            'aboutUsMedia' => 'upload/Hotel/' . $newvideo,
            'headerImage' => 'upload/Hotel/' . $newPhoto,
        ]);
        return redirect()->route('dashboard');
    }



    public function edit($id)
    {
        $hotel=Hotel::find($id);
        return view('admin.hotel.edit',compact('hotel'));
    }


    public function update(Request $request,  $id)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'location'=>'required',
            'Lat'=>'required',
            'status'=>'required',
            'Lng'=>'required',
            'headerDescription'=>'required',
      ]);

      $Hotel = Hotel::find($id);

      if ($request->has('headerImage')) {
          $photo = $request->headerImage;
          $newphoto = time() . $photo->getClientOriginalName();
          $photo->move('upload/Hotel', $newphoto);
          $Hotel->headerImage = 'upload/Hotel/' . $newphoto;
      }

      if ($request->has('aboutUsMedia')) {
        $video = $request->aboutUsMedia;
        $newvideo = time() . $video->getClientOriginalName();
        $video->move('upload/Hotel', $newvideo);
        $Hotel->aboutUsMedia = 'upload/Hotel/' . $newvideo;
    }

      $Hotel->name = $request->name;
      $Hotel->location = $request->location;
      $Hotel->Lat = $request->Lat;
      $Hotel->status = $request->status;
      $Hotel->Lng = $request->Lng;
      $Hotel->headerDescription = $request->headerDescription;
      $Hotel->description = $request->description;
      $Hotel->save();

      return redirect()->route('dashboard');
    }



    public function indexImageDescHeader()
    {
        $data=Image_description_header::all();
        return view('admin.hotel.indexImageDescHeader')->with('data',$data);
    }

    public function createImageDescHeader()
    {
        return view('admin.hotel.createImageDescHeader');
    }

    public function storeImageDescHeader(Request $request)
    {
        $request->validate([
            'pageName' => 'required',
            'headerImage' => 'required|image',
            'headerDescription' => 'required',
        ]);

        $pageinf = Image_description_header::where('pageName',$request->pageName)->first();

        $photo = $request->headerImage;
        $newphoto = time().$photo->getClientOriginalName();
        $photo->move('upload/Hotel',$newphoto);


        if ($pageinf == null) {
            Image_description_header::create([
                'pageName' => $request->pageName,
                'headerImage' => 'upload/Hotel/'.$newphoto,
                'headerDescription' =>  $request->headerDescription,
            ]);
        }
        else
        {
            $pageinf->pageName=$request->pageName;
            $pageinf->headerImage = 'upload/Hotel/' . $newphoto;
            $pageinf->headerDescription=$request->headerDescription;
            $pageinf->save();

        }

        return redirect()->route('admin.hotel.indexHeader');
    }

    public function destroy( $id)
    {
        $data=Image_description_header::find($id);
        $data->delete();
        return redirect()->route('admin.hotel.indexHeader');
    }

}

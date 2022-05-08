<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\controller;
use App\Models\Room_type;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Feature;

class RoomTypeController extends Controller
{

    public function index()
    {
        $types = Room_type::all();
        return view('admin.roomType.index', compact('types'));
    }

    public function create()
    {
        $hotels = Hotel::all();
        $features = Feature::all()->where('Accept', 1);
        if ($hotels->count() == 0) {
            return redirect()->route('admin.hotel.create');
        } elseif ($features->count() == 0)
            return redirect()->route('feature.create');
        return view('admin.roomType.create', compact('features', 'hotels'));
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image',
            'features' => 'required',
        ]);

        $photo = $request->image;
        $newPhoto = time() . $photo->getClientOriginalName();
        $photo->move('upload/roomType', $newPhoto);

        $roomType = Room_type::create([
            'hotel_id' => $request->hotel_id,
            'name' => $request->name,
            'description' => $request->description,
            'image' => 'upload/roomType/' . $newPhoto,
        ]);
        $roomType->feature()->attach($request->features);
        return redirect()->route('type.index');
    }

    public function show(Room_type $type)
    {
        $features = Feature::all();
        return view('admin.roomType.show', compact('type', 'features'));
    }

    public function edit(Room_type $type)
    {
        $feature = Feature::all();
        return view('admin.roomType.edit', compact('type', 'feature'));
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'features' => 'required',
        ]);
        $room_type = Room_type::find($id);
        if ($request->has('image')) {
            $photo = $request->image;
            $newphoto = time() . $photo->getClientOriginalName();
            $photo->move('upload/roomType', $newphoto);
            $room_type->image = 'upload/roomType/' . $newphoto;
        }

        $room_type->name = $request->name;
        $room_type->description = $request->description;
        $room_type->save();
        $room_type->feature()->sync($request->features);
        return redirect()->route('type.index');
    }


    public function destroy(Room_type $type)
    {
        $type->delete();
        return redirect()->route('type.index');
    }




    public function left(Request $request)
    {

        if ($request->ajax()) {

            $data_left = $request->get('data_left')+1;



            $data= Feature::where('id', $data_left)->first();
            $dat=$data->class;

            $data = array('data2'  => $dat);
            return Response($data);
        }
    }

    public function right(Request $request)
    {
    }
}

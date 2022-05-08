<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\controller;
use App\Models\Room;
use App\Models\Hotel;
use App\Models\Feature;

use App\Models\Room_type;
use Illuminate\Http\Request;

class RoomController extends Controller
{

    public function index()
    {
        $rooms = Room::all();
        return view('admin.rooms.index')->with('rooms', $rooms);
    }

    public function create()
    {
        $Hotels = Hotel::all();

        $RoomType = Room_type::all();
        if ($Hotels->count() == 0)
            return redirect()->route('Admin.hotel.create');
        elseif ($RoomType->count() == 0)
            return redirect()->route('type.create');
        else
            return view('admin.rooms.create')->with('Hotels', $Hotels)->with('RoomType', $RoomType);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'number' => 'required',
            'description' => 'required',
            'status' => 'required',
            'price' => 'required',
            'person_count' => 'required'

        ]);

        $room = Room::create([
            'room_type_id' => $request->room_type_id,
            'number' => $request->number,
            'description' =>  $request->description,
            'status' => $request->status,
            'person_count' =>  $request->person_count,
            'price' =>  $request->price
        ]);

        return redirect()->back();
    }


    public function show(Room $room)
    {
        $feature = Feature::all();
        return view('admin.rooms.show', compact('room'))->with('feature', $feature);
    }


    public function edit(Room $room)
    {
        $RoomType = Room_type::all();
        return view('admin.rooms.edit', compact('room','RoomType'));
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'number' => 'required',
            'description' => 'required',
            'status' => 'required',
            'price' => 'required',
            'person_count' => 'required'
        ]);

        $room = Room::find($id);


        $room->number = $request->number;
        $room->description = $request->description;
        $room->status = $request->status;
        $room->price = $request->price;
        $room->person_count = $request->person_count;

        $room->save();
        return redirect()->route('rooms.index');
    }


    public function destroy($id)
    {
        $room = Room::find($id);
        $room->delete();
        return redirect()->route('rooms.index');
    }
}

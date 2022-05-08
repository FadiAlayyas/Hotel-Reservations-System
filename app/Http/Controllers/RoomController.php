<?php

namespace App\Http\Controllers;

use App\Http\Controllers\controller;
use App\Models\RoomDate;
use App\Models\Room;
use App\Models\Room_type;
use App\Models\Room_type_image;
use Illuminate\Http\Request;
use Carbon\CarbonPeriod;
use App\Models\Feature;
use App\Models\Contact;
use App\Models\Hotel;
use Carbon\Carbon;
use App\Models\Image_description_header;
class RoomController extends Controller
{

    public function index()
    {
        $roomType = Room_type::all();
        $hotelInfo=Hotel::all();
        $contacts=Contact::all();
        $features=Feature::all();
        $header=Image_description_header::where('pageName','Rooms')->first();
        return view('rooms.index', compact('features', 'roomType','hotelInfo','contacts','header'));
    }

    public function filter(Request $request)
    {
        $rooms = array();
        $roomType = Room_type::all();
        $request->validate([
            'date' => 'required',
            'exDate' => 'required',
            'personCount' => 'required',
            'room_type_id' => 'required'
        ]);
        $indate = Carbon::createFromFormat('Y-m-d', $request->date);

        $exdate = Carbon::createFromFormat('Y-m-d', $request->exDate);

        if($exdate->lt($indate)){
            return redirect()->back();
        }

        $roomFilter = Room::where('room_type_id', $request->room_type_id)
            ->where('person_count', '>=', $request->personCount)->get();

         $getDates = CarbonPeriod::create($request->date, $request->exDate);
         $dates=array();
         foreach ($getDates as  $item) {
             array_push($dates, $item->isoFormat('Y-M-D'));
         }


        foreach ($roomFilter as $item) {
            $dateFilter = RoomDate::where('room_id', $item->id)
                ->whereBetween('date', [$request->date, $request->exDate])
                ->get();
            if ($dateFilter->count() == 0) {
                array_push($rooms, $item);
            }
        }
        $hotelInfo=Hotel::all();
        $contacts=Contact::all();
        $header=Image_description_header::where('pageName','Rooms')->first();
        return view('rooms.filter', compact('rooms', 'roomType','dates','hotelInfo','contacts','header'));
    }


}

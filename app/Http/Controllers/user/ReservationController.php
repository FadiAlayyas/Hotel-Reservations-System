<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\controller;
use App\Models\Reservation;
use App\Models\Person_details;
use App\Models\RoomDate;
use App\Models\Room;
use App\Models\Hotel;
use App\Models\Contact;
use App\Models\Room_reservation_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\auth;


class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('prevent-back-history');
    }

    public function reserve($id, $dates)
    {
        $room = Room::find($id);

        return view('user.reservations.reserve', compact('room', 'dates'));
    }


    public function storeReservation(Request $request, $dates)
    {
        $period = array();
        foreach (explode(',', $dates) as  $item) {
            array_push($period, $item);
        }

        $request->validate([
            'phone_number' => 'required',
            'full_name' => 'required',
            'age' => 'required',
        ]);


        $reservation = Reservation::create([
            'phone_number' =>  $request->phone_number,
            'persons_count' => $request->person_count,
            'night_count' => count($period),
            'reservation_date' =>  reset($period),
            'reservation_exDate' => end($period),
            'user_id' =>  Auth::user()->id,
            'room_id' =>  $request->room_id
        ]);

        $id = $reservation->id;
        foreach ($period as  $item) {
            RoomDate::create([
                'room_id' => $request->room_id,
                'reservation_id' => $id,
                'date' => $item
            ]);
        }
        for ($i = 0; $i < count($request->full_name); $i++) {
            if ($request->full_name[$i] != null) {
                Person_details::create([
                    'full_name' =>  $request->full_name[$i],
                    'age' => $request->age[$i],
                    'reservation_id' => $id,
                ]);
            }
        }



        return redirect()->route('room.index');
    }
    public function bookingDetails()
    {
        $hotelInfo = Hotel::all();
        $contacts = Contact::all();
        $reservations = Reservation::where('user_id', Auth::id())->get();
        $persons = Person_details::all();
        return view('user.settings.bookingdetails', compact('hotelInfo', 'contacts', 'reservations', 'persons'));
    }


    public function destroy($id)
    {
        $reservation = Reservation::where('id', $id)->where('user_id', Auth::id())->first();
        $reservation->delete();
        $roomR = Room_reservation_info::where('reservation_id', $id);
        $roomR->delete();
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\controller;
use App\Models\Reservation;

use App\Models\Person_details;
use App\Models\User;
use App\Models\Room_reservation_info;
class ReservationController extends Controller
{
    public function index()
    {
        $users = array();
        $reservations = Reservation::all();

        foreach ($reservations as $item)
        {
            $user = User::find($item->user_id);
            if(in_array($user,$users)==false)
            {
                array_push($users, $user);
            }
        }
        return view('admin.reservations.index', compact('users'));
    }

    public function indexP($id)
    {
        $reservations = Reservation::all()->where('user_id', $id);
        return view('admin.reservations.indexP', compact('reservations'));
    }

    public function show($id)
    {
        $PersonDetails = Person_details::all()->where('reservation_id', $id);
        $reservation = Reservation::find($id);
        return view('admin.reservations.show', compact('reservation', 'PersonDetails'));
    }

    public function edit($id)
    {
        $reservation = Reservation::find($id);

        if ($reservation->reservation_status == 0) {

            Room_reservation_info::create([
                'person_name' =>  $reservation->user->name,
                'phone_number' =>  $reservation->phone_number,
                'room_id' => $reservation->room_id,
                'user_id' =>  $reservation->user_id,
                'reservation_id'=>$reservation->id,
                'reservation_date' =>  $reservation->reservation_date,
                'reservation_exDate' =>  $reservation->reservation_exDate
            ]);
            $reservation->reservation_status = 1;
        } else {
            $roomR=Room_reservation_info::where('reservation_id',$reservation->id);
            $roomR->delete();
            $reservation->reservation_status = 0;
        }
        $reservation->save();
        return redirect()->back();
    }



    public function destroy($id)
    {
        $reservation = Reservation::find($id);

        $reservation->delete();

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\auth;
use App\Http\Requests;
use App\Models\Visitor;
use App\Models\Hotel;
use App\Models\Admins;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Carbon\CarbonPeriod;
use Carbon\Carbon;

use App\Models\Room;
use App\Models\Room_reservation_info;





class AdminController extends Controller
{

    public function dashboard(Request $request)
    {

        $year=Carbon::now()->year;

        $users = DB::table('users')->get();
        $posts = DB::table('posts')->count();
        $likes = DB::table('likes')->count();
        $Image = DB::table('gallery')->count();
        $rooms = DB::table('rooms')->count();
        $userOnline = 0;


        foreach ($users as $user) {
            if (Cache::has('user-is-online-' . $user->id)) {
                $userOnline++;
            }
        }



         $Net_Profit = array();
         $Visitors=array();
         $Num_Booking=array();
         $count_reservations=0;
         $count_visitors=0;
         for($i=0;$i<12;$i++)
         {
            $price=0;
            $count=0;
            $count_booking=0;


                $fdateTime = Carbon::createFromDate($year, $i+1, 1);
                $edateTime = Carbon::createFromDate($year, $i+1, 30);
                $getDates[$i] = CarbonPeriod::create($fdateTime, $edateTime);

                     $booking = Room_reservation_info::whereBetween('reservation_date', [$fdateTime,$edateTime])->get();
                     $visitors = Visitor::whereBetween('date', [$fdateTime,$edateTime])->get();
                     if($booking->count()!=0)
                     {
                        foreach ($booking as  $item) {
                            $room=Room::where('id',$item->room_id)->first();
                            $price=$price+$room->price;
                            $count_booking++;
                            $count_reservations++;

                        }

                     }
                     if($visitors->count()!=0)
                     {
                        foreach ($visitors as  $item) {
                             $count++;
                             $count_visitors++;
                        }

                     }
                     array_push($Net_Profit,$price);
                     array_push($Visitors,$count);
                     array_push($Num_Booking,$count_booking);
         }

        $hotel = Hotel::all();
        if ($hotel->count() == 0) {
            return view('admin.hotel.create');
        }else{
            return view('admin.dashboard', compact('rooms','Image','count_reservations','users', 'posts', 'likes', 'count_visitors','userOnline','Net_Profit','Visitors','Num_Booking'));
         }

    }







    public function board(Request $request)
    {

        $year=Carbon::now()->year;
        $Net_Profit = array();
        $Visitors=array();
        $Num_Booking=array();


        if ($request->ajax()) {
            $date = $request->get('date');
            $year=$date;
        }



         for($i=0;$i<12;$i++)
         {
            $price=0;
            $count=0;
            $count_booking=0;

                $fdateTime = Carbon::createFromDate($year, $i+1, 1);
                $edateTime = Carbon::createFromDate($year, $i+1, 30);
                $getDates[$i] = CarbonPeriod::create($fdateTime, $edateTime);

                     $booking = Room_reservation_info::whereBetween('reservation_date', [$fdateTime,$edateTime])->get();
                     $visitors = Visitor::whereBetween('date', [$fdateTime,$edateTime])->get();
                     if($booking->count()!=0)
                     {
                        foreach ($booking as  $item) {
                            $room=Room::where('id',$item->room_id)->first();
                            $price=$price+$room->price;
                            $count_booking++;


                        }

                     }
                     if($visitors->count()!=0)
                     {
                        foreach ($visitors as  $item) {
                             $count++;

                        }

                     }
                     array_push($Net_Profit,$price);
                     array_push($Visitors,$count);
                     array_push($Num_Booking,$count_booking);
         }

         $data = array('Net_Profit'  => $Net_Profit,'Visitors'=>$Visitors,'Num_Booking'=>$Num_Booking);
            return Response($data);
    }





    public function userOnlineStatus()
    {
        $users = DB::table('users')->get();
    }
}

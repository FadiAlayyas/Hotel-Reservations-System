@extends('admin.layout')
@section('content')
<head>



</head>

    <div class="main__container">
        <!-- MAIN TITLE STARTS HERE -->

        <div class="main__title">
            <div class="main__greeting">
                <p class="text-primary-p" style="font-size: larger">Statistics</p>

            </div>
        </div>

        <!-- MAIN TITLE ENDS HERE -->

        <!-- MAIN CARDS STARTS HERE -->
        <div class="main__cards">
            <div class="card">
                <i class="fa fa-user-plus fa-2x text-lightblue" aria-hidden="true"></i>
                <div class="card_inner">
                    <p class="text-primary-p">Users</p>
                    <span class="font-bold text-title">{{ $users->count() }}</span>
                </div>
                <div class="go">Go To</div>
            </div>

            <div class="card">
                <i class="fa fa-user fa-2x text-green" aria-hidden="true"></i>
                <div class="card_inner">
                    <p class="text-primary-p">Online User</p>
                    <span class="font-bold text-title">{{ $userOnline }}</span>
                </div>
                <div class="go">Go To</div>
            </div>

            <div class="card">
                <i class="fa fa-user fa-2x text-roze" aria-hidden="true"></i>
                <div class="card_inner">
                    <p class="text-primary-p"> Visitors</p>
                    <span class="font-bold text-title">{{$count_visitors}}</span>
                </div>
                <div class="go">Go To</div>
            </div>



            <div class="card">
                <i class="fas fa-book fa-2x text-green" aria-hidden="true"></i>
                <div class="card_inner">
                    <p class="text-primary-p"> Booking</p>
                    <span class="font-bold text-title">{{$count_reservations}}</span>
                </div>
                <div class="go">Go To</div>
            </div>



        </div>
         <!-- CHARTS STARTS HERE -->
         <div  class="charts">
            <div class="charts__left">
              <div class="charts__left__title">
                <div>
                  <h1>Monthly report:
                    <input  id="INPUT" value="2021" required type="number" placeholder="2021">
                    <button id="butsave">Save</button>
                </div>
              </div>
              <div id="apex1" ></div>

            </div>

            <div class="charts__right">
              <div class="charts__right__title">
                <div>
                  <h1>Stats Reports</h1>
                </div>
              </div>

              <div class="charts__right__cards">
                <div class="card1">
                  <h1><i>Image</i></h1>
                  <p>{{$Image}}</p>
                </div>

                <div class="card2">
                  <h1><i>Rooms</i></h1>
                  <p>{{$rooms}}</p>
                </div>

                <div class="card3">
                  <h1><i>Post</i></h1>
                  <p>{{ $posts }}</p>
                </div>

                <div class="card4">
                  <h1><i>Likes</i></h1>
                  <p>{{ $likes }}</p>
                </div>
              </div>
            </div>
          </div>
          <!-- CHARTS ENDS HERE -->

    </div>

<?php


?>


<script type="text/javascript">

    var Net_Profit='<?php echo json_encode($Net_Profit); ?>';
    var Visitors='<?php echo json_encode($Visitors); ?>';
    var Num_Booking='<?php echo json_encode($Num_Booking); ?>';


    Net_Profit = JSON.parse(Net_Profit);
    Visitors = JSON.parse(Visitors);
    Num_Booking = JSON.parse(Num_Booking);
    var url = "{{ route('dashboardd') }}";

 </script>

<link rel="stylesheet" href="asset('admin/Statistics/script.js')">

@endsection





<style>


 .fadi{

    border: none;
    padding: 8px;
    width: 100px;
    border-top-right-radius: 15px;
    border-bottom-left-radius: 15px;
    background: linear-gradient(to right,#4178AF,#527EAA,#9ECAFF,rgb(163, 160, 228));
    color: rgb(60, 52, 52);
    font-size: 11px;
    font-family: cursive;
    letter-spacing: 4px;
    cursor: pointer;
    transition: all 0.4s ease-in-out;

 }
 .one{
    display: flex;
    margin-bottom: 8px;
}
 .one h2{
    margin-left: 10%;
    color: rgb(211, 211, 211);
    font-family: "Playfair Display";
    font-weight: 200;
    letter-spacing: 1px;
    font-size: 18px;
}
.one_input{
    width: 80%;
    height: 30px;
    margin-top: 2%;
    margin-left: 17px;
    border-radius: 5px;
    outline: none;
    border: none;
    color: rgb(83, 83, 83);
    background-color: rgb(211, 211, 211);
    padding: 6px;
}
</style>

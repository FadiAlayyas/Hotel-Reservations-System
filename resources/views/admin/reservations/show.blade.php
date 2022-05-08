
@extends('admin.layout')

@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('admin/reservations/details_room.css') }}" />
    </head>

    @php
    $i = 1;
    @endphp



    <div class="all_bill">
        <div class="bill">
            <div class="top_bill">
                <i class="fas fa-file-invoice-dollar"></i>
                <h3><i>Details Booking</i> </h3>
            </div>
            <div class="information_bill">
                <div class="both_bill">
                    <h3>Reservation Num:</h3>
                    <p class="num">{{ $reservation->id }}</p>
                </div>
                <hr>
                <div class="both_bill">
                    <h3>Nights Number:</h3>
                    <p>{{ $reservation->night_count }}</p>
                </div>
                <hr>
                <div class="both_bill">
                    <h3>Person Number:</h3>
                    <p>{{ $reservation->persons_count }}</p>
                </div>
                <div class="other_name">
                    <div class="null">
                        <h3>ID Number:</h3>
                    </div>
                    <div class="other1">
                        <h3>Full Name:</h3>
                    </div>
                    <div class="other2">
                        <h3>Age:</h3>
                    </div>
                </div>
                <!--هنا تكرر الاسماء ^_^ -->

                @foreach ($PersonDetails as $item)
                <div class="other_name">
                    <div class="null">
                        <p>{{ $i }} </p>
                    </div>
                    <div class="other1">
                        <p>{{ $item->full_name }}</p>
                    </div>
                    <div class="other2">
                        <p>{{ $item->age }}</p>
                    </div>
                </div>
                @php
                $i++;
            @endphp
        @endforeach
                <!--هنا نتنهي الاسماء ^_^ -->


                <hr>
                <div class="date_bill">
                    <div class="date1">
                        <h3>Reservation Date:</h3>
                        <p>{{ $reservation->created_at->diffForHumans() }}</p>
                    </div>
                    <div class="date2">
                        <h3>Start:</h3>
                        <p>{{ $reservation->reservation_date }}</p>
                    </div>
                    <div class="date3">
                        <h3>End:</h3>
                        <p>{{ $reservation->reservation_exDate }}</p>
                    </div>
                </div><br>
            </div>
        </div>
      
    </div>
@endsection

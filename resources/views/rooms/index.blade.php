@extends('layouts.app')
@section('content')

    <head>
        <title>Rooms</title>
        <link rel="stylesheet" href="{{ asset('user/rooms/room.css') }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
            integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"
            type="text/css">
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous" type="text/javascript"></script>

        <script src="{{ asset('user/rooms/room.js') }}" type="text/javascript"></script>
    </head>
    <!-- header -->
    <div class="header" style="    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7))
        , url({{ URL::asset($header->headerImage) }}) center/cover no-repeat;">
        <div class="head-bottom flex">
            <h2>ROOMS</h2>
            <p>{{ $header->headerDescription }}</p>
        </div>
    </div>

    <div class="search">
        <form class="book-form" action="{{ route('room.filter') }}" method="GET">
            @csrf
            <div class="form-item">
                <label for="checkin-date"> In Date:</label>
                <input min="<?php
$date = new DateTime();
$date->setTimezone(new DateTimeZone('Asia/Baghdad'));
echo $date->format('Y-m-d');
?>" type="text" placeholder="In Date" onfocus="(this.type='date')"
                    onblur="if(this.value==''){this.type='text'}" style="text-align: center;" name="date">
            </div>

            <div class="form-item">
                <label for="checkout-date"> Out Date:</label>
                <input min="<?php
$date = new DateTime();
$date->setTimezone(new DateTimeZone('Asia/Baghdad'));
echo $date->format('Y-m-d');
?>" placeholder="Out Date" onfocus="(this.type='date')"
                    onblur="if(this.value==''){this.type='text'}" style="text-align: center" name="exDate">
            </div>

            <div class="form-item">
                <label for="adult">Persons:</label>
                <input min=1 placeholder="Person Count" onfocus="(this.type='number' )"
                    onblur="if(this.value==''){this.type='text'}" style="text-align: center" name="personCount">
            </div>
            <div class="form-item">
                <label>Room Type:</label>
                <select name="room_type_id" class="selectt">
                    <option disabled selected>Room type</option>
                    @foreach ($roomType as $item)
                        <option value="{{ $item->id }}" style="color:black">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-item">
                <input type="submit" class="btn" value="SEARCH">
            </div>
        </form>
    </div>

    <!-- Room cards -->



    <div class="container">
        @foreach ($roomType as $item)
            <div class="RoomCard">
                <div class="wrapper">
                    <div class="image"><img src="{{ URL::asset($item->image) }}"></div>

                    <div class="Top_info">
                        <h1>You will find every thing you need here,this room is one of the best !!</h1>

                        <div class="Tiny_caard">

                            <h2>{{ $item->name }} Rooms</h2>
                        </div>
                    </div>

                    <div class="details">
                        <div class="info">
                            <h2>{{ $item->description }}</h2>
                        </div>

                        @php
                            $i = 0;
                            $len = count($item->feature);
                        @endphp

                        @foreach ($item->feature as $item2)
                            <div @if ($len > 1)
                                @if ($i == 0) id="first"
                                    class="Icons active"

                                @elseif ($i==$len-1)
                                    id="last"
                                    class="Icons Hidden1"
                                @else
                                    class="Icons Hidden1" @endif
                            @elseif($len == 1)
                                id="one"
                                class="Icons active"
                        @endif

                        >
                        <Ul>
                            <li> <i class="fa {{ $item2->class }}"></i></li>
                        </Ul>
                    </div>

                    @php
                        $i++;
                    @endphp
        @endforeach



        <div class="Slid">
            <i id="right" class="fa fa-chevron-right"></i>
            <i id="left" class="fa fa-chevron-left"></i>
        </div>

    </div>
    <!--   <div class=Last_Icon> <i class="fa fa-arrow-down fa-3x "></i></div>-->
    </div>
    </div>
    @endforeach

    </div>
    <!-- End room cards -->

    <!--end header-->



@endsection

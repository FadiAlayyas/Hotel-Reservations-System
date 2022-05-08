@extends('layouts.app')
@section('content')

    <head>
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous" type="text/javascript">
        </script>
        <title>Rooms</title>
        <link rel="stylesheet" href="{{ asset('user/rooms/Room.css') }}">
        <script src="{{ asset('user/rooms/room.js') }}" type="text/javascript"></script>
    </head>

    <!-- header -->
    <div class="header" style="    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7))
    , url({{ URL::asset($header->headerImage) }}) center/cover no-repeat;">
        <div class="head-bottom flex">
            <h2>ROOMS</h2>
            <p>{{$header->headerDescription}}</p>
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
                    onblur="if(this.value==''){this.type='text'}" style="text-align: center;" name="date" id="chekin-date">
            </div>

            <div class="form-item">
                <label for="checkout-date"> Out Date:</label>
                <input min="<?php
$date = new DateTime();
$date->setTimezone(new DateTimeZone('Asia/Baghdad'));
echo $date->format('Y-m-d');
?>" placeholder="Out Date" onfocus="(this.type='date')"
                    onblur="if(this.value==''){this.type='text'}" style="text-align: center" name="exDate"
                    id="chekout-date">
            </div>

            <div class="form-item">
                <label for="adult">Persons:</label>
                <input min=1 placeholder="Person Count" onfocus="(this.type='number' )"
                    onblur="if(this.value==''){this.type='text'}" style="text-align: center" name="personCount" id="adult">
            </div>
            <div class="form-item">
                <label >Room Type:</label>
                <select name="room_type_id" class="selectt">
                    <option value="Select Room type" disabled selected>Room type</option>
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

    <!--end header-->


    @if (count($rooms) != 0)
        @foreach ($rooms as $item)
            <div class="container">
                <div class="RoomCard">
                    <div class="wrapper">
                        <div class="image"><img src="{{ URL::asset($item->roomtype->image) }}"></div>

                        <div class="Top_info">
                            <h1>You will find every thing you need here,this room is one of the best !!</h1>

                            <div class="Tiny_caard">
                                <h2>Desceribtion</h2>
                            </div>
                        </div>

                        <div class="details">
                            <div class="info">
                                <h2>This room is a comfortable room . Its as <span>22</span> square meters.The room has two
                                    single bed , a TV and a beautiful view...<br>The <span>price</span> per night is <SPAN>
                                        {{ $item->price }}$</SPAN> ...
                                        <br>The room can accommodate <SPAN>
                                            {{ $item->person_count }} people
                                    </SPAN> ...</h2>
                            </div>


                            {{-- <h5>ALL</h5>

                            <a href="{{ route('gallery.indexx') }}">PHOTOS HERE</a> --}}

                            <div class="Reserve">
                                <form action="{{ route('user.room.reserve', ['id' => $item->id, implode(', ', $dates)]) }}">
                                    <button>REVERSE</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    @else
<br><br><br><br><br><br><br>

    @endif


@endsection

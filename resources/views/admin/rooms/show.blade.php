
@extends('admin.layout')

@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('admin/room/room_show.css') }}" />
    </head>

    <div class="cont_room" style="margin-top:2%">
        <div class="product-image-room">

            <img class="image100" src="{{asset('admin/room/image/Suite.jpg')}}" alt="">
            <div class="info_room">
                <h2> Description</h2>
                <ul>
                    <li><strong>Room Num : </strong>{{$room->number}} </li>
                    <li><strong>Status : </strong>{{$room->status}}</li>
                    <li><strong>Person Count: </strong>{{$room->person_count}}</li>
                    <li><strong>Price: </strong>${{$room->price}}/Day</li>
                    @foreach ($feature as $items)
                    @foreach ($room->roomtype->feature as $item2)
                     @if ($items->id==$item2->id)
                     <li><strong>{{$items->feature}} </strong></li>
                     @endif
                    @endforeach
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="product-details-room">

            <h1>{{$room->roomtype->name}}</h1><br>
            <span class="hint-star star">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
            </span>

            <p class="information">{{ \Str::limit($room->description, 200) }}</p>

        </div>
    </div>

    <script src="{{asset('admin/room/room_show.js')}}"></script>
    @endsection

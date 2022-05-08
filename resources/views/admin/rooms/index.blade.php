@extends('admin.layout')

@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('admin/room/room_show.css') }}" />
    </head>


        <!-- MAIN TITLE STARTS HERE -->



        <!-- MAIN TITLE ENDS HERE -->
        @foreach ($rooms as $key => $value)
        <div class="cont_room" style="margin-top:2%">
            <div class="product-image-room">

                <img class="image100" src="{{URL::asset($value->roomtype->image)}}" alt="">
                <div class="info_room">
                    <h2> Description</h2>
                    <ul>
                        <li><strong>Room Num : </strong>{{$value->number}} </li>
                        <li><strong>Status : </strong>{{$value->status}}</li>
                        <li><strong>Person Count: </strong>{{$value->person_count}}</li>
                        <li><strong>Price: </strong>${{$value->price}}/Day</li>

                    </ul>
                </div>
            </div>
            <div class="product-details-room">

                <h1>{{$value->roomtype->name}}</h1><br>
                <span class="hint-star star">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                </span>

                <p class="information">{{ \Str::limit($value->description, 200) }}</p>



                <div class="control-room">

                    <form action="{{ route('rooms.destroy',$value->id) }}" method="POST">
                        <a  href="{{ route('rooms.edit',$value->id) }}"><i class="fas fa-edit"></i></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit"><i class="fas fa-trash"></i></button>
                    </form>
                </div>

            </div>
        </div>
        @endforeach



   <script src="{{asset('admin/room/room_show.js')}}"></script>
    @endsection

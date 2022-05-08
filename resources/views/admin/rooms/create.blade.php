@extends('admin.layout')

@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('admin/room/room_create.css') }}" />
    </head>



    <div class="main__container">
        <!-- MAIN TITLE STARTS HERE -->

        <div class="main__title">
            <div class="main__greeting">
                <h1>Room Create</h1>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @php
            $status = ['Active', 'Non Active'];
        @endphp
        <!-- MAIN TITLE ENDS HERE -->
        <div class="Room_create">
            <form action="{{ route('rooms.store') }}" method="POST">
                @csrf
                <p>Hotel</p>
                <select class="select_Room_create" name="hotel_id">
                    @foreach ($Hotels as $Hotel)
                    <option value="{{ $Hotel->id }}">{{ $Hotel->name }}</option>
                @endforeach
                </select>



                <div class="both">
                    <div class="one">
                        <p>Room Type</p>
                        <select class="select_Room_create " name="room_type_id">
                            @foreach ($RoomType as $RoomType)
                            <option value="{{ $RoomType->id }}">{{ $RoomType->name }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="one" style="margin-left: 1.5%;">
                        <p>Status</p>
                        <select class="select_Room_create" name="status">
                            @foreach ($status as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="both">
                    <div class="two">
                        <p>Room Number</p>
                        <input type="number" name="number">
                    </div>
                    <div class="two" style="margin-left: 2.5%;">
                        <p>Person Number</p>
                        <input type="number" name="person_count">
                    </div>
                </div>
                <p>Price</p>
                <input type="number" name="price">
                <p>Details</p>
                <textarea type="textarea" name="description"></textarea>
                <button class="btn-Room_create btn-blue" aria-required="true" type="submit">Create</button>
                <button class="btn-Room_create btn-gray" aria-required="true">Cancle</button>
            </form>
        </div>
    </div>





@endsection

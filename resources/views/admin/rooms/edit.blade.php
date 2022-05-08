




@extends('admin.layout')

@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('admin/room/room_edit.css') }}" />
    </head>
    <div class="main__container">
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
    $status = ['Active', 'InActive'];
    @endphp
    <div class="Room_edit">

        <form action="{{ route('rooms.update', $room->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="both_e">
                <div class="one_e">
                    <p>Room Type</p>
                    <select class="select_Room_edit"  name="room_type_id">
                        @foreach ($RoomType as $RoomType)
                        <option value="{{ $RoomType->id }}">{{ $RoomType->name }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="one_e" style="margin-left: 1.5%;">
                    <p>Status</p>
                    <select class="select_Room_edit" name="status">
                        @foreach ($status as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="both_e">
                <div class="two_e">
                    <p>Room Number</p>
                    <input type="text" name="number" value="{{ $room->number }}">
                </div>
                <div class="two_e" style="margin-left: 2.5%;">
                    <p>Person Number</p>
                    <input type="text" name="person_count" value="{{ $room->person_count }}">

                </div>
            </div>
            <p>Price</p>
            <input type="number" name="price" value="{{ $room->price }}">
            <p>Details</p>
            <textarea type="text" name="description" value="{{ $room->description }}">{{ $room->description }}</textarea>
            <button class="btn-Room_edit btn-blue" aria-required="true" type="submit">Save</button>
        </form>
    </div>
</div>
@endsection

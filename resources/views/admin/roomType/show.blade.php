@extends('admin.layout')

@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('admin/roomtype/show_room.css') }}" />
    </head>


    <div class="RoomCard">
        <div class="wrapper">
            <div class="image i1">
                <img src="{{ URL::asset($type->image) }}" alt="{{ $type->image }}">
            </div>

            <div class="details">
                <div class="info">
                    <h1 class="Room_type">{{ $type->name }}</h1>
                    <h2> Its id is <span>{{ $type->id }}</span>.
                        ${{ $type->description }}...</h2>

                </div>
                <!-- icons-->
                <div class="All_icons">

                    @php
                        $i = 0;
                        $len = count($type->feature);
                    @endphp

                    @foreach ($type->feature as $item2)
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
            <!-- icons-->
        </div>
    </div>
    </div>


    <script src="{{ asset('admin/roomtype/room.js') }}"></script>


@endsection

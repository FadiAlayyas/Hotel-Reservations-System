@extends('layouts.setting')
@section('settingcontent')

    <head>
        <link rel="stylesheet" href="{{ asset('user/profile/resarvationcss.css') }}" />

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
            integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"
            type="text/css">
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous" type="text/javascript">
        </script>
        <title>Booking Details</title>
    </head>
<div id="body">


    <div class="container">
        <div class="title">Resarvatins Of The Rooms !!</div>
        <div class="All_cards">
            @foreach ($reservations as $item)
                <!-- card --->
                @php
                    $i = 0;
                @endphp

                @foreach ($persons as $person)
                    @if ($item->id == $person->reservation_id)
                        @php
                            $i++;
                        @endphp
                    @endif
                @endforeach

                <div class="card">
                    <div class="top_card">
                        <div class="people_count">
                            <h5> {{ $i }} <br><span>people</span></h5>
                        </div>
                        <img src="{{ URL::asset($item->room->roomtype->image) }}">
                        <div class="card-desc">
                            <h2>Persons information ..</h2>
                            @foreach ($persons as $person)

                                @if ($item->id == $person->reservation_id)
                                    <ul>
                                        <li>{{ $person->full_name }}</li>
                                        <li>{{ $person->age }}</li>
                                    </ul>
                                @endif

                            @endforeach
                        </div>
                    </div>

                    <div class="card_content">
                        @if ($item->reservation_status == 0)
                            <div class="state">Not Active </div>
                        @elseif($item->reservation_status==1)
                            <div class="state"> Active </div>
                        @endif

                        <div class="reservation_info">
                            <h2>Reservation prosses</h2>
                            <h3> press to see the information</h3>
                            <h4 id="more">.. here .. </h4>
                            <p>New York, the room number is {{ $item->room->number }} . It was reseved for
                                {{ $item->night_count }} nights.
                                The customr phone number is {{ $item->phone_number }}.</p>

                        </div>
                        <div class="reservation_date">
                            <i id="start_date" class="fa fa-clock">{{ $item->reservation_date }}</i>
                            <i id="end_date" class="fa fa-calendar">{{ $item->reservation_exDate }}</i>
                        </div>
                        <form action="{{ route('user.reservation.destroy', $item->id) }}">
                            <button id="delete" class="fas fa-trash"></button>
                        </form>

                    </div>
                </div>
                <!-- end card --->
            @endforeach
        </div>

    </div>
</div>
@endsection

@extends('admin.layout')

@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('admin/reservations/list.css') }}" />
    </head>

    <div class="main__container">
        <!-- MAIN TITLE STARTS HERE -->
        <div class="wrapper">

            <div class="row">


                @foreach ($users as $user)

                <div class="body-book" >
                    <div id="main-card">
                        <div class="cover-photo"></div>
                        <div class="photo">
                            <img class="imggg" src="{{URL::asset($user->profile->image)}}" alt="">
                        </div>
                        <div class="content-book">
                            <h2 class="name-book">{{ $user->name }}</h2>


                            <h3  class="fullstack email">{{$user->profile->province}}<br />{{$user->profile->Phone_number}} | <a class="fadi">{{$user->profile->gender}}</a></h3>


                                <h3  class="fadi name-book">{{ $user->email }}</h3>

                        </div>
                        <div class="contact-book">
                            <ul>

                                <a  href="{{ route('admin.reservation.indexP', $user->id) }}" target="_blank">
                                    <i class="fa ff">Booking Details</i>
                                </a>

                            </ul>
                        </div>
                    </div>
                    </div>

                @endforeach

            </div>

        </div>


        <script src="{{ asset('admin/reservations/list.js') }}"></script>

    @endsection

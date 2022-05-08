<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('user/layouts/sitting/setting.css') }}" />
    <link rel="icon" href="{{ asset('user/logo/logo.png') }}" type="image/png">
    <script src="{{ asset('user/layouts/sitting/jquery-3.5.1.min.js') }}"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSRF Token -->


</head>

<body>
    <!-- header -->
    <header>

        <input type="checkbox" name="" id="toggler">
        <label for="toggler" class="fas fa-bars"></label>

        <a href="{{ route('main.page') }}" class="logo"><i> {{ $hotelInfo[0]->name }}</i></a>

        <nav class="navbar">
            <a href="{{ route('service.indexx') }}"><i>Services</i> </a>
            <a href="{{ route('post.index') }}"><i>Memories</i> </a>
            <a href="{{ route('room.index') }}"><i>Rooms</i> </a>
            <a href="{{ route('gallery.indexx') }}"><i>Gallery</i> </a>
        </nav>

        <div class="icons">
            @if (Auth::user() != null)
                @if ($cMessage == 0)
                    <a href="{{ route('user.conversation.show') }}" class="fa fa-envelope"></a>

                @else
                    <a href="{{ route('user.conversation.show') }}">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <span class="icon-button__badge">{{ $cMessage }}</span>
                    </a>
                @endif
                <a href="{{ route('user.edit.profile') }}" class="fas fa-user" target="_blank"></a>

                <a href="{{ route('logout') }}" class="fas fa-power-off" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>


            @endif

            @guest
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="fas fa-user" target="_blank"></a>
                @endif
            @endguest

        </div>

    </header>
    <!-- end of header -->
    <main class="py-4">
        @yield('settingcontent')
    </main>

    <div class="btn fas fa-bars" style="color: white"> </div>
    <nav class="sidebar">
        <div class="sidetop">

            <img class="profimage" src="{{ URL::asset(Auth::user()->profile->image) }}"
                alt="{{ Auth::user()->profile->image }}">
                <div class="sideh3">
                    <h3> {{ Auth::user()->name }}</h3>
                    <h3> {{ Auth::user()->email }}</h3>
                </div>

        </div>

        <ul class="main_side">

            @if (Request::path() === 'user/conversation/show')
                <li class="activee"><a href="{{ route('user.conversation.show') }}">Inbox ({{ $cMessage }})</a></li>
            @else
                <li><a href="{{ route('user.conversation.show') }}">Inbox ({{ $cMessage }})</a></li>
            @endif


            @if (Request::path() === 'user/booking/details' || str_contains(url()->current(), 'user/show/persons/details'))
                <li class="activee"><a href="{{ route('user.booking.details') }}">Booking Details</a></li>
            @else
                <li><a href="{{ route('user.booking.details') }}">Booking Details</a></li>
            @endif


            @if (Request::path() === 'user/show/memories' || str_contains(url()->current(), 'user/post/edit'))
                <li class="activee"><a href="{{ route('user.show.memories') }}">Your Memories</a></li>
            @else
                <li><a href="{{ route('user.show.memories') }}">Your Memories</a></li>
            @endif



            <li onclick="dr()"> <a id="1">Sitting <span class="fas fa-caret-down"></span> </a>
                @if (Request::path() === 'user/edit/profile' || Request::path() === 'user/change/password')
                    <ul class="show" id="2">
                    @else
                        <ul class="" id="2">
                @endif


                @if (Request::path() === 'user/edit/profile')
            <li class="activee"><a href="{{ route('user.edit.profile') }}">Change Profile Info</a></li>
        @else
            <li><a href="{{ route('user.edit.profile') }}">Change Profile Info</a></li>
            @endif


            @if (Request::path() === 'user/change/password')
                <li class="activee"><a href="{{ route('user.change.password') }}">Change Password</a></li>
            @else
                <li><a href="{{ route('user.change.password') }}">Change Password</a></li>
            @endif


        </ul>
        </li>
        {{-- sign out --}}
        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                {{ __('Sign Out') }}</a>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        {{-- sign out --}}
        </ul>

    </nav>

    </div>
    <script src="{{ asset('user/layouts/sitting/settig.js') }}"></script>
</body>

</html>

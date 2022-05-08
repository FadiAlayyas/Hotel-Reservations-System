<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $hotelInfo[0]->name }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"
        type="text/css">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="icon" href="{{ asset('user/logo/logo.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('user/layouts/mainPages/layout1.css') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSRF Token -->

    <script src="{{ asset('user/layouts/mainPages/jquery-3.5.1.min.js') }}"></script>

</head>

<body>
    <!-- header section starts  -->

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

    <!-- header section ends -->

    <!-- footer section starts  -->
    <main class="py-4">
        @yield('content')
    </main>

    <!-- footer section starts  -->

    <section class="footer">

        <div class="box-container">
            <div class="box">
                <h3>About Us</h3>
                @foreach ($hotelInfo as $item)

                    <p>{{ $item->description }}</p>
                @endforeach
                <div class="icon5">
                    <i class="fas fa-home"></i>
                    <i class="fa fa-home"></i>
                </div>
            </div>

            <div class="box">
                <h3>quick links</h3>
                <a href="{{ route('user.conversation.show') }}">Contact us</a>
                <a href="{{ route('room.index') }}">Rooms</a>
                <a href="{{ route('service.indexx') }}">Services</a>
                <a href="{{ route('gallery.indexx') }}">Gallery</a>
                <a href="{{ route('post.index') }}">Memories</a>
            </div>

            <div class="box">
                <h3>Support</h3>
                {{-- locations --}}
                @foreach ($hotelInfo as $item)
                    <a href="#"><i class="fas fa-map-marker-alt"></i> {{ $item->location }}</a>
                @endforeach

                {{-- phones --}}
                @foreach ($contacts as $item)

                    @if ($item->type == 'phone')
                        <a href="#"><i class="fas fa-phone"></i>{{ $item->contact }}</a>
                    @endif

                @endforeach

                {{-- emails --}}
                @foreach ($contacts as $item)
                    @if ($item->type == 'email')
                        <a href="#"><i class="fas fa-envelope"></i>{{ $item->contact }}</a>
                    @endif
                @endforeach
            </div>

            <div class="box">
                <form action="{{ route('contactUs') }}">
                    <textarea class="box" placeholder="Send us your problem" name="content" cols="30" rows="10"
                        required></textarea><br>
                    @if ($message = Session::get('error'))
                        <div class="alert alert-primary" role="alert">
                            {{ $message }}
                        </div>
                    @endif
                    <input type="submit" value="send message" class="btn_footer">
                </form>
            </div>

        </div>

    </section>

    <!-- footer section ends -->

</body>

</html>

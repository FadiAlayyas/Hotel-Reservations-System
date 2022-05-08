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
    <link rel="stylesheet" href="{{ asset('user/welcome/style.css') }}">
    <link rel="icon" href="{{ asset('user/logo/logo.png') }}" type="image/png">

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
            @if($cMessage==0)
            <a href="{{ route('user.conversation.show') }}" class="fa fa-envelope"></a>

            @else
            <a href="{{ route('user.conversation.show') }}">
               <i class="fa fa-envelope" aria-hidden="true"></i>
               <span class="icon-button__badge">{{$cMessage}}</span>
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

    <!-- home section starts  -->

    <section class="home" id="home" style="    background: linear-gradient(rgba(53, 37, 37, 0.5),
    rgba(0, 0, 0, 0.5)), url({{ $hotelInfo[0]->headerImage }}) center/cover no-repeat;
    ">

        <div class="content">
            <h3>Fantastic hotel</h3>
            <span> Interesting & relaxing place </span>
            <p>Our Website Offers You Shfrn Hotel And Our Services, The Most Important Of Which Is Online Reservation.
            </p>
            <a href="#" class="btn">Welcome !!</a>
        </div>

    </section>

    <!-- home section ends -->

    <!-- about section starts  -->

    <section class="about" id="about">

        <h1 class="heading"><i> <span> about </span> us </i></h1>

        <div class="row">

            <div class="video-container">
                <video src="{{ URL::asset($hotelInfo[0]->aboutUsMedia) }}" loop autoplay muted></video>
                <h3>best place for fun</h3>
            </div>

            <div class="content">
                <h3><i>why choose us?</i> </h3>
                @foreach ($hotelInfo as $item)

                    <p>{{ $item->description }}</p>
                @endforeach


            </div>

        </div>

    </section>

    <!-- about section ends -->

    <!-- icons section starts  -->


    <section class="icons-container">

        <!-- single service -->
        @php
            $count = 0;
        @endphp
        @foreach ($services as $item)
            <?php if ($count == 4) {
                break;
            } ?>
            <div class="icons">
                <img style=" height:70px ; width: 70px; border-radius: 60%" src="{{ URL::asset($item->image) }}"
                    alt="">
                <div class="info">
                    <h3>{{ $item->type }}</h3>
                    <span>open all the time</span>
                </div>
            </div>
            <?php $count++; ?>
        @endforeach
        <!-- end of single service -->
    </section>

    <!-- icons section ends -->

    <!-- prodcuts section starts  -->
    <section class="about" id="about">
        <h1 class="heading"><i> <span> Our </span> Rooms </i></h1>
    </section>

    <div class="cards">
        @foreach ($rooms as $item)

            <div class="card">
                <h2 class="card-title">{{ $item->name }}</h2>
                <img src="{{ URL::asset($item->image) }}" alt="">
                <p class="card-desc">{{ $item->description }}
                    <br><br><i class="fas fa-bed" style="margin-left: 30%;"></i>
                    <i class="fas fa-tv"></i>
                    <i class="fas fa-fan"></i>
                    <i class="fas fa-wifi"></i>

                </p>
            </div>
        @endforeach

    </div>
    <!-- prodcuts section ends -->

    <!-- review section starts  -->

    <section class="review" id="review">

        <h1 class="heading"><i>customer's <span>review</span></i> </h1>

        <div class="box-container">

            @php
                $count = 0;
            @endphp

            @foreach ($memo as $item)
                <?php if ($count == 3) {
                    break;
                } ?>
                <div class="box">
                    <div class="stars">
                        @for ($i = 0; $i < $item->rate; $i++)
                            <i class="fas fa-star"></i>
                        @endfor
                    </div>
                    <p>{{ $item->opinion }}</p>
                    <div class="user">
                        <img src="{{ $item->user->profile->image }}" alt="">
                        <div class="user-info">
                            <h3><i>{{ $item->user->name }}</i> </h3>
                            <span><i>happy customer</i></span>
                        </div>
                    </div>
                    <span class="fas fa-quote-right"></span>
                </div>
                <?php $count++; ?>

            @endforeach

        </div>

    </section>

    <!-- review section ends -->

    <!-- contact section starts  -->

    <section class="contact" id="contact">

        <h1 class="heading"><i><span> contact </span> us</i> </h1>

        <div class="row">

            <form action="">
                <div class="top_contact">
                    <div class="top_contact_par">
                        <p>To contact the administration, send your message below.</p>
                    </div>
                    <div class="top_contact_img">
                        <img src="{{ asset('user/welcome/images/new_contact.png') }}" alt="">
                    </div>
                </div>
            </form>

            <div id="map"></div>
            <script>
                function initMap() {
                    /*four season */
                    var loc1 = {
                        lat: {!! json_encode($hotelInfo[0]->Lat) !!}  ,
                        lng:{!! json_encode($hotelInfo[0]->Lng) !!}
                    };
                    var map1 = new google.maps.Map(document.getElementById("map"), {
                        zoom: 5,
                        center: loc1
                    });
                    var marker1 = new google.maps.Marker({
                        position: loc1,
                        map: map1
                    });
                }
            </script>

            <script async defer
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYzXj5wF4L6mChyyc5xwfb2QT1QEZ9VN8&callback=initMap">
            </script>

        </div>

    </section>

    <!-- contact section ends -->

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

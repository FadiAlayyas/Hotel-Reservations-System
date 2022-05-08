<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('admin/Statistics/styles.css') }}" />
    <script src="{{ asset('admin/Statistics/jquery-3.5.1.min.js') }}"></script>


    <link rel="icon" href="{{ asset('admin/Statistics/image/logo.png') }}" type="image/png">
    <title>Admin Dashbord</title>
</head>

<body id="body">

    <div class="container">
        <nav class="navbar">
            <div class="nav_icon" onclick="toggleSidebar()">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
            <div class="navbar__left">
                <a href="{{ route('dashboard') }}">Home</a>
                <a href="{{ route('service.index') }}" style=" color: #143555;">Services</a>
                <a href="{{ route('gallery.index') }}" style=" color: #143555;">Gallary</a>
                <a href="{{ route('profile.index') }}" style=" color: #143555;" class="hide">Administration</a>
            </div>

            <div class="leftt">
                <i class=" fa fa-caret-square-down point"></i>
                <div id="myDropdown1" class="dropdown-content1">
                    <a href="{{ route('dashboard') }}">Home</a>
                    <a href="{{ route('service.index') }}">Services</a>
                    <a href="{{ route('gallery.index') }}">Gallery</a>
                    <a href="{{ route('profile.index') }}">Administration</a>
                </div>
            </div>


            <div class="navbar__right" style="padding-right: 1%">

                <!--new-->
                @if($adminI->image==null)
                <img src="{{ asset(URL::asset('upload/profile/nophoto.png')) }}" alt="" width="50px" height="50px">
                @else
                <img src="{{ asset(URL::asset($adminI->image)) }}" alt="" width="50px" height="50px">
                @endif

                <div class="name">
                    <span>{{ $adminI->full_name }}</span>
                    <div class="name1">
                        <p>{{ $adminI->email }} </p>
                        <i onclick="myFunction()" class="fa fa-chevron-down dropbtn" aria-hidden="true"></i>
                    </div>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="{{route('profile.show',$adminI->SNN)}}">Profile</a>
                    </div>

                </div>
                <!--new-->
                <!--notifications-->
                <form action="{{route('admin.conversation.inbox')}}">
                    <button type="submit" class="icon-button">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        @if ($admincMessage!=0)
                        <span class="icon-button__badge">{{$admincMessage}}</span>

                        @endif
                    </button>
                </form>


                <!--notifications-->

            </div>
        </nav>

        <main>
            @yield('content')
        </main>

        <div id="sidebar">
            <div class="sidebar__title">
                <i onclick="closeSidebar()" class="fa fa-times" id="sidebarIcon" aria-hidden="true"></i>

                <h1>
                    <a href="{{ route('admin.hotel.edit', $hotel->id) }}" class="btn btn-primary"><i
                            class="fas fa-hotel"></i>HOTELS</a>
                </h1>
            </div>

            <div class="sidebar__menu">
                <div class="sidebar__link active_menu_link" style="margin-right: 10%">
                    <i class="fa fa-home"></i>
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                </div>
                <h2 class="btn2"> <i class="fas fa-concierge-bell cog"></i> Services Management <i
                        class="fas fa-chevron-down chev"></i></h2>

                <div class="sidebar__link hidden2"><i class="fa fa-plus-square"></i>
                    <a href="{{ route('service.create') }}">Add Service</a>
                </div>
                <div class="sidebar__link hidden2"><i class="fa fa-list"></i>
                    <a href="{{ route('service.index') }}">Services List</a>
                </div>
                <h2 class="btn3"> <i class="fas fa-phone cog"></i> Contact Management <i
                        class="fas fa-chevron-down chev"></i>
                </h2>
                <div class="sidebar__link hidden3"><i class="fa fa-plus-square"></i>
                    <a href="{{ route('admin.contact.create') }}">Add Contact</a>
                </div>
                <div class="sidebar__link  hidden3"><i class="fa fa-list"></i>
                    <a href="{{ route('admin.contact.index') }}">Contact List</a>
                </div>
                <h2 class="btn5"> <i class="fas fa-images cog"></i> Gallary Management <i
                        class="fas fa-chevron-down chev"></i>
                </h2>
                <div class="sidebar__link hidden5"><i class="fa fa-plus-square"></i>
                    <a href="{{ route('gallery.create') }}">Create</a>
                </div>
                <div class="sidebar__link hidden5"><i class="fa fa-list"></i>
                    <a href="{{ route('gallery.index') }}">Images</a>
                </div>
                <h2 class="btn4"><i class="fas fa-users cog"></i> Users Management <i
                        class="fas fa-chevron-down chev"></i></h2>
                <div class="sidebar__link hidden4"><i class="fa fa-list"></i>
                    <a href="{{ route('users.index') }}">User List</a>
                </div>
                <h2 class="btn7"><i class="fas fa-bed cog"></i> Room Management <i class="fas fa-chevron-down chev"></i>
                </h2>
                <div class="sidebar__link  hidden7"><i class="fa fa-plus-square"></i>
                    <a href="{{ route('rooms.create') }}">Add Room</a>
                </div>
                <div class="sidebar__link hidden7"><i class="fa fa-list"></i>
                    <a href="{{ route('rooms.index') }}">Room List</a>
                </div>
                <div class="sidebar__link hidden7"><i class="fa fa-plus-square"></i>
                    <a href="{{ route('type.create') }}">Add Room Type</a>
                </div>
                <div class="sidebar__link hidden7"><i class="fa fa-list"></i>
                    <a href="{{ route('type.index') }}">Room Type list</a>
                </div>

                <h2 class="btn8"><i class="fas fa-memory cog"></i> Memory Management <i
                        class="fas fa-chevron-down chev"></i></h2>
                <div class="sidebar__link hidden8"><i class="fa fa-check-circle"></i>
                    <a href="{{ route('admin.post.index') }}">Check Post</a>
                </div>

                <h2 class="btn9"><i class="fas fa-hotel cog"></i> Booking Management<i
                        class="fas fa-chevron-down chev"></i></h2>
                <div class="sidebar__link hidden9"><i class="fa fa-ticket"></i>
                    <a href="{{ route('admin.reservation.index') }}">Reservations</a>
                </div>

                <h2 class="btn10"><i class="fas fa-bars cog"></i> Features Management<i
                        class="fas fa-chevron-down chev"></i></h2>


                <div class="sidebar__link hidden10"><i class="fa fa-list"></i>
                    <a href="{{ route('feature.index') }}">Rooms Features</a>
                </div>
                <div class="sidebar__link  hidden10"><i class="fa fa-plus-square"></i>
                    <a href="{{ route('feature.create') }}">Create Feature</a>
                </div>

                <h2 class="btn11"><i class="fa fa-ticket cog"></i> Main Page<i class="fas fa-chevron-down chev"></i>
                </h2>
                <div class="sidebar__link hidden11"><i class="fa fa-plus-square"></i>
                    <a href="{{ route('admin.hotel.indexHeader') }}">Header Image</a>
                </div>


                <div class="sidebar__logout">
                    <i class="fa fa-power-off"></i>
                    <a href="{{ route('adminLogout') }}">Log out</a>
                </div><br><br><br>
            </div>
        </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script src="{{ asset('admin/Statistics/script.js') }}"></script>

</body>

</html>

@extends('admin.layout')

@section('content')

    <head>
        <link rel="stylesheet" href="{{asset('admin/gallary/add_img.css')}}" />
    </head>


    <div class="main__container">
        <!-- MAIN TITLE STARTS HERE -->

        <div class="main__title">
            <div class="main__greeting">
                <h1>Add Image</h1>
            </div>
        </div>

        <!-- MAIN TITLE ENDS HERE -->
        <div class="profile_gallary">
            @if(count($errors)>0)
            <ul class="navbar-nav mr-auto">
                    @foreach ($errors->all() as $error)
                    <li class="nav-item active">
                             {{$error}}
                          </li>
                    @endforeach

                  </ul>
                  @endif
                  <form action="{{route('gallery.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <p>Hotel</p>
                <select name="hotel_id" id="hotel" class="select">
                    @foreach ($Hotels as $Hotel)
                    <option value="{{$Hotel->id}}" >{{$Hotel->name}}</option>
                    @endforeach
                </select>
                <p>Photo</p>
                <input type="file" name="image"><br>
                <button class="btn-profile btn-blue" aria-required="true" type="submit">Save</button>
            </form>
        </div>
    </div>


@endsection

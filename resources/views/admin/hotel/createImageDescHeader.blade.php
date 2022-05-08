@extends('admin.layout')

@section('content')

    <head>
        <link rel="stylesheet" href="{{asset('admin/MainPage/header.css')}}" />
    </head>

    <div class="main__container">

        <div class="header">
            @if(count($errors)>0)
            <ul class="navbar-nav mr-auto">
                    @foreach ($errors->all() as $error)
                    <li class="nav-item active">
                             {{$error}}
                          </li>
                    @endforeach

                  </ul>
                  @endif
                  <form action="{{route('admin.hotel.storeHeader')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                <p>Page Name</p>
                <select class="sele" name="pageName">
                    <option >Gallary</option>
                    <option >Services</option>
                    <option >Rooms</option>
                </select>
                <p>Header Photo</p>
                <input class="file" type="file" name="headerImage" >
                <p>Header Description</p>
                <textarea name="headerDescription"></textarea>
                <button type="submit" class="btn-header btn-blue" aria-required="true">Create</button>
            </form>
        </div>
    </div>



@endsection

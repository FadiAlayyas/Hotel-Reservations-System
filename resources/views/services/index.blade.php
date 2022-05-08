@extends('layouts.app')
@section('content')

    <head>
        <title>SERVICES</title>
        <link rel="stylesheet" href="{{ asset('user/services/ServicesCss.css') }}">
    </head>
    <div class="header" style="    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7))
    , url({{ URL::asset($header->headerImage) }}) center/cover no-repeat;">
        <div class="head-bottom flex">
            <h2>SERVICES</h2>
            <p>{{$header->headerDescription}}</p>
        </div>
    </div>
    <!--services-->
    @foreach ($services as $item)

    <div class="sec-width">
        <div class="height">
        </div>
        <div class="width">
            <div class="imgg">
                <img src="{{ URL::asset($item->image) }}" alt="">
            </div>
            <div class="info">
                <h1>Our {{ $item->type }}</h1>
                <p>{{ $item->description }}</p>
                <form action="{{route('gallery.indexx')}}">
                    <button type="submit"><i>More Photo</i></button>
                </form>
            </div>
        </div>


    </div><hr>
    @endforeach
    <!--end services-->
@endsection



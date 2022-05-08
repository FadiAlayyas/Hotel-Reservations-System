@extends('layouts.app')
@section('content')

    <head>
        <meta charset="utf-8">
        <title>GALLERY</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('user/gallery/GalleryCss.css') }}">
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">
    </head>
    <div class="header" style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
     url({{ URL::asset($header->headerImage) }}) center/cover no-repeat   ">
        <div class="head-bottom flex">
            <h2>GALLERY</h2>
            <p>{{$header->headerDescription}}</p>
        </div>
    </div>

    <section class="Gallery">
        <div class="title  gal-width">
            <h2 class="head-gallery">Gallery</h2>
        </div>
        <br>

        <div class="image_gal ">
            @foreach ($gallery as $item)
                <div class="imgg">
                    <a href="{{ URL::asset($item->image) }}" class="fancybox" data-fancybox="Restaurant">
                        <IMG src="{{ URL::asset($item->image) }}" alt="">
                        <h2><i class="fa fa-eye"></i></h2>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
    <!--end services-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

@endsection

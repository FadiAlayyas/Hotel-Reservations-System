
@extends('admin.layout')

@section('content')

    <head>
        <link rel="stylesheet" href="{{asset('admin/gallary/images_list.css')}}" />
    </head>

    <div class="main__container">
        <!-- MAIN TITLE STARTS HERE -->

        <div class="main__title">
            <div class="main__greeting">
                <h1>Gallary</h1>
            </div>
        </div>

        @if ($photos->count()>0)
        <div class="all-image">
            @foreach ($photos as $items)

            <div class="single-image">
                <img src="{{URL::asset($items->image)}}" alt="">
                <a href="{{route('gallery.destroy',['id'=>$items->id])}}"> <i class="fas fa-trash"></i></a>
            </div>

            @endforeach

        </div>

        @else
        <div class="alert alert-primary" role="alert">
            No Photo
          </div>
        @endif

    </div>

    <script src="{{ asset('admin/gallary/images_list.js') }}"></script>

@endsection

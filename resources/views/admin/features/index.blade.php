
@extends('admin.layout')

@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('admin/features/feature_index.css') }}" />
    </head>
    @php
    $i=1;
@endphp
@if ($features->count()>0)
    <div class="all">
        @foreach ($features as $items)
        <div class="one">
          <div class="both">
            <p><i>{{$items->feature}}</i> </p>
            <button class="both_btn"> <i class="fa {{$items->class}}"></i></button>
          </div><hr>

          <form action="{{ route('feature.destroy',$items->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="one_btn"><i class="fas fa-trash"></i></button>
        </form>

        </div>
        @endforeach
     </div>
     @else
     <div class="alert alert-primary" role="alert">
         No Features
       </div>
     @endif


@endsection

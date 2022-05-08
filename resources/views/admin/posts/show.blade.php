@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card container" style="width: 50%;">
        <img src="{{URL::asset($post->image)}}" class="card-img-top" alt="{{$post->image}}">
        <div class="card-body">
          <p class="card-text">username:{{$post->user->name}}</p>
          <p class="card-text">created form:{{$post->created_at->diffForHumans()}}</p>
          <p class="card-text">opinion:{{$post->opinion}}</p>
          <p class="card-text">rate:{{$post->rate}}</p>

         </div>
      </div>
  </div>
@endsection

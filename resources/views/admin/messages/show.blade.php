@extends('layouts.app')
@section('content')
<a href="{{route('admin.message.inbox')}}" class="btn btn-primary">Go back</a>
<div class="card  container  " style="width: 50rem;">
    <div class="card-body container">
        <div @if ($message->owner_type=='admin')
            style="margin-left:600px;"
         @endif>
         <strong>{{$message->owner_type}}</strong>
      <p class="card-text">{{$message->content}}</p>
        </div>
      @include('admin.messages.reply',['replies'=>$message->replies ,'message_id'=>$message->id])
      <hr>
      <form action="{{route('admin.reply.store')}}" class="mb-3 container" method="POST">
        @csrf
        <div class="mb-3 container">
            <textarea type="text" class="form-control" name='content'  ></textarea>
            <input type="hidden" class="form-control" name='message_id'  value="{{$message->id}}">
          </div>
          <button class="btn btn-danger">send reply</button>
    </form>
    </div>
  </div>
@endsection

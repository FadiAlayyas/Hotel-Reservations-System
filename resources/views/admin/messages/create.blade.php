@extends('layouts.app')
@section('content')
<form action="{{route('admin.message.store')}}" class="mb-3 container" method="POST">
    @csrf
      <div class="mb-3 container">
        <label for="exampleFormControlTextarea1" class="form-label" >message</label>
        <textarea class="form-control" name='content'  rows="3" required></textarea>
      </div>
      <div class="mb-3 container">
        <label for="exampleFormControlSelect1">select ricever</label>
        <select class="form-control" name="reciver" id="hotel">
            <option value="all" >all</option>
         @foreach ($users as $item)

         <option value="{{$item->name}}" >{{$item->name}}</option>
         @endforeach
        </select>
      </div>
      <button class="btn btn-danger">Send</button>
</form>

@endsection

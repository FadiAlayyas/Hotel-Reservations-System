


@extends('admin.layout')

@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('admin/roomtype/create_edit_style.css') }}" />
    </head>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="main__container">
    <div class="profile">
        <form action="{{ route('type.store') }}" method="POST" enctype="multipart/form-data" >
          @csrf
          <p>Hotel</p>
          <select class="selectt" name="hotel_id" id="hotel">
            @foreach ($hotels as $Hotel)
          <option value="{{$Hotel->id}}" >{{$Hotel->name}}</option>
          @endforeach
          </select>



          <p>Type</p>
          <select class="selectt" name="name">
            <option>Classic</option>
            <option>Premier</option>
            <option>Deluxc</option>
            <option>Suite</option>
          </select>
          <p>Photo</p>
          <input class="input-file" type="file" name="image">
          <p>Description</p>
          <textarea name="description"></textarea>


          <p>features</p><br>

          <div class="icon">
            @foreach ($features as $items)

            <div class="two">
              <i class="fas {{$items->class}}"></i>
              <input class="check" type="checkbox" name="features[]" value="{{$items->id}}">
            </div>

            @endforeach
          </div>


          <button class="btn-profile btn-blue" aria-required="true" type="submit">Save</button>

        </form>
      </div>
    </div>



@endsection

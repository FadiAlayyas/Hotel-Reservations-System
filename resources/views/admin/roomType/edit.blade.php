
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
        <form action="{{ route('type.update',$type->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')


          <p>Type</p>
          <select class="selectt" name="name" type="text" value="{{ $type->name }}">
            <option>Classic</option>
            <option>Premier</option>
            <option>Deluxc</option>
            <option>Suite</option>
          </select>
          <p>Photo</p>
          <input class="input-file" type="file" name="image">
          <p>Description</p>
          <textarea name="description">{{ $type->description }}</textarea>


          <p>features</p><br>

          <div class="icon">

            @foreach ($feature as $items)
            <div class="two">
            <i class="fas {{$items->class}}"></i>
            <input type="checkbox" name="features[]"  value="{{$items->id}}"
            @foreach ($type->feature as $item2)
             @if ($items->id==$item2->id)
              checked
             @endif
            @endforeach
            >
        </div>
            @endforeach

          </div>


          <button class="btn-profile btn-blue" aria-required="true" type="submit">Save</button>

        </form>
      </div>
    </div>



@endsection

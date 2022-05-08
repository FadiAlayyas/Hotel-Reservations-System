
@extends('admin.layout')

@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('admin/roomtype/Room_type_index.css') }}" />
    </head>
    @foreach ($types as $key => $value)
    <div class="wrapper">
        <div class="image">
            <img src="{{URL::asset($value->image)}}" alt="{{$value->image}}">
        </div>

        <div class="details">
            <form action="{{ route('type.destroy',$value->id) }}" method="POST">
                <a href="{{ route('type.edit',$value->id) }}"><i class="fas fa-edit"></i></a>
                <a  href="{{ route('type.show',$value->id) }}"><i class="fas fa-eye"></i></a>
                @csrf
                @method('DELETE')
                <button type="submit"><i class="fas fa-trash"></i></button>
            </form>

        </div>

        <h1>{{$value->name }}</h1>
    </div>
    @endforeach
@endsection


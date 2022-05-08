@extends('admin.layout')

@section('content')

    <head>
        <link rel="stylesheet" href="{{asset('admin/MainPage/header_table.css')}}" />
    </head>


    <div class="main__container">
        <!-- MAIN TITLE STARTS HERE -->
        <div class="table_list">
            <table class="table">
                <thead>
                    <th><i>Name</i></th>
                    <th><i>Description</i> </th>
                    <th><i>Photo</i></th>
                    <th><i>Delete</i></th>
                </thead>
                <tbody>
                    @foreach ($data as $items)
                    <tr>
                        <td data-label="Name" class="color">{{$items->pageName}}</td>
                        <td data-label="Description" class="color">{{$items->headerDescription}}</td>
                        <td data-label="Photo"><img class="photo" src="{{URL::asset($items->headerImage)}}"></td>
                        <td data-label="Delete" class="color"><a href="{{route('admin.hotel.destroy',['id'=>$items->id])}}"><i class="fas fa-trash trashh"></i></a></td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
        <div class="table_btn">
            <a href="{{route('admin.hotel.createHeader')}}"><i class="fas fa-plus-square"></i> Create</a>
        </div>
    </div>


@endsection

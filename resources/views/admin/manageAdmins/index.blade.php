@extends('admin.layout')

@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('admin/manageAdmins/admin_index.css') }}" />
    </head>
    <div class="main__container">

    <div class="table_list">
        <table class="table">
            <thead>
                <th><i>Name</i></th>
                <th><i>Email</i> </th>
                <th><i>Role</i></th>
                <th><i>Edit</i></th>
                <th><i>Details</i></th>
                <th><i>Delete</i> </th>
            </thead>
            <tbody>
                @foreach ($admins as $items)
                <tr>
                    <td data-label="Name" class="color">{{$items->full_name}}</td>
                    <td data-label="Email" class="color">{{$items->email}}</td>
                    <td data-label="Role" class="color">{{$items->Role}}</td>
                    <td data-label="Edit"><a href="{{route('profile.edit',$items->id)}}"><i class="fas fa-edit" style="color: #469cac;"></i></a></td>
                    <td data-label="show"><a href="{{route('profile.show',$items->SNN)}}"><i class="fas fa-eye" style="color: #2e4a66;"></i></a></td>
                    <td data-label="Delete"><a href="{{route('profile.destroy',$items->id)}}"><i class="fas fa-trash" style="color: red;"></i></a></td>
                </tr>

                @endforeach

            </tbody>
        </table>
    </div>
    <div class="table_btn">
        <a href="{{route('profile.create')}}" ><i class="fas fa-plus-square"></i> Add Admin</a>
    </div>


    </div>

@endsection


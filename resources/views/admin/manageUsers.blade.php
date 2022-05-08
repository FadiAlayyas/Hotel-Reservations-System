@extends('admin.layout')

@section('content')
<head>
    <link rel="stylesheet" href="{{asset('admin/User/admin-user-list.css')}}" />
    <script src="{{asset('admin/User/admin-user-list.js')}}"></script>
</head>

<div class="main__container">
    <!-- MAIN TITLE STARTS HERE -->

    <div class="main__title">
        <img src="assets/hello.svg" alt="" />

    </div>
    <div class="profile">

        <form action="{{ route('search') }}" method="POST">
            @csrf
            <div class="top">
            <input type='text' name='q' class="form-control" placeholder="Search User..." style="width: 35%;height: 10%">
            <button type="submit" class="btn btn-danger mt-2" style="width: 6%"><i class="fas fa-1x  fa-search"></i></button>
            </div>
        </form>

        @if (session('status'))
        <div class="alert-info">
            {{ session('status') }}
        </div>


        @endif
        <table class="table">
            <thead>
                <th>id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Block/UnBlock</th>
                <th>Delete</th>
            </thead>
            <tbody>
                @foreach ($users as $user)

                <tr>

                    <td data-label="id">{{ $user->id }}</td>
                    <td data-label="Name">{{ $user->name }}</td>
                    <td data-label="Email">{{ $user->email }}</td>
                    <td data-label="Status">
                            @if(Cache::has('user-is-online-' . $user->id))
                            <i class="fas fa-circle circle-green">
                            @else
                            <i class="fas fa-circle circle-red"></i>
                            @endif
                        </td>
                        <td data-label="Block/UnBlock">
                            @if ($user->status==1)
                            <a class="text-success" href="{{route('active_deactive_user',$user->id)}}"><i class="fas fa-2x fa-user"></i></a> &nbsp;

                            @else
                            <a class="text-danger" href="{{route('active_deactive_user',$user->id)}}"><i class="fas fa-ban"></i></a> &nbsp;
                            @endif
                          </td>
                          <td data-label="Delete">
                            <a class="text-danger" href="{{route('user.destroy',$user->id)}}"><i class="fas fa-2x fa-trash"></i></a> &nbsp;
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection


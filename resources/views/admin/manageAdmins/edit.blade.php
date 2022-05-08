@extends('admin.layout')

@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('admin/manageAdmins/admin_edit.css') }}" />
    </head>

    <div class="main__container">
        <!-- MAIN TITLE STARTS HERE -->
        <!-- MAIN TITLE ENDS HERE -->
        <div class="table_admin">

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
        @php
        $Role = ['Boss', 'Employee'];
        @endphp
            <form action="{{route('profile.update', $Admin->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
               
                <p>Photo</p>
                <input type="file" name="image">
                <p>Role</p>
                <select class="select_table_admin" name="Role">
                    <option disabled="disabled" selected="selected">{{$Admin->Role}}</option>
                    @foreach ($Role as $item)
                    <option value="{{ $item }}">{{ $item }}</option>
                    @endforeach
                </select>
                <p>Name</p>
                <input type="text" name="full_name" value="{{ $Admin->full_name }}">
                <div class="both">
                    <div class="one">
                        <p>Email</p>
                        <input type="email" name="email" value="{{ $Admin->email }}">
                    </div>
                    <div class="one">
                        <p>Password</p>
                        <input type="password" name="password">
                    </div>
                </div>
                <div class="both">
                    <div class="one">
                        <p>Age</p>
                        <input type="date" name="age" value="{{$Admin->age}}">
                    </div>
                    <div class="one">
                        <p>Gender</p>
                        <select class="select_table_admin" name="gender">
                            <option disabled="disabled" selected="selected">{{$Admin->gender}}</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                </div>
                <div class="both">
                    <div class="one">
                        <p>Phone number</p>
                        <input type="number" name="Phone_number" value="{{$Admin->Phone_number}}">
                    </div>
                    <div class="one">
                        <p>SNN</p>
                        <input type="number" name="SNN" value="{{$Admin->SNN}}">
                    </div>
                </div>
                <button type="submit" class="btn-table_admin btn-blue" aria-required="true">Update</button>

            </form>
        </div>
    </div>


@endsection


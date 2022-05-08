@extends('admin.layout')

@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('admin/manageAdmins/admin_create.css') }}" />
    </head>


    <div class="main__container">
        <!-- MAIN TITLE STARTS HERE -->
        <!-- MAIN TITLE ENDS HERE -->
        <div class="table_admin">
            @if(count($errors)>0)
            <ul class="navbar-nav mr-auto">
                    @foreach ($errors->all() as $error)
                    <li class="nav-item active">
                             {{$error}}
                          </li>
                    @endforeach

                  </ul>
                  @endif

            <form action="{{route('profile.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <p>Photo</p>
                <input type="file" name="image" placeholder="personal picture">
                <p>Role</p>
                <select name="Role" class="select_table_admin">
                    <option disabled="disabled" selected="selected">Boss or Employee</option>
                    <option>Boss</option>
                    <option>Employee</option>
                </select>
                <p>Name</p>
                <input name="full_name" type="text" placeholder="Full name">
                <div class="both">
                    <div class="one">
                        <p>Email</p>
                        <input name="email" type="email" placeholder="fadi_admin@exp.com">
                    </div>
                    <div class="one">
                        <p>Password</p>
                        <input name="password" type="password" placeholder="Fy@45Effkl@">
                    </div>
                </div>
                <div class="both">
                    <div class="one">
                        <p>Date Birth</p>
                        <input name="age" type="date" placeholder="1999/2/5">
                    </div>
                    <div class="one">
                        <p>Gender</p>
                        <select name="gender" class="select_table_admin" >
                            <option disabled="disabled" selected="selected">Male or Female</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                </div>
                <div class="both">
                    <div class="one">
                        <p>Phone number</p>
                        <input name="Phone_number" type="number" placeholder="+963">
                    </div>
                    <div class="one">
                        <p>SSN</p>
                        <input name="SNN" type="number">
                    </div>
                </div>
                <button type="submit" class="btn-table_admin btn-blue" aria-required="true">Create</button>

            </form>
        </div>
    </div>


@endsection

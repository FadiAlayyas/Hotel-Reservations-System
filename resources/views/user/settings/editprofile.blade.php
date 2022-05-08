@extends('layouts.setting')
@section('settingcontent')

    <head>
        <title>Profile Information</title>
        <link rel="stylesheet" href="{{ asset('user/profile/form_editprof.css') }}" />
    </head>



    <div class="all_form">
        <div class="form_left">
            <img src="{{ asset('user/profile/images/editprof.png') }}" alt="">
        </div>
        <div class="form_right">

                @php
                    $gender = ['Male', 'Female'];
                @endphp
                <form action="{{ route('user.update.profile') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- NAME AND EMAIL --}}
                    <div class="form_width">
                        <input type="text" name="name" onfocus="(this.value='{{ $user->name }}')" placeholder="Full name"
                            required>
                        <input type="email" name="email" onfocus="(this.value='{{ $user->email }}')" placeholder="E-Mail"
                            required>
                    </div>

                        {{-- PROFILE PICTURE --}}
                        <input class="input_right" type="text" onfocus="(this.type='file')" placeholder="Profile picture" name="image">
                        {{-- GENDER --}}
                        <select name="gender" class="gender">
                            <option value="Gender" disabled selected>Gender</option>
                            @foreach ($gender as $item)
                                <option value={{ $item }} {{ $profile->gender == $item ? 'selected' : ' ' }}>
                                    {{ $item }}</option>
                            @endforeach
                        </select>
                        {{-- PHONE NUMBER --}}
                        <input class="input_right" type="text" placeholder="Phone Number"
                            onfocus="(this.value='{{ $profile->Phone_number }}')" name="Phone_number" required>
                        {{-- PROVINCE --}}
                        <input class="input_right" type="text" placeholder="Province" onfocus="(this.value='{{ $profile->province }}')"
                            name="province" required>
                        {{-- PASSWORD CONFIRMATION --}}
                        <input class="input_right" type="password" placeholder="Enter your password to continue" name="password" required>
                        <div style="margin-left: 40px">
                            @if ($message = Session::get('message'))
                            <div class="alert alert-primary" role="alert">
                                {{ $message }}
                            </div>
                        @endif
                        </div>

                        <input type="submit" value="Save" class="form_btn">

                </form>

        </div>
    </div><br>

@endsection

@extends('layouts.setting')
@section('settingcontent')
<head>
    <title>Change Password</title>
    <link rel="stylesheet" href="{{ asset('user/profile/form_password.css') }}" />
</head>


        <div class="center">
            <h1>Change Password</h1>

                <form action="{{ route('user.update.password') }}" method="POST" >
                    @csrf
                    <div class="inputbox">
                        <input class="inputt" type="password"  name="old_password" required>
                        <span>Old Password</span>
                    </div>
                    @if ($message=Session::get('error'))
                    <div class="alert alert-primary" role="alert">
                        {{$message}}<br><br><br>
                       </div>
                    @endif

                    <div class="inputbox">
                        <input class="inputt" type="text" name="password" required>
                        <span>New Password</span>
                    </div>

                    <div class="inputbox">
                        <input class="inputt" type="text" name="password_confirmation" required>
                        <span>Password Confirmation</span>
                    </div>
                    @if ($message=Session::get('success'))
                        <div class="alert alert-primary" role="alert">
                            {{$message}}<br><br><br>
                           </div>
                        @endif
                    <div class="inputbox">
                        <input type="submit" value="Save">
                    </div>
                </form>
        </div>

@endsection

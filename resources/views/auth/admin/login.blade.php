<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />


    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('admin/login/admin_login.css') }}" />
    <title>Admin Form</title>
</head>
{{-- {!! NoCaptcha::renderJs() !!} --}}
<body>
    <div class="conttt">
        <div class="brand-logo"><i class="fas fa-user-cog"></i></div>
        <div class="brand-title">Sign in</div>
        @if (\Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ \Session::get('success') }}

            </div>
        @endif


        {{ \Session::forget('success') }}
        @if (\Session::get('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ \Session::get('error') }}

            </div>
        @endif
        <div class="inputs">
            <form action="{{ route('adminLoginPost') }}" method="post">
                {!! csrf_field() !!}




                <label>Email</label>
                <input type="email" name="email" placeholder="Email" required>
                @if ($errors->has('email'))
                    <span class="help-block font-red-mint">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

                <label>Password</label>
                <input type="password" name="password" placeholder="Password" required>

                @if ($errors->has('password'))
                    <span class="help-block font-red-mint">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                {{-- <div style="margin-top: 15px;margin-left: -16px">
                    <div class="{{ $errors->has('g-recaptcha-response') ? 'has-error' : '' }}">
                        {!! NoCaptcha::display(['data-theme' => '']) !!} --}}
                        {{-- {!! NoCaptcha::display() !!} --}}
                    {{-- </div> --}}
                    {{-- @if ($errors->has('g-recaptcha-response'))
                        <span class="help-block">
                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                        </span>
                    @endif
                </div> --}}



                <button type="submit">Log in</button>


            </form>
        </div>
    </div>
</body>

</html>

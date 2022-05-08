<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link rel="stylesheet" href="{{ asset('user/auth/style.css') }}">
    <link rel="icon" href="{{ asset('user/logo/logo.png') }}" type="image/png">
    <title>Sign up</title>
</head>

{!! NoCaptcha::renderJs() !!}

<body id="body">
    <div class="login-box">
        <h2>Sign up</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="user-box">
                <input id="name" class="@error('name') is-invalid @enderror" type="text" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                <label>Full Name</label>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="user-box">
                <input id="email" class="@error('email') is-invalid @enderror" type="email" name="email"
                    value="{{ old('email') }}" required autocomplete="email">
                <label>Email</label>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="user-box">
                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password"
                    required autocomplete="new-password">
                <label>Password</label>

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>


            <div class="user-box">
                <input id="password-confirm" type="password" name="password_confirmation" required
                    autocomplete="new-password">
                <label>Confirm Password</label>
            </div>


            <div class="user-box">
                <div style="margin-left:30px " class="{{$errors->has('g-recaptcha-response')? 'has-error' : ''}}">
                    {!! NoCaptcha::display(['data-theme' => '']) !!}
                    {{-- {!! NoCaptcha::display() !!} --}}
                </div>
                @if ($errors->has('g-recaptcha-response'))
                <span class="help-block">
                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                </span>
            @endif
            </div>


            <button type="submit" class="login">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <i>SignUp</i>
            </button><br><br>


            @if (Route::has('login'))
                <a href="{{ route('login') }}" class="signup">Sign in</a>
            @endif


        </form>
        <a href="{{ route('main.page') }}" class="home">Home</a>
    </div>
</body>

</html>

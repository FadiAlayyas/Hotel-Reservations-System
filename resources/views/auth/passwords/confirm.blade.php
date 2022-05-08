<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />

    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('user/auth/style.css') }}">
    <link rel="icon" href="{{ asset('user/logo/logo.png') }}" type="image/png">
    <title>Confirm Password</title>
</head>

<body id="body">
    <div class="login-box">
        <h2>Confirm Password</h2>
        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="user-box">
                <input id="password" class="@error('password') is-invalid @enderror" type="password" name="password"
                    required autocomplete="current-password">
                <label>Password</label>

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="forget">Forget Your Password? </a><br>
            @endif
            <button type="submit" class="login reset">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <i>Confirm</i>
            </button>
        </form>
        <a href="{{ route('main.page') }}" class="home">Home</a>
    </div>
</body>

</html>

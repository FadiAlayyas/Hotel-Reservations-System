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
    <title>Verify Email</title>
</head>

<body id="body">
    <div class="login-box">
        <h2>Verify Your Email Address</h2>
        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif

        <form method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="emailver">
                {{ __('Click here to request another ...') }}
            </button>
        </form>

        <a href="{{ route('main.page') }}" class="home">Home</a>
    </div>
</body>

</html>

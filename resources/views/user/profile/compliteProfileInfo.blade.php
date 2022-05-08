<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('user/auth/style.css') }}">
    <link rel="icon" href="{{ asset('user/logo/logo.png') }}" type="image/png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
    <title>Complite Account Information</title>
</head>
<html>

<body>
    <div class="login-box">
        @php
                    $gender = ['Male', 'Female'];
                @endphp
        <h2>Complite Account Information</h2>
        <form method="POST" action="{{ route('user.store.account.info') }}" enctype="multipart/form-data">
            @csrf
            <div class="user-box">
                <input type="text" onfocus="(this.type='file' )" placeholder="Profile Photo" name="image">
            </div>
            <div class="user-box">
                <select name="gender">
                    <option value="Gender" disabled selected>Gender</option>
                    @foreach ($gender as $item)
                        <option value="{{ $item }}" style="font-size: 2ch">{{ $item }}</option>
                    @endforeach
                </select>
            </div>
            <div class="user-box">
                <input type="text"  name="province" required>
                <label>Province</label>
            </div>
            <div class="user-box">
                <input type="text"  name="Phone_number" required>
                <label>Phone Number</label>
            </div>

            <button type="submit" class="login reset">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <i>Save</i>
            </button>
        </form>
    </div>
</body>

</html>

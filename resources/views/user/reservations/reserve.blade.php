<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('user/reservation/revers_form.css') }}" />
    <title>Booking</title>
</head>


@php $full_name=[] @endphp
@php $age=[] @endphp

<div class="form_reverse">
    <div class="img_reverse">
        <p>Please enter the guests names and ages in addition to your name and age if you are one of the guests ...</p>
    </div>
    <div class="input_reverse">
        <form action="{{ route('user.room.reserve.store', $dates) }}" method="POST">
            @csrf
            <input class="phone" type="number" name="phone_number" placeholder="your phone number" required>

            @for ($i = 1; $i <= $room->person_count; $i++)
                <p>Person {{ $i }}:</p>
                <div class="both_input_reverse">
                    <input type="text" name="full_name[]" placeholder="Full Name">
                    <input type="number" name="age[]" placeholder="Age">
                </div>
            @endfor

            <input type="text" name="person_count" value="{{ $room->person_count }}" hidden>
            <input type="text" name="room_id" value="{{ $room->id }}" hidden>
            <div class="btn_reverse">
                <input type="submit" value="Save">
                {{-- <input type="submit" value="Cancel"> --}}
                <a  href="{{ URL::previous() }}" type="submit">Cancel</a>

            </div>
            <br><br>
        </form>
    </div>
</div>

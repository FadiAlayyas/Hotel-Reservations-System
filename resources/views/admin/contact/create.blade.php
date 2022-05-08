@extends('admin.layout')

@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('admin/contact/contact_create.css') }}" />

    </head>

    <div class="main__container">
        <!-- MAIN TITLE STARTS HERE -->

        <div class="main__title">
            <div class="main__greeting">
                <h1>Contact Create</h1>
            </div>
        </div>

        <!-- MAIN TITLE ENDS HERE -->
        <div class="profile_create">
            <form action="{{ route('admin.contact.store') }}" method="POST">
                @csrf

                @php
                    $types = ['email', 'phone'];
                @endphp


                <p>Hotel</p>
                <select class="select" name="hotel_id" id="hotel">

                    @foreach ($hotels as $hotel)
                        <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                    @endforeach

                </select>


                <p>Type</p>
                <select class="select" name="type" id="hotel">
                    @foreach ($types as $item)
                        <option value="{{ $item }}">{{ $item }}</option>
                    @endforeach
                </select>



                <p>Contact</p>
                <input type="text" name='contact' placeholder="contact" required>
                <button type="submit" class="btn-profile btn-blue">Create</button>

            </form>
        </div>
    </div>

    
@endsection

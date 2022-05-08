@extends('admin.layout')

@section('content')

    <head>
        <link rel="stylesheet" href="{{asset('admin/contact/contact_edit.css')}}" />

    </head>


    <div class="main__container">
        <!-- MAIN TITLE STARTS HERE -->

        <div class="main__title">
            <div class="main__greeting">
                <h1>Contact Edit</h1>
            </div>
        </div>

        <!-- MAIN TITLE ENDS HERE -->
        <div class="profile_edit">
            <form action="{{route('admin.contact.update',$contact->id)}}"  method="POST">
                @csrf
                @php
                $types=['email','phone'];
                @endphp

                <p>Hotel</p>
                <select  name="hotel_id" id="hotel">
                    @foreach ($hotels as $hotel)
                    <option value="{{$hotel->id}}" >{{$hotel->name}}</option>
                    @endforeach
                   </select>

                <p>Type</p>
                <select  name="type" >
                    @foreach ($types as $item)
                    <option value="{{$item}}" {{($contact->type==$item) ? 'selected' : ' '}}>{{$item}}</option>
                    @endforeach
                   </select>

                <p>Contact</p>
                <input type="text" class="form-control" name='contact' value="{{$contact->contact}}" placeholder="contact" required>
                <button class="btn-profile btn-blue" type="submit">Save</button>

            </form>
        </div>
    </div>







    @endsection


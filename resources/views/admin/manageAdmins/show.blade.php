@extends('admin.layout')

@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('admin/manageAdmins/admin_show.css') }}" />
    </head>

    <div class="all_info">
        <div class="card-container">
          <div class="one">
            <span class="pro">SHFRN</span>
            <img class="round" src="{{URL::asset($Admin->image)}}" alt="user" />
            <h3>{{$Admin->full_name}}</h3>
            <p>Your Presonal Infotmation <br /> </p>
            <div class="buttons">
              <button class="primary">
                {{$Admin->Role}}
              </button>
            </div>
            <hr>
            <div class="skills">
              <h6>My DATA</h6>
              <ul>
                <li><i class="fa fa-at"></i> :  {{$Admin->email}}</li>
                <br>
                <li><i class="fa fa-phone"></i> : {{$Admin->Phone_number}} </li>
                <li>SNN :  {{$Admin->SNN}} </li>
              </ul>
            </div>
          </div>
          <div class="two">
            <p>Gender:   {{$Admin->gender}}</p>
            <p>Date Birth:<br>
                   {{$Admin->age}}</p>
          </div>
        </div>
      </div>

@endsection


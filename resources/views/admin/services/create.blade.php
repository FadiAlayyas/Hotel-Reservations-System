@extends('admin.layout')

@section('content')

    <head>
        <link rel="stylesheet" href="{{asset('admin/services/services.css')}}" />
    </head>


        <div class="main__container">
            <!-- MAIN TITLE STARTS HERE -->
            <div class="main__title">
                <img src="assets/hello.svg" alt="" />
                <div class="main__greeting">
                    <p class="text-primary-p_services" style="font-size: larger">Add Service</p>
                </div>
            </div>

            <!-- MAIN TITLE ENDS HERE -->
            <div class="profile">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <p>Hotel</p>
                    <select  name="hotel_id">
                      @foreach ($Hotels as $Hotel)
                       <option value="{{$Hotel->id}}">{{$Hotel->name}}</option>
                      @endforeach
                    </select>

                    <p>Title</p>
                    <input type="text" name="type" >
                    <p>Photo</p>
                    <input type="file" name="image">
                    <p>Description</p>
                    <textarea cols="30" rows="10" name="description"></textarea>
                    <button type="submit" class="btn-profile btn-blue" aria-required="true">Create</button>
                </form>
            </div>
        </div>


    <script src="{{ asset('admin/services/services.js') }}"></script>

@endsection

@extends('admin.layout')

@section('content')

    <head>
        <link rel="stylesheet" href="{{asset('admin/services/service_edit.css')}}" />
    </head>

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




    <div class="main__container">
        <!-- MAIN TITLE STARTS HERE -->

        <div class="main__title">
            <img src="assets/hello.svg" alt="" />
            <div class="main__greeting">
                <h1>Edit Service</h1>
            </div>
        </div>

        <!-- MAIN TITLE ENDS HERE -->
        <div class="profile">
            <form action="{{ route('service.update',$service->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <p>Title</p>
                <input type="text" name="type" value="{{ $service->type }}" >
                <p>Photo</p>
                <input type="file" name="image" ><br>
                <img src="{{ URL::asset($service->image) }}" width="100px" height="100px"><br>
                <p>Description</p>
                <textarea cols="30" rows="10"  name="description" >{{ $service->description }}</textarea>
                <button class="btn-profile btn-blue" aria-required="true">Update</button>
            </form>
        </div>
    </div>




    <script src="{{ asset('admin/services/service_edit.js') }}"></script>
    @endsection

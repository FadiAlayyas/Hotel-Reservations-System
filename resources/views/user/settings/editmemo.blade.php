@extends('layouts.setting')
@section('settingcontent')

    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
            integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
        <link rel="stylesheet" href="{{ asset('user/profile/editPost.css') }}" />
        <title>Edit Post</title>
    </head>
    <div class="center">
        <h1>Edit Post Info</h1>
        <form action="{{ route('user.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="inputbox">
                <input class="inputt" type="text"  onfocus="(this.value='{{ $post->opinion }}')"
                    name="opinion" required>
                <span>Opinion</span>
            </div>
            <div class="inputbox">
                <input class="inputt" type="number" max="5" min="1"
                    onfocus="(this.value='{{ $post->rate }}')" name="rate" required>
                <span>Rate</span>
            </div>
            <div class="inputbox">
                <input class="inputt_file" type="text" onfocus="(this.type='file')" placeholder="Photo" name="image">
            </div>
            @if ($message = Session::get('success'))
                <div style="margin: 5px">{{ $message }}</div>
            @endif
            <div class="inputbox">
                <input type="submit" value="Save">
            </div>
        </form>
    </div>


@endsection

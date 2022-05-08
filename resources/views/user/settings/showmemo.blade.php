@extends('layouts.setting')
@section('settingcontent')

    <head>
        <link rel="stylesheet" href="{{ asset('user/profile/Check_cardsCSS.css') }}" />
        <title>Memories</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous" type="text/javascript"></script>

    </head>
    <!-- feed starts -->

    <div class="Our_container">
        @php
            $i = 0;
            $len = count($posts);
        @endphp

        <!-- *********** first post ***********-->

        @foreach ($posts as $item)

            <div @if ($len > 1)
                @if ($i == 0) id="first"
                    class="post active"

                @elseif ($i==$len-1)
                    id="last"
                    class="post Hidden"
                @else
                    class="post Hidden"
                @endif
            @elseif($len == 1)
                id='one'
                class="post active"
        @endif
        >
        <div class="post__top">
            @if ($item->verfied == 1)
                <img class="user__avatar post__avatar" src="{{ URL::asset('user/profile/images/postpublished.jpg') }}"
                    alt="wrong">

            @elseif($item->verfied == 0)
                <img class="user__avatar post__avatar" src="{{ URL::asset('user/profile/images/postbend.png') }}"
                    alt="wrong">

            @endif
            <div class="post__topInfo">
                @if ($item->verfied == 1)
                    <h3>Published</h3>
                @elseif($item->verfied == 0)
                    <h3>Post is still Pending</h3>
                @endif
                <p>{{ $item->created_at->diffForHumans() }}</p>
            </div>
        </div>

        <div class="post__Massage">
            <p>{{ $item->opinion }}</p>
        </div>

        <div class="post__image"><img src="{{ URL::asset($item->image) }}"></div>
        <hr>

        <div class="post__options">
            <div class="post__option">
                <form action="{{ route('user.post.destroy', $item->id) }}">
                    <button id="Delete" class="fas fa-trash"></button>
                </form>

            </div>
            @if ($item->verfied == 0)
                <div class="post__option">
                    <form action="{{ route('user.post.edit', $item->id) }}">
                        <button id="Edite" class="fa fa-edit"></button>
                    </form>

                </div>
            @endif
        </div>
    </div>

    @php
    $i++;
    @endphp


    @endforeach
    <!-- post ends -->
    <div class="Slid_icons">
        <i id="right" class="fa fa-chevron-right"></i><i id="left" class="fa fa-chevron-left"></i>
    </div>


    </div><!-- feed ends -->


    <script src="{{ asset('user/profile/Check_cardsJs.js') }}" type="text/javascript"></script>

@endsection

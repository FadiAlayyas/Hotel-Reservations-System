@extends('admin.layout')

@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('admin/post/admin_memory.css') }}" />
    </head>


    <div class="main__container">
        <!-- MAIN TITLE STARTS HERE -->

        <div class="main__title">

            <div class="main__greeting">
                <h1>Check Post</h1>
            </div>
        </div>
        <!-- feed starts -->
        <div class="feed">
            <!-- post starts -->
            @foreach ($posts as $item)
                <div class="post">
                    <div class="post__top">
                        <img class="user__avatar post__avatar" src="{{ asset('admin/post/image/man.jpg') }}" alt="" />
                        <div class="post__topInfo">
                            <h3>{{ $item->user->name }}</h3>
                            <p>{{ $item->created_at->diffForHumans() }}</p>
                        </div>
                    </div>

                    <div class="post__bottom">
                        <p>{{ $item->opinion }}</p>
                    </div>

                    <div class="post__image">
                        <img src="{{ URL::asset($item->image) }}" alt="{{ $item->image }} " />
                    </div>
                    <hr>
                    <div class="icon">
                        @if ($item->verfied==0)
                        <a href="{{ route('admin.post.edit', $item->id) }}"><i class="fas fa-check-circle "></i></a>
                        @elseif($item->verfied==1)
                        <a href="{{ route('admin.post.edit', $item->id) }}"><i class="fas fa-ban" style="color: black"></i></a>

                        @endif

                        <div style="margin-left: 15%">

                            <a href="{{ route('admin.post.destroy', $item->id) }}"><i class="fas fa-trash "></i></a>
                        </div>
                    </div>

                </div>
                <!-- post ends -->
            @endforeach
        </div>
        <!-- feed ends -->



    </div>

    <script src="{{ asset('admin/post/admin_memory.js') }}"></script>

@endsection

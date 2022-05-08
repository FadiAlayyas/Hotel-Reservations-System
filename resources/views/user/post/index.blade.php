@extends('layouts.app')
@section('content')


<head>
    <title>Memories</title>
    <link rel="stylesheet" href="{{ asset('user/memo/memo.css') }}" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
    <script src="{{ asset('user/memo/plugin.js') }}"></script>
</head>




{{-- create post --}}
<div class="memsP">


@if (Auth::user() != null)
    <div class="flex">
        <div class="messageSender">

            <form action="{{ route('user.post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="messageSender__top">
                    <input class="messageSender__input" name="opinion" placeholder="What's on your mind?" type="text" />
                </div>

                <div class="messageSender__bottom">

                    <div class="messageSender__option">
                        <i style="color: green;" class="fas fa-images"></i>
                        <input type="file" class="file" name="image">
                    </div>

                    <div class="messageSender__option">
                        <input type="number" min="1" max="5" name="rate"  value="5">
                        <h3>Evaluation</h3>
                    </div>

                    <button class="messageSender__option" type="submit">
                        <i style="color: red;" class="fas fa-save"></i>
                        <h3>Save</h3>
                    </button>

                </div>
            </form>
        </div>
    </div>
@endif
{{-- end create post --}}

<!-- feed starts -->
<div class="feed">
    @if ($posts->count() != 0)
        @foreach ($posts as $item)
            @php
                $Like_status = 'btn-secondary';
                $dislike_status = 'btn-secondary';
            @endphp
            <!-- post starts -->
            <div class="post">
                <div class="post__top">
                    <img class="user__avatar post__avatar"src="{{ URL::asset($item->user->profile->image) }}" alt="{{$item->user->profile->image}}" />
                    <div class="post__topInfo">
                        <h3>{{ $item->user->name }}</h3>
                        <p>{{ $item->created_at->diffForHumans() }}</p>
                    </div>
                </div>


                <div class="post__bottom">
                    <p class="card-text">{{ $item->opinion }}</p>
                </div>

                <div class="post__image">
                    <img src="{{ URL::asset($item->image) }}" alt="{{ $item->image }}">
                </div>
                @php
                    $like_count = 0;
                    $dislike_count = 0;
                @endphp
                @foreach ($item->likes as $like)
                    @php
                        if ($like->like == 1) {
                            $like_count++;
                        } else {
                            $dislike_count++;
                        }
                        if ($like->like == 1 && $like->user_id == Auth::id()) {
                            $Like_status = 'btn-success';
                        }
                        if ($like->like == 0 && $like->user_id == Auth::id()) {
                            $dislike_status = 'btn-danger';
                        }
                    @endphp

                @endforeach

                <div class="post__options">
                    <div class="post__option">
                        <i data_like="{{ $Like_status }}" data_post_id="{{ $item->id }}_l" id="like"
                            class="btn {{ $Like_status }} like">
                            <span class="fas fa-thumbs-up"></span><b>
                                <span class="like_count">{{ $like_count }}</span></b></i>
                    </div>
                    <div class="post__option">
                        <i data_dislike="{{ $dislike_status }}" data_post_id="{{ $item->id }}_d" id="dislike"
                            class="btn {{ $dislike_status }} dislike">
                            <span class="fas fa-thumbs-down"></span><b>
                                <span class="dislike_count">{{ $dislike_count }}</span></b>
                        </i>
                    </div>
                </div>
            </div>
            <!-- post ends -->
        @endforeach

        <script>
            var url = "{{ route('like') }}";
            var urll = "{{ route('dislike') }}";
        </script>

        <script src="{{ asset('user/likeDislike/like.js') }}"></script>

    @else
        <!-- message starts -->
        <div class="post">
            <div class="emptymessage">
                <p>Users haven't shared any moments yet.<br>
                    Always stay informed.<i class="far fa-laugh-beam"></i></p>
            </div>

        </div>
        <!-- message ends -->
    @endif

    <!-- feed ends -->

</div>
<!-- main body ends -->
</div>
@endsection

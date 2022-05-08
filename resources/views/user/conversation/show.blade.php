@extends('layouts.setting')
@section('settingcontent')

    <head>
        <link rel="stylesheet" href="{{ asset('user/conversation/conversation.css') }}" />
        <title>Contact Us</title>
    </head>

    <div class="con">
        <div id="head">
            <div id="image">
                <img src="{{ asset('user/logo/admin.jfif') }}">
            </div>
            <div id="inf">
                <h3>Support</h3>
                <p>Reply soon</p>
            </div>
        </div>
        <div id="body">

            @foreach ($messages as $item)
                @if ($item->owner_type == 'admin')
                    <div class="user2">{{ $item->content }}</div>
                @else
                    <form action="{{ route('user.message.destroy', $item->id) }}">
                        <div id="{{ $item->id }}" onclick="delet(this.id)" class="user1">{{ $item->content }}
                            <button id="d{{ $item->id }}" class="fas fa-trash delete"></button>
                        </div>
                    </form>
                @endif

            @endforeach
        </div>

        <div id="btm">
            <form action="{{ route('user.message.store') }}" method="POST">
                @csrf
                <input type="hidden" name='conversation_id' value="{{ $conversation_id }}">

                <input type="text" id="text" name="content" placeholder="Enter your Message..." autocomplete="off">
                <button><i class="fas fa-send"></i></button>
            </form>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="{{ asset('user/conversation/conversation.js') }}"></script>

@endsection

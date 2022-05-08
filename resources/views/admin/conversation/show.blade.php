@extends('admin.layout')

@section('content')


    <head>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
            integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"
            type="text/css">
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous" type="text/javascript">
        </script>
        <link rel="stylesheet" href="{{ asset('admin/conversation/styles.css') }}" type="text/css">

        <script src="{{ asset('admin/conversation/jquery-3.5.1.min.js') }}" type="text/javascript">
        </script>

    </head>

    <div class="main__container">
        <!-- MAIN TITLE STARTS HERE -->

        <div id="container">
            {{-- left --}}
            <div class="left">
                <aside>
                    <ul>
                        @foreach ($conversations as $item)

                            <li>
                                @if ($item->user->profile == null)
                                    <img src="{{ URL::asset('upload/profile/nophoto.png') }}" alt="">
                                @else
                                    <img src="{{ URL::asset($item->user->profile->image) }}" alt="">

                                @endif
                                <div>
                                    <h2>{{ $item->user->name }}
                                        @php
                                        $messageCount = 0;
                                    @endphp
                                    @if ($item->message != null)
                                        @foreach ($item->message as $item2)
                                            @if ($item2->readCheck == 0 && $item2->owner_type=='user')
                                                @php
                                                    $messageCount++;
                                                @endphp
                                            @endif
                                        @endforeach
                                    @endif
                                    @if($messageCount!=0)
                                    <div class="messagCount">
                                        {{$messageCount}}
                                    </div>
                                    @endif

                                        <br>
                                        <a href="{{ route('admin.conversation.show', $item->id) }}"
                                            style="font-size: 11px;   color: rgb(173, 222, 255)">open chat</a>
                                        <form action="{{ route('admin.conversation.destroy', $item->id) }}">
                                            <button class="fas fa-trash"></button>
                                        </form>
                                    </h2>

                                </div>
                            </li>
                        @endforeach

                    </ul> <i id="Send" class="fas fa-plus"></i>
                </aside>
            </div>
            {{-- end left --}}


            <div class="right">
                <header>

                    @if ($conversation->user->profile == null)
                        <img class="starr" src="{{ URL::asset('upload/profile/nophoto.png') }}" alt="">
                    @else
                        <img class="starr" src="{{ URL::asset($conversation->user->profile->image) }}" alt="">

                    @endif
                    <div>
                        <h2>{{ $conversation->user->name }}</h2>

                        <h3>{{ $conversation->user->email }}</h3>
                    </div>

                </header>

                <ul id="chat">
                    @foreach ($messages as $item)

                        @if ($item->owner_type == 'admin')
                            <li class="you">
                                <form action="{{ route('admin.message.destroy', $item->id) }}">
                                    <div id="{{ $item->id }}" onclick="delet(this.id)" class="message">
                                        {{ $item->content }}
                                        <button id="d{{ $item->id }}" class="fas fa-trash delete"></button>
                                    </div>
                                </form>
                            </li>
                        @elseif($item->owner_type == 'user')
                            <li class="me">
                                <div class="message">
                                    {{ $item->content }}
                                </div>
                            </li>
                        @endif

                    @endforeach
                </ul>
                <footer>
                    <form action="{{ route('admin.message.store') }}" method="POST">
                        @csrf

                        <input type="text" placeholder="Type your message" name='content'>
                        <input type="hidden" name='conversation_id' value="{{ $id }}">

                        <button type="submit">Send</button>
                    </form>
                </footer>

            </div>




            <div id="hiddin" class="select">
                <i id="cross" class="fas fa-times"></i>
                <div class="elements">
                    <form action="{{ route('admin.message.storeNewChat') }}" method="POST">
                        @csrf

                        <p>Selsect Users :</p>
                        <select name="reciver_id">
                            <option value="all">all</option>
                            @foreach ($users as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <br>
                        <textarea placeholder="Type your message ..." name='content'></textarea>
                        <br>
                        <button type="submit">send</button>

                    </form>
                </div>
            </div>

        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/apexcharts" type="text/javascript">
    </script>
    <script src="{{ asset('admin/conversation/script.js') }}" type="text/javascript">
    </script>

@endsection

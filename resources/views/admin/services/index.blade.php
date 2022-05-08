@extends('admin.layout')

@section('content')


    <head>
        <link rel="stylesheet" href="{{ asset('admin/services/service_list.css') }}" />
        <title>Services List</title>
    </head>
    <div class="container_services">

        <div class="main__container_services">
            <!-- MAIN TITLE STARTS HERE -->

            <div class="main__title_services">
                <div class="main__greeting_services">
                    <p class="text-primary-p_services" style="font-size: larger">Services List</p>

                </div>
            </div>


            <div class="all_card_services">

                <!--single service-->
                @foreach ($services as $key => $value)


                    <div class="card_services">
                        <div class="top_services">
                            <img src="{{ URL::asset($value->image) }}">
                        </div>
                        <div class="bottom_services">
                            <h3>{{ $value->type }}</h3>
                            <p>{{ \Str::limit($value->description, 80) }}</p>
                            <div class="icon_services">


                                <form action="{{ route('service.destroy', $value->id) }}" method="POST">

                                    <a href="{{ route('service.edit', $value->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-service"><i class="fas fa-trash"></i></button>
                                </form>

                            </div>
                        </div>
                    </div>
                @endforeach
                <!--end single service-->
            </div>

        </div>


    </div>
    <script src="{{ asset('admin/services/service_list.js') }}"></script>

@endsection

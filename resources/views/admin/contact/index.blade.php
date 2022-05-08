@extends('admin.layout')

@section('content')

    <head>
        <link rel="stylesheet" href="{{asset('admin/contact/contact_show.css')}}" />

    </head>



    <div class="main__container">
        <!-- MAIN TITLE STARTS HERE -->

        <div class="main__title">
            <div class="main__greeting">
                <h1>Contact List</h1>
            </div>
        </div>
        <div class="profile_contact">
            <table class="table">
                <thead>
                    <th>id</th>
                    <th>Type</th>
                    <th>contact</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach ($contacts as $item)
                    <tr>
                        <td data-label="id">{{$item->id}}</td>
                        <td data-label="Type">{{$item->type}}</td>
                        <td data-label="contact">{{$item->contact}}</td>
                        <td data-label="Actions">
                            <a href="{{route('admin.contact.edit',$item->id)}}" > <i class="fas fa-pencil-alt "></i></a>
                            <a href="{{route('admin.contact.destroy',$item->id)}}" ><i class="fas fa-trash "></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <script src="{{ asset('admin/contact/contact_show.js') }}"></script>

    @endsection


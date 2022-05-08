@extends('layouts.app')
@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Sent Messages</h1>
            <a href="{{route('admin.message.inbox')}}" class='btn btn-success' style="float: right">go back</a>
            <a href="{{route('admin.message.create')}}" class='btn btn-success' style="float: right">send message</a>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">to</th>
                    <th scope="col">time</th>
                    <th scope="col">action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->reciver}}</td>
                        <td>{{$item->created_at->diffForHumans()}}</td>
                        <td>
                            <a href="{{route('admin.message.show',$item->id)}}" class='btn btn-success'">Show message</a>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>



@endsection

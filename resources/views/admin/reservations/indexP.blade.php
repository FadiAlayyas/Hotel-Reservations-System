@extends('admin.layout')

@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('admin/reservations/details.css') }}" />
    </head>


    <div class="main__container">

        <div class="table_list">
            <table class="table">
                <thead>
                    <th>Booking Num</th>
                    <th>Booking Date</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>

                    <th>Booking</th>
                    <th>Room</th>
                    <th>Accept</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    @foreach ($reservations as $item)
                    <tr>
                        <td data-label="Booking Num" class="color">{{$item->id}}</td>
                        <td data-label="Booking Date" class="color">{{$item->created_at->diffForHumans()}}</td>
                        <td data-label="Start Date" class="color">{{$item->reservation_date}}</td>
                        <td data-label="End Date" class="color">{{$item->reservation_exDate}}</td>

                        @if ($item->reservation_status == 1)
                        <td data-label="Status"><button class="active_btn"><i class="fas fa-circle"></i> Active</td>
                        @else
                        <td data-label="Status"><button class="waiting_btn"><i class="fas fa-circle"></i> Waiting</td>
                         @endif




                        <td data-label="Details"><a  href="{{route('admin.reservation.show',$item->id)}}" class="details_btn">Details</a></td>
                        <td data-label="Details"><a  href="{{route('rooms.show',$item->room_id)}}" class="details_btn">Details</a></td>

                        @if ($item->reservation_status == 0)
                        <td data-label="Accept"><a href="{{route('admin.reservation.edit',$item->id)}}" class="tr_btn"><i class="fa fa-ban"></i></a></td>
                        @else
                        <td data-label="Accept"><a href="{{route('admin.reservation.edit',$item->id)}}" class="tr_btn"><i class="fas fa-check-circle"></i></a></td>
                        @endif
                        <td data-label="Delete"><a href="{{route('admin.reservation.destroy',$item->id)}}" class="tr_btn"><i class="fas fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



    <script src="{{ asset('admin/reservations/details.js') }}"></script>

    @endsection

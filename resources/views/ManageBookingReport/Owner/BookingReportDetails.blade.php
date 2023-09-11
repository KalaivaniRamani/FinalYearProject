<!-- to be called inside the master.blade.php -->
@extends('layouts.ownerDashboardStyle')

<head>
    <title>Booking Report | HRMS</title>
</head>

@section('content')
<div class="container">
  <div class="col-lg-12">
        <div class="table">
            <div class="table_header">
                <b><p>House Booking </p></b>
                <div>
                
                </div>
            </div>
            <div class="table_section" class="table-wrapper-scroll-y custom-scrollbar">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Student Name</th>
                            <th>Student Email</th>
                            <th>House Owner</th>
                            <th>Rental House </th>
                            <th>Booking Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach($bookings as $booking)
                        @if($booking->owner_id == Auth::id())
                    <tbody>
                        <tr>
                            <td>{{$booking->id}}</td>
                            <td>{{$booking->name}}</td>
                            <td>{{$booking->email}}</td>
                            <td>{{$booking->owner_name}}</td>
                            <td>{{$booking->location}}</td>
                            <td>{{$booking->booking_date}}</td>
                            <td>
                            <a class="mailbutton" href="{{url('emailview',$booking->id)}}">Send Mail</a>
                            <!-- <a class="btn btn-primary" href="/messagehome">Chat</a> -->
                            </td>
                        </tr>
                    </tbody>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

@endsection('content')




<!-- to be called inside the master.blade.php -->
@extends('layouts.studentDashboardStyle')

<head>
    <title>Student Details | HRMS</title>
</head>

@section('content')

<div class="container">
  <div class="col-lg-12">
        <div class="table">
            <div class="table_header">
                <b><p>House Booking </p></b>
                <!-- <div>
                    <button  class="add_new" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    + Add Details
                    </button>
                </div> -->
            </div>
            <div class="table_section" class="table-wrapper-scroll-y custom-scrollbar">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Student Name</th>
                            <th>Student Email</th>
                            <th>House Owner</th>
                            <th>Rental House Address</th>
                            <th>Booking Date</th>
                            <th>Action</th>
                            <!-- <th>Approval</th> -->
                        </tr>
                    </thead>
                    @foreach($bookings as $booking)
                        @if($booking->user_id == Auth::id())
                    <tbody>
                        <tr>
                            <td>{{$booking->id}}</td>
                            <td>{{$booking->name}}</td>
                            <td>{{$booking->email}}</td>
                            <td>{{$booking->owner_name}}</td>
                            <td>{{$booking->location}}</td>
                            <td>{{$booking->booking_date}}</td>
                            <td>
                            <a class="btn btn-danger" href="{{url('cancelled',$booking->id)}}">Cancel Booking</a>
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




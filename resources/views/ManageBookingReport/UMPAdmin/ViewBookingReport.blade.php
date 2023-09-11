<!-- to be called inside the master.blade.php -->
@extends('layouts.adminDashboardStyle')

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
                    <form action="/date" method="GET" >
                        <div class="row">
                            <div class="col-md-6">
                                <!-- <label style="color:white;margin-left:5px;" >Filter by Date</label> -->
                                <input type="date" name="date" value="{{ Request::get('date')?? date('Y-m-d') }}" class="form-control"/>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success">Filter</button>
                            </div>
                        </div>
                    </form>
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
                            <th>Rental House</th>
                            <th>Booking Date</th>
                        </tr>
                    </thead>
                    @foreach($bookings as $booking)
                    <tbody>
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$booking->name}}</td>
                            <td>{{$booking->email}}</td>
                            <td>{{$booking->owner_name}}</td>
                            <td>{{$booking->location}}</td>
                            <td>{{$booking->booking_date}}</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
        <a style="color: black;">Total Number of Student's Booking: {{count($bookings)}}</a>
        <div style="margin-left:50%">
            <a class="btn btn-danger" href="{{ url('/generatePDF/generate') }}"> Download Report</a>
            <a class="btn btn-success" href="{{ url('/generatePDF') }}" target="_blank"> View Report</a>
        </div>
    </div>
</div>
        
@endsection('content')




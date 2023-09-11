@extends('layouts.studentDashboardStyle')

<head>
    <title>Edit Booking Details</title>  
</head>

@section('content')

<head>  
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="/dashboard/css/style.default.css" id="theme-stylesheet">
</head>

@if(session('success'))
<div class="alert alert-primary" role="alert">
     {{session('success')}}
</div>
@endif

<section class="pt-0"> 
     <div class="container-fluid">
          <div class="row gy-4">
          <!-- Form Elements -->
          <div class="col-lg-12">
               <div class="card">
                    <div class="card-header">
                         <h3 class="h4 mb-0">Edit Booking Details</h3>
                    </div>
                    <div class="card-body pt-0">
                         <form class="form-horizontal" action="/bookingdata/{{$bookings->id}}/update" method="POST">
                         {{csrf_field()}}
                              <div class="row">
                              <label class="col-sm-3 form-label">Student Name</label>
                              <div class="col-sm-9">
                                   <input name="name" class="form-control" type="text" value="{{$bookings->name}}">
                              </div>
                              </div>

                              <div class="my-4"></div>
                              <div class="row">
                              <label class="col-sm-3 form-label">Student Email</label>
                              <div class="col-sm-9">
                                   <input name="email" class="form-control" type="text" value="{{$bookings->email}}">
                              </div>
                              </div>

                              <div class="my-4"></div>
                              <div class="row">
                              <label class="col-sm-3 form-label">Owner Name</label>
                              <div class="col-sm-9">
                                   <select class="form-select" name="owner_name">
                                   <option value="{{$bookings->owner_name}}">{{$bookings->owner_name}}</option>
                                        @foreach ($owner as $detail)
                                             <option value="{{$detail->name}}">{{$detail->name}}</option>
                                        @endforeach
                                   </select>
                              </div>
                              </div>

                              <div class="my-4"></div>
                              <div class="row">
                              <label class="col-sm-3 form-label">Address</label>
                              <div class="col-sm-9">
                                   <input name="location" class="form-control" type="text" value="{{$bookings->location}}">
                              </div>
                              </div>

                              <div class="my-4"></div>
                              <div class="row">
                              <label class="col-sm-3 form-label">Booking Date</label>
                              <div class="col-sm-9">
                                   <input name="booking_date" class="form-control" type="date"  value="{{$bookings->booking_date}}">
                              </div>
                              </div>

                              <div class="my-4"></div>
                              <div class="row">
                              <div class="col-sm-9 ms-auto">
                                   <button class="btn btn-primary"  type="submit" >Save changes</button>
                              </div>
                              </div>
                         </form>
                    </div>
               </div>
          </div>
     </div>
</section>

@endsection
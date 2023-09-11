@extends('layouts.studentDashboardStyle')

<head>
    <style>
        .imgstyle {
            border: 4px solid black;
            width: 150px;
            padding: 5px;
            height:400px; 
            width:450px;
            border-radius: 8px;
        }
    </style>
</head>

@section('content')

@if(session('success'))
<div class="alert alert-primary" role="alert">
     {{session('success')}}
</div>
@endif

<section>
    <div class="card shadow" style="padding: 15px 16px; width: 100%;">
        {{csrf_field()}} 
         <!-- card left -->
        <div class = "product-imgs">
            <div class = "img-display">
                <div class = "img-showcase">
                    <img src="/house_picture/{{ $house->house_picture }}" alt="House Image" class="imgstyle" >
                </div>
            </div>
        </div>
        <!-- card right -->
        <div class = "product-content">
          <h2 class = "product-title">Owner <span style="color:black">: {{$house->owner_name}}</span></h2>
          <hr>
          <div class="rounded d-flex align-items-center justify-content-between p-4" style="background-color:#fff; border-style: solid; border-width: #004d00 7px;">
                <div class="ms-3">
                <p style="color:black;font-size:23px; margin-bottom:34px">Booking Details</p>
                    <form action="{{ url('/add-booking')}}" method="POST">
                    @csrf
                        <input type="hidden" name="house_id" value="{{$house->id}}">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1"  style="color:black">Booking Date : </label>
                            <input name="booking_date" type="date" id="exampleFormControlInput1" placeholder="Input Date" required="">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Confirm Booking</button>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

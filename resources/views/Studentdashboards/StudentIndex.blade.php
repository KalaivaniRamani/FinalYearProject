@extends('layouts.studentDashboardStyle')

@section('content')

<div class="bg-2 py-4">
    <div class="container-fluid">
    <h2 style="font-style:italic; font-weight:70%; color:black">Welcome to UMP-HRMS</h2>
    </div>
</div>

<div class="col-sm-6 col-xl-3">
    <div class=" rounded d-flex align-items-center justify-content-between p-4" style="background-color:red; color:white;">
        <i class="fa fa-user fa-3x" style="color:white;"></i>
        <div class="ms-3">
            <p class="mb-3">Students</p>
            <h6 class="mb-0">{{$students}}</h6>
        </div>
    </div>
</div>
<div class="col-sm-6 col-xl-3">
    <div class="rounded d-flex align-items-center justify-content-between p-4" style="background-color:blue; color:white;">
        <i class="fa fa-home fa-3x" style="color:white;"></i>
        <div class="ms-3">
            <p class="mb-3">Rental Houses</p>
            <h6 class="mb-0">{{$rental_houses}}</h6>
        </div>
    </div>
</div>
<div class="col-sm-6 col-xl-3">
    <div class="rounded d-flex align-items-center justify-content-between p-4" style="background-color:#e68a00; color:white;">
        <i class="fa fa-times fa-3x" style="color:white;"></i>
        <div class="ms-3">
            <p class="mb-3">Bookings</p>
            <h6 class="mb-0">{{$student_booking}}</h6>
        </div>
    </div>
</div>

<section>
    <div class="row gy-4">
        <div class="col-sm-6 col-xl-4">
            <div class=" rounded d-flex align-items-center justify-content-between p-4" style="background-color:#fff;">
                <!-- <i class="fa fa-user fa-3x" style="color:white;"></i> -->
                <div class="ms-3">
                    <p class="mb-3">Rental Houses</p>
                    <img src="/dashboard/img/profile.png" alt="" class="img-fluid" style="height:200px; width:200px;">
                    <h6 class="mb-0">*This page is to view all the rental houses along with their details.</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="rounded d-flex align-items-center justify-content-between p-4" style="background-color:#fff;">
                <div class="ms-3">
                <p class="mb-3">Book Rental House</p>
                    <img src="/dashboard/img/house.png" alt="" class="img-fluid" style="height:200px; width:200px;">
                    <h6 class="mb-0">*This page is for booking our preferred rental house.</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="rounded d-flex align-items-center justify-content-between p-4" style="background-color:#fff;">
                <div class="ms-3">
                <p class="mb-3">Chat / Report</p>
                    <img src="/dashboard/img/chat.png" alt="" class="img-fluid" style="height:200px; width:200px;">
                    <h6 class="mb-0">*Students can chat with the admin if they have any problems with the owners.</h6>
                </div>
            </div>
        </div>
    </div>
</section>
         

@endsection('content')
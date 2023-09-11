@extends('layouts.adminDashboardStyle')

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
            <p class="mb-3">House Owners</p>
            <h6 class="mb-0">{{$owners}}</h6>
        </div>
    </div>
</div>
<div class="col-sm-6 col-xl-3">
    <div class="rounded d-flex align-items-center justify-content-between p-4" style="background-color:blue; color:white;">
        <i class="fa fa-home fa-3x" style="color:white;"></i>
        <div class="ms-3">
            <p class="mb-3">Student's Booking</p>
            <h6 class="mb-0">{{$student_booking}}</h6>
        </div>
    </div>
</div>
<div class="col-sm-6 col-xl-3">
    <div class="rounded d-flex align-items-center justify-content-between p-4" style="background-color:#e68a00; color:white;">
        <i class="fa fa-times fa-3x" style="color:white;"></i>
        <div class="ms-3">
            <p class="mb-3">Students</p>
            <h6 class="mb-0">{{$students}}</h6>
        </div>
    </div>
</div>
<div class="col-sm-6 col-xl-3">
    <div class="rounded d-flex align-items-center justify-content-between p-4" style="background-color:#990099; color:white;">
        <i class="fa fa-home fa-3x" style="color:white;"></i>
        <div class="ms-3">
            <p class="mb-3">New House Owners</p>
            <h6 class="mb-0">{{$owner_progress}}</h6>
        </div>
    </div>
</div>        

<section>
    <div class="row gy-4">
        <div class="col-sm-6 col-xl-4">
            <div class=" rounded d-flex align-items-center justify-content-between p-4" style="background-color:#fff;">
                <!-- <i class="fa fa-user fa-3x" style="color:white;"></i> -->
                <div class="ms-3">
                    <p class="mb-3">Owner Profile</p>
                    <img src="/dashboard/img/profile.png" alt="" class="img-fluid" style="height:200px; width:200px;">
                    <h6 class="mb-0">*Admin can view the owner details along with their approval status.</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="rounded d-flex align-items-center justify-content-between p-4" style="background-color:#fff;">
                <div class="ms-3">
                <p class="mb-3">House Info</p>
                    <img src="/dashboard/img/house.png" alt="" class="img-fluid" style="height:200px; width:200px;">
                    <h6 class="mb-0">*Admin can view the updated house details.</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="rounded d-flex align-items-center justify-content-between p-4" style="background-color:#fff;">
                <div class="ms-3">
                <p class="mb-3">User Role</p>
                    <img src="/dashboard/img/user.png" alt="" class="img-fluid" style="height:200px; width:200px;">
                    <h6 class="mb-0">*Admin can view the student's details along with their roles.</h6>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="row gy-4">
        <div class="col-sm-6 col-xl-4">
            <div class=" rounded d-flex align-items-center justify-content-between p-4" style="background-color:#fff;">
                <!-- <i class="fa fa-user fa-3x" style="color:white;"></i> -->
                <div class="ms-3">
                    <p class="mb-3">Booking Report</p>
                    <img src="/dashboard/img/report.png" alt="" class="img-fluid" style="height:200px; width:200px;">
                    <h6 class="mb-0">*Admin can access this page to view details about the house booking details.</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="rounded d-flex align-items-center justify-content-between p-4" style="background-color:#fff;">
                <div class="ms-3">
                <p class="mb-3">Chat / Report</p>
                    <img src="/dashboard/img/chat.png" alt="" class="img-fluid" style="height:200px; width:200px;">
                    <h6 class="mb-0">*Admin can chat with the students to figure solution for their problems.</h6>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection('content')
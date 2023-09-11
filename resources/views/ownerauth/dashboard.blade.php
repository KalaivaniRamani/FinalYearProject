@extends('layouts.ownerDashboardStyle')

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
            <h6 class="mb-0">{{$house_owner}}</h6>
        </div>
    </div>
</div>
<div class="col-sm-6 col-xl-3">
    <div class="rounded d-flex align-items-center justify-content-between p-4" style="background-color:blue; color:white;">
        <i class="fa fa-home fa-3x" style="color:white;"></i>
        <div class="ms-3">
            <p class="mb-3">Bookings</p>
            <h6 class="mb-0">{{$house_booking}}</h6>
        </div>
    </div>
</div>
<div class="col-sm-6 col-xl-3">
    <div class="rounded d-flex align-items-center justify-content-between p-4" style="background-color:#e68a00; color:white;">
        <i class="fa fa-times fa-3x" style="color:white;"></i>
        <div class="ms-3">
            <p class="mb-3">Rejected</p>
            <h6 class="mb-0">{{$reject}}</h6>
        </div>
    </div>
</div>
<div class="col-sm-6 col-xl-3">
    <div class="rounded d-flex align-items-center justify-content-between p-4" style="background-color:#006622; color:white;">
        <i class="fa fa-check fa-3x" style="color:white;"></i>
        <div class="ms-3">
            <p class="mb-3">Approved</p>
            <h6 class="mb-0">{{$approve}}</h6>
        </div>
    </div>
</div>

<section>
    <div class="row gy-4">
        <div class="col-sm-6 col-xl-4">
            <div class=" rounded d-flex align-items-center justify-content-between p-4" style="background-color:#fff;">
                <!-- <i class="fa fa-user fa-3x" style="color:white;"></i> -->
                <div class="ms-3">
                    <p class="mb-3">Approval Status</p>
                    <img src="/dashboard/img/approve.png" alt="" class="img-fluid" style="height:200px; width:200px;">
                    <h6 class="mb-0">*Owners can view to check whether their details have been approved by the admin.</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="rounded d-flex align-items-center justify-content-between p-4" style="background-color:#fff;">
                <div class="ms-3">
                <p class="mb-3">House Details</p>
                    <img src="/dashboard/img/house.png" alt="" class="img-fluid" style="height:200px; width:200px;">
                    <h6 class="mb-0">A house owner can add details about his or her rental house to the system.</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="rounded d-flex align-items-center justify-content-between p-4" style="background-color:#fff;">
                <div class="ms-3">
                <p class="mb-3">Booking Report</p>
                    <img src="/dashboard/img/report.png" alt="" class="img-fluid" style="height:200px; width:200px;">
                    <h6 class="mb-0">*Owners can see who has booked their houses.</h6>
                </div>
            </div>
        </div>
    </div>
</section>
         

@endsection('content')
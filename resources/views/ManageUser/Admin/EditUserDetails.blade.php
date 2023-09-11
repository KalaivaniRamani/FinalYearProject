@extends('layouts.adminDashboardStyle')

<head>
    <title>Edit Details</title>  
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
                         <h3 class="h4 mb-0">Edit User Details</h3>
                         <hr>
                    </div>
                    <div class="card-body pt-0">
                         <form class="form-horizontal" action="/userdata/{{$data_user->id}}/update" method="POST">
                         {{csrf_field()}}
                              <div class="row">
                              <label class="col-sm-3 form-label">User Name</label>
                              <div class="col-sm-9">
                                   <input name="name" class="form-control" type="text"  value="{{$data_user->name}}">
                              </div>
                              </div>

                              <div class="my-4"></div>
                              <div class="row">
                              <label class="col-sm-3 form-label">Student ID</label>
                              <div class="col-sm-9">
                                   <input name="studentId" class="form-control" type="text" value="{{$data_user->studentId}}">
                              </div>
                              </div>

                              <div class="my-4"></div>
                              <div class="row">
                              <label class="col-sm-3 form-label">User Email</label>
                              <div class="col-sm-9">
                                   <input name="email" class="form-control" type="text" value="{{$data_user->email}}">
                              </div>
                              </div>

                              <div class="my-4"></div>
                              <div class="row">
                              <label class="col-sm-3 form-label">User Role</label>
                              <div class="col-sm-9">
                                   <select class="form-select mb-3" name="role">
                                   <option>{{$data_user->role}}</option>
                                   <option value="1">Admin</option>
                                   <option value="2">Student</option>
                                   </select>
                              </div>
                              </div>

                              <div class="my-4"></div>
                              <div class="row">
                              <label class="col-sm-3 form-label">Contact Number</label>
                              <div class="col-sm-9">
                                   <input name="contactNo" class="form-control" type="text" value="{{$data_user->contactNo}}">
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
@extends('layouts.studentDashboardStyle')

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
                         <h3 class="h4 mb-0">Edit Student Details</h3>
                         <hr>
                    </div>
                    <div class="card-body pt-0">
                         <form class="form-horizontal" action="/studentdata/{{$data_student->id}}/update" method="POST">
                         {{csrf_field()}}
                              <div class="row">
                              <label class="col-sm-3 form-label">Student Name</label>
                              <div class="col-sm-9">
                                   <input name="std_name" class="form-control" type="text" value="{{$data_student->std_name}}">
                              </div>
                              </div>
                              
                              <div class="my-4"></div>
                              <div class="row">
                              <label class="col-sm-3 form-label">Matric No</label>
                              <div class="col-sm-9">
                                   <input  name="matric_no" class="form-control" type="text" value="{{$data_student->matric_no}}">
                              </div>
                              </div>

                              <div class="my-4"></div>
                              <div class="row">
                              <label class="col-sm-3 form-label">Student Email</label>
                              <div class="col-sm-9">
                                   <input name="email" class="form-control" type="text" value="{{$data_student->email}}">
                              </div>
                              </div>

                              <div class="my-4"></div>
                              <div class="row">
                              <label class="col-sm-3 form-label">Student Contact No</label>
                              <div class="col-sm-9">
                                   <input name="std_contactNo" class="form-control" type="text" value="{{$data_student->std_contactNo}}">
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
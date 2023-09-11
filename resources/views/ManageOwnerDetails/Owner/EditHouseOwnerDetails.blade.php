@extends('layouts.ownerDashboardStyle')

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
                         <h3 class="h4 mb-0">Edit Rental House Details</h3>
                         <hr>
                    </div>
                    <div class="card-body pt-0">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                         <form class="form-horizontal" action="{{ route('owners.update',$owner->id) }}" method="POST" enctype="multipart/form-data">
                           @csrf
                           @method('PUT')
                              <div class="row">
                              <label class="col-sm-3 form-label">Name</label>
                              <div class="col-sm-9">
                                   <input name="owner_name" class="form-control" type="text" value="{{$owner->owner_name}}">
                              </div>
                              </div>

                              <div class="my-4"></div>
                              <div class="row">
                              <label class="col-sm-3 form-label">Email</label>
                              <div class="col-sm-9">
                                   <input name="owner_email" class="form-control" type="text" value="{{$owner->owner_email}}">
                              </div>
                              </div>

                              <div class="my-4"></div>
                              <div class="row">
                              <label class="col-sm-3 form-label">Contact Number</label>
                              <div class="col-sm-9">
                                   <input name="contact_no" class="form-control" type="text" value="{{$owner->contact_no}}">
                              </div>
                              </div>

                              <div class="my-4"></div>
                              <div class="row">
                              <label class="col-sm-3 form-label">Image</label>
                              <div class="col-sm-9">
                                   <input name="owner_picture" class="form-control" type="file" ><br>
                                   <img src="/images/ownerimages/{{ $owner->owner_picture }}" style="max-height: 100px; max-width: 100px;">
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






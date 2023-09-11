@extends('layouts.ownerDashboardStyle')

<head>
    <title>Edit RentalDetails</title>  
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

          <div class="col-lg-3">
               <div class="card">
                    <div class="card-header" style="background-color: #cca300;">
                         <h3 class="h4 mb-0" style="color: white;">Pictures</h3>
                    </div>
                    <div class="card-body pt-0">
                         <form class="form-horizontal" action="/update/{{ $houses->id }}" method="post" enctype="multipart/form-data">
                         @csrf
                         @method("put")
                         <!-- <div class="row">
                              <p>Main Pictures</p>
                              <div class="col-sm-9">
                                    <form action="/deletehouse_picture/{{ $houses->id }}" method="post">
                                        <button class="btn text-danger">X</button>
                                        @csrf
                                        @method('delete')
                                    </form>
                                    <img src="/house_picture/{{ $houses->house_picture }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                                    <br>
                              </div>
                              </div> -->

                              <div class="row">
                                @if (count($houses->images)>0)
                                <p style="color:white;">House Interior Pictures</p>
                                <div class="col-sm-9">
                                @foreach ($houses->images as $img)
                                    <form action="/deleteimage/{{ $img->id }}" method="post">
                                        <button class="btn text-danger">X</button>
                                        @csrf
                                        @method('delete')
                                    </form>
                                    <img src="/images/{{ $img->image }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                                @endforeach
                                @endif
                              </div>
                              </div>
                         </form>
                    </div>
               </div>
          </div>
          <!-- Form Elements -->
          <div class="col-lg-9">
               <div class="card">
                    <div class="card-header">
                         <h3 class="h4 mb-0">Edit Rental House Details</h3>
                         
                    </div>
                    <div class="card-body pt-0">
                         <form class="form-horizontal" action="/update/{{ $houses->id }}" method="post" enctype="multipart/form-data">
                         @csrf
                         @method("put")
                              <div class="row">
                              <label class="col-sm-3 form-label">Owner Name</label>
                              <div class="col-sm-9">
                                   <input name="owner_name" class="form-control" type="text" value="{{$houses->owner_name}}">
                              </div>
                              </div>

                              <div class="my-4"></div>
                              <div class="row">
                              <label class="col-sm-3 form-label">Estimated Distance From UMP (km)</label>
                              <div class="col-sm-9">
                                   <input name="distance" class="form-control" type="float" value="{{$houses->distance}}">
                              </div>
                              </div>

                              <div class="my-4"></div>
                              <div class="row">
                              <label class="col-sm-3 form-label">Rental Price</label>
                              <div class="col-sm-9">
                                   <input name="rental_price" class="form-control" type="float" value="{{$houses->rental_price}}">
                              </div>
                              </div>

                              <div class="my-4"></div>
                              <div class="row">
                              <label class="col-sm-3 form-label">House Type</label>
                              <div class="col-sm-9">
                                   <select class="form-select mb-3" name="house_type">
                                        <option value="{{$houses->house_type}}">{{$houses->house_type}}</option>
                                        <option value="Single Story">Single Story</option>
                                        <option value="Double Story">Double Story</option>
                                   </select>
                              </div>
                              </div>

                              <div class="my-4"></div>
                              <div class="row">
                              <label class="col-sm-3 form-label">Address</label>
                              <div class="col-sm-9">
                                    <Textarea name="location" cols="20" rows="4" class="form-control" placeholder="location">{{ $houses->location }}</Textarea>
                              </div>
                              </div>

                              <div class="my-4"></div>
                              <div class="row">
                              <label class="col-sm-3 form-label">House Picture(Only 1 main picture)</label>
                              <div class="col-sm-9">
                                   <input name="house_picture" class="form-control" type="file">
                                   <br>
                                   <img src="/house_picture/{{ $houses->house_picture }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                              </div>
                              </div>

                              <div class="my-4"></div>
                              <div class="row">
                              <label class="col-sm-3 form-label">House Interior Pictures</label>
                              <div class="col-sm-9">
                                   <input class="form-control" type="file" name="images[]" multiple>
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

<!-- <div class="container-fluid"  align="center">
     <div class="col-lg-5" >
          <div class="card mb-0">
               <div class="card-header position-relative" >
                    <h1 style="text-align:center">Edit Rental House Details</h1><hr><br>
                    <div class="Editcontainer" >
                         <div class="col-lg-10">
                            <form action="/update/{{ $houses->id }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method("put")
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Owner Name</label>
                                <input name="owner_name" type="text" class="form-control" id="exampleFormControlInput1" value="{{$houses->owner_name}}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Distance From UMP (km)</label>
                                <input name="distance" type="text" class="form-control" id="exampleFormControlInput1" value="{{$houses->distance}}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Rental Price</label>
                                <input name="rental_price" type="float" class="form-control" id="exampleFormControlInput1" value="{{$houses->rental_price}}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">House Type</label>
                                    <select name="house_type" class="form-select" aria-label="house_type" id="exampleFormControlInput1" value="{{$houses->house_type}}">
                                        <option selected disabled>{{$houses->house_type}}</option>
                                        <option value="Single Story">Single Story</option>
                                        <option value="Double Story">Double Story</option>                                               
                                    </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Address</label>
                                <Textarea name="location" cols="20" rows="4" class="form-control m-2" placeholder="location">{{ $houses->location }}</Textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">House Picture</label>
                                <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="house_picture" >    
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">House Interior Pictures</label>
                                <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="images[]" multiple>
                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>
                            </form>

                            <div class="col-lg-5">
                                <p>Main Picture:</p>
                                <form action="/deletehouse_picture/{{ $houses->id }}" method="post">
                                <button class="btn text-danger">X</button>
                                @csrf
                                @method('delete')
                                </form>
                                <img src="/house_picture/{{ $houses->house_picture }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                                <br>



                                @if (count($houses->images)>0)
                                <p>House Interior Pictures:</p>
                                @foreach ($houses->images as $img)
                                <form action="/deleteimage/{{ $img->id }}" method="post">
                                    <button class="btn text-danger">X</button>
                                    @csrf
                                    @method('delete')
                                    </form>
                                <img src="/images/{{ $img->image }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                                @endforeach
                                @endif

                            </div>

                         </div>  
                    </div>
               </div>
          </div>
     </div>
</div> -->

@endsection






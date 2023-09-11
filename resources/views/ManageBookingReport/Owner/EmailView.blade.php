@extends('layouts.ownerDashboardStyle')

<head>
    <title>UMP-Email</title>  
</head>

<style>  
    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
    }

    /* Modal Content (image) */
    .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
    }

    /* Caption of Modal Image */
    #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }

    /* Add Animation */
    .modal-content, #caption {  
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @-webkit-keyframes zoom {
        from {transform:scale(0)} 
        to {transform:scale(1)}
    }

    @keyframes zoom {
        from {transform:scale(0.1)} 
        to {transform:scale(1)}
    }

    /* The Close Button */
    .imageclose {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .imageclose:hover,
    .imageclose:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    /* Responsive Columns */
    @media only screen and (max-width: 700px){
        .responsive {
            width: 49.99999%;
            margin: 6px 0;
        }
        .modal-content {
            width: 100%;
        }
    }

    @media only screen and (max-width: 500px){
        .responsive {
            width: 100%;
        }
    }

</style>


@section('content')

<head>  
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="/dashboard/css/style.default.css" id="theme-stylesheet">
</head>


<section class="pt-0"> 
     <div class="container-fluid">
          <div class="row gy-4">
               <!-- Form Elements -->
               <div class="col-lg-6">
                    <div class="card">
                         <div class="card-header" style="background-color: blue;">
                              <h3 class="h4 mb-0" style="color: white;">Example (Writting Email)</h3>
                         </div>
                         <div class="card-body pt-0">
                              <div class="row">
                                   <div class="col-sm-9">
                                   <img class="img" src="/assets/img/EmailPicture/example1.png" style="height: 200px; width: 350px; ">
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
               <div class="col-lg-6">
                    <div class="card">
                         <div class="card-header" style="background-color:red;">
                              <h3 class="h4 mb-0"  style="color: white;">Example (Email Received)</h3>
                         </div>
                         <div class="card-body pt-0">
                              <div class="row">
                                   <div class="col-sm-9">
                                        <img class="img" src="/assets/img/EmailPicture/example2.png" style="height: 200px;">
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</section>

<section class="pt-0"> 
     <div class="container-fluid">
          <div class="row gy-4">
          <!-- Form Elements -->
          <div class="col-lg-12">
               <div class="card">
                    <div class="card-header">
                         <h3 class="h4 mb-0">Email</h3>
                    </div>
                    <div class="card-body pt-0">
                         <form class="form-horizontal" action="{{url('sendemail',$bookings->id)}}" method="POST">
                          @csrf
                              <div class="row">
                              <label class="col-sm-3 form-label">Student Name</label>
                              <div class="col-sm-9">
                                   <input name="greeting" class="form-control" type="text" value="Hi {{$bookings->name}} ,">
                              </div>
                              </div>

                              <div class="my-4"></div>
                              <div class="row">
                              <label class="col-sm-3 form-label">Content</label>
                              <div class="col-sm-9">
                                   <Textarea name="body" cols="20" rows="4" class="form-control m-2" placeholder="Important Details" required=""></Textarea>
                              </div>
                              </div>

                              <div class="my-4"></div>
                              <div class="row">
                              <label class="col-sm-3 form-label">Link Title</label>
                              <div class="col-sm-9">
                                   <input name="actiontext" class="form-control" type="text" placeholder="Ex: Checkout this link">
                              </div>
                              </div>

                              <div class="my-4"></div>
                              <div class="row">
                              <label class="col-sm-3 form-label">Link (Google map Location Link)</label>
                              <div class="col-sm-9">
                                   <input name="actionurl" class="form-control" type="text" placeholder="Ex: https://waze.com/ul/hw281k02tx">
                              </div>
                              </div>

                              <div class="my-4"></div>
                              <div class="row">
                              <label class="col-sm-3 form-label">Conclusion</label>
                              <div class="col-sm-9">
                                   <Textarea name="endpart" cols="20" rows="4" class="form-control m-2" placeholder="Ex: Thanks for your cooperation"  required=""></Textarea>
                              </div>
                              </div>

                              <div class="my-4"></div>
                              <div class="row">
                              <div class="col-sm-9 ms-auto">
                                   <button class="btn btn-primary"  type="submit" >Send</button>
                              </div>
                              </div>
                         </form>
                    </div>
               </div>
          </div>
     </div>
</section>

<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="imageclose">×</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

@endsection

  
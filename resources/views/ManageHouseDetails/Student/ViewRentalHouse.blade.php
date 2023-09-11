@extends('layouts.studentDashboardStyle')

<head>
<!-- <link rel="stylesheet" href="ProductViewDesign/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" /> -->
<title> Rental House Details</title>

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
    .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close:hover,
    .close:focus {
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

</head>

@section('content')

@if(session('success'))
<div class="alert alert-primary" role="alert">
     {{session('success')}}
</div>
@endif

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form action="{{ url('/add-rating') }}" method="POST">
            @csrf
            <input type="hidden" name="house_id" value="{{$house_details->id}}">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Rate {{$house_details->owner_name}}'s House</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="rating-css">
                    <div class="star-icon">
                        @if($user_rating)

                            @for($i =1; $i<= $user_rating->stars_rated; $i++)             
                                <input type="radio" value="{{$i}}" name="house_rating" checked id="rating{{$i}}">
                                <label for="rating{{$i}}" class="fa fa-star"></label>
                            @endfor
                            @for($j = $user_rating->stars_rated+1; $j <= 5; $j++)
                                <input type="radio" value="{{$j}}" name="house_rating" id="rating{{$j}}">
                                <label for="rating{{$j}}" class="fa fa-star"></label>
                            @endfor

                            
                        @else
                            <input type="radio" value="1" name="house_rating" checked id="rating1">
                            <label for="rating1" class="fa fa-star"></label>
                            <input type="radio" value="2" name="house_rating" checked id="rating2">
                            <label for="rating2" class="fa fa-star"></label>
                            <input type="radio" value="3" name="house_rating" checked id="rating3">
                            <label for="rating3" class="fa fa-star"></label>
                            <input type="radio" value="4" name="house_rating" checked id="rating4">
                            <label for="rating4" class="fa fa-star"></label>
                            <input type="radio" value="5" name="house_rating" checked id="rating5">
                            <label for="rating5" class="fa fa-star"></label>
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
  </div>
</div>

<!-- <div class="container">    -->
    <div class="card shadow" style="padding: 15px 16px; width: 100%;">
    {{csrf_field()}} 
         <!-- card left -->
        <div class = "product-imgs">
            <div class = "img-display">
                <div class = "img-showcase">
                    <img src = "/house_picture/{{ $house_details->house_picture }}" alt = "house image">
                </div>
            </div>
            <div class = "img-select">
                <div class = "img-item">
                    @foreach ($house_details->images as $img)
                    <a href = "#" data-id = "1">
                        <img  class="img" src = "/images/{{ $img->image }}" style="max-height: 100px; max-width: 100px;"  alt = "house image">
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- card right -->
        <div class = "product-content">
          <h2 class = "product-title">Owner <span style="color:black">: {{$house_details->owner_name}}</span></h2>
          <hr>
          @php $ratenum = number_format($rating_value) @endphp
            <div class="rating"> 
                @for($i =1; $i<= $ratenum; $i++)             
                    <i class="fa fa-star checked"></i>
                @endfor

                @for($j = $ratenum+1; $j <= 5; $j++)
                <i class="fa fa-star"></i>   
                @endfor

                <span>
                    @if($ratings->count() > 0)
                        {{$ratings->count()}} Ratings                               
                    @else
                        No Ratings
                    @endif
                </span> 
            </div>

            <div class = "product-price">
                <p class = "new-price" style="color:black">Rental Price : <span>RM {{$house_details->rental_price}} per month</span></p>
            </div>

            <div class = "product-price">
                <p class = "new-price" style="color:black">Distance from UMP : <span>{{$house_details->distance}}km</span></p>
            </div>
            <div class = "product-detail">
                <hr>
                <h3>Address : </h3>
                <p><span style="color:black"> {{$house_details->location}}</span></p>
            </div>
            <hr>
            <div>
                <a href="{{ url('add-booking/'.$house_details->id.'/userbooking') }}" class="btn btn-primary" style="margin-left: 85%;"><i style="font-size:16px;color:black;">Book</i></a>
            </div>
        </div>
    </div>
<!-- </div> -->

<!-- <div class="container" > -->
    <div class="card shadow"  style="width: 100%;">
        <div class="card-body">
            <div class="row" >
                <div class="col-md-12">
                    <a href="{{ url('add-review/'.$house_details->id.'/userreview') }}"  class="review-button">
                        Write a review
                    </a>
                    <button type="button"  class="rate-button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Rate this house
                    </button>
                </div>
                <div class="col-md-12">
                    @foreach ($reviews as $item)
                        <div class="user-review">
                        <br><img class="avatar shadow-0 img-fluid rounded-circle" src="{{$item->user->picture . ''. $item->user->lpicture}} " alt="User Image" style="width:40px; height:40px">
                            <label for="">{{$item->user->name . ''. $item->user->lname}} </label>
                            @if($item->user_id == Auth::id())
                                <a href="{{ url('edit-review/'.$house_details->id.'/userreview')}}" style="color:blue" >Edit</a>
                            @endif
                            <br>
                            @php

                            $rating = App\Models\Rating::where('house_id',$house_details->id)->where('user_id', $item->user->id)->first();

                            @endphp

                            @if($rating)
                                @php $user_rated = $rating->stars_rated @endphp  
                                @for($i =1; $i<= $user_rated; $i++)             
                                <i class="fa fa-star checked"></i>
                                @endfor

                                @for($j = $user_rated+1; $j <= 5; $j++)
                                <i class="fa fa-star"></i>   
                                @endfor
                            @endif
                            <small>Review on {{ $item->created_at->format('d M Y') }}</small>
                            <p>
                                {{$item->user_review}}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
<!-- </div> -->

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Booking Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

            <form action="/booking/create" method="POST">
                {{csrf_field()}}    
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Student Name</label>
                    <input name="owner_name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="{{$house_details->owner_name}}" required="">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Location</label>
                    <input name="location" type="text" class="form-control" id="exampleFormControlInput1" placeholder="{{$house_details->owner_name}}" required="">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label"> Student Name</label>
                    <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Input Email Address" required="">
                </div>

                <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> Booking Date</label>
                    <input name="booking_date" type="date" class="form-control" id="exampleFormControlInput1" placeholder="Input Contact No" required="">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> -->

<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">×</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>


<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
    modal.style.display = "none";
    }

    // Get all images and insert the clicked image inside the modal
    // Get the content of the image description and insert it inside the modal image caption
    var images = document.getElementsByTagName('img');
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    var i;
    for (i = 0; i < images.length; i++) {
    images[i].onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        modalImg.alt = this.alt;
        captionText.innerHTML = this.nextElementSibling.innerHTML;
    }
    }
</script>

<script src="/ProductViewDesscript.js"></script>


@endsection

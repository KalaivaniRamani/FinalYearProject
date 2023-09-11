@extends('layouts.studentDashboardStyle')

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rental House List | HRMS</title>
<link rel="stylesheet" type="text/css" href="HouseList/Slider/css/style.css">
<link rel="stylesheet" type="text/css" href="HouseList/Slider/style1.css" />
<link rel="stylesheet" type="text/css" href="HouseList/Slider/lightslider.css">
<script type="text/javascript" src="HouseList/Slider/jquery-3.5.1.js"></script>
<script type="text/javascript" src="HouseList/Slider/lightslider.js"></script>

    <script>
	  $(document).ready(function() {
    $('#autoWidth').lightSlider({
        autoWidth:true,
        loop:true,
        onSliderLoad: function() {
            $('#autoWidth').removeClass('cS-hidden');
        } 
    });  
  });
	</script>
</head>

@section('content')

<h2> Rental Houses</h2>

<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: blue;">
            Filter by Distance
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="{{ URL::current() }}"> All </a></li>
        <li><a class="dropdown-item" href="{{ URL::current().'?sort=less_than_10' }}"> Less than 10KM </a></li>
        <li><a class="dropdown-item" href="{{ URL::current().'?sort=less_than_20' }}"> Less than 20KM </a></li>
        <li><a class="dropdown-item" href="{{ URL::current().'?sort=less_than_30' }}"> Less than 30KM </a></li>
        <li><a class="dropdown-item" href="{{ URL::current().'?sort=less_than_40' }}"> Less than 40KM </a></li>
        <li><a class="dropdown-item" href="{{ URL::current().'?sort=less_than_50' }}"> Less than 50KM </a></li>
        <li><a class="dropdown-item" href="{{ URL::current().'?sort=more_than_50' }}"> More than 50KM </a></li>
    </ul>
</div>

 <section class="slider">
	<ul id="autoWidth" class="cs-hidden">
        @foreach($rental_house as $house)
        <li class="item-a">
            <div class="box">
                <div class="slide-img">
                    <img alt="House Image" src="house_picture/{{ $house->house_picture }}" href="{{ URL::current().'?sort=less_than_10' }}">
                    <div class="overlay">
                        <a href="housedata/{{$house->id}}/edit" class="buy-btn">View Now</a>	
                    </div>
                </div>
                <div class="detail-box">
                    <div class="type">
                        <a href="#">Owner: {{$house->owner_name}}</a>
                        <!-- <span>Tour</span> -->
                    </div>
                    <a href="#" class="price">Rent</a>
                    <input type="hidden" name="distance" value="{{$house->distance}}">
                </div>
            </div>		
        </li>
        @endforeach
    </ul>
</section>
</html>
@endsection('content')

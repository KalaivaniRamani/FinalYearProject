@extends('layouts.studentDashboardStyle')

@section('title', "Edit your Review")
@section('content')

@if(session('success'))
<div class="alert alert-primary" role="alert">
     {{session('success')}}
</div>
@endif

<!-- <div class="container py-5"> -->
    <div class="row py-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                   <h5>You are writting a review for {{$house->owner_name}}'s House</h5>
                   <form action="{{ url('/update-review')}}" method="POST">
                    @csrf
                    @method('PUT')
                        <input type="hidden" name="review_id" value="{{$review->id}}">
                        <textarea class="form-control" name="user_review" rows="5" placeholder="Write a review">{{$review->user_review}}</textarea>
                        <button type="submit" class="btn btn-primary mt-3">Update Review</button>
                   </form>  
                </div>
            </div>
        </div>
    </div>
<!-- </div> -->


@endsection

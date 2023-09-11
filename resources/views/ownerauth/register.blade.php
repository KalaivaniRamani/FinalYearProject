@extends('layouts.loginStyle')

<title>Register | UMP-HRMS</title>

@section('content')
<div class="row align-items-center justify-content-center">
    <div class="col-md-7">
    <h3 style="margin-bottom:32px;"><strong> Owner Register</strong></h3>
    <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
    <form action="{{ route('ownerauth.create') }}" method="post" enctype="multipart/form-data">
    @if (Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    @if (Session::get('fail'))
    <div class="alert alert-danger">
        {{ Session::get('fail') }}
    </div>
    @endif
    @csrf

    <div class="form-group first">
        <label for="name">Name</label>
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"  placeholder="Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group first">
        <label for="email">Email</label>
        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"  placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group first">
        <label for="contactNo">Contact Number</label>
        <input id="contactNo" type="text" class="form-control @error('contactNo') is-invalid @enderror"  placeholder="Your Contact Number" name="contactNo" value="{{ old('contactNo') }}" required autocomplete="contactNo" autofocus>

        @error('contactNo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group first">
        <label for="owner_ic">Identification Card(IC) Picture</label>
        <input id="owner_ic" type="file" name="owner_ic" class="form-control @error('owner_ic') is-invalid @enderror" placeholder="image" value="{{ old('owner_ic') }}" required autocomplete="owner_ic" autofocus>

        @error('owner_ic')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group first">
        <label for="password">Password</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group last mb-3" >
        <label for="cpassword">Confirm Password</label>
        <input id="cpassword" type="password" class="form-control" placeholder="Confirm Password" name="cpassword" required autocomplete="new-password">
    </div>

    <input type="submit" value="Register" class="mybutton">

    <!-- Already have account -->
    <div class="row mb-4 px-3 text-center">
        <strong>
            <small class="font-weight-bold">Already have an account?
                <a href="{{ route('ownerauth.login') }}" class="text-danger ">Login</a>
            </small>
        </strong>
    </div>

    </form>
    </div>
</div>
@endsection


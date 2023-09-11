@extends('layouts.loginStyle')

<title>Register | UMP-HRMS</title>

@section('content')
<div class="row align-items-center justify-content-center">
    <div class="col-md-7">
    <h2 style="margin-top:10px;margin-bottom:30px;"><strong> Student Register</strong></h2>
    <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
    <form method="POST" action="{{ route('register') }}">
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
        <label for="studentId">Student ID</label>
        <input id="studentId" type="text" class="form-control @error('studentId') is-invalid @enderror"  placeholder="Your Student ID" name="studentId" value="{{ old('studentId') }}" required autocomplete="studentId" autofocus>

        @error('studentId')
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
        <label for="password">Password</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group last mb-3" >
        <label for="password-confirm">Confirm Password</label>
        <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
    </div>
 
    <input type="submit" value="Register" class="mybutton">

    <!-- Already have account -->
    <div class="row mb-4 px-3 text-center">
        <strong>
            <small class="font-weight-bold">Already have an account?
                <a href="/login" class="text-danger ">Login</a>
            </small>
        </strong>
    </div>

    </form>
    </div>
</div>
@endsection

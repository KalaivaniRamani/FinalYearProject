@extends('layouts.loginStyle')

<title>Login | UMP-HRMS</title>

@section('content')
<div class="row align-items-center justify-content-center">
    <div class="col-md-7">
    <h3 style="margin-bottom:45px;"><strong> Login to UMP-HRMS</strong></h3>
    <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
    <form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="form-group first">
        <label for="email">Email</label>
        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"  placeholder="Your Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group last mb-3">
        <label for="password">Password</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"  placeholder="Your Password" name="password" required autocomplete="current-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
              
    <div class="d-flex mb-5 align-items-center">
        <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <div class="control__indicator"></div>
        </label>
        @if (Route::has('password.request'))
        <span class="ml-auto"><a href="{{ route('password.request') }}" class="forgot-pass">Forgot Password</a></span> 
        @endif
    </div>

    <input type="submit" value="Log In" class="mybutton">

    <div class="row mb-8 px-3 text-center">
        <strong>
            <small class="font-weight-bold">Don't have an account?
                <a href="/register" class="text-danger ">Register</a>
            </small>
        </strong>
    </div>

    </form>
    </div>
</div>
@endsection

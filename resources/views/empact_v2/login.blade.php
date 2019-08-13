@extends('layouts.bare_v2')

@section('content')

<div class="form-inner">
    <div class="logo text-uppercase"><span>Empact</span><strong class="text-primary">v2</strong></div>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
        magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
    <form method="POST" action="{{ route('login') }}" class="text-left form-validate">
        @csrf
        <div class="form-group-material">
            <input id="username" type="text" name="email" value="{{ old('email') }}" required
                data-msg="Please enter your username" class="input-material login-input">
            <label for="username" class="label-material">Username</label>
        </div>
        <div class="form-group-material">
            <input id="password" type="password" name="password" required data-msg="Please enter your password"
                class="input-material login-input">
            <label for="password" class="label-material">Password</label>
        </div>
        <div class="form-group terms-conditions text-center">
            <input id="remember" name="remember" type="checkbox" data-msg="Your agreement is required"
                class="form-control-custom login-input">
            <label for="remember">Recuérdame</label>
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Login
            </button>
        </div>

    </form>

    @if (Route::has('password.request'))
    <a href="{{ route('password.request') }}" class="btn btn-link">Forgot Password?</a><small>Do not have an account?
    </small><a href="register.html" class="signup">Signup</a>
    @endif

</div>

@endsection

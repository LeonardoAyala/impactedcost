@extends('layouts.bare_v2')

@section('content')

<div class="form-inner">
    <div class="logo text-uppercase"><span>Empact</span><strong class="text-primary">v2</strong></div>
    <p>Empiece su experiencia en empact accediendo a su área de trabajo en una cuenta ya existente.
        Sólo provee la siguiente infomación:</p>
    <form method="POST" action="{{ route('login') }}" class="text-left form-validate">
        @csrf
        <div class="form-group-material">
            <input id="username" type="text" name="email" value="{{ old('email') }}" required
                data-msg="Por favor ingrese su correo" class="input-material login-input">
            <label for="username" class="label-material">E-mail</label>
        </div>
        <div class="form-group-material">
            <input id="password" type="password" name="password" required data-msg="Por favor ingrese contraseña"
                class="input-material login-input">
            <label for="password" class="label-material">Contraseña</label>
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

    <div>
        @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}" class="btn btn-link">¿Olvidó su contaseña?</a>
        @endif
    </div>
    <small>¿Todavía no tiene cuenta?
    </small><a href="{{ route('register') }}" class="signup">Regístrese</a>

</div>

@endsection

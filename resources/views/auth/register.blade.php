@extends('layouts.bare_v2')

@section('content')

<div class="form-inner">
        <div class="logo text-uppercase"><span>Empact</span><strong class="text-primary">v2</strong></div>
        <p>Para poder gosar de todas las funciones de Empact se necesita registar al usuario en una cuenta personal.
            Sólo provee la siguiente información:
        </p>
        <form method="POST" action="{{ route('register') }}" class="text-left form-validate">
                @csrf

            <div class="form-group-material">
            <input id="name" type="text" name="name" required data-msg="Please enter your username" class="input-material login-input">
            <label for="name" class="label-material">Nombre completo</label>
          </div>
          <div class="form-group-material">
            <input id="email" type="email" name="email" required data-msg="Please enter a valid email address" class="input-material login-input">
            <label for="email" class="label-material">E-mail      </label>
          </div>
          <div class="form-group-material">
            <input id="password" type="password" name="password"required data-msg="Please enter your password" class="input-material login-input">
            <label for="password" class="label-material">Contraseña        </label>
          </div>
          <div class="form-group-material">
                <input id="password-confirm" name="password_confirmation" type="password" required data-msg="Please enter your password" class="input-material login-input">
                <label for="password-confirm" class="label-material">Confirmación de contraseña        </label>
              </div>
          <div class="form-group text-center">
            <input id="register" type="submit" value="Registrarse" class="btn btn-primary">
          </div>
        </form><small>¿Ya tiene una cuenta? </small><a href="{{ route('login') }}" class="signup">Login</a>
      </div>

@endsection

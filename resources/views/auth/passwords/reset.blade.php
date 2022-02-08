@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
                <a href="" class="h1" style="color: white;"><b>Gestor </b>Integral</a>
                <br>
                <br>
            </div>
        <div class="col-md-9">
            <div class="card card-outline card-warning">
                <div class="card-header text-center color-header"><a href="" class="h3"><h3><b>Restaurar contraseña</b></h3></a></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="input-group mb-3">
                            <label for="email" class="col-md-12 control-label">{{('Correo electronico') }}</label>
                                <input id="email" type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label for="password" class="col-md-12">{{ __('Contraseña') }}</label>
                                <input id="password" type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="input-group mb-3">
                            <label for="password-confirm" class="col-md-12 control-label">{{ __('Confirmar contraseña') }}</label>
                         
                                <input id="password-confirm" type="password" class="form-control form-control-sm" name="password_confirmation" required autocomplete="new-password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-warning btn-sm btn-block">
                                    {{ __('Resturar contraseña') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <p class="mt-3 mb-1">
                        <a href="{{ route('login') }}" style="color:#ffc107">Login</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

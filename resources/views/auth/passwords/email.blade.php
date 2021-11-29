@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="login-box">
                <div class="card card-outline card-warning">
                  <div class="card-header text-center">
                    <a href="" class="h1"><b>Gestor</b>Integral</a>
                  </div>
                  <div class="card-body">
                    <p class="login-box-msg">¿Olvidaste tu contraseña? Aquí puede recuperar fácilmente una nueva contraseña.</p>
                    <form action="{{ route('password.email') }}" method="post">
                      <div class="input-group mb-3">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
              
                                             @error('email')
                                                 <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                 </span>
                                             @enderror
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <button type="submit" class="btn btn-warning btn-block">Pide nueva contraseña</button>
                        </div>
                        <!-- /.col -->
                      </div>
                    </form>
                    <p class="mt-3 mb-1">
                      <a href="{{ route('login') }}" style="color:#ffc107">Login</a>
                    </p>
                  </div>
                  <!-- /.login-card-body -->
                </div>
              </div>
        </div>
    </div>
</div>
@endsection

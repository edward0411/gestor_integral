@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="login-box">
                <!-- /.login-logo -->
                <div class="card card-outline" style="color:#1A7C94">
                  <div class="card-header text-center">
                    <div class="tab">
                      <button class="tablinks" onclick="openRegister(event, 'Client')" id="defaultOpen">Cliente</button>
                      <button class="tablinks" onclick="openRegister(event, 'Tutor')">Tutor</button>
                    </div>
                    <a href="" class="h1"><b>Gestor</b>Integral</a>
                  </div>
                  <div class="card-body">
                    <p class="login-box-msg">Regístrese para iniciar su sesión</p>
                    <div id="Client" class="tabcontent">

                     
                    </div>
                    <div id="Tutor" class="tabcontent">

                     
                    </div>
                    
                  
                   
                    <form action="{{ route('login') }}" method="post">
                      @csrf
                      <div class="input-group mb-3">
                         <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Correo electronico" required autocomplete="email">
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
                      <div class="input-group mb-3">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="current-password">
              
                                             @error('password')
                                                 <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                 </span>
                                             @enderror
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                
                        <!-- /.col -->
                        <div class="col-8">
                          <button type="submit" style="color:#1A7C94" class="btn btn-sm">{{ __('Iniciar Sesión') }}</button>
                        </div>
                        <!-- /.col -->
                      </div>
                    </form>
              
                    <p class="mb-1">
                      <a href="{{ route('password.request') }}" style="color:#1A7C94">Olvidé mi contraseña</a>
                    </p>

                    <p class="mb-0">
                      <a href="{{ route('register') }}" class="text-center" style="color:#1A7C94 ">Registrar nuevo usuario</a>
                    </p>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.login-box -->
        </div>
    </div>
</div>
@endsection
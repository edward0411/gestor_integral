@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="register-box">
                <div class="card card-outline card-warning">
                  <div class="card-header text-center">
                    <div class="tab">
                      <button class="tablinks" onclick="openRegister(event, 'Client')" id="defaultOpen">Cliente</button>
                      <button class="tablinks" onclick="openRegister(event, 'Tutor')">Tutor</button>
                    </div>
                    <a href="" class="h1"><b>Gestor</b>Integral</a>
                  </div>
                  <div class="card-body">
                    <div id="Client" class="tabcontent">
                      <form action="{{ route('register_clients') }}" method="post">
                        @csrf
                        <p class="login-box-msg">Registar nuevo cliente</p>
                        <div class="input-group mb-3">
                          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Nombre">
                    
                                                 @error('name')
                                                     <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $message }}</strong>
                                                     </span>
                                                 @enderror
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-user"></span>
                            </div>
                          </div>
                        </div>
                        <div class="input-group mb-3">
                          <input id="nick_name" type="text" class="form-control @error('name') is-invalid @enderror" name="nick_name" value="{{ old('name') }}" required autocomplete="name" placeholder="Nick-Name">
                    
                                                 @error('nick_name')
                                                     <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $message }}</strong>
                                                     </span>
                                                 @enderror
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-user"></span>
                            </div>
                          </div>
                        </div>
                        <div class="input-group mb-3">
                          <input id="key_number" type="number" class="form-control @error('key_number') is-invalid @enderror" name="key_number" value="{{ old('key_number') }}" required autocomplete="key_number" placeholder="Número Celular">
                    
                                                  @error('key_number')
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                      </span>
                                                  @enderror
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-phone"></span>
                            </div>
                          </div>
                        </div>
                        <div class="input-group mb-3">
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo electronico">
                    
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
                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña">
                    
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
                        <div class="input-group mb-3">
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirme contraseña">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-lock"></span>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-8">
                            <!--<div class="icheck-warning">
                              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                              <label for="agreeTerms">
                               Acepto los <a href="#">terminos</a>
                              </label>
                            </div>-->
                          </div> 
                          <div class="col-8">
                            <button type="submit" class="btn btn-warning btn-block">Registro</button>
                          </div>
                          <!-- /.col -->
                        </div>
                      </form>
                    </div>
                    <div id="Tutor" class="tabcontent">
                      <form action="{{ route('register') }}" method="post">
                        @csrf
                        <p class="login-box-msg">Registar nuevo tutor</p>
                        <div class="input-group mb-3">
                          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    
                                                 @error('name')
                                                     <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $message }}</strong>
                                                     </span>
                                                 @enderror
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-user"></span>
                            </div>
                          </div>
                        </div>
                        <div class="input-group mb-3">
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    
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
                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    
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
                        <div class="input-group mb-3">
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-lock"></span>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-8">
                            <div class="icheck-warning">
                              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                              <label for="agreeTerms">
                               Acepto los <a href="#">terminos</a>
                              </label>
                            </div>
                          </div>
                          <!-- /.col -->
                          <div class="col-4">
                            <button type="submit" class="btn btn-warning btn-block">Registro</button>
                          </div>
                          <!-- /.col -->
                        </div>
                      </form>
                    </div>
                    
                    
              
                    <a href="{{ route('login') }}" class="text-center" style="color:#ffc107">Ya tengo una cuenta</a>
                  </div>
                  <!-- /.form-box -->
                </div><!-- /.card -->
              </div>
              <!-- /.register-box -->
        </div>
      </div>
</div>
@endsection

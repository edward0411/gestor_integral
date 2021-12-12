@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="">
                <div class="card card-outline card-warning">
                    <div class="card-header text-center ">
                        <a href="" class="h1"><b>Gestor</b>Integral</a>
                    </div>
                    <div class="card-body">
                        <div id="Client" class="tabcontent">
                            <form action="{{ route('register_clients') }}" method="post">
                                @csrf
                                <p class="login-box-msg">Registar nuevo cliente</p>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <div class="input-group mb-3">
                                            <input id="u_name" type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="u_name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Nombre">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                </div>
                                            </div>
                                            @error('u_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="input-group mb-3">
                                            <input id="u_nick_name" type="text" class="form-control form-control-sm @error('u_nick_name') is-invalid @enderror" name="u_nick_name" value="{{ old('u_nick_name') }}" required autocomplete="u_nick_name" placeholder="Nick-Name">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                </div>
                                            </div>

                                            @error('u_nick_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="input-group mb-3">
                                            <input id="u_key_number" type="number" class="form-control form-control-sm @error('u_key_number') is-invalid @enderror" name="u_key_number" value="{{ old('u_key_number') }}" required autocomplete="u_key_number" placeholder="Número Celular">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-phone"></span>
                                                </div>
                                            </div>
                                            @error('u_key_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="input-group mb-3">
                                            <select name="id_contry" id="id_contry" class="form-control form-control-sm" required>
                                                <option value="">Pais de origen</option>
                                                <option value="1">Colombia</option>
                                                <option value="2">Peru</option>
                                                <option value="3">España</option>
                                                <option value="4">USA</option>
                                            </select>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-globe"></span>
                                                </div>
                                            </div>
                                            @error('id_contry')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="input-group mb-3">
                                            <select name="id_means" id="id_means" class="form-control form-control-sm" required>
                                                <option value="">Medio de contacto</option>
                                                <option value="1">Publicidad web</option>
                                                <option value="2">Llamada call center</option>
                                                <option value="3">Referido</option>
                                                <option value="4">Publiciad mediatica</option>
                                            </select>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-bullhorn"></span>
                                                </div>
                                            </div>
                                            @error('u_key_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="input-group mb-3">
                                            <select name="id_money" id="id_money" class="form-control form-control-sm" required>
                                                <option value="">Tipo de moneda</option>
                                                <option value="1">Peso colombiano</option>
                                                <option value="2">Dolar Amenricano</option>
                                                <option value="3">Soles</option>
                                                <option value="4">Euro</option>
                                            </select>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-dollar-sign"></span>
                                                </div>
                                            </div>
                                            @error('u_key_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="input-group mb-3">
                                            <input id="email" type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Correo electronico">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-envelope"></span>
                                                </div>
                                            </div>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="input-group mb-3">
                                            <input id="password" type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña">
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
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="input-group mb-3">
                                            <input id="password-confirm" type="password" class="form-control form-control-sm" name="password_confirmation" required autocomplete="new-password" placeholder="Confirme contraseña">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>
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
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-warning btn-sm btn-block">Registro</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>
                        </div>
                        <a href="{{ route('login') }}" class="text-center" style="color:#1A7C94">Ya tengo una cuenta</a>
                    </div>
                    <!-- /.form-box -->
                </div><!-- /.card -->
            </div>
            <!-- /.register-box -->
        </div>
    </div>
</div>
@endsection


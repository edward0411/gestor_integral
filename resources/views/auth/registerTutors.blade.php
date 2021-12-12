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
                        <div id="Tutor" class="tabcontent">
                            <form action="{{ route('register_tutors') }}" method="post" onsubmit="return spc()">
                                @csrf
                                <p class="login-box-msg">Registrar nuevo tutor</p>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="u_name" class="col-md-12 control-label">Nombre Completo:</label>
                                        <div class="input-group mb-3">
                                            <input id="u_name" type="text" class="form-control form-control-sm @error('u_name') is-invalid @enderror" name="u_name" value="{{ old('u_name') }}" required autocomplete="u_name" autofocus>
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
                                        <label for="u_nick_name"  class="col-md-12 control-label"><i class="fa fa-asterisk" style="font-size:10px;color: red"></i> Nick Name: <small>(No usar espacios.)</small></label>
                                        <div class="input-group mb-3">
                                            
                                            <input id="u_nick_name" onchange="spc();" type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="u_nick_name" value="{{ old('u_nick_name') }}" required autocomplete="u_nick_name">
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
                                        <label for="u_type_doc" class="col-md-12 control-label"><i class="fa fa-asterisk" style="font-size:10px;color: red"></i> Tipo de Documento:</label>
                                        <div class="input-group mb-3">
                                            <select name="u_type_doc" id="u_type_doc" class="form-control form-control-sm" required>
                                                <option value="">Seleccione..</option>
                                                <option value="1">C.C.</option>
                                                <option value="2">Pasaporte</option>
                                                <option value="3">C.E.</option>
                                                <option value="4">NIT</option>
                                            </select>
                                            <div class="input-group-append">
                                              <div class="input-group-text">
                                                  <span class="fas fa-address-card"></span>
                                              </div>
                                          </div>
                                            @error('u_type_doc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="u_num_doc" class="col-md-12 control-label"><i class="fa fa-asterisk" style="font-size:10px;color: red"></i> Número Documento:</label>
                                        <div class="input-group mb-3">
                                            <input id="u_num_doc"  type="text" class="form-control form-control-sm @error('u_num_doc') is-invalid @enderror" name="u_num_doc" value="{{ old('u_num_doc') }}" required autocomplete="u_num_doc">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fab fa-slack-hash"></span>
                                                </div>
                                            </div>
                                            @error('u_num_doc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="u_key_number" class="col-md-12 control-label"><i class="fa fa-asterisk" style="font-size:10px;color: red"></i> Número celular: <small>(No usar ni puntos ni espacios.)</small></label>
                                        <div class="input-group mb-3">
                                            <input id="u_key_number" onkeyup="num(this);" onblur='num(this);' type="number" class="form-control form-control-sm @error('u_key_number') is-invalid @enderror" name="u_key_number" value="{{ old('u_key_number') }}" required autocomplete="u_key_number">
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
                                        <label for="u_indicativo" class="col-md-12 control-label"><i class="fa fa-asterisk" style="font-size:10px;color: red"></i> Indicativo:</label>
                                        <div class="input-group mb-3">
                                            <input id="u_indicativo" type="text" class="form-control form-control-sm" name="u_indicativo" value="+57" readonly>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-map-marker-alt"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="id_contry" class="col-md-12 control-label"><i class="fa fa-asterisk" style="font-size:10px;color: red"></i> Pais de origen:</label>
                                        <div class="input-group mb-3">
                                            <select name="id_contry" id="id_contry" class="form-control form-control-sm" required>
                                                <option value="">Seleccione...</option>
                                                @foreach ($countries as $country)
                                                <option value="{{$country->id}}">{{$country->c_name}}</option>
                                                @endforeach
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
                                        <label for="id_means" class="col-md-12 control-label"><i class="fa fa-asterisk" style="font-size:10px;color: red"></i> Medio de contacto:</label>
                                        <div class="input-group mb-3">
                                            <select name="id_means" id="id_means" class="form-control form-control-sm" required>
                                                <option value="">Seleccione...</option>
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
                                        <label for="email" class="col-md-12 control-label"><i class="fa fa-asterisk" style="font-size:10px;color: red"></i> Correo electronico:</label>
                                        <div class="input-group mb-3">
                                            <input id="email" type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
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
                                        <label for="password" class="col-md-12 control-label"><i class="fa fa-asterisk" style="font-size:10px;color: red"></i> Contraseña:</label>
                                        <div class="input-group mb-3">
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
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="password-confirm" class="col-md-12 control-label"><i class="fa fa-asterisk" style="font-size:10px;color: red"></i> Confirme contraseña:</label>
                                        <div class="input-group mb-3">
                                            <input id="password-confirm" type="password" class="form-control form-control-sm" name="password_confirmation" required autocomplete="new-password">
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
                                    <!-- /.col -->
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
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="" style="opacity: .9">
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
                                        <label for="u_name" class="col-md-12 control-label"><i class="fa fa-asterisk" style="font-size:10px;color: red"></i> Nombre Completo:</label>
                                        <div class="input-group mb-3">
                                            <input id="u_name" type="text" class="form-control form-control-sm @error('u_name') is-invalid @enderror" name="u_name" value="{{ old('u_name') }}" autocomplete="u_name" autofocus>
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
                                        <label for="u_nickname"  class="col-md-12 control-label"><i class="fa fa-asterisk" style="font-size:10px;color: red"></i> Nick Name: <small>(No usar espacios.)</small></label>
                                        <div class="input-group mb-3">
                                            
                                            <input id="u_nickname" onchange="spc();" type="text" class="form-control form-control-sm @error('u_nickname') is-invalid @enderror" name="u_nickname" value="{{ old('u_nickname') }}" required autocomplete="u_nickname">
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
                                                @foreach ($type_docs as $type)
                                                <option value="{{$type->id}}">{{$type->p_text}}</option>
                                                @endforeach
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
                                        <label for="id_contry" class="col-md-12 control-label"><i class="fa fa-asterisk" style="font-size:10px;color: red"></i> Pais de origen:</label>
                                        <div class="input-group mb-3">
                                            <select name="id_contry" id="id_contry" class="form-control form-control-sm"  onChange="bringIndicative();" required>
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
                                        <label for="u_indicativo" class="col-md-12 control-label"><i class="fa fa-asterisk" style="font-size:10px;color: red"></i> Indicativo:</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-plus"></span>
                                                </div>
                                            </div>
                                            <input id="u_indicativo" type="text" class="form-control form-control-sm" name="u_indicativo">
                                            
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
                                        <label for="id_means" class="col-md-12 control-label"><i class="fa fa-asterisk" style="font-size:10px;color: red"></i> Medio de contacto:</label>
                                        <div class="input-group mb-3">
                                            <select name="id_means" id="id_means" class="form-control form-control-sm" required>
                                                <option value="">Seleccione...</option>
                                                @foreach ($means as $mean)
                                                <option value="{{$mean->id}}">{{$mean->p_text}}</option>
                                                @endforeach
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
                                    <div class="form-group col-md-4">
                                        <label for="captcha" class="col-md-12 control-label"><i class="fa fa-asterisk" style="font-size:10px;color: red"> </i>Captcha</label>
                                       
                                        <div class="g-recaptcha" data-sitekey="6LcePAATAAAAAGPRWgx90814DTjgt5sXnNbV5WaW" data-theme="dark"></div>
                                       
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-8">
                                    <div class="icheck-warning">
                                        <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                        <label for="agreeTerms">
                                        Acepto los <a href="{{route('system.info.termsConditions')}}" target="_blank">terminos y condiciones</a>
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

@section('script')

<script type="text/javascript">



    var countries = [
        @foreach($countries as $item) {
            "id_indicative": "{{$item->id}}",
            "indicative": "{{$item->c_indicative}}",
         },
        @endforeach
    ];

    function bringIndicative() {

        

        var selectedCountry = $("#id_contry").val();
        nuevo = $.grep(countries, function(n, i) {
            return n.id_indicative == selectedCountry
        });
        
        $.each(nuevo, function(key, value) {
           $('#u_indicativo').val(value.indicative);
        });

    }

</script>


@endsection
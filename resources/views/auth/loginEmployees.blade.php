@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <a href="" class="h1" style="color: white;"><b>Gestor </b>Integral</a>
            <br>
            <br>
        </div>
        <div class="col-md-6">
            <!-- /.login-logo -->
            <div class="card card-outline card-warning">
                <div class="card-header text-center color-header">
                    <a href="" class="h3"><b>Empleados</b></a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Regístrese para iniciar su sesión como empleado</p>
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group mb-3">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Correo electronico" required autocomplete="email">
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
                            <div class="form-group col-md-12">
                                <div class="input-group mb-3">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="current-password">
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
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div>
                                    <input type="checkbox" id="tyc" required>
                                    <a href="{{route('system.info.dataTreatment')}}" target="_blank">Tratamiento de datos</a>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                                <button type="submit" class="btn btn-warning btn-sm float-right">{{ __('Iniciar Sesión') }}</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                    <p class="mb-1">
                        <a href="{{ route('password.request_special',3) }}" style="color:#1A7C94">Olvidé mi contraseña</a>
                    </p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection

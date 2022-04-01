@extends('layouts.master_panel')
@section('title','Gestor integral')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="background-color: rgb(26, 124, 148);">
                        <h2 class="card-title">Validación de usuario</h2>
                    </div>
                    <div class="card-body">
                            <form method="POST" action="{{route('update_email_users')}}">
                                <div class="card-body">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="u_name">{!! trans('Nombre completo') !!}</label>
                                            <p>{{$user->u_name}}</p>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="u_nickname">{!! trans('Nick name') !!} </label>
                                            <p>{{$user->u_nickname}}</p>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="email">{!! trans('Correo: ') !!}</label> 
                                            <input type="email" class="form-control form-control-sm" id="email" name="email" value="{{$user->email}}" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <small> *Si requiere cambiar el correo por favor ingrese el nuevo correo y haga click en "Guardar"</small>
                                            <br>
                                            <br>
                                            <input type="hidden" name="id_user" value="{{$user->id}}">
                                            <button type="submit" id="" class="btn btn-warning btn-sm"> {!! trans('Guardar') !!}</button>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </form>
                            <form method="POST" action="{{route('validate_token_store')}}">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="u_token">{!! trans('Ingrese el codigo de validación.') !!}</label> 
                                            <input type="number" class="form-control form-control-sm" id="u_token" name="u_token" value="" required>
                                        </div>  
                                           
                                    </div>
                                </div>
                                <input type="hidden" name="id_user" value="{{$user->id}}">
                                <button type="submit" id="" class="btn btn-warning btn-sm"> {!! trans('Actualizar Cuenta') !!}</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

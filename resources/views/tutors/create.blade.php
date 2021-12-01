@extends('layouts.master_panel')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-9">
            <div class="card card-warning">
                <div class="card-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Crear tutor') !!}</h5>
                </div>
                <!-- /.card-header -->
                <form method="POST" action="">
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="u_key_number">{!! trans('Número de celular') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="u_key_number" name="u_key_number " value="" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="u_name">{!! trans('Nombre') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="u_name" name="u_name" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="u_nickname">{!! trans('Nickname') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="u_nickname" name="u_nickname" value="" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">{!! trans('Correo') !!}</label>
                                <input type="email" class="form-control form-control-sm" id="email" name="email" value="" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="u_id_country">{!! trans('País') !!}</label>
                                <select name="u_id_country" id="u_id_country" class="form-control form-control-sm">
                                    <option value="">Seleccione país</option>
                                    <option value="1">Colombia</option>
                                    <option value="2">Peru</option>
                                    <option value="3">Ecuador</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="u_id_money">{!! trans('Moneda') !!}</label>
                                <select name="u_id_money" id="u_id_money" class="form-control form-control-sm">
                                    <option value="">Seleccione moneda</option>
                                    <option value="1">Pesos</option>
                                    <option value="2">Sol</option>
                                    <option value="3">Dólar estadounidense</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="u_id_money">{!! trans('Tipo de medio') !!}</label>
                                <select name="u_id_money" id="u_id_money" class="form-control form-control-sm">
                                    <option value="">Seleccione tipo de medio</option>
                                    <option value="1">Internet</option>
                                    <option value="2">Television</option>
                                    <option value="3">radio</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" id="" class="btn btn-warning btn-sm"> {!! trans('Guardar') !!}</button>
                        <a href="{{route('tutors.index')}}" class="btn btn-warning btn-sm float-right">{!! trans('Regresar') !!}</a>
                    </div>
                </form>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
</div>
@endsection

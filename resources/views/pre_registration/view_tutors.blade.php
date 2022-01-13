@extends('layouts.master_panel')
@section('css')

<style>
    .btn {
        color: white;

    }

    .btn:hover {
        border: 1px solid rgba(100, 100, 100, 0.1);
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        text-shadow: 0px 0px 1px rgba(0, 0, 0, 0.5);
        color: black;
    }

    .btn-danger {
        color: dark;
    }

    .table {
        width: 100%;
    }

    h6 {
        color: #000000;
        font-weight: bold;
        font-size: 18px;
        padding-left: 7px;
        padding-right: 7px;
        padding-top: 10px;
        padding-bottom: 10px;
        border-radius: 4px;

    }

    h5 {

        border-radius: 4px;
        background-color: #275FA9;
        color: white;
        font-size: 18px;
        display: inline;
    }

    .errores {
        background: #A5CD39;
        border: 1px solid rgb(255, 0, 0);
        color: red;
        display: none;
        font-size: 14px;
        padding: 4px;
        position: absolute;
        right: 0;
        text-align: right;
        margin-right: 20px;
        border-radius: 3px;
    }

    textarea {
        resize: none;
    }

    .table .thead-light th {
        color: #ffffff;
        background-color: #275FA9;
        border-color: #275FA9;
        text-align: center;
    }

    .error_input {
        border: 1px solid #fd7c7c;
        background: #ff1010;
    }

    .textbox {
        border: 1px solid #DBE1EB;
        font-size: 12px;
        font-family: Arial, Verdana;
        padding-left: 7px;
        padding-right: 7px;
        padding-top: 10px;
        padding-bottom: 10px;
        border-radius: 4px;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
        -o-border-radius: 4px;
        color: #2E3133;
    }

    .add-item {
        position: relative;
        left: 1px;
        font-size: 30px;
        cursor: pointer;
        color: #275FA9;
        border-radius: 4px;

    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=checkbox] {
        transform: scale(2.0);
        margin: 0px 50px 0 100px;
        vertical-align: bottom;
        *overflow: hidden;
        border-radius: 4px;
    }

    select {
        margin-bottom: 5px;
    }


    option.line1 {
        color: #FFBF00;
    }

    .select2-container--default .select2-selection--single {
        background-color: #fff;
        border: 1px solid #ced4da;
        border-radius: 4px;
        height: calc(1.8125rem + 2px);
        font-size: .875rem;
        padding: .25rem .5rem;
        color: #495057;
        line-height: 1.5;
    }

    .add-item {
        position: relative;
        left: 10px;
        font-size: 20px;
        cursor: pointer;
        color: #275FA9;
        border-radius: 4px;

    }

    input:required:focus {
        border: 1px solid red;
        outline: none;
    }

    select:required:focus {
        border: 1px solid red;
        outline: none;
    }

</style>

@endsection


@section('content')

<div class="container-fluid">
    <div class="row justify-content-center align-items-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header color-header">
                    <h5 class="text-white" style="font-weight: bold;">{!! trans('Información del tutor') !!}</h5>
                </div>
                <form method="POST" action="" class="">
                    @csrf
                    <div class="card-body table-responsive">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control form-control-sm" name="maquina" style="text-align:center;" value="{{$user->u_name}}" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control form-control-sm" name="maquina" style="text-align:center;" value="{{$user->u_nickname}}" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control form-control-sm" name="maquina" style="text-align:center;" value="{{$user->parametric->p_text}}" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control form-control-sm" name="maquina" style="text-align:center;" value="{{$user->u_num_doc}}" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control form-control-sm" name="maquina" style="text-align:center;" value="{{$user->u_key_number}}" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control form-control-sm" name="maquina" style="text-align:center;" value="{{$user->email}}" disabled>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- /.card-body -->
                    <div class="card-body">
                        <div class="card-header color-header">
                            <h5 class="text-white" style="font-weight: bold;">{!! trans('Información bancaria') !!}</h5>
                        </div>
                        <div class="card-body table-responsive" style="border: 1px solid #cccccc;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>{!! trans('Banco') !!}</th>
                                        <th>{!! trans('Tipo de cuenta') !!}</th>
                                        <th>{!! trans('Número de cuenta') !!}</th>
                                        <th>{!! trans('Archivo') !!}</th>
                                        <th>{!! trans('Estado') !!}</th>
                                        <th>{!! trans('Acciones') !!}</th>
                                    </tr>

                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-header color-header">
                            <h5 class="text-white" style="font-weight: bold;">{!! trans('Información de Idiomas') !!}
                            </h5>
                        </div>
                        <div class="card-body table-responsive" style="border: 1px solid #cccccc;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>{!! trans('Idiomas') !!}</th>
                                        <th>{!! trans('Archivos') !!}</th>
                                        <th>{!! trans('Estado') !!}</th>
                                        <th>{!! trans('Acciones') !!}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-header color-header">
                            <h5 class="text-white" style="font-weight: bold;">{!! trans('Información del Sistema') !!}
                            </h5>
                        </div>
                        <div class="card-body table-responsive" style="border: 1px solid #cccccc;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>{!! trans('Sistema') !!}</th>
                                        <th>{!! trans('Archivos') !!}</th>
                                        <th>{!! trans('Estado') !!}</th>
                                        <th>{!! trans('Acciones') !!}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Sistema de información</td>
                                        <td>Excell</td>
                                        <td>Activo</td>
                                        <td>
                                            <a href="" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i>
                                                {!! trans('Aprobar') !!}</a>
                                            <a href="" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i>
                                                {!! trans('Rechazar') !!}</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Sistema educativo</td>
                                        <td>pdf</td>
                                        <td>Activo</td>
                                        <td>
                                            <a href="" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i>
                                                {!! trans('Aprobar') !!}</a>
                                            <a href="" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i>
                                                {!! trans('Rechazar') !!}</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-header color-header">
                            <h5 class="text-white" style="font-weight: bold;">{!! trans('Información de Temas
                                trabajables') !!}
                            </h5>
                        </div>
                        <div class="card-body table-responsive" style="border: 1px solid #cccccc;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>{!! trans('Temas') !!}</th>
                                        <th>{!! trans('Archivos') !!}</th>
                                        <th>{!! trans('Estado') !!}</th>
                                        <th>{!! trans('Acciones') !!}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Reforzamiento</td>
                                        <td>Excell</td>
                                        <td>Activo</td>
                                        <td>
                                            <a href="" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i>
                                                {!! trans('Aprobar') !!}</a>
                                            <a href="" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i>
                                                {!! trans('Rechazar') !!}</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Superstición</td>
                                        <td>pdf</td>
                                        <td>Activo</td>
                                        <td>
                                            <a href="" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i>
                                                {!! trans('Aprobar') !!}</a>
                                            <a href="" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i>
                                                {!! trans('Rechazar') !!}</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-header color-header">
                            <h5 class="text-white" style="font-weight: bold;">{!! trans('Información de Servicios') !!}
                            </h5>
                        </div>
                        <div class="card-body table-responsive" style="border: 1px solid #cccccc;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>{!! trans('Servicios') !!}</th>
                                        <th>{!! trans('Estado') !!}</th>
                                        <th>{!! trans('Acciones') !!}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Servicios de telecomunicaciones</td>
                                        <td>Activo</td>
                                        <td>
                                            <a href="" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i>
                                                {!! trans('Aprobar') !!}</a>
                                            <a href="" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i>
                                                {!! trans('Rechazar') !!}</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Servicios editoriales</td>
                                        <td>Activo</td>
                                        <td>
                                            <a href="" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i>
                                                {!! trans('Aprobar') !!}</a>
                                            <a href="" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i>
                                                {!! trans('Rechazar') !!}</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card-header color-header">
                            <h5 class="text-white" style="font-weight: bold;">{!! trans('Primera Linea') !!}
                            </h5>
                        </div>
                        <div class="card-body table-responsive" style="border: 1px solid #cccccc;">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>
                                            <div class="form-group">
                                                <div class="row">
                                                    <legend class="col-form-label col-sm-6 pt-0">Pertenece al fondo</legend>
                                                    <div class="col-sm-16">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="" id="" value="si" checked>
                                                            <label class="form-check-label" for="">
                                                                Si
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="" id="" value="no">
                                                            <label class="form-check-label" for="">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-warning btn-xs">Guardar</button>
                                                </div>
                                            </div>
                                            </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <a href="" class="btn btn-warning btn-xs">
                            {!! trans('Aprobar') !!}</a>
                        <a href="" class="btn btn-warning btn-xs">
                            {!! trans('Rechazar') !!}</a>
                        <a href="" class="btn btn-warning btn-xs">
                            {!! trans('No aceptado') !!}</a>
                        <a href="{{route('pre_registration.index_turors_list')}}" class="btn btn-warning btn-sm float-right">{!!
                            trans('Regresar') !!}</a>
                    </div>
            </div>
            <!-- /.card-body -->
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->
</div>
@endsection

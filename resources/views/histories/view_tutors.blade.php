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

                                <input type="text" class="form-control form-control-sm" name="maquina" style="text-align:center;" value="Pepito perez" disabled>

                            </div>
                            <div class="form-group col-md-4">

                                <input type="text" class="form-control form-control-sm" name="maquina" style="text-align:center;" value="perez" disabled>

                            </div>
                            <div class="form-group col-md-4">

                                <input type="text" class="form-control form-control-sm" name="maquina" style="text-align:center;" value="Cédula Ciudadania" disabled>

                            </div>
                            <div class="form-group col-md-4">

                                <input type="text" class="form-control form-control-sm" name="maquina" style="text-align:center;" value="123456789" disabled>

                            </div>
                            <div class="form-group col-md-4">

                                <input type="text" class="form-control form-control-sm" name="maquina" style="text-align:center;" value="311223344" disabled>

                            </div>
                            <div class="form-group col-md-4">

                                <input type="text" class="form-control form-control-sm" name="maquina" style="text-align:center;" value="tutors123@gmail.com" disabled>

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
                                <tbody>
                                    <tr>
                                        <th>{!! trans('Banco') !!}</th>
                                        <td><input type="text" name="id_bank" value="{{ old('id_bank') }}" maxlength="200" class="form-control form-control-sm" style="text-align:right;"> </td>
                                        <th>{!! trans('Tipo de cuenta') !!}</th>
                                        <td><input type="text" name="id_type_account" value="{{ old('id_type_account') }}" maxlength="200" class="form-control form-control-sm" style="text-align:right;"> </td>
                                    </tr>
                                    <tr>
                                        <th>{!! trans('Número de cuenta') !!}</th>
                                        <td><input type="text" name="t_b_number_account" value="{{ old('t_b_number_account') }}" maxlength="200" class="form-control form-control-sm" style="text-align:right;">
                                        </td>
                                        <th>{!! trans('Archivo') !!}</th>
                                        <td><input type="text" name="t_b_namefile" value="{{ old('t_b_namefile') }}" maxlength="200" class="form-control form-control-sm" style="text-align:right;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>{!! trans('Estado') !!}</th>
                                        <td><input type="text" min=0 step="0.01" name="t_b_state" value="{{ old('t_b_state') }}" maxlength="200" class="form-control form-control-sm" style="text-align:right;"> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card-header color-header">
                            <h5 class="text-white" style="font-weight: bold;">{!! trans('Idiomas') !!}</h5>
                        </div>
                        <div class="card-body table-responsive" style="border: 1px solid #cccccc;">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>{!! trans('Idiomas') !!}</th>
                                        <td><input type="text" name="id_language" value="{{ old('id_language') }}" maxlength="200" class="form-control form-control-sm" style="text-align:right;"> </td>
                                        <th>{!! trans('Archivos') !!}</th>
                                        <td><input type="text" name="l_t_namefile" value="{{ old('l_t_namefile') }}" maxlength="200" class="form-control form-control-sm" style="text-align:right;"> </td>
                                    </tr>
                                    <tr>
                                        <th>{!! trans('Estado') !!}</th>
                                        <td><input type="text" min=0 step="0.01" name="l_t_state" value="{{ old('l_t_state') }}" maxlength="200" class="form-control form-control-sm" style="text-align:right;"> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card-header color-header">
                            <h5 class="text-white" style="font-weight: bold;">{!! trans('Sistemas') !!}</h5>
                        </div>
                        <div class="card-body table-responsive" style="border: 1px solid #cccccc;">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>{!! trans('Sistema') !!}</th>
                                        <td><input type="text" name="id_system" value="{{ old('id_system') }}" maxlength="200" class="form-control form-control-sm" style="text-align:right;"> </td>
                                        <th>{!! trans('Archivos') !!}</th>
                                        <td><input type="text" name="t_s_namefile" value="{{ old('t_s_namefile') }}" maxlength="200" class="form-control form-control-sm" style="text-align:right;"> </td>
                                    </tr>
                                    <tr>
                                        <th>{!! trans('Estado') !!}</th>
                                        <td><input type="text" min=0 step="0.01" name="t_s_state" value="{{ old('t_s_state') }}" maxlength="200" class="form-control form-control-sm" style="text-align:right;"> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card-header color-header">
                            <h5 class="text-white" style="font-weight: bold;">{!! trans('Temas trabajables') !!}</h5>
                        </div>
                        <div class="card-body table-responsive" style="border: 1px solid #cccccc;">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>{!! trans('Temas') !!}</th>
                                        <td><input type="text" name="id_topic" value="{{ old('id_topic') }}" maxlength="200" class="form-control form-control-sm" style="text-align:right;"> </td>
                                        <th>{!! trans('Archivos') !!}</th>
                                        <td><input type="text" name="t_t_namefile" value="{{ old('t_t_namefile') }}" maxlength="200" class="form-control form-control-sm" style="text-align:right;"> </td>
                                    </tr>
                                    <tr>
                                        <th>{!! trans('Estado') !!}</th>
                                        <td><input type="text" name="t_t_state" value="{{ old('t_t_state') }}" maxlength="200" class="form-control form-control-sm" style="text-align:right;"> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card-header color-header">
                            <h5 class="text-white" style="font-weight: bold;">{!! trans('Servicios') !!}</h5>
                        </div>
                        <div class="card-body table-responsive" style="border: 1px solid #cccccc;">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>{!! trans('Servicios') !!}</th>
                                        <td><input type="text" name="id_service" value="{{ old('id_service') }}" maxlength="200" class="form-control form-control-sm" style="text-align:right;"> </td>
                                        <th>{!! trans('Estado') !!}</th>
                                        <td><input type="text" name="t_t_state" value="{{ old('t_t_state') }}" maxlength="200" class="form-control form-control-sm" style="text-align:right;"> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-body table-responsive">
                        <button type="submit" id="" class="btn btn-warning btn-sm">{!! trans('Aprobar') !!}</button>
                        <button type="submit" id="" class="btn btn-warning btn-sm">{!! trans('Rechazar') !!}</button>
                        <button type="submit" id="" class="btn btn-warning btn-sm">{!! trans('No aceptado') !!}</button>
                        <a href="" class="btn btn-warning btn-sm float-right">{!! trans('Regresar') !!}</a>


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
</div>
@endsection

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
        <div class="col-12">
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
                                <input type="hidden"  name="id_tutor" id="id_tutor" value="{{$user->id}}" disabled>
                                <input type="hidden"  name="id_tutor" id="line_first" value="{{$user->u_line_first}}" disabled>
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
                            <table id="tbl_info_bancaria" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Banco</th>
                                        <th>Tipo de cuenta</th>
                                        <th>N° de cuenta</th>
                                        <th>Archivo</th>
                                        <th>Estado</th>
                                        <th>Observaciones</th>
                                    </tr>

                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                    <div id="infoMessage-tutors_bank_details"></div>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-header color-header">
                            <h5 class="text-white" style="font-weight: bold;">{!! trans('Información de Idiomas') !!}
                            </h5>
                        </div>
                        <div class="card-body table-responsive" style="border: 1px solid #cccccc;">
                            <table id="tbl_info_language" class="table table-bordered">
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
                                <tfoot>
                                    <div id="infoMessage-language_tutors"></div>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-header color-header">
                            <h5 class="text-white" style="font-weight: bold;">{!! trans('Información del Sistema') !!}
                            </h5>
                        </div>
                        <div class="card-body table-responsive" style="border: 1px solid #cccccc;">
                            <table id="tbl_info_system" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>{!! trans('Sistema') !!}</th>
                                        <th>{!! trans('Archivos') !!}</th>
                                        <th>{!! trans('Estado') !!}</th>
                                        <th>{!! trans('Acciones') !!}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <div id="infoMessage-tutors_systems"></div>
                                </tfoot>
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
                            <table id="tbl_info_topic" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>{!! trans('Temas') !!}</th>
                                        <th>{!! trans('Archivos') !!}</th>
                                        <th>{!! trans('Estado') !!}</th>
                                        <th>{!! trans('Acciones') !!}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                    <div id="infoMessage-tutors_topics"></div>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-header color-header">
                            <h5 class="text-white" style="font-weight: bold;">{!! trans('Información de Servicios') !!}
                            </h5>
                        </div>
                        <div class="card-body table-responsive" style="border: 1px solid #cccccc;">
                            <table id="tbl_info_service" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>{!! trans('Servicios') !!}</th>
                                        <th>{!! trans('Estado') !!}</th>
                                        <th>{!! trans('Acciones') !!}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                    <div id="infoMessage-tutors_services"></div>
                                </tfoot>
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
                                                <div>
                                                    <div id="infoMessage-lineFirst"></div>
                                                </div>
                                                <div class="row">
                                                    <legend class="col-form-label col-sm-6 pt-0">Pertenece al fondo</legend>

                                                    <div class="col-sm-16" id="line_first">

                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="line" id="line1" value="1">
                                                            <label class="form-check-label" for="">
                                                                Sí
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="line" id="line0" value="0">
                                                            <label class="form-check-label" for="">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-10">
                                                    <a href="#" class="btn btn-warning btn-xs" onclick="saveFirtsLine()">Guardar</a>
                                                    {{-- <button class="btn btn-warning btn-xs" onclick="saveFirtsLine()">Guardar</button> --}}
                                                </div>
                                            </div>
                                            </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <a href="{{route('pre_registration.save_state_tutor', [$user->id, 2])}}" class="btn btn-warning btn-xs">
                            {!! trans('Aprobar') !!}</a>
                        <a href="{{route('pre_registration.save_state_tutor', [$user->id, 3])}}" class="btn btn-warning btn-xs">
                            {!! trans('Rechazar') !!}</a>
                        <a href="{{route('pre_registration.save_state_tutor', [$user->id, 4])}}" class="btn btn-warning btn-xs">
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
@section('script')
<script type="text/javascript">

    // variables GLOBALES
    var id = $('#id_tutor').val();

    $(document).ready(function() {
        traerCuentasBanc();
        getLanguageInfo();
        getSystemInfo();
        getTopicInfo();
        getServiceInfo();
        handleFirtsLine();
    });

    const handleFirtsLine = () => {
        var line = $('#line_first').val();
        if (line == 1) {
            $('#line1').attr('checked',  true)
        }else if(line == 0){
            $('#line0').attr('checked',  true)
        }
    }

    const saveFirtsLine = () => {
        if(confirm('¿Desea confirmar el registro?')==false )
        {return false;}

        var url ="{{route('pre_registration.save_line_first')}}";
        var checked = null
        $("input[type=radio]:checked").each(function(){
            checked = $(this).val();
        });
        var datos = {
            "_token": $('meta[name="csrf-token"]').attr('content'),
            "id": id,
            "value": checked,
        };

        $.ajax({
            type: 'GET',
            url: url,
            data: datos,
            success: function(respuesta) {
                handleFirtsLine();
                messageInfo('infoMessage-lineFirst', respuesta.message);
            }
        });
    }

    const handleState = (state) => {
        if (state == 0) {
            state_text ='Pendiente';
        }else if(state == 1){
            state_text ='Aprobado';
        }else{
            state_text ='Rechazado';
        }
        return state_text;
    }

    function adicionarCuenta(id_cuenta = 0, name_bank = '', type_acount = '',number_acount = '',file ='',state = '',observations = '') {
        var state_text ='';
        if (state == 0) {
            state_text ='Pendiente';
        }else if(state == 1){
            state_text ='Aprobado';
        }else{
            state_text ='Rechazado';
        }

        if (observations == null) {
            observations = '';
        }

        var cell = `
        <tr>
            <td>
                `+id_cuenta+`
            </td>
            <td>
                `+name_bank+`
            </td>
            <td>
                `+type_acount+`
            </td>
            <td style="text-align: right;">
                `+number_acount+`
            </td>
            <td>
                `+file+`
            </td>
            <td>
                `+state_text+`
            </td>
            <td>
                <textarea class="form-control form-control-sm" name="observaciones" id="observaciones_`+id_cuenta+`">`+observations+`</textarea>
            </td>
            ${state == 0 &&`
                <td>
                    <a href="#" onClick="ProcessRequest(`+id_cuenta+`,1,'tutors_bank_details')" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i> {!! trans('Aprobar') !!}</a>
                    <a href="#" onClick="ProcessRequest(`+id_cuenta+`,2,'tutors_bank_details')" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i> {!! trans('Rechazar') !!}</a>
                </td>
            `}

        </tr>
        `;
        $("#tbl_info_bancaria tbody").append(cell);
    }

    //pintar en tabla informacion de lenaguaje
    const paintInfoLanguage = (data) => {
        data.forEach(elem => {
            state_text = handleState(elem.state)
            $("#tbl_info_language tbody").append(`
                <tr>
                    <td>${elem.language}</td>
                    <td>${elem.file}</td>
                    <td>${state_text}</td>
                    ${elem.state == 0 &&`
                        <td>
                            <a href="#" onClick="ProcessRequest(${elem.id}, 1, 'language_tutors')" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i> {!! trans('Aprobar') !!}</a>
                            <a href="#" onClick="ProcessRequest(${elem.id}, 2, 'language_tutors')" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i> {!! trans('Rechazar') !!}</a>
                        </td>
                    `}
                </tr>
            `)
        })
    }

    //pintar en tabla informacion de sistema
    const paintInfoSystem = (data) => {
        data.forEach(elem => {
            state_text = handleState(elem.state)
            $("#tbl_info_system tbody").append(`
                <tr>
                    <td>${elem.system}</td>
                    <td>${elem.file}</td>
                    <td>${state_text}</td>
                    ${elem.state == 0 &&`
                        <td>
                            <a href="#" onClick="ProcessRequest(${elem.id}, 1, 'tutors_systems')" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i> {!! trans('Aprobar') !!}</a>
                            <a href="#" onClick="ProcessRequest(${elem.id}, 2, 'tutors_systems')" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i> {!! trans('Rechazar') !!}</a>
                        </td>
                    `}
                </tr>
            `)
        })
    }

    //pintar en tabla informacion de trabajos
    const paintInfoTopic = (data) => {
        data.forEach(elem => {
            state_text = handleState(elem.state)
            $("#tbl_info_topic tbody").append(`
                <tr>
                    <td>${elem.topic}</td>
                    <td>${elem.file}</td>
                    <td>${state_text}</td>
                    ${elem.state == 0 &&`
                        <td>
                            <a href="#" onClick="ProcessRequest(${elem.id}, 1, 'tutors_topics')" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i> {!! trans('Aprobar') !!}</a>
                            <a href="#" onClick="ProcessRequest(${elem.id}, 2, 'tutors_topics')" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i> {!! trans('Rechazar') !!}</a>
                        </td>
                    `}
                </tr>
            `)
        })
    }

     //pintar en tabla informacion de servicio
     const paintInfoService = (data) => {
        data.forEach(elem => {
            state_text = handleState(elem.state)
            $("#tbl_info_service tbody").append(`
                <tr>
                    <td>${elem.service}</td>
                    <td>${state_text}</td>
                    ${elem.state == 0 &&`
                        <td>
                            <a href="#" onClick="ProcessRequest(${elem.id}, 1, 'tutors_services')" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i> {!! trans('Aprobar') !!}</a>
                            <a href="#" onClick="ProcessRequest(${elem.id}, 2, 'tutors_services')" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i> {!! trans('Rechazar') !!}</a>
                        </td>
                    `}
                </tr>
            `)
        })
    }

    function traerCuentasBanc(){
        var url ="{{route('pre_registration.get_info_acount_bank')}}";
        var datos = {
        "_token": $('meta[name="csrf-token"]').attr('content'),
        "id_tutor": id,
        };

        $.ajax({
        type: 'GET',
        url: url,
        data: datos,
        success: function(respuesta) {

            $("#tbl_info_bancaria tbody").empty();
            $.each(respuesta, function(index, elemento) {
                adicionarCuenta(elemento.id,elemento.name_bank ?? '', elemento.type_acount ?? '',elemento.t_b_number_account ?? '',elemento.t_b_namefile ?? '',elemento.t_b_state, elemento.t_b_observations)
                });
                colleccionCuentas = respuesta;
            }
        });
    }

    // traer informacion de idiomas
    const getLanguageInfo = () => {
        var url="{{route('pre_registration.get_info_language')}}";
        var datos = {
        "_token": $('meta[name="csrf-token"]').attr('content'),
        "id_tutor": id,
        };

        $.ajax({
            type: 'GET',
            url: url,
            data: datos,
            success: function(respuesta) {
                $("#tbl_info_language tbody").empty();
                paintInfoLanguage(respuesta.data)
            }
        });
    }

    // traer informacion de sistema
    const getSystemInfo = () => {
        var url="{{route('pre_registration.get_info_system')}}";
        var datos = {
            "_token": $('meta[name="csrf-token"]').attr('content'),
            "id_tutor": id,
        };

        $.ajax({
            type: 'GET',
            url: url,
            data: datos,
            success: function(respuesta) {
                $("#tbl_info_system tbody").empty();
                paintInfoSystem(respuesta.data)
            }
        });
    }

    // traer informacion de temas trabajables
    const getTopicInfo = () => {
        var url="{{route('pre_registration.get_info_topic')}}";
        var datos = {
            "_token": $('meta[name="csrf-token"]').attr('content'),
            "id_tutor": id,
        };

        $.ajax({
            type: 'GET',
            url: url,
            data: datos,
            success: function(respuesta) {
                $("#tbl_info_topic tbody").empty();
                paintInfoTopic(respuesta.data)
            }
        });
    }

     // traer informacion de servicios
     const getServiceInfo = () => {
        var url="{{route('pre_registration.get_info_service')}}";
        var datos = {
            "_token": $('meta[name="csrf-token"]').attr('content'),
            "id_tutor": id,
        };

        $.ajax({
            type: 'GET',
            url: url,
            data: datos,
            success: function(respuesta) {
                $("#tbl_info_service tbody").empty();
                paintInfoService(respuesta.data)
            }
        });
    }


    function ProcessRequest(id_cuenta,value,table) {

        if(confirm('¿Desea confirmar el registro?')==false )
        {return false;}

        var observation = $('#observaciones_'+id_cuenta).val();
        var url="{{route('pre_registration.process.request')}}";
        var datos = {
            "_token": $('meta[name="csrf-token"]').attr('content'),
            "id_cuenta":    id_cuenta,
            "value":        value,
            "table":        table,
            "observation":  observation,
        };

        $.ajax({
            type: 'GET',
            url: url,
            data: datos,
            success: function(respuesta) {
                console.log("res", respuesta);
                traerCuentasBanc();
                getLanguageInfo();
                getSystemInfo();
                getTopicInfo();
                getServiceInfo();
                messageInfo('infoMessage-'+table, respuesta.message);
            }
        });
    }

    const messageInfo = (id, message)  => {
        $('#'+id).html(
            `<div class="alert alert-success alert-block shadow">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>${message}</strong>
            </div>`
        )
    }

</script>
@endsection

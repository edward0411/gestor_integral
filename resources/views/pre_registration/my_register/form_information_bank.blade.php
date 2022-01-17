@extends('layouts.master_panel')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Información bancaria') !!}</h5>
                </div>
                <!-- /.card-header -->
                <form role="form" method="POST" id="frm_store_scount_bank" action="{{route('pre_registration.acount_bank.store')}}"  enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="id_bank">{!! trans('Banco') !!}</label>
                                <select name="id_bank" id="id_bank" class="form-control form-control-sm" required>
                                    <option value="" selected>{!! trans('Seleccione...') !!}</option>
                                    @foreach($banks as $item)
                                      <option value="{{$item->id}}">{{$item->p_text}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="id_type_account">{!! trans('Tipo de cuenta') !!}</label>
                                <select name="id_type_account" id="id_type_account" class="form-control form-control-sm" required>
                                    <option value="" selected>{!! trans('Seleccione...') !!}</option>
                                    @foreach($type_acounts as $item)
                                        <option value="{{$item->id}}">{{$item->p_text}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="t_b_number_account">{!! trans('Número de cuenta') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="t_b_number_account" name="t_b_number_account" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="t_b_namefile">{!! trans('Archivo') !!}</label>
                                <input type="file" class="form-control form-control-sm" id="t_b_namefile" name="t_b_namefile">
                            </div>
                        </div>
                        <input type="hidden" name="id_acount_bank" id="id_acount_bank" value="0">
                        <button type="submit" id="btn_cuenta_guardar" class="btn btn-warning btn-sm"> {!! trans('Guardar') !!}</button>
                        <a href="{{route('pre_registration.index_registration')}}" class="btn btn-warning btn-sm float-right">{!! trans('Regresar') !!}</a>
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table id="tbl_info_bancaria" class="table table-hover mx-auto w-auto table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Banco</th>
                                        <th>Tipo de cuenta</th>
                                        <th>N° de cuenta</th>
                                        <th>Archivo</th>
                                        <th>Estado</th>
                                        <th>Observaciones</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                                <tfoot>
                                    <div id="info_bancaria_mensaje"></div>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    var colleccionCuentas = "";

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
                `+observations+`
            </td>
            <td>
                <button type="button" class="btn btn-sm btn-primary" onclick="EditCell_acount(`+ id_cuenta +`)">Editar</button>
                <button type="button" class="btn btn-sm btn-danger" onclick="deletesCell_relacion(`+id_cuenta+`)">Eliminar</button>
            </td>
        </tr>
        `;
        $("#tbl_info_bancaria tbody").append(cell);
    }


    function traerCuentasBanc(){

        var url="{{route('pre_registration.get_info_acount_bank')}}";
        var datos = {
        "_token": $('meta[name="csrf-token"]').attr('content')
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

    function EditCell_acount(id) {

        datos = $.grep(colleccionCuentas, function(n, i) {
            return n.id === id;
        });

        $('#id_acount_bank').val(id);
        $('#id_bank').val(datos[0].id_bank);
        $('#id_type_account').val(datos[0].id_type_account);
        $('#t_b_number_account').val(datos[0].t_b_number_account);


    }

    function deletesCell_relacion(id_account) {

        if(confirm('¿Desea eliminar el registro?')==false )
        {return false;}

        var url = `{{url('/panel/administrativo/registration/acount_bank/delete/${id_account}')}}`;
        var datos = {
            "_token": $('meta[name="csrf-token"]').attr('content'),
        };

        $.ajax({
            type: 'POST',
            url: url,
            data: datos,
            success: function(respuesta) {
                $.each(respuesta, function(index, elemento) {
                    console.log("res", respuesta);
                    traerCuentasBanc();
                        $('#info_bancaria_mensaje').html(
                            `<div class="alert alert-success alert-block shadow">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Se ha eliminado el registro</strong>
                            </div>`)
                });
            }
        });
    }

    $(document).ready(function() {
        traerCuentasBanc();
        $('#frm_store_scount_bank').ajaxForm({
            dataType: 'json',
            clearForm: true,
            beforeSubmit: function(data) {
                $('#info_bancaria_mensaje').emtpy;
                $('#btn_cuenta_guardar').prop('disabled',true);
            },
            success: function(data) {
                processRespuesta('info_bancaria_mensaje','success')
                traerCuentasBanc();
                $('#btn_cuenta_guardar').prop('disabled',false);
            },
            error: function(data) {
                processError(data, 'info_bancaria_mensaje')
                $('#btn_cuenta_guardar').prop('disabled',false);
            }
        });
    });

    function processRespuesta(div_mensaje, tipoalerta) {

        $('#'+div_mensaje).html(
            `<div class="alert alert-`+tipoalerta+` alert-block shadow">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Se ha guardado la información</strong>
            </div>`
        )
    }
    var dataerror

    function processError(data, div_mensaje) {
        errores= "";
        dataerror = data;
        $.each(data.responseJSON.errors, function(index, elemento) {
            errores += "<li>"+elemento+"</li>"
        })
        if(errores==""){
            errores = data.responseJSON.message;
        }
        $('#'+div_mensaje).html(
            `<div class="alert alert-danger alert-block shadow">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Error al guardar:</strong>
                    `+errores+`</br>
            </div>`
        )
    }
</script>
@endsection

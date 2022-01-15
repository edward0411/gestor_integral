@extends('layouts.master_panel')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Crear información de idiomas') !!}</h5>
                </div>
                <!-- /.card-header -->
                <form method="POST" id="form" action="{{route('pre_registration.acount_bank.store')}}"  enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                                <label for="id_language">{!! trans('Idiomas') !!}</label>
                                <select name="id_language " class="form-control form-control-sm" id="id_language" required>
                                    <option value="" selected>{!! trans('Seleccione...') !!}</option>

                                    <option value="" ></option>

                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="l_t_namefile">{!! trans('Archivo') !!}</label>
                                <input type="file" class="form-control form-control-sm" id="l_t_namefile" name="l_t_namefile" required>
                    </div>
                        <button type="submit" id="save" class="btn btn-warning btn-sm"> {!! trans('Guardar') !!}</button>
                        <a href="{{route('pre_registration.index_registration')}}" class="btn btn-warning btn-sm float-right">{!! trans('Regresar') !!}</a>
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table id="table" class="table table-hover mx-auto w-auto table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>{!! trans('Idiomas') !!}</th>
                                        <th>{!! trans('Archivos') !!}</th>
                                        <th>{!! trans('Estado') !!}</th>
                                        <th>{!! trans('Observaciones') !!}</th>
                                        <th>{!! trans('Acciones') !!}</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                                <tfoot>
                                    <div id="message"></div>
                                </tfoot>
                            </table>
                        </div>
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
@section('script')
    <script type="text/javascript">

        // VARIABLES GLOBALES
        var id = null;
        var collection = "";

        $(document).ready(function() {
            getInfo();
            handleReady();
        });

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

        const handleReady = () => {
            $('#form').ajaxForm({
                dataType: 'json',
                clearForm: true,
                beforeSubmit: function(data) {
                    $('#message').emtpy;
                    $('#save').prop('disabled',true);
                },
                success: function(data) {
                    processRespuesta('message','success')
                    getInfo();
                    $('#save').prop('disabled',false);
                },
                error: function(data) {
                    processError(data, 'message')
                    $('#save').prop('disabled',false);
                }
            });
        }

        //pintar en tabla
        const paint = (data) => {
            data.forEach(elem => {
                state_text = handleState(elem.state)
                $("#table tbody").append(`
                    <tr>
                        <td>${elem.id}</td>
                        <td>${elem.language}</td>
                        <td>${elem.file}</td>
                        <td>${state_text}</td>
                        <td>
                            <textarea class="form-control form-control-sm" name="observaciones" id="observaciones_${elem.id}_language_tutors">${elem.observation ? elem.observation:'' }</textarea>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary" onclick="handleEdit(${elem.id})">Editar</button>
                            <button type="button" class="btn btn-sm btn-danger" onclick="handleDelete(${elem.id})">Eliminar</button>
                        </td>
                    </tr>
                `)
            })
        }

        const getInfo = () => {
            var url="{{route('pre_registration.get_info_language')}}";
            var datos = {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                "id_tutor": id ? id:null,
            };

            $.ajax({
                type: 'GET',
                url: url,
                data: datos,
                success: function(respuesta) {
                    $("#table tbody").empty();
                    paint(respuesta.data)
                    collection = respuesta;
                    console.log(console.log(respuesta);     }
            });
        }

        const handleEdit = (id) =>  {

            datos = $.grep(collection, function(n, i) {
                return n.id === id;
            });

            $('#id_acount_bank').val(id);
            $('#id_bank').val(datos[0].id_bank);
            $('#id_type_account').val(datos[0].id_type_account);
            $('#t_b_number_account').val(datos[0].t_b_number_account);

        }

        const handleDelete = (id) => {

            if(confirm('¿Desea eliminar el registro?')==false )
            {return false;}

            var url="";
            var datos = {
            "_token": $('meta[name="csrf-token"]').attr('content'),
            "id":id
            };

            $.ajax({
                type: 'GET',
                url: url,
                data: datos,
                success: function(respuesta) {
                    $.each(respuesta, function(index, elemento) {
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

    </script>
@endsection

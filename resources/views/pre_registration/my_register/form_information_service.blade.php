@extends('layouts.master_panel')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Crear información de servicios') !!}</h5>
                </div>
                <!-- /.card-header -->
                <form method="POST" id="form" action="{{route('pre_registration.service.store')}}"  enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="id_service">{!! trans('Servicios') !!}</label>
                                <select name="id_service" class="form-control form-control-sm" id="id_service" required>
                                    <option value="" selected>{!! trans('Seleccione...') !!}</option>
                                    @foreach($services as $service)
                                        <option value="{{$service->id}}" >{{$service->p_text}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="id" id="id" value="">
                        <button type="submit" id="" class="btn btn-warning btn-sm"> {!! trans('Guardar') !!}</button>
                        <a href="{{route('pre_registration.index_registration')}}" class="btn btn-warning btn-sm float-right">{!! trans('Regresar') !!}</a>
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table id="table" class="table table-hover mx-auto w-auto table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>{!! trans('Servicio') !!}</th>
                                        <th>{!! trans('Estado') !!}</th>
                                        <th>{!! trans('Observaciones') !!}</th>
                                        <th>{!! trans('Acciones') !!}</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                                <tfoot>
                                    <div id="message-services"></div>
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

    {{-- js utiles --}}
    <script type="text/javascript" src="{{ asset("js/events/util.js") }}"></script>

    <script type="text/javascript">

        // VARIABLES GLOBALES
        var id = null;
        var collection = "";
        var dataError


        $(document).ready(function() {
            getInfo();
            handleReady();
        });

        const handleReady = () => {
            $('#form').ajaxForm({
                dataType: 'json',
                clearForm: true,
                beforeSubmit: function(data) {
                    $('#message-services').emtpy;
                    $('#save').prop('disabled',true);
                },
                success: function(data) {
                    console.log("res", data);
                    processResponse('message-services','success', data.message)
                    getInfo();
                    $('#save').prop('disabled',false);
                },
                error: function(data) {
                    processError(data, 'message-services')
                    $('#save').prop('disabled',false);
                }
            });
        }

        function processError(data, div) {
            errors = "";
            dataError = data;
            $.each(data.responseJSON.errors, function(index, elemento) {
                errors += "<li>"+elemento+"</li>"
            })
            if(errors==""){
                errors = data.responseJSON.message;
            }
            $('#'+div).html(
                `<div class="alert alert-danger alert-block shadow">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Error al guardar:</strong>
                        ${errors}</br>
                </div>`
            )
        }

        //pintar en tabla
        const paint = (data) => {
            data.forEach(elem => {
                state_text = handleState(elem.state)
                $("#table tbody").append(`
                    <tr>
                        <td>${elem.id}</td>
                        <td>${elem.service}</td>
                        <td>${state_text}</td>
                        <td>${elem.observation ? elem.observation:'' }</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary" onclick="handleEdit(${elem.id})">Editar</button>
                            <button type="button" class="btn btn-sm btn-danger" onclick="handleDelete(${elem.id})">Eliminar</button>
                        </td>
                    </tr>
                `)
            })
        }

        const getInfo = () => {
            var url = "{{route('pre_registration.get_info_service')}}";
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
                    collection = respuesta.data;
                }
            });
        }

        const handleEdit = (id) =>  {
            data = $.grep(collection, function(n, i) {
                return n.id === id;
            });
            $('#id').val(id);
            $('#id_service').val(data[0].id_service);
        }

        const handleDelete = (id_service) => {

            if(confirm('¿Desea eliminar el registro?')==false )
            {return false;}

            var url = `{{url('/panel/administrativo/registration/service/delete/${id_service}')}}`;
            var datos = {
                "_token": $('meta[name="csrf-token"]').attr('content'),
            };

            $.ajax({
                type: 'POST',
                url: url,
                data: datos,
                success: function(respuesta) {
                    $.each(respuesta, function(index, elemento) {
                        getInfo();
                        processResponse('message-services','success', respuesta.message)
                    });
                }
            });
            }

    </script>
@endsection

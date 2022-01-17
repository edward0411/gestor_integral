@extends('layouts.master_panel')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Crear información de temas trabajables') !!}</h5>
                </div>
                <!-- /.card-header -->
                <form method="POST" id="form" action="{{route('pre_registration.topic.store')}}"  enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="id_area">{!! trans('Áreas') !!}</label>
                                <select name="id_area" id="id_area" class="form-control form-control-sm" onchange="fill_subjects()"required>
                                    <option value="" selected>{!! trans('Seleccione...') !!}</option>
                                    @foreach($areas as $area)
                                        <option value="{{$area->id}}">{{$area->a_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="id_subject">{!! trans('Materias') !!}</label>
                                <select name="id_subject" id="id_subject" class="form-control form-control-sm" onchange="fill_topics()" required>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="id_topic">{!! trans('Temas') !!}</label>
                                <select name="id_topic" id="id_topic" class="form-control form-control-sm" required>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="file">{!! trans('Archivo') !!}</label>
                                <input type="file" class="form-control form-control-sm" id="file" name="file">
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
                                        <th>{!! trans('Tema') !!}</th>
                                        <th>{!! trans('Archivo') !!}</th>
                                        <th>{!! trans('Estado') !!}</th>
                                        <th>{!! trans('Observaciones') !!}</th>
                                        <th>{!! trans('Acciones') !!}</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                                <tfoot>
                                    <div id="message-topic"></div>
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
<script type="text/javascript" src="{{ asset("js/events/util.js") }}"></script>

<script type="text/javascript">

    var subjects = [
        @foreach($subjects as $item)
            {  "id_area": "{{$item->id_area}}",
               "id_subject": "{{$item->id}}",
               "subjects_name": "{{$item->s_name}}",
            },
        @endforeach
    ];
    var topics = [
        @foreach($topics as $item)
            {   "id_subject": "{{$item->id_subject}}",
                "id_topic": "{{$item->id}}",
                "topics_name": "{{$item->t_name}}",
            },
        @endforeach
    ];

    function fill_subjects(){

        var selectedarea = $("#id_area").children("option:selected").val();
        nuevo = $.grep(subjects, function(n, i) {
            return n.id_area === selectedarea
        });

        $('#id_subject').empty()
        $('#id_subject').append($('<option></option>').val('').html('Seleccione...'));
        $.each(nuevo, function(key, value) {
            $('#id_subject').append($('<option></option>').val(value.id_subject).html(value.subjects_name));
        });
    }

    function fill_topics(){
        var selectedSubject = $("#id_subject").children("option:selected").val();
        nuevo = $.grep(topics, function(n, i) {
            return n.id_subject === selectedSubject
        });

        $('#id_topic').empty()
        $('#id_topic').append($('<option></option>').val('').html('Seleccione...'));
        $.each(nuevo, function(key, value) {
            $('#id_topic').append($('<option></option>').val(value.id_topic).html(value.topics_name));
        });
    }

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
                $('#message-topic').emtpy;
                $('#save').prop('disabled',true);
            },
            success: function(data) {
                console.log("res", data);
                processResponse('message-topic','success', data.message)
                getInfo();
                $('#save').prop('disabled',false);
            },
            error: function(data) {
                processError(data, 'message-topic')
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
                    <td>${elem.area}/${elem.subject}/${elem.topic}</td>
                    <td>${elem.file ? elem.file:'no posee archivo...'}</td>
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
        var url = "{{route('pre_registration.get_info_topic')}}";
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
                console.log(respuesta)
            }
        });
    }

    const handleEdit = (id) =>  {
        data = $.grep(collection, function(n, i) {
            return n.id === id;
        });
        $('#id').val(id);
        $('#id_topic').val(data[0].id_topic);
        $('#id_area').val(data[0].id_area);
        $('#id_subject').val(data[0].id_subject);
    }

    const handleDelete = (id_topic) => {

        if(confirm('¿Desea eliminar el registro?')==false )
        {return false;}

        var url = `{{url('/panel/administrativo/registration/topic/delete/${id_topic}')}}`;
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
                    processResponse('message-topic','success', respuesta.message)
                });
            }
        });
    }


</script>

@endsection

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
                <form method="POST" action="">
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
                                <label for="t_b_namefile">{!! trans('Archivo') !!}</label>
                                <input type="file" class="form-control form-control-sm" id="t_b_namefile" name="t_b_namefile" required>
                            </div>
                        </div>
                        <button type="submit" id="" class="btn btn-warning btn-sm"> {!! trans('Guardar') !!}</button>
                        <a href="{{route('pre_registration.index_registration')}}" class="btn btn-warning btn-sm float-right">{!! trans('Regresar') !!}</a>
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

</script>

@endsection
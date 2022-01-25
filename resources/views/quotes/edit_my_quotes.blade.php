@extends('layouts.master_panel')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-12">
            <div class="card ">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Editar cotización') !!}</h5>
                </div>
                <!-- /.card-header -->
                <form method="POST" action="">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="deliver_date">{!! trans('Fecha de entrega') !!}</label>
                                <input type="date" class="form-control form-control-sm" id="deliver_date" name="deliver_date" value="" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="id_service">{!! trans('Tipo de servicio') !!}</label>
                                <select name="id_service" id="id_service" class="form-control form-control-sm">
                                    <option value="">Seleccione...</option>
                                    @foreach($services as $service)
                                    <option value="{{$service->id}}">{{$service->p_text}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-header color-header">
                            <h5 class="text-white" style="font-weight: bold;">{!! trans('Preguntas') !!}</h5>
                        </div>
                        <div class="card-body" style="border: 1px solid #cccccc;">
                            <div class="rows">
                                <div class="form-group col-md-6">
                                    <label for="u_key_number">{!! trans('Pregunta 1') !!}</label>
                                    <input type="text" class="form-control form-control-sm" id="u_key_number" name="u_key_number " value="" required>
                                </div>
                                <div class="form-group col-md-6 float-right">
                                    <label for="u_key_number">{!! trans('Respuesta 1') !!}</label>
                                    <input type="text" class="form-control form-control-sm" id="u_key_number" name="u_key_number " value="" required>
                                </div>
                            </div><br><br>
                            <div class="rows">
                                <div class="form-group col-md-6">
                                    <label for="u_key_number">{!! trans('Pregunta 2') !!}</label>
                                    <input type="text" class="form-control form-control-sm" id="u_key_number" name="u_key_number " value="" required>
                                </div>
                                <div class="form-group col-md-6 float-right">
                                    <label for="u_key_number">{!! trans('Respuesta 2') !!}</label>
                                    <input type="text" class="form-control form-control-sm" id="u_key_number" name="u_key_number " value="" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="accordion md-accordion" id="accordionEx1" role="tablist" aria-multiselectable="true">
                            <!-- Accordion card -->
                            <!-- Idiomas -->
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header" role="tab" id="headingTwo1">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseTwo1" aria-expanded="false" aria-controls="collapseTwo1">
                                        <h5 class="mb-0">
                                            Idiomas <i class="icofont-arrow-down float-right"></i>
                                        </h5>
                                    </a>
                                </div>
                                <div id="collapseTwo1" class="collapse" role="tabpanel" aria-labelledby="headingTwo1" data-parent="#accordionEx1">
                                    <!-- Idiomas -->
                                    <div class="card-body">
                                        <div class="card-header color-header">
                                            <h5 class="text-white" style="font-weight: bold;">{!! trans('Idiomas') !!}</h5>
                                        </div>
                                        <div class="card-body" style="border: 1px solid #cccccc;">
                                            <label for="descripcion">{!! trans('Agregar Idioma') !!}</label> <i id="addElementLanguage" data-count="0" class="fas fa-plus-square add-item"></i><br>
                                            <table class="table table-bordered" id="tblLanguage">
                                                <thead class="bg-warning text-center">
                                                    <tr>
                                                        <th class="text-white" style="width: 90%;">{!! trans('Idiomas') !!}</th>
                                                        <th class="text-white" style="width: 10%;">{!! trans('Acción') !!}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Idiomas -->
                            <!-- Sistemas -->
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header" role="tab" id="headingTwo2">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseTwo21" aria-expanded="false" aria-controls="collapseTwo21">
                                        <h5 class="mb-0">
                                            Sistemas <i class="icofont-arrow-down float-right"></i>
                                        </h5>
                                    </a>
                                </div>
                                <div id="collapseTwo21" class="collapse" role="tabpanel" aria-labelledby="headingTwo21" data-parent="#accordionEx1">
                                    <div class="card-body">
                                        <div class="card-header color-header">
                                            <h5 class="text-white" style="font-weight: bold;">{!! trans('Sistemas') !!}</h5>
                                        </div>
                                        <div class="card-body" style="border: 1px solid #cccccc;">
                                            <label for="descripcion">{!! trans('Agregar Sistema') !!}</label> <i id="addElementSystem" data-count="0" class="fas fa-plus-square add-item"></i><br>
                                            <table class="table table-bordered" id="tblSystem">
                                                <thead class="bg-warning text-center">
                                                    <tr>
                                                        <th class="text-white" style="width: 90%;">{!! trans('Sistemas') !!}</th>
                                                        <th class="text-white" style="width: 10%;">{!! trans('Acción') !!}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Sistemas -->
                            <!-- Temas -->
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header" role="tab" id="headingThree31">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseThree31" aria-expanded="false" aria-controls="collapseThree31">
                                        <h5 class="mb-0">
                                            Temas <i class="icofont-arrow-down float-right"></i>
                                        </h5>
                                    </a>
                                </div>
                                <div id="collapseThree31" class="collapse" role="tabpanel" aria-labelledby="headingThree31" data-parent="#accordionEx1">
                                    <!-- Temas -->
                                    <div class="card-body">
                                        <div class="card-header color-header">
                                            <h5 class="text-white" style="font-weight: bold;">{!! trans('Temas') !!}</h5>
                                        </div>
                                        <div class="card-body" style="border: 1px solid #cccccc;">
                                            <label for="descripcion">{!! trans('Agregar Tema') !!}</label> <i id="addElementSubject" data-count="0" class="fas fa-plus-square add-item"></i><br>
                                            <table class="table table-bordered" id="tblSubject">
                                                <thead class="bg-warning text-center">
                                                    <tr>
                                                        <th class="text-white" style="width: 30%;">{!! trans('Áreas') !!}</th>
                                                        <th class="text-white" style="width: 30%;">{!! trans('Materias') !!}</th>
                                                        <th class="text-white" style="width: 30%;">{!! trans('Temas') !!}</th>
                                                        <th class="text-white" style="width: 10%;">{!! trans('Acción') !!}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Temas -->
                            <!-- Archivos -->
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header" role="tab" id="headingFour41">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseFour41" aria-expanded="false" aria-controls="collapseFour41">
                                        <h5 class="mb-0">
                                            Archivos <i class="icofont-arrow-down float-right"></i>
                                        </h5>
                                    </a>
                                </div>
                                <div id="collapseFour41" class="collapse" role="tabpanel" aria-labelledby="headingFour41" data-parent="#accordionEx1">
                                    <div class="card-body">
                                        <div class="card-header color-header">
                                            <h5 class="text-white" style="font-weight: bold;">{!! trans('Archivos') !!}</h5>
                                        </div>
                                        <div class="card-body" style="border: 1px solid #cccccc;">
                                            <label for="descripcion">{!! trans('Agregar Archivo') !!}</label> <i id="addElementFile" data-count="0" class="fas fa-plus-square add-item"></i><br>
                                            <table class="table table-bordered" id="tblFile">
                                                <thead class="bg-warning text-center">
                                                    <tr>
                                                        <th class="text-white" style="width: 90%;">{!! trans('Archivos') !!}</th>
                                                        <th class="text-white" style="width: 10%;">{!! trans('Acción') !!}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <!-- /Accordion card -->
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="observations">{!! trans('Observaciones') !!}</label>
                                <textarea name="observations" id="" class="form-control form-control-sm" rows="2"></textarea>
                            </div>
                        </div>
                    </div>
                       <!-- /.card-body -->
                    <div class="card-body">
                        <button type="submit" id="" class="btn btn-warning btn-sm"> {!! trans('Guardar') !!}</button>
                        <a href="{{route('quotes.myQuotes')}}" class="btn btn-warning btn-sm float-right">{!! trans('Regresar')
                            !!}</a>
                    </div>
                    <!-- /.card-body -->
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">

$(document).ready(function () {
$("#addElementLanguage").click(function () {addLanguage()});
$("#addElementSystem").click(function () {addSystem()});
$("#addElementSubject").click(function () {addSubject()});
$("#addElementFile").click(function () {addFile()});

});

function deletesCell(e){
    e.closest('tr').remove();
  }

function addLanguage()
  {
      var total = $("#addElementLanguage").attr('data-count');
      var cell =  `
        <tr>
            <td>
              <div class="form-group">
                <select name="id_language" id="id_language" class="form-control form-control-sm">
                                    <option value="">Seleccione idioma</option>
                                    @foreach($languages as $item)
                                        <option value="{{$item->id}}">{{$item->p_text}}</option>
                                    @endforeach
                                </select>
              </div>
            </td>
            <td>
              <button type="button" class="btn btn-danger btn-sm  delete-cell" onclick="deletesCell(this)">{!! trans('Eliminar') !!}</button>
            </td>
          </tr>
       `;
       total ++;
      $("#addElementLanguage").attr('data-count',total);
      $("#tblLanguage tbody").append(cell);
      $('.select2').select2();
  }

  function addSystem()
  {
      var total = $("#addElementSystem").attr('data-count');
      var cell =  `

        <tr>
            <td>
              <div class="form-group">
                <select name="id_system" id="id_system" class="form-control form-control-sm">
                                    <option value="">Seleccione sistema</option>
                                @foreach($list_systems as $systems)
                                    <option value="{{$systems->id}}" >{{$systems->p_text}}</option>
                                    @endforeach
                                </select>
              </div>
            </td>
            <td>
              <button type="button" class="btn btn-danger btn-sm  delete-cell" onclick="deletesCell(this)">{!! trans('Eliminar') !!}</button>
            </td>
          </tr>
       `;
       total ++;
      $("#addElementSystem").attr('data-count',total);
      $("#tblSystem tbody").append(cell);

      $('.select2').select2();

  }

  function addSubject()
  {
      var total = $("#addElementSubject").attr('data-count');
      var cell =  `
        <tr>
            <td>
              <div class="form-group">
                <select name="id_area" id="id_area" class="form-control form-control-sm" onchange="fill_subjects()" required>
                                    <option value="">Seleccione área</option>
                                      @foreach($areas as $area)
                                        <option value="{{$area->id}}">{{$area->a_name}}</option>
                                    @endforeach
                                </select>
              </div>
            </td>
            <td>
            <div class="form-group">
                <select name="id_subject" id="id_subject" class="form-control form-control-sm" onchange="fill_topics()" required></select>
              </div>
            </td>
            <td>
            <div class="form-group">
                <select name="id_topic" id="id_topic" class="form-control form-control-sm" required></select>
              </div>
            </td>
            <td>
              <button type="button" class="btn btn-danger btn-sm  delete-cell" onclick="deletesCell(this)">{!! trans('Eliminar') !!}</button>
            </td>
          </tr>
       `;
       total ++;
      $("#addElementSubject").attr('data-count',total);
      $("#tblSubject tbody").append(cell);
      $('.select2').select2();
  }

  function addFile()
  {
      var total = $("#addElementFile").attr('data-count');
      var cell =  `
        <tr>
            <td>
              <div class="form-group">
                                <input type="file" class="form-control form-control-sm" id="file" name="file" value="" required>
                            </div>
            </td>
            <td>
              <button type="button" class="btn btn-danger btn-sm  delete-cell" onclick="deletesCell(this)">{!! trans('Eliminar') !!}</button>
            </td>
          </tr>
       `;
       total ++;
      $("#addElementFile").attr('data-count',total);
      $("#tblFile tbody").append(cell);
      $('.select2').select2();
  }

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

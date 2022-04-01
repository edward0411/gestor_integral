@extends('layouts.master_panel')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-12">
            <div class="card ">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Editar solicitud') !!}</h5>
                </div>
                <!-- /.card-header -->
                
                <form method="POST" action="{{route('process.request.store')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_request" value="{{$request->id}}">
                    <div class="card-body">
                        <h4>Actualiza la información necesaria para tu cotización y al final da click en el botón guardar</h4>
                        <br>
                        <div class="row">
                            @if(Auth::user()->roles()->first()->id != 4)
                                <div class="form-group col-md-4">
                            @else
                                <div class="form-group col-md-6">
                            @endif
                                
                                <label for="deliver_date">{!! trans('Fecha de entrega') !!}</label>
                                <input type="date" class="form-control form-control-sm" id="deliver_date" name="deliver_date" value="{{$request->date_delivery}}" required>
                            </div>

                            @if(Auth::user()->roles()->first()->id != 4)
                            <div class="form-group col-md-4">
                                    <label for="id_client">{!! trans('Clientes') !!}</label>
                                    <select name="id_client" id="id_client"  class="form-control form-control-sm select2" required>
                                        <option value="">Seleccione...</option>
                                        @foreach($users as $user)
                                        <option value="{{$user->id}}" {{ $user->id == $request->user_id ? 'selected' : '' }}>{{$user->u_nickname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                            @else
                                <div class="form-group col-md-6">
                            @endif
                                <label for="id_service">{!! trans('Tipo de servicio') !!}</label>
                                <select name="id_service" id="id_service"  class="form-control form-control-sm" onChange="viewQuestions();" required>
                                    <option value="">Seleccione...</option>
                                    @foreach($services as $service)
                                    <option value="{{$service->id}}" {{ $service->id == $request->type_service_id ? 'selected' : '' }}>{{$service->p_text}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                   
                    <div class="card-body">
                        <div class="accordion md-accordion" id="accordionEx1" role="tablist" aria-multiselectable="true">
                            <!-- Accordion card -->
                            <div class="card">
                                 <!-- Card header -->
                                 <div class="card-header" role="tab" id="headingTwo1">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1"
                                    href="#collapseTwo1" aria-expanded="false" aria-controls="collapseTwo1">
                                        <h5 class="mb-0">
                                            Preguntas <i class="icofont-arrow-down float-right"></i>
                                        </h5>
                                    </a>
                                </div>
                                <div id="collapseTwo1" class="collapse" role="tabpanel" aria-labelledby="headingTwo1 data-parent="#accordionEx1">
                                    <div class="card-body">
                                        <div class="card-header color-header">
                                            <h5 class="text-white" style="font-weight: bold;">{!! trans('Preguntas') !!}</h5>
                                        </div>
                                        <div class="card-body" style="border: 1px solid #cccccc;">
                                            <table id="table_questios" class="table table-bordered">
                                                <thead class="bg-warning text-center">
                                                    <tr>
                                                        <th>Pregunta</th>
                                                        <th>respuesta</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($request->requestResponses as $key => $value)
                                                       @foreach($question as $item)
                                                            @if($value->request_question_id == $item->id)
                                                                <tr>
                                                                    <td>
                                                                        <p>{{$item->question}}</p> 
                                                                        <input type="hidden" name="question[]" value="{{$item->id}}"> 
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control form-control-sm" id="question" name="answer[]" value="{{$value->response}}" required>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <!-- Idiomas -->
                           
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header" role="tab" id="headingTwo2">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseTwo21" aria-expanded="false" aria-controls="collapseTwo21">
                                        <h5 class="mb-0">
                                            Idiomas <i class="icofont-arrow-down float-right"></i>
                                        </h5>
                                    </a>
                                </div>
                                <div id="collapseTwo21" class="collapse" role="tabpanel" aria-labelledby="headingTwo21"data-parent="#accordionEx1">
                                    <!-- Idiomas -->
                                    <div class="card-body">
                                        <div class="card-header color-header">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <h5 class="text-white" style="font-weight: bold;">{!! trans('Idiomas') !!} / <small>Seleccione si es diferente a español</small> </h5> 
                                                </div>
                                            </div>
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
                                                    @foreach($request->requestLanguages as $key => $value)
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <select name="id_language[]" id="id_language" class="form-control form-control-sm">
                                                                    <option value="">Seleccione idioma</option>
                                                                    @foreach($languages as $item)
                                                                        <option value="{{$item->id}}" {{ $item->id == $value->language_id ? 'selected' : '' }}>{{$item->p_text}}</option>
                                                                    @endforeach
                                                                </select>   
                                                            </div>
                                                        </td>
                                                        <td>
                                                          <button type="button" class="btn btn-danger btn-sm  delete-cell" onclick="deletesCell(this)">{!! trans('Eliminar') !!}</button>
                                                        </td>
                                                    </tr>
                                                    @endforeach
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
                                <div class="card-header" role="tab" id="headingThree31">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseThree31" aria-expanded="false" aria-controls="collapseThree31">
                                        <h5 class="mb-0">
                                            Sistemas <i class="icofont-arrow-down float-right"></i>
                                        </h5>
                                    </a>
                                </div>
                                <div id="collapseThree31" class="collapse" role="tabpanel" aria-labelledby="headingThree31" data-parent="#accordionEx1">
                                    <div class="card-body">
                                        <div class="card-header color-header">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <h5 class="text-white" style="font-weight: bold;">{!! trans('Sistemas') !!} / <small>Si requiere un software diferente a office o manual</small></h5>
                                                </div>
                                            </div>
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
                                                    @foreach($request->requestSystems as $key => $value)
                                                    
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <select name="id_system[]" id="id_system" class="form-control form-control-sm">
                                                                    <option value="">Seleccione sistema</option>
                                                                    @foreach($list_systems as $item)
                                                                        <option value="{{$item->id}}" {{ $item->id == $value->system_id ? 'selected' : '' }}>{{$item->p_text}}</option>
                                                                    @endforeach
                                                                </select>   
                                                            </div>
                                                        </td>
                                                        <td>
                                                          <button type="button" class="btn btn-danger btn-sm  delete-cell" onclick="deletesCell(this)">{!! trans('Eliminar') !!}</button>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Sistemas -->
                            <!-- Temas -->
                            @if(Auth::user()->roles()->first()->id != 4)
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header" role="tab" id="headingFour41">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseFour41" aria-expanded="false" aria-controls="collapseFour41">
                                        <h5 class="mb-0">
                                            Temas <i class="icofont-arrow-down float-right"></i>
                                        </h5>
                                    </a>
                                </div>
                                <div id="collapseFour41" class="collapse" role="tabpanel" aria-labelledby="headingFour41" data-parent="#accordionEx1">
                                    <!-- Temas -->
                                    <div class="card-body">
                                        <div class="card-header color-header">
                                            <h5 class="text-white" style="font-weight: bold;">{!! trans('Temas') !!}</h5>
                                        </div>
                                        <div class="card-body" style="border: 1px solid #cccccc;">
                                            <label for="descripcion">{!! trans('Agregar Tema') !!}</label> <i id="addElementSubject" data-count="{{count($request->requestTopics)}}" class="fas fa-plus-square add-item"></i><br>
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
                                                    @php
                                                        $i = 0;
                                                    @endphp
                                                    @foreach($request->requestTopics as $key => $value)
                                                        @foreach($topics as $key => $topic)
                                                            
                                                            @if($topic->id == $value->topic_id)
                                                                @foreach($subjects as $key => $sub)
                                                                    @if($sub->id == $topic->id_subject)
                                                                        <tr>
                                                                            <td>
                                                                            <div class="form-group">
                                                                                <select name="id_area" id="id_area_{{$i}}" class="form-control form-control-sm" onchange="fill_subjects({{$i}})" required>
                                                                                    <option value="">Seleccione área</option>
                                                                                    @foreach($areas as $area)
                                                                                        <option value="{{$area->id}}" {{ $area->id == $sub->id_area ? 'selected' : '' }}>{{$area->a_name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            </td>
                                                                            <td>
                                                                            <div class="form-group">
                                                                                <select name="id_subject" id="id_subject_{{$i}}" class="form-control form-control-sm" onchange="fill_topics({{$i}})" required>
                                                                                    <option value="{{$sub->id}}">{{$sub->s_name}} </option>  
                                                                                </select>
                                                                            </div>
                                                                            </td>
                                                                            <td>
                                                                            <div class="form-group">
                                                                                <select name="id_topic[]" id="id_topic_{{$i}}" class="form-control form-control-sm" required>
                                                                                    <option value="{{$topic->id}}">{{$topic->t_name}} </option>  
                                                                                </select>
                                                                            </div>
                                                                            </td>
                                                                            <td>
                                                                            <button type="button" class="btn btn-danger btn-sm  delete-cell" onclick="deletesCell(this)">{!! trans('Eliminar') !!}</button>
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                        @php
                                                            $i++;
                                                        @endphp
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <!-- /Temas -->
                            <!-- Archivos -->
                            
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header" role="tab" id="headingFive51">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseFive51" aria-expanded="false" aria-controls="collapseFive51">
                                        <h5 class="mb-0">
                                            Archivos <i class="icofont-arrow-down float-right"></i>
                                        </h5>
                                    </a>
                                </div>
                                <div id="collapseFive51" class="collapse" role="tabpanel" aria-labelledby="headingFive51" data-parent="#accordionEx1">
                                    <div class="card-body">
                                        <div class="card-header color-header">
                                            <div>
                                                <div>
                                                    <h5 class="text-white" style="font-weight: bold;">{!! trans('Archivos') !!} / <small>El peso permitido es maximo de 10 MB</small></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body" style="border: 1px solid #cccccc;">
                                            <label for="descripcion">{!! trans('Agregar Archivo') !!}</label> <i id="addElementFile" data-count="{{count($request->requestFiles)}}" class="fas fa-plus-square add-item"></i><br>
                                            <table class="table table-bordered" id="tblFile">
                                                <thead class="bg-warning text-center">
                                                    <tr>
                                                        <th class="text-white" style="width: 90%;">{!! trans('Archivos') !!}</th>
                                                        <th class="text-white" style="width: 10%;">{!! trans('Acción') !!}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $i = 0;
                                                    @endphp
                                                    @foreach($request->requestFiles as $value)
                                                        <tr>
                                                            <td>
                                                                <div class="form-group">
                                                                    <input type="hidden" name="files_changes[]" value="{{$i}}">
                                                                    <a href="{{ asset('folders/request/files_request_'.$request->id.'/file_'. $value->id.'/'. $value->file.'')}}" target="_blank">{{$value->file}}</a>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-danger btn-sm  delete-cell" onclick="deleteFiles({{$value->id}})">{!! trans('Eliminar') !!}</button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    @php
                                                        $i++;
                                                    @endphp
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="observations">{!! trans('Observaciones') !!}</label>
                                <textarea name="observations" id="" class="form-control form-control-sm" {{ \Auth::user()->roles()->first()->id != 4 ? 'disabled' : '' }} rows="2">{{$request->observation}}</textarea>
                            </div>
                        </div>
                    </div>
                    @if(\Auth::user()->roles()->first()->id != 4)
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="note_private">{!! trans('Nota interna comercial') !!}</label>
                                <textarea name="note_private" id="" class="form-control form-control-sm" rows="2">{{$request->note_private_comercial}}</textarea>
                            </div>
                        </div>
                    </div>
                    @endif
                    
                    <div class="card-body">
                        <button type="submit" id="" class="btn btn-warning btn-sm"> {!! trans('Guardar') !!}</button>
                        
                        <a href="{{route('process.request.index',Auth::user()->roles()->first()->id)}}" class="btn btn-warning btn-sm float-right">{!! trans('Regresar')!!}</a>
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

    function deleteFiles(id){
        if(confirm('¿Desea eliminar el archivo?')==false )
        {
            return false;
        }

        var url ="{{route('process.request.delete_file')}}";
        var datos = {
            "_token": $('meta[name="csrf-token"]').attr('content'),
            "id": id,
        };

        $.ajax({
            type: 'GET',
            url: url,
            data: datos,
            success: function(respuesta) {
                window.location.reload(true);
            }
        });
    }

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
                <select name="id_language[]" id="id_language" class="form-control form-control-sm">
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
                <select name="id_system[]" id="id_system" class="form-control form-control-sm">
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
                <select name="id_area" id="id_area_`+total+`" class="form-control form-control-sm" onchange="fill_subjects(`+total+`)" required>
                    <option value="">Seleccione área</option>
                        @foreach($areas as $area)
                        <option value="{{$area->id}}">{{$area->a_name}}</option>
                    @endforeach
                </select>
              </div>
            </td>
            <td>
            <div class="form-group">
                <select name="id_subject" id="id_subject_`+total+`" class="form-control form-control-sm" onchange="fill_topics(`+total+`)" required></select>
              </div>
            </td>
            <td>
            <div class="form-group">
                <select name="id_topic[]" id="id_topic_`+total+`" class="form-control form-control-sm" required></select>
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
                    <input type="hidden" name="files_changes[]" value="`+total+`">
                    <input type="file" class="form-control form-control-sm" id="file_`+total+`" name="file[]" value="" required>
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

    var questions = [
        @foreach($question as $item)
            {   "id_question": "{{$item->id}}",
                "question": "{{$item->question}}",
                "id_type_service": "{{$item->type_service_id }}",
                "question_type": "{{$item->question_type}}",
            },
        @endforeach
    ];

    function fill_subjects(id){

        var selectedarea = $("#id_area_"+id).children("option:selected").val();
        nuevo = $.grep(subjects, function(n, i) {
            return n.id_area === selectedarea
        });

        $('#id_subject_'+id).empty()
        $('#id_subject_'+id).append($('<option></option>').val('').html('Seleccione...'));
        $.each(nuevo, function(key, value) {
            $('#id_subject_'+id).append($('<option></option>').val(value.id_subject).html(value.subjects_name));
        });
    }

    function fill_topics(id){
        var selectedSubject = $("#id_subject_"+id).children("option:selected").val();
        nuevo = $.grep(topics, function(n, i) {
            return n.id_subject === selectedSubject
        });

        $('#id_topic_'+id).empty()
        $('#id_topic_'+id).append($('<option></option>').val('').html('Seleccione...'));
        $.each(nuevo, function(key, value) {
            $('#id_topic_'+id).append($('<option></option>').val(value.id_topic).html(value.topics_name));
        });
    }

    function viewQuestions(){

        var idSelected = $('#id_service').val();

        nuevo = $.grep(questions, function(n, i) {
            return n.id_type_service === idSelected
        });
        $("#table_questios tbody").empty();
        $.each(nuevo, function(key, value) {
            if(value.question_type == "ABIERTA"){
               var cell = `
                        <tr>
                            <td>
                                <p>`+value.question+`</p> 
                                <input type="hidden" name="question[]" value="`+value.id_question+`">
                            </td>
                            <td>
                                <input type="text" class="form-control form-control-sm" id="question" name="answer[]" value="" required>
                            </td>
                        </tr>
                        `;
                $("#table_questios tbody").append(cell);
            }else{
                var cell = `
                        <tr>
                            <td>
                                <p>`+value.question+`</p> 
                                <input type="hidden" name="question[]" value="`+value.id_question+`">
                            </td>
                            <td>
                                <input type="checkbox" value="si"  name="answer[]" /> Si<br/>
                                <input type="checkbox" value="no"  name="answer[]" /> No<br/>
                            </td>
                        </tr>
                        `;
                $("#table_questios tbody").append(cell);
            }
           
        });
        
    }

</script>
@endsection

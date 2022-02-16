@extends('layouts.master_panel')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-12">
            <div class="card ">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Editar Cotización') !!}</h5>
                </div>
                
                    <div class="card-body">
                        <h5>Favor revisa todos los parametros de la solicitud para que puedas realizar una cotización acorde</h5>
                        <br>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="deliver_date">{!! trans('Fecha de entrega') !!}</label>
                                <p>{{$request->date_delivery}}</p>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="id_service">{!! trans('Tipo de servicio') !!}</label>
                                <p>{{$request->parametric->p_text}}</p>
                            </div>
                        </div>
                    
                        <div class="accordion md-accordion" id="accordionEx1" role="tablist" aria-multiselectable="true">
                            <!-- Accordion card -->
                            <div class="card">
                                 <!-- Card header -->
                                 <div class="card-header" role="tab" id="headingTwo1">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1"href="#collapseTwo1" aria-expanded="false" aria-controls="collapseTwo1">
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
                                                                    </td>
                                                                    <td>
                                                                        {{$value->response}}
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
                                            <h5 class="text-white" style="font-weight: bold;">{!! trans('Idiomas') !!}</h5>
                                        </div>
                                        <div class="card-body" style="border: 1px solid #cccccc;">
                                            <table class="table table-bordered" id="tblLanguage">
                                                <thead class="bg-warning text-center">
                                                    <tr>
                                                        <th class="text-white" style="width: 90%;">{!! trans('Idiomas') !!}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($request->requestLanguages as $key => $value)
                                                        @foreach($languages as $item)
                                                            @if($value->language_id == $item->id)
                                                                <tr>
                                                                    <td>
                                                                        {{$item->p_text}}
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
                                            <h5 class="text-white" style="font-weight: bold;">{!! trans('Sistemas') !!}</h5>
                                        </div>
                                        <div class="card-body" style="border: 1px solid #cccccc;">
                                            <table class="table table-bordered" id="tblSystem">
                                                <thead class="bg-warning text-center">
                                                    <tr>
                                                        <th class="text-white" style="width: 90%;">{!! trans('Sistemas') !!}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($request->requestSystems as $key => $value)
                                                        @foreach($list_systems as $item)
                                                            @if($value->system_id == $item->id)
                                                                <tr>
                                                                    <td>
                                                                        {{$item->p_text}}
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
                            <!-- /Sistemas -->
                            <!-- Temas -->
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
                                            <table class="table table-bordered" id="tblSubject">
                                                <thead class="bg-warning text-center">
                                                    <tr>
                                                        <th class="text-white" style="width: 30%;">{!! trans('Áreas') !!}</th>
                                                        <th class="text-white" style="width: 30%;">{!! trans('Materias') !!}</th>
                                                        <th class="text-white" style="width: 30%;">{!! trans('Temas') !!}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($request->requestTopics as $key => $value)
                                                        @foreach($topics as $key => $topic)
                                                            @if($topic->id == $value->topic_id)
                                                                @foreach($subjects as $key => $sub)
                                                                    @if($sub->id == $topic->id_subject)
                                                                        <tr>
                                                                            <td>
                                                                                @foreach($areas as $area)
                                                                                    @if($area->id == $sub->id_area)
                                                                                        {{$area->a_name}}
                                                                                    @endif
                                                                                @endforeach
                                                                            </td>
                                                                            <td>
                                                                                {{$sub->s_name}} 
                                                                            </td>
                                                                            <td>
                                                                                {{$topic->t_name}} 
                                                                            </td> 
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    @endforeach
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
                                            <h5 class="text-white" style="font-weight: bold;">{!! trans('Archivos') !!}</h5>
                                        </div>
                                        <div class="card-body" style="border: 1px solid #cccccc;">
                                            <label for="descripcion">{!! trans('Agregar Archivo') !!}</label> <i id="addElementFile" data-count="{{count($request->requestFiles)}}" class="fas fa-plus-square add-item"></i><br>
                                            <table class="table table-bordered" id="tblFile">
                                                <thead class="bg-warning text-center">
                                                    <tr>
                                                        <th class="text-white" style="width: 90%;">{!! trans('Archivos') !!}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($request->requestFiles as $value)
                                                        <tr>
                                                            <td>
                                                                <div class="form-group">
                                                                    <a href="{{ asset('folders/request/files_request_'.$request->id.'/file_'. $value->id.'/'. $value->file.'')}}" target="_blank">{{$value->file}}</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach($request->requestQuoteTutors as $key => $quote)
                            @if($quote->user_id == Auth::user()->id)
                                <form method="POST" action="{{route('process.quotes_tutor.store')}}">
                                    @csrf
                                    <input type="hidden" name="id_request" value="{{$request->id}}">
                                    <input type="hidden" name="id_quote_tutor" value="{{$quote->id}}">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="observations">{!! trans('Observaciones Comercial') !!}</label>
                                            <textarea name="observations" id="" class="form-control form-control-sm" rows="2" readonly>{{$request->note_private_comercial}}</textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <span>Recuerde realizar su cotización en: <b>{{$user->coins->c_type_currency}} - {{$user->coins->c_currency}}</b></span>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="valor">{!! trans('Valor de cotización') !!}</label>
                                            <input type="number" class="form-control form-control-sm" name="value" id="value" style="text-align:right;" value="{{$quote->value}}" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="fecha_postulada">{!! trans('Fecha de entrega') !!}</label>
                                            <input type="date" class="form-control form-control-sm" name="fecha_postulada" id="value" value="{{$quote->application_date}}" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="comentarios_tutor">{!! trans('Comentarios Tutor') !!}</label>
                                            <textarea name="comentarios_tutor" id="" class="form-control form-control-sm" rows="2" >{{$quote->observation}}</textarea>
                                        </div>
                                    </div>
                                    <button type="submit" id="" class="btn btn-warning btn-sm"> {!! trans('Guardar') !!}</button>
                                
                                    <a href="{{route('process.request.index',Auth::user()->roles()->first()->id)}}" class="btn btn-warning btn-sm float-right">{!! trans('Regresar')!!}</a>
                                </form>
                            @endif
                        @endforeach
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">

</script>
@endsection

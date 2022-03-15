@extends('layouts.master_panel')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-12">
            <div class="card ">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Ver historial trabajo') !!}</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="deliver_date">{!! trans('Cotización N°') !!}</label>
                            <p>{{$work->requestQuote->id}}</p>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="id_service">{!! trans('Servicio') !!}</label>
                            <p>{{$work->requestQuote->requestQuoteTutor->request->parametric->p_text}}</p>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="deliver_date">{!! trans('Fecha inicio de trabajo') !!}</label>
                            <p>{{$work->start_date}}</p>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="id_service">{!! trans('Fecha max. entrega') !!}</label>
                            <p>{{$work->requestQuote->requestQuoteTutor->request->date_delivery}}</p>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="deliver_date">{!! trans('Observaciones Comercial') !!}</label>
                            <p>{{$work->requestQuote->private_note}}</p>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="id_service">{!! trans('Detalle Solicitud') !!}</label>
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th></th>
                                    @if(isset($work->requestQuote->requestQuoteTutor->request->requestResponses) && count($work->requestQuote->requestQuoteTutor->request->requestResponses) > 0)
                                        <th>
                                            <p>Preguntas</p>
                                        </th>
                                    @endif
                                    @if(isset($work->requestQuote->requestQuoteTutor->request->requestLanguages) && count($work->requestQuote->requestQuoteTutor->request->requestLanguages) > 0)
                                        <th>
                                            <p>Idiomas</p>
                                        </th>
                                    @endif
                                    @if(isset($work->requestQuote->requestQuoteTutor->request->requestSystems) && count($work->requestQuote->requestQuoteTutor->request->requestSystems) > 0)
                                        <th>
                                            <p>Sistemas</p>
                                        </th>
                                    @endif
                                    @if(isset($work->requestQuote->requestQuoteTutor->request->requestTopics))
                                        <th>
                                            <p>Temas</p>
                                        </th>
                                    @endif
                                    @if(isset($work->requestQuote->requestQuoteTutor->request->requestFiles) && count($work->requestQuote->requestQuoteTutor->request->requestFiles) > 0)
                                        <th>
                                            <p>Archivos</p>
                                        </th>
                                    @endif
                                </tr>
                                <tr>
                                    <td>
                                        <b>
                                            Valores
                                        </b>
                                    </td>
                                    @if(isset($work->requestQuote->requestQuoteTutor->request->requestResponses) && count($work->requestQuote->requestQuoteTutor->request->requestResponses) > 0)
                                        <td>
                                                @foreach($work->requestQuote->requestQuoteTutor->request->requestResponses as $key => $value)
                                                        - {{$value->requestQuestion->question}}: &nbsp;&nbsp;{{$value->response}} <br>
                                                @endforeach
                                        </td>
                                    @endif
                                    @if(isset($work->requestQuote->requestQuoteTutor->request->requestLanguages) && count($work->requestQuote->requestQuoteTutor->request->requestLanguages) > 0)
                                        <td>
                                                @foreach($work->requestQuote->requestQuoteTutor->request->requestLanguages as $lang)
                                                    {{$lang->tutorLanguage->p_text}} <br>
                                                @endforeach
                                        </td>
                                    @endif
                                    @if(isset($work->requestQuote->requestQuoteTutor->request->requestSystems) && count($work->requestQuote->requestQuoteTutor->request->requestSystems) > 0)
                                        <td>
                                                @foreach($work->requestQuote->requestQuoteTutor->request->requestSystems as $system)
                                                    {{$system->tutorSystem->p_text}} <br>
                                                @endforeach
                                        </td>
                                    @endif
                                    @if(isset($work->requestQuote->requestQuoteTutor->request->requestTopics))
                                        <td>
                                                @foreach($work->requestQuote->requestQuoteTutor->request->requestTopics as $topic)
                                                    {{$topic->topics->subject->area->a_name}}/{{$topic->topics->subject->s_name}}/{{$topic->topics->t_name}} <br>
                                                @endforeach
                                        </td>
                                    @endif
                                    @if(isset($work->requestQuote->requestQuoteTutor->request->requestFiles) && count($work->requestQuote->requestQuoteTutor->request->requestFiles) > 0)
                                        <td>
                                                @foreach($work->requestQuote->requestQuoteTutor->request->requestFiles as $file)
                                                <a href="{{ asset('folders/request/files_request_'.$work->requestQuote->requestQuoteTutor->request->id.'/file_'. $file->id.'/'. $file->file.'')}}" target="_blank">{{$file->file}}</a>
                                                <br>
                                                @endforeach
                                        </td>
                                    @endif
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                @if((\Auth::user()->roles()->first()->id == 6))
                <div class="card-body table-responsive">
                    <form action="{{route('process.work.store_detail',$work->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="file" class="form-control form-control-sm" name="file_detail" id="file_detail">
                              </div>
                            <div class="form-group col-md-9">
                                <textarea class="form-control form-control-sm" name="message" id="message" cols="30" rows="2"></textarea>
                            </div>
                           
                            <div class="form-group col-md-3">
                                <button type="submit" id="" class="btn btn-warning btn-sm"><i class="fas fa-comments"> Enviar</i></button>
                            </div>
                        </div>  
                    </form>
                </div>
                @endif
                <hr>
                @if(isset($work->workDetails))
                    @php
                        $i = 1;
                    @endphp
                    @foreach($work->workDetails as $key => $value)
                    <div class="form-group col-md-12">
                        <div class="card-body">
                                <div class="card-header color-header">
                                    <h5 class="text-white" style="font-weight: bold;">Detalle # {{$i}}</h5>                       
                                </div>                                    
                                <div class="card-body table-responsive" style="border: 1px solid #cccccc;">
                                    <p>{{$value->observation}}</p>
                                    <br>
                                    <a href="{{asset('folders/works/files_work'.$work->id.'/'.$value->file)}}"  target="_blank"> {{ $value->file }}</a>
                                    <br>
                                    <small style="text-align:rigth;">Enviado el {{$value->created_at}}.</small>
                                </div>
                        </div>  
                    </div>
                    @php
                        $i++;
                    @endphp
                    @endforeach
                @endif 
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">

</script>
@endsection

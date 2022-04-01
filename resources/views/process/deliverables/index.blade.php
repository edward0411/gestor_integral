@extends('layouts.master_panel')
@section('title','Listado de entregables')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header color-header">
              <h5 class="card-title" style="font-weight: bold;">{!! trans('Listado de mis entregables') !!}</h5>
            </div>
            <div class="card-body">
              <table id="tabledata1" class="table table-bordered table-striped">
                <thead>
                  <tr class="bg-warning text-center">
                    <th >{!! trans('#') !!} </th>  
                    @if(\Auth::user()->roles()->first()->id == 6)
                      <th>{!! trans('# Cotización') !!} </th>
                      @else
                      <th>{!! trans('# Solicitud') !!} </th>
                    @endif
                    <th>{!! trans('Archivo Entregable') !!}</th>
                    @if(\Auth::user()->roles()->first()->id == 6)
                    <th>{!! trans('Cuenta de Cobro') !!}</th>
                    <th>{!! trans('Observaciones') !!}</th>
                    <th>{!! trans('Estado Cotización') !!}</th>
                    @endif
                    <th>{!! trans('Estado Proceso') !!}</th>
                    <th>{!! trans('Calificación') !!}</th>
                    <th>{!! trans('Acciones') !!}</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $value)
                        <tr>
                            <td>{{$value->id}}</td>
                            @if(\Auth::user()->roles()->first()->id == 6)
                                <td>{{$value->work->requestQuote->request_quote_tutor_id}}</td>
                            @else
                                <td>{{$value->work->requestQuote->requestQuoteTutor->request->id}}</td>
                            @endif
                            <td>
                                <a href="{{ asset('folders/deliverables/deliverable_'.$value->id.'/'. $value->file)}}" target="_blank">{{$value->file}}</a>
                            </td>
                            @if(\Auth::user()->roles()->first()->id == 6)
                            <td>
                                @if($value->cuenta_cobro == null)
                                    <p>Sin registro</p>
                                @else
                                <a href="{{ asset('folders/deliverables/charge_acount_'.$value->id.'/'. $value->cuenta_cobro)}}" target="_blank">{{$value->cuenta_cobro}}</a>
                                @endif
                            </td>
                            <td>{{$value->observaciones}}</td>
                            <td>
                                <p> {{$value->getStateAttribute()}}</p>
                            </td>
                            @endif
                            <td>
                                <p> {{$value->getStateDeliverableAttribute()}}</p>
                            </td>
                            <td>
                              @if($value->qualificate == null)
                                <p>Sin Calificación</p>
                              @else 
                                <img src="{{ asset('folders/qualificates/qualificate_'.$value->qualificate->value_qualificate.'.png') }}" alt=""  width="100" height="20">
                              @endif
                            </td>
                            <td>
                              @if(\Auth::user()->roles()->first()->id == 6)
                                <a href="{{route('process.deliverables.edit',$value->id)}}" class="btn btn-warning btn-xs"> {!! trans('Editar') !!}</a><br><br>
                                <a href="{{route('process.deliverables.delete',$value->id)}}" class="btn btn-danger btn-xs"> {!! trans('Eliminar') !!}</a>
                                @elseif(\Auth::user()->roles()->first()->id == 4)
                                @if($value->qualificate == null)
                                <a href="{{route('process.deliverables.qualificate',$value->id)}}" class="btn btn-warning btn-xs"> {!! trans('Calificar Entregable') !!}</a><br><br>
                                @else
                                <a href="{{route('process.deliverables.qualificate_edit',$value->qualificate->id)}}" class="btn btn-warning btn-xs"> {!! trans('Editar Calificación') !!}</a><br><br>
                                <a href="{{route('process.deliverables.qualificate_delete',$value->qualificate->id)}}" class="btn btn-danger btn-xs"> {!! trans('Eliminar Calificación') !!}</a><br><br>
                                @endif
                              @endif
                            </td>
                            <tr>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </div>

  @endsection
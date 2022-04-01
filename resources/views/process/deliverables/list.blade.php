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
              <table id="tabledata1" class="table table-bordered table-striped table-responsive">
                <thead>
                  <tr class="bg-warning text-center">
                    <th >{!! trans('#') !!} </th>  
                    <th>{!! trans('# Cot. Tutor') !!} </th>
                    <th>{!! trans('Tutor') !!} </th>
                    <th>{!! trans('Archivo entregable') !!}</th>
                    <th>{!! trans('Cuenta de cobro') !!}</th>
                    <th>{!! trans('Observaciones') !!}</th>
                    <th>{!! trans('Estado cotización') !!}</th>
                    <th>{!! trans('Estado cuenta de cobro') !!}</th>
                    <th>{!! trans('Estado Proceso') !!}</th>
                    <th>{!! trans('Calificación') !!}</th>
                    <th>{!! trans('Acciones') !!}</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $value)
                        <tr>
                            <td>{{$value->id}}</td>
                            <td>{{$value->work->requestQuote->request_quote_tutor_id}}</td>
                            <td>{{$value->work->requestQuote->requestQuoteTutor->user->u_nickname}}</td>
                            <td>
                                <a href="{{ asset('folders/deliverables/deliverable_'.$value->id.'/'. $value->file)}}" target="_blank">{{$value->file}}</a>
                            </td>
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
                            <td>
                                <p> {{$value->getStateAcountAttribute()}}</p>
                            </td>
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
                                @if($value->status == 1)
                                <a href="{{route('process.deliverables.validate_deliverable',$value->id)}}" class="btn btn-warning btn-xs"> {!! trans('Validar Entregable') !!}</a><br><br>
                                @endif
                                @if($value->cuenta_cobro != null && $value->status_cb == 0)
                                <a href="{{route('process.deliverables.validate_count',$value->id)}}" class="btn btn-warning btn-xs"> {!! trans('Validar Cuenta de cobro') !!}</a><br><br>
                                @endif
                                <a href="{{route('process.deliverables.delete',$value->id)}}" class="btn btn-danger btn-xs"> {!! trans('Eliminar') !!}</a>
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
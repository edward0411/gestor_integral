@extends('layouts.master_panel')
@section('title','Listado de cotizaciones')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header color-header">
              <h5 class="card-title" style="font-weight: bold;">{!! trans('Listado de cotizaciones') !!}</h5>
            </div>
            
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <span>Numeral</span>
                        <p>{{$request->id}}</p>
                    </div>
                    <div class="col-md-6">
                        <span>Cliente</span>
                        <p>{{$request->users->u_nickname}}</p>
                    </div>
                    <div class="col-md-6">
                        <span>Servicio</span>
                        <p>{{$request->parametric->p_text}}</p>
                    </div>
                    <div class="col-md-6">
                        <span>Fecja de entrega</span>
                        <p>{{$request->date_delivery}}</p>
                    </div>
                </div>
            </div>
            <div class="card-body">
              <table id="tabledata1" class="table table-bordered table-striped">
                <thead>
                  <tr class="bg-warning text-center">
                    <th >{!! trans('N° cotización tutor') !!} </th>  
                    <th>{!! trans('Tutor') !!} </th>
                    <th>{!! trans('tipo de moneda tutor') !!} </th>
                    <th>{!! trans('Valor cotización tutor') !!}</th>
                    <th>{!! trans('Valor cotización en pesos') !!}</th>
                    <th>{!! trans('Fecha propuesta tutor') !!}</th>
                    <th>{!! trans('Observaciones') !!}</th>
                    <th>{!! trans('Acciones') !!}</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($quotes_tutors as $key => $value)
                      @php
                          $valor = $value->value;
                          if($value->user->coins->c_trm_currency != 1){
                            $valor = $value->value * $value->user->coins->c_trm_currency;
                          }
                      @endphp
                      <tr>
                        <td width="5%">{{$value->id}}</td>
                        <td width="10%">{{$value->user->u_nickname}}</td>
                        <td width="20%">{{$value->user->coins->c_type_currency}} - {{$value->user->coins->c_currency}}</td>
                        <td width="10%" style="text-align: right">{{number_format($value->value)}}</td>
                        <td width="10%" style="text-align: right">$ {{number_format($valor)}}</td>
                        <td  width="10%">{{$value->application_date}}</td>
                        <td width="30%">{{$value->observation}}</td>
                        <td width="5%">
                            <a href="{{route('process.quotes.create',$value->id)}}" class="btn btn-warning btn-xs"> {!! trans('Aplicar Cotización') !!}</a>
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

  @endsection
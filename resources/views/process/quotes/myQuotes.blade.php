@extends('layouts.master_panel')
@section('title','Listado de cotizaciones')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header color-header">
              <h5 class="card-title" style="font-weight: bold;">{!! trans('Listado de mis cotizaciones') !!}</h5>
            </div>
            <div class="card-body">
              <table id="tabledata1" class="table table-bordered table-striped">
                <thead>
                  <tr class="bg-warning text-center">
                    <th >{!! trans('N° cotización') !!} </th>  
                    <th>{!! trans('tipo de moneda tutor') !!} </th>
                    <th>{!! trans('Valor cotización tutor') !!}</th>
                    <th>{!! trans('Fecha propuesta tutor') !!}</th>
                    <th>{!! trans('Calificación') !!}</th>
                    <th>{!! trans('Observaciones') !!}</th>
                    <th>{!! trans('Estado cotización') !!}</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $value)
                      <tr>
                        <td width="5%">{{$value->id}}</td>
                        <td width="20%">{{$value->user->coins->c_type_currency}} - {{$value->user->coins->c_currency}}</td>
                        <td width="10%" style="text-align: right">{{number_format($value->value)}}</td>
                        <td  width="10%">{{$value->application_date}}</td>
                        <td  width="10%">Sin Calificación</td>
                        <td width="30%">{{$value->observation}}</td>
                        <td width="5%">
                          @if($value->request->request_state_id == 2)
                            <p>En validación</p>
                          @else
                              @if($value->requestQuote != null)
                              <p>Cotización aprobada</p> 
                              @else
                              <p>Cotización no aprobada</p> 
                              @endif
                          @endif
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
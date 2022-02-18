@extends('layouts.master_panel')
@section('title','Listado de cotizaciones agrupadas por solicitudes')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header color-header">
              <h5 class="card-title" style="font-weight: bold;">{!! trans('Listado de solicitudes') !!}</h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tabledata1" class="table table-bordered table-striped">
                <thead>
                  <tr class="bg-warning text-center">
                    <th >{!! trans('Numeral') !!} </th>  
                    <th>{!! trans('Cliente') !!} </th>
                    <th>{!! trans('Servicio') !!}</th>
                    <th>{!! trans('Fecha final') !!}</th>
                    <th>{!! trans('Cantidad de cotizaciones tutor') !!}</th>
                    <th>{!! trans('Acciones') !!}</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $value)
                    <tr>
                      <td width="5%">{{$value->id}}</td>
                      <td width="50%">{{$value->users->u_nickname}}</td>
                      <td width="10%">{{$value->parametric->p_text}}</td>
                      <td  width="10%">{{$value->date_delivery}}</td>
                      <td width="5%" style="text-align: center">{{count($value->requestQuoteTutors)}}</td>
                      <td width="20%">
                        
                        @if(count($value->requestQuoteTutors) > 0) 
                          <a href="{{route('process.quetes_tutor.view_list_quotes_tutor',$value->id)}}" class="btn btn-warning btn-xs"> {!! trans('Ver Cotizaciones') !!}</a>
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
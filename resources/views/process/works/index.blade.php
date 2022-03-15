@extends('layouts.master_panel')
@section('title','Mis Trabajos')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header color-header">
              <h5 class="card-title" style="font-weight: bold;">{!! trans('Listado de mis trabajos') !!}</h5>
            </div>
            <div class="card-body">
              <table id="tabledata1" class="table table-bordered table-striped">
                <thead>
                  <tr class="bg-warning text-center">
                    <th>{!! trans('N° de Cotización') !!} </th>
                    <th>{!! trans('Fecha de inicio') !!}</th>
                    <th>{!! trans('Fecha maxima entrega') !!}</th>
                    <th>{!! trans('Servicio') !!}</th>
                    <th>{!! trans('Acciones') !!}</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($work as $key => $value)
                      <tr>
                        <td>{{$value->requestQuote->requestQuoteTutor->id}}</td>
                        <td>{{$value->start_date}}</td>
                        <td>{{$value->requestQuote->requestQuoteTutor->request->date_delivery}}</td>
                        <td>{{$value->requestQuote->requestQuoteTutor->request->parametric->p_text}}</td>
                        <td>
                          <a href="{{route('process.works.view',$value->id)}}" class="btn btn-warning btn-xs"><i class="fas fa-eye"></i>Ver</a>
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
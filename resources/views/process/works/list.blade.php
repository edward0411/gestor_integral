@extends('layouts.master_panel')
@section('title','Trabajos')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header color-header">
              <h5 class="card-title" style="font-weight: bold;">{!! trans('Listado de Cotizaciones') !!}</h5>
            </div>
            <div class="card-body">
              <table id="tabledata1" class="table table-bordered table-striped">
                <thead>
                  <tr class="bg-warning text-center">
                    <th>{!! trans('N° Solicitud') !!} </th>
                    <th>{!! trans('N° Cotización') !!} </th>
                    <th>{!! trans('Nick name') !!} </th>
                    <th>{!! trans('Servicio') !!}</th>
                    <th>{!! trans('Fecha cotización') !!}</th>
                    <th>{!! trans('Valida hasta') !!}</th>
                    <th>{!! trans('Cotización') !!}</th>
                    <th>{!! trans('Estado') !!}</th>
                    <th>{!! trans('Acciones') !!}</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($quotes as $key => $value)

                        <tr>
                            <td>
                                {{$value->requestQuoteTutor->request->id}}
                            </td>
                            <td>
                                {{$value->id}}
                            </td>
                            <td>
                                {{$value->requestQuoteTutor->request->users->u_nickname}}
                            </td>
                            <td>
                                {{$value->requestQuoteTutor->request->parametric->p_text}}
                            </td>
                            <td>
                                {{$value->date_quote}}
                            </td>
                            <td>
                                {{$value->date_validate}}
                            </td>
                            <td>
                                <a href="{{route('process.works.quote',$value->id)}}"> {!! trans('Cotización_'.$value->id.'.pdf') !!}</a>
                            </td>
                            <td>
                                @if($value->work)
                                    En proceso
                                @else
                                    Pendiente
                                @endif
                            </td>
                            <td>
                                @if($value->work)
                                    <a href="{{route('process.works.view',$value->work->id)}}" class="btn btn-warning btn-xs"><i class="fas fa-eye"></i> {!! trans('Ver Trabajo') !!}</a>
                                @else
                                    <a href="{{route('process.quote.edit',$value->id)}}" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i> {!! trans('Editar Cotización') !!}</a>
                                    <a href="{{route('process.works.create',$value->id)}}" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i> {!! trans('Iniciar Trabajo') !!}</a>      
                                    <a href="{{route('process.quote.delete',$value->id)}}" class="btn btn-danger btn-xs" onclick="return confirm('{!! trans('Desea eliminar este registro') !!}?');"><i class="fas fa-trash"></i> {!! trans('Eliminar') !!}</a>
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
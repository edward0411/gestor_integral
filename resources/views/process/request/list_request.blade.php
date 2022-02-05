@extends('layouts.master_panel')
@section('title','Listado de Solicitudes')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header color-header">
              <h5 class="card-title" style="font-weight: bold;">{!! trans('Listado de solicitudes') !!}</h5>
            </div>
            <div class="card-body">
              
              <a href="{{route('process.request.create')}}" class="btn btn-warning btn-sm"><i class="fas fa-plus-circle"></i> {!! trans('Crear Solicitud') !!}</a>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tabledata1" class="table table-bordered table-striped">
                <thead>
                  <tr class="bg-warning text-center">
                    <th>{!! trans('Numeral') !!} </th>
                    <th>{!! trans('Cliente') !!} </th>
                    <th>{!! trans('Fecha de inicio') !!}</th>
                    <th>{!! trans('Fecha final') !!}</th>
                    <th>{!! trans('Servicio') !!}</th>
                    <th>{!! trans('Estado') !!}</th>
                    <th>{!! trans('Acciones') !!}</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $value)
                    <tr>
                      <td>{{$value->id}}</td>
                      <td>{{$value->users->u_nickname}}</td>
                      <td>{{$value->created_at}}</td>
                      <td>{{$value->date_delivery}}</td>
                      <td>{{$value->parametric->p_text}}</td>
                      <td>{{$value->requestState->name}}</td>
                      <td>
                        @if($value->request_state_id == 1)
                        <a href="{{route('process.request.edit',$value->id)}}" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i> {!! trans('Editar') !!}</a> 
                        <a href="{{route('process.request.change_estate',$value->id)}}" class="btn btn-warning btn-xs">{!! trans('Enviar a cotización')!!}</a>
                        @endif
                         
                        <a href="{{route('process.request.delete',$value->id)}}" class="btn btn-danger btn-xs" onclick="return confirm('{!! trans('Desea eliminar este registro') !!}?');"><i class="fas fa-trash"></i> {!! trans('Eliminar') !!}</a>
                       
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
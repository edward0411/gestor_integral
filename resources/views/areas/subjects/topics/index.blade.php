@extends('layouts.master_panel')
@section('title','Temas')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Listado de temas') !!}</h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @can('Administrador_temas_crear') 
                    <a href="{{route('areas.subjects.topics.create',$id)}}" class="btn btn-warning btn-sm"><i class="fas fa-plus-circle"></i> {!! trans('Crear tema') !!}</a>
                    @endcan
                  </div>
                <div class="card-body">
                    <table id="tabledata1" class="table table-bordered table-striped">
                        <thead>
                            <tr class="bg-warning text-center">
                                <th>{!! trans('Orden') !!} </th>
                                <th>{!! trans('Temas') !!} </th>
                                <th>{!! trans('Estado') !!} </th>
                                <th>{!! trans('Acciones') !!}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($topics) > 0 )
                            @foreach($topics as $topic)
                            <tr>
                                <td>{{$topic->t_order}}</td>
                                <td>{{$topic->t_name}}</td>
                                <td>
                                    @if($topic->t_state == 1)
                                    {!! trans('Activo') !!}
                                    @else
                                    {!! trans('Inactivo') !!}
                                    @endif
                                </td>
                                <td>
                                    @can('Administrador_temas_editar') 
                                    <a href="{{route('areas.subjects.topics.edit',$topic->id)}}" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i> {!! trans('Editar') !!}</a>
                                    @endcan
                                    @if($topic->t_state == 1)
                                    @can('Administrador_temas_inactivar') 
                                    <a href="{{route('areas.subjects.topics.inactive',array($topic->id,$id))}}" onclick="return confirm('{!! trans('Desea inactivar el tema') !!}?');" class="btn btn-danger btn-xs"><i class="fas fa-ban"></i> {!! trans('Inactivar') !!}</a>
                                    @endcan
                                    @else
                                    @can('Administrador_temas_activar') 
                                   <a href="{{route('areas.subjects.topics.active',array($topic->id,$id))}}" class="btn btn-warning btn-xs" onclick="return confirm('{!! trans('Desea activar el tema') !!}?');"><i class="fas fa-check"></i> {!! trans('Activar') !!}</a>
                                   @endcan
                                   @endif
                                </td>
                            </tr>
                            @endforeach
                            @endif 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

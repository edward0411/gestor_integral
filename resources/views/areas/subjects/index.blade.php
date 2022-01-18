@extends('layouts.master_panel')
@section('title','Materias')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Listado de materias') !!}</h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a href="{{route('areas.subjects.create',$id)}}" class="btn btn-warning btn-sm"><i class="fas fa-plus-circle"></i> {!! trans('Crear materia') !!}</a>
                  </div>
                <div class="card-body">
                    <table id="tabledata1" class="table table-bordered table-striped">
                        <thead>
                            <tr class="bg-warning text-center">
                                <th>{!! trans('Orden') !!} </th>
                                <th>{!! trans('Materias') !!} </th>
                                <th>{!! trans('Estado') !!} </th>
                                <th>{!! trans('Acciones') !!}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($subjects) > 0 )
                            @foreach($subjects as $subject)
                            <tr>
                                <td>{{$subject->s_order}}</td>
                                <td>{{$subject->s_name}}</td>
                                <td>
                                    @if($subject->s_state == 1)
                                    {!! trans('Activo') !!}
                                    @else
                                    {!! trans('Inactivo') !!}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('areas.subjects.edit',$subject->id)}}" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i> {!! trans('Editar') !!}</a>
                                    <a href="{{route('areas.subjects.topics.index',$subject->id)}}" class="btn btn-primary btn-xs"><i class=" 	fas fa-clipboard-list"></i> {!! trans('Temas') !!}</a>
                                    @if($subject->s_state == 1)
                                    <a href="{{route('areas.subjects.inactive',array($subject->id,$id))}}" onclick="return confirm('{!! trans('Desea inactivar la materia') !!}?');" class="btn btn-danger btn-xs"><i class="fas fa-ban"></i> {!! trans('Inactivar') !!}</a>
                                    @else
                                   <a href="{{route('areas.subjects.active',array($subject->id,$id))}}" class="btn btn-warning btn-xs" onclick="return confirm('{!! trans('Desea activar la materia') !!}?');"><i class="fas fa-check"></i> {!! trans('Activar') !!}</a>
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

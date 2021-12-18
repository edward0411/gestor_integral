@extends('layouts.master_panel')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('areas.create')}}" class="btn btn-warning btn-sm"><i class="fas fa-plus-circle"></i> {!! trans('Crear área') !!}</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="tabledata1" class="table table-bordered table-striped">
                        <thead>
                            <tr class="bg-warning text-center">
                                <th>{!! trans('Orden') !!} </th>
                                <th>{!! trans('Áreas') !!} </th>
                                <th>{!! trans('Estado') !!} </th>
                                <th>{!! trans('Acciones') !!}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($areas as $area)
                            <tr>
                                <td>{{$area->a_order}}</td>
                                <td>{{$area->a_name}}</td>
                                <td>
                                @if($area->a_state == 1)
                                {!! trans('Activo') !!}
                                @else
                                {!! trans('Inactivo') !!}
                                @endif
                                </td>
                                <td>
                                    <a href="{{route('areas.edit',$area->id)}}" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i> {!! trans('Editar') !!}</a>
                                    <a href="{{route('areas.subjects.index',$area->id)}}" class="btn btn-primary btn-xs"><i class=" 	fas fa-clipboard-list"></i> {!! trans('Materias') !!}</a>
                                    @if($area->a_state == 1)
                                    <a href="{{route('areas.inactive',$area->id)}}" onclick="return confirm('{!! trans('Desea inactivar el área') !!}?');" class="btn btn-danger btn-xs"><i class="fas fa-ban"></i> {!! trans('Inactivar') !!}</a>
                                @else
                                   <a href="{{route('areas.active',$area->id)}}" class="btn btn-warning btn-xs" onclick="return confirm('{!! trans('Desea activar área') !!}?');"><i class="fas fa-check"></i> {!! trans('Activar') !!}</a>
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

@extends('layouts.master_panel')
@section('title','Países')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Listado de países') !!}</h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @can('Administrador_paises_crear')     
                    <a href="{{route('countries.create')}}" class="btn btn-warning btn-sm"><i class="fas fa-plus-circle"></i> {!! trans('Crear país') !!}</a>
                    @endcan
                  </div>
                <div class="card-body">
                    <table id="tabledata1" class="table table-bordered table-striped">
                        <thead>
                            <tr class="bg-warning text-center">
                                <th>{!! trans('Indicativo') !!} </th>
                                <th>{!! trans('Nombre') !!} </th>
                                <th>{!! trans('Acciones') !!}</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($countries as $country)
                            <tr>
                            <td>{{$country->c_indicative}}</td>
                            <td>{{$country->c_name}}</td>
                            <td>
                                @can('Administrador_paises_editar') 
                                <a href="{{route('countries.edit',$country->id)}}" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i> {!! trans('Editar') !!}</a>
                                @endcan
                                @can('Administrador_paises_eliminar') 
                                <a href="{{route('countries.delete',$country->id)}}" class="btn btn-danger btn-xs" onclick="return confirm('{!! trans('Desea eliminar este registro') !!}?');"><i class="fas fa-trash"></i> {!! trans('Eliminar') !!}</a>
                                @endcan
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

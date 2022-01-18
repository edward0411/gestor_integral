@extends('layouts.master_panel')
@section('title','Paramétricas')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Listado de paramétricas') !!}</h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a href="{{route('parametrics.create')}}" class="btn btn-warning btn-sm"><i class="fas fa-plus-circle"></i> {!! trans('Crear paramétrica') !!}</a>
                  </div>
                <div class="card-body">
                    <table id="tabledata1" class="table table-bordered table-striped">
                        <thead>
                            <tr class="bg-warning text-center">
                                <th>{!! trans('Categoria') !!} </th>
                                <th>{!! trans('Texto') !!}</th>
                                <th>{!! trans('Orden') !!}</th>
                                <th>{!! trans('Acciones') !!}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($parametrics as $parametric)
                            <tr>
                                <td>{{$parametric->p_category}}</td>
                                <td>{{$parametric->p_text}}</td>
                                <td>{{$parametric->p_order}}</td>
                                <td>
                                    <a href="{{route('parametrics.edit',$parametric->id)}}" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i> {!! trans('Editar') !!}</a>
                                    <a href="{{route('parametrics.delete',$parametric->id)}}" class="btn btn-danger btn-xs" onclick="return confirm('{!! trans('Desea eliminar este registro') !!}?');"><i class="fas fa-trash"></i> {!! trans('Eliminar') !!}</a>
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

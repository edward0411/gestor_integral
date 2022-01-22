@extends('layouts.master_panel')
@section('title','Monedas')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Listado de monedas') !!}</h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @can('Administrador_monedas_crear') 
                    <a href="{{route('coins.create')}}" class="btn btn-warning btn-sm"><i class="fas fa-plus-circle"></i> {!! trans('Crear moneda') !!}</a>
                    @endcan
                  </div>
                <div class="card-body">
                    <table id="tabledata1" class="table table-bordered table-striped">
                        <thead>
                            <tr class="bg-warning text-center">
                                <th>{!! trans('Moneda') !!} </th>
                                <th>{!! trans('Tipo de Moneda') !!} </th>
                                <th>{!! trans('TRM Moneda') !!} </th>
                                <th>{!! trans('Orden') !!}</th>
                                <th>{!! trans('Estado') !!}</th>
                                <th>{!! trans('Acciones') !!}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($coins as $currency)
                            <tr>
                                <td>{{$currency->c_currency}}</td>
                                <td>{{$currency->c_type_currency}}</td>
                                <td>{{$currency->c_trm_currency}}</td>
                                <td>{{$currency->c_order}}</td>
                                <td>
                                    @if($currency->c_state == 1)
                                {!! trans('Activo') !!}
                                @else
                                {!! trans('Inactivo') !!}
                                @endif
                                </td>
                                
                                <td>
                                    @can('Administrador_monedas_editar') 
                                    <a href="{{route('coins.edit',$currency->id)}}" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i> {!! trans('Editar') !!}</a>
                                    @endcan
                                    @if($currency->c_state == 1)
                                    @can('Administrador_monedas_inactivar') 
                                      <a href="{{route('coins.inactive',$currency->id)}}" onclick="return confirm('{!! trans('Desea inactivar la moneda') !!}?');" class="btn btn-danger btn-xs"><i class="fas fa-ban"></i> {!! trans('Inactivar') !!}</a>
                                      @endcan
                                  @else
                                  @can('Administrador_monedas_activar') 
                                     <a href="{{route('coins.active',$currency->id)}}" class="btn btn-warning btn-xs" onclick="return confirm('{!! trans('Desea activar la moneda') !!}?');"><i class="fas fa-check"></i> {!! trans('Activar') !!}</a>
                                     @endcan
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

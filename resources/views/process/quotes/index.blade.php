@extends('layouts.master_panel')
@section('title','Cotizaciones')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header color-header">
              <h5 class="card-title" style="font-weight: bold;">{!! trans('Listado de cotizaciones') !!}</h5>
            </div>
            <div class="card-body">
              
              <a href="{{route('process.quotes.create')}}" class="btn btn-warning btn-sm"><i class="fas fa-plus-circle"></i> {!! trans('Crear cotización') !!}</a>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tabledata1" class="table table-bordered table-striped">
                <thead>
                  <tr class="bg-warning text-center">
                    <th>{!! trans('Nick name') !!} </th>
                    <th>{!! trans('Numeral') !!} </th>
                    <th>{!! trans('Fecha de inicio') !!}</th>
                    <th>{!! trans('Fecha final') !!}</th>
                    <th>{!! trans('Servicio') !!}</th>
                    <th>{!! trans('Estado') !!}</th>
                    <th>{!! trans('Acciones') !!}</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Cliente</td>
                    <td>1</td>
                    <td>2022-01-21</td>
                    <td>2022-01-22</td>
                    <td>Tesis</td>
                    <td>EN COTIZACIÓN</td>
                    <td>
                      
                      <a href="{{route('process.quotes.edit')}}" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i> {!! trans('Editar') !!}</a>
                      
                      <a href="" class="btn btn-danger btn-xs" onclick="return confirm('{!! trans('Desea eliminar este registro') !!}?');"><i class="fas fa-trash"></i> {!! trans('Eliminar') !!}</a>
                      
                    </td>
                  </tr>
                  
                 
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </div>

  @endsection
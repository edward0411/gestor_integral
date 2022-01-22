@extends('layouts.master_panel')
@section('title','Mis cotizaciones')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header color-header">
              <h5 class="card-title" style="font-weight: bold;">{!! trans('Listado de cotizaciones') !!}</h5>
            </div>
            <div class="card-body">
              
              <a href="{{route('quotes.create_my_quotes')}}" class="btn btn-warning btn-sm"><i class="fas fa-plus-circle"></i> {!! trans('Crear Cotización') !!}</a>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tabledata1" class="table table-bordered table-striped">
                <thead>
                  <tr class="bg-warning text-center">
                    <th>{!! trans('Numeral') !!} </th>
                    <th>{!! trans('Fecha de inicio') !!}</th>
                    <th>{!! trans('Fecha final') !!}</th>
                    <th>{!! trans('Servicio') !!}</th>
                    <th>{!! trans('Acciones') !!}</th>
                  </tr>
                </thead>
                <tbody>
                 
                  <tr>
                    <td>1</td>
                    <td>2022-01-21</td>
                    <td>2022-01-22</td>
                    <td>Tesis</td>
                    <td>
                      
                      <a href="{{route('quotes.edit_my_quotes')}}" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i> {!! trans('Editar') !!}</a>
                      
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
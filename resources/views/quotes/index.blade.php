@extends('layouts.master_panel')
@section('title','Cotizaciones')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header color-header">
              <h5 class="card-title" style="font-weight: bold;">{!! trans('Listado de empleados') !!}</h5>
            </div>
            <div class="card-body">
              
              <a href="" class="btn btn-warning btn-sm"><i class="fas fa-plus-circle"></i> {!! trans('Crear Empleado') !!}</a>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tabledata1" class="table table-bordered table-striped">
                <thead>
                  <tr class="bg-warning text-center">
                    <th>{!! trans('Numeral') !!} </th>
                    <th>{!! trans('Nick Name') !!}</th>
                    <th>{!! trans('Telefono') !!}</th>
                    <th>{!! trans('Fecha de inicio') !!}</th>
                    <th>{!! trans('Fecha final') !!}</th>
                    <th>{!! trans('Servicio') !!}</th>
                    <th>{!! trans('Acciones') !!}</th>
                  </tr>
                </thead>
                <tbody>
                 
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                      
                      <a href="" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i> {!! trans('Editar') !!}</a>
                      
                      
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
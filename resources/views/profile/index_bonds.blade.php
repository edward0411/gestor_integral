@extends('layouts.master_panel')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <a href="{{route('profile.create_bonds')}}" class="btn btn-warning btn-sm"><i class="fas fa-plus-circle"></i> {!! trans('Crear bono') !!}</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tabledata1" class="table table-bordered table-striped">
                <thead>
                  <tr class="bg-warning text-center">
                    <th>{!! trans('Nick Name') !!}</th>
                    <th>{!! trans('Clasificación') !!}</th>
                    <th>{!! trans('Tipo') !!}</th>
                    <th>{!! trans('Valor') !!}</th>
                    <th>{!! trans('Estado') !!}</th>
                    <th>{!! trans('Acciones') !!}</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>pepito</td>
                        <td>Bonos de deuda privada</td>
                        <td>Bonos Ordinarios</td>
                        <td>100</td>
                        <td>Activo</td>
                        <td>
                            <a href="{{route('profile.edit_bonds')}}" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i> {!! trans('Editar') !!}</a>
                            <a href="" class="btn btn-danger btn-xs" onclick="return confirm('{!! trans('Desea eliminar este registro') !!}?');"><i class="fas fa-trash"></i> {!! trans('Eliminar') !!}</a>
                        </td>
                    </tr>
                    <tr>
                        <td>juanito</td>
                        <td>Bono de deuda pública</td>
                        <td>Bonos obligatoriamente convertibles en acciones</td>
                        <td>200</td>
                        <td>Activo</td>
                        <td>
                            <a href="{{route('profile.edit_bonds')}}" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i> {!! trans('Editar') !!}</a>
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
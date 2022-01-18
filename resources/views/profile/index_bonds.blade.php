@extends('layouts.master_panel')
@section('title','Bonos')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header color-header">
              <h5 class="card-title" style="font-weight: bold;">{!! trans('Listado de bonos') !!}</h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <a href="{{route('profile.create_bonds')}}" class="btn btn-warning btn-sm"><i class="fas fa-plus-circle"></i> {!! trans('Crear bono') !!}</a>
            </div>
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
                  @foreach($bonds as $bond)
                  <tr>
                    <td>{{$bond->u_nickname}}</td>
                    <td>{{$bond->p_text}}</td>
                    <td>{{$bond->text}}</td>
                    <td style="text-align: right">$ {{number_format((float)$bond->b_value, 2, '.', '')}}</td>
                    <td> @if($bond->b_state == 1)
                      {!! trans('Activo') !!}
                      @else
                      {!! trans('Inactivo') !!}
                      @endif</td>
                    <td>
                        <a href="{{route('profile.edit_bonds',$bond->id)}}" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i> {!! trans('Editar') !!}</a>
                        <a href="{{route('profile.delete',$bond->id)}}" class="btn btn-danger btn-xs" onclick="return confirm('{!! trans('Desea eliminar este registro') !!}?');"><i class="fas fa-trash"></i> {!! trans('Eliminar') !!}</a>
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
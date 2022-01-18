@extends('layouts.master_panel')
@section('title','Empleados')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header color-header">
              <h5 class="card-title" style="font-weight: bold;">{!! trans('Listado de empleados') !!}</h5>
            </div>
            <div class="card-body">
              <a href="{{route('employees.create')}}" class="btn btn-warning btn-sm"><i class="fas fa-plus-circle"></i> {!! trans('Crear Empleado') !!}</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tabledata1" class="table table-bordered table-striped">
                <thead>
                  <tr class="bg-warning text-center">
                    <th>{!! trans('Nombre Completo') !!} </th>
                    <th>{!! trans('Nick Name') !!}</th>
                    <th>{!! trans('Número celular') !!}</th>
                    <th>{!! trans('Correo Electrónico') !!}</th>
                    <th>{!! trans('Rol') !!}</th>
                    <th>{!! trans('Acciones') !!}</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($employee as $employees)
                  <tr>
                    <td>{{$employees->u_name}}</td>
                    <td>{{$employees->u_nickname}}</td>
                    <td>{{$employees->u_key_number}}</td>
                    <td>{{$employees->email}}</td>
                    <td>{{$employees->name}}</td>
                    <td>
                      <a href="{{route('employees.edit',$employees->id)}}" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i> {!! trans('Editar') !!}</a>
                      <a href="{{route('employees.delete',$employees->id)}}" class="btn btn-danger btn-xs" onclick="return confirm('{!! trans('Desea eliminar este registro') !!}?');"><i class="fas fa-trash"></i> {!! trans('Eliminar') !!}</a>
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
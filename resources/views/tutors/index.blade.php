@extends('layouts.master_panel')
@section('title','Tutores Activos')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="tabledata1" class="table table-bordered table-striped">
                        <thead>
                            <tr class="bg-warning text-center">
                                <th>{!! trans('Número de celular') !!}</th>
                                <th>{!! trans('Nickname') !!} </th>
                                <th>{!! trans('Correo') !!} </th>
                                <th>{!! trans('País') !!}</th>
                                <th>{!! trans('Acciones') !!}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>3165349304</td>
                                <td>Pepito</td>
                                <td>soporte@gmail.com.co</td>
                                <td>Colombia</td>
                                <td>
                                    <a href="{{route('customers.edit')}}" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i> {!! trans('Editar') !!}</a>
                                    <a href="" class="btn btn-danger btn-xs" onclick="return confirm('{!! trans('Desea eliminar este registro') !!}?');"><i class="fas fa-trash"></i> {!! trans('Eliminar') !!}</a>
                                </td>
                            </tr>
                            <tr>
                                <td>3116548977</td>
                                <td>Juanito</td>
                                <td>prueba@gmail.con</td>
                                <td>Brasil</td>
                                <td>
                                    <a href="{{route('tutors.edit')}}" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i> {!! trans('Editar') !!}</a>
                                    <a href="" class="btn btn-danger btn-xs" onclick="return confirm('{!! trans('Desea eliminar este registro') !!}?');"><i class="fas fa-trash"></i> {!! trans('Eliminar') !!}</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
@endsection


@extends('layouts.master_panel')
@section('title', 'Clientes Activos')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('customers.create')}}" class="btn btn-warning btn-sm"><i class="fas fa-plus-circle"></i> {!! trans('Crear cliente') !!}</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="tabledata1" class="table table-bordered table-striped">
                        <thead>
                            <tr class="bg-warning text-center">
                               
                                <th>{!! trans('Nickname') !!} </th>
                                <th>{!! trans('Número de celular') !!} </th>
                                <th>{!! trans('Correo') !!} </th>
                                <th>{!! trans('País') !!}</th>
                                <th>{!! trans('Moneda') !!}</th>
                                <th>{!! trans('Acciones') !!}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $user)
                                <tr>
                                    <td>{{$user->u_nickname}}</td>
                                    <td>{{$user->u_indicativo}} {{$user->u_key_number}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->c_name}}</td>
                                    <td>{{$user->c_type_currency}} - {{$user->c_currency}}</td>
                                    <td></td> 
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

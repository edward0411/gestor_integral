@extends('layouts.master_panel')

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
                                <th>{!! trans('Id') !!}</th>
                                <th>{!! trans('Nombre') !!}</th>
                                <th>{!! trans('Nickname') !!} </th>
                                <th>{!! trans('Correo') !!} </th>
                                <th>{!! trans('Estado') !!}</th>
                                <th>{!! trans('Acciones') !!}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->u_name}}</td>
                                    <td>{{$user->u_nickname}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->u_state == 1 ? 'Activo':'Desactivado' }}</td>
                                    <td>
                                        <a href="{{route('pre_registration.view_tutors', $user->id)}}" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i> {!! trans('Ver') !!}</a>
                                    </td>
                                </tr>
                            @endforeach
                            {{-- <tr>
                                <td>2</td>
                                <td>Juanito</td>
                                <td>loquiño</td>
                                <td>prueba@gmail.con</td>
                                <td>Activo</td>
                                <td>
                                    <a href="{{route('pre_registration.view_tutors')}}" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i> {!! trans('Ver') !!}</a>
                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
@endsection


@extends('layouts.master_panel')
@if($state == 1)
@section('title','Tutores Activos')
@elseif($state == 4)
@section('title','Tutores Inactivos')
@endif

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header color-header">
                    @if($state == 1)
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Listado de tutores activos') !!}</h5>
                    @elseif($state == 4)
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Listado de tutores inactivos') !!}</h5>
                    @endif
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if($state == 1)
                    <a href="{{route('tutors.create')}}" class="btn btn-warning btn-sm"><i class="fas fa-plus-circle"></i> {!! trans('Crear tutor') !!}</a>      
                    @endif
                  </div>
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
                        @foreach ($data as $user)
                        <tr>
                            <td>{{$user->u_indicativo}} {{$user->u_key_number}}</td>
                            <td>{{$user->u_nickname}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->c_name}}</td>
                            <td>
                                @if($state == 1)
                                <a href="{{route('tutors.edit',$user->id)}}" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i> {!! trans('Editar') !!}</a>
                                <a href="" class="btn btn-danger btn-xs" onclick="return confirm('{!! trans('Desea inactivar este registro') !!}?');"><i class="fas fa-trash"></i> {!! trans('Inactivar') !!}</a>
                                @elseif($state == 4)
                                <a href="" class="btn btn-warning btn-xs" onclick="return confirm('{!! trans('Desea reactivar este registro') !!}?');"><i class="fas fa-check"></i> {!! trans('Reactivar') !!}</a>
                                @endif
                                
                            </td> 
                        </tr>
                    @endforeach
                </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
@endsection


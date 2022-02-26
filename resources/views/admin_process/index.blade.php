@extends('layouts.master_panel')
@section('title','Procesos administrativos')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header color-header">
                    @if(Auth::user()->roles()->first()->id == 6)
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Listado de mis Procesos administrativos') !!}</h5>
                    @else
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Listado de Procesos administrativos') !!}</h5>
                    @endif
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="tabledata1" class="table table-bordered table-striped">
                        <thead>
                            <tr class="bg-warning text-center">
                                @if((Auth::user()->roles()->first()->id != 6)  && (Auth::user()->roles()->first()->id != 4))
                                <th>{!! trans('Rol') !!}</th>
                                <th>{!! trans('Usuario') !!}</th>
                                @endif
                                <th>{!! trans('Fecha de inicio') !!}</th>
                                <th>{!! trans('Estado') !!}</th>
                                <th>{!! trans('Acciones') !!}</th>
                            </tr>
                        </thead>
                        <tbody>
                         
                            @foreach($admin_process as $admin_process)
                            <tr>
                                @if((Auth::user()->roles()->first()->id != 6)  && (Auth::user()->roles()->first()->id != 4))
                                <td>{{ $admin_process->user->roles()->first()->name }}</td>
                                <td>{{ $admin_process->user->u_nickname }}</td>
                                @endif
                                <td>{{ $admin_process->created_at }}</td>
                                <td>{{ $admin_process->ap_status }}</td>
                                <td>                                         
                                    <a href="{{route('admin_process.messages',$admin_process->id)}}" class="btn btn-warning btn-xs">
                                        <i class="fas fa-eye"></i> {!! trans('Ver') !!}                                            
                                        @if (count($admin_process->messages_admin))
                                        <span class="badge bg-danger"> {{ count($admin_process->messages_admin) }}</span>
                                    @endif
                                        
                                    </a>                                        
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
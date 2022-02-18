@extends('layouts.master_panel')
@section('title','Bandeja de Comunicaciones')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header color-header">
                    @if(Auth::user()->roles()->first()->id == 4)
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Listado de mis comunicaciones') !!}</h5>
                    @else
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Listado de comunicaciones') !!}</h5>
                    @endif
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="tabledata1" class="table table-bordered table-striped">
                        <thead>
                            <tr class="bg-warning text-center">
                                <th>{!! trans('N° de proceso') !!}</th>
                                
                                @if( Auth::user()->roles()->first()->id != 4)
                                <th>{!! trans('Rol') !!}</th>
                                <th>{!! trans('Usuario') !!}</th>
                                @endif
                                <th>{!! trans('Fecha de inicio') !!}</th>
                                <th>{!! trans('Estado') !!}</th>
                                <th>{!! trans('Acciones') !!}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($communications as $communication)
                                <tr>
                                    <td>#{{ $communication->request->id }}</td>
                                    @if(Auth::user()->roles()->first()->id != 4)
                                    <td>{{ $communication->user->roles()->first()->name }}</td>
                                    <td>{{ $communication->user->u_nickname }}</td>
                                    @endif
                                    <td>{{ $communication->request->created_at }}</td>
                                    <td>{{ $communication->request->requestState->name }}</td>
                                    <td>                                         
                                        <a href="{{ route('communications.living', $communication->id) }}" class="btn btn-warning btn-xs">
                                            <i class="fas fa-eye"></i> {!! trans('Ver') !!}                                            
                                            @if (count($communication->messages))
                                                <span class="badge bg-danger"> {{ count($communication->messages) }}</span>
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
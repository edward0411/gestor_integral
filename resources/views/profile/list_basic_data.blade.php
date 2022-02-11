@extends('layouts.master_panel')
@section('title','Solicitud usuario')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Listado de solicitud de usuario') !!}
                    </h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="tabledata1" class="table table-bordered table-striped">
                        <thead>
                            <tr class="bg-warning text-center">
                                <th>{!! trans('Usuario') !!}</th>
                                <th>{!! trans('Nick Name') !!}</th>
                                <th>{!! trans('Acciones') !!}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($requestUsers as $requestUser)
                                <tr>
                                    <td>{{$requestUser->u_name}}</td>
                                    <td>{{$requestUser->u_nickname}}</td>
                                    <td>
                                        <a href="{{route('profile.request.show', $requestUser->id)}}" class="btn btn-warning btn-xs"><i class="far fa-eye"></i> {!!trans('Ver') !!}</a>
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

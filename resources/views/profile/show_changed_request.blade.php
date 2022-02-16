@extends('layouts.master_panel')
@section('title','Solicitud de usuario')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center align-items-center">
        <div class="col-12">
            <div class="card ">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Información de usuario') !!}</h5>
                </div>
                <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="">{!! trans('Nombre completo') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="" name="name" value="{{$user->u_name}}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="u_name">{!! trans('Nombre de usuario') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="u_name" name="u_name" value="{{$user->u_nickname}}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="observation_name">{!! trans('Numero de telefono') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="u_name" name="u_name" value="{{$user->u_key_number}}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="observation_name">{!! trans('Indicativo de telefono') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="u_name" name="u_name" value="{{$user->u_indicativo}}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="">{!! trans('Tipo de documento') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="" name="name" value="{{$user->parametric->p_text}}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="u_name">{!! trans('Numero de documento') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="u_name" name="u_name" value="{{$user->u_num_doc}}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="observation_name">{!! trans('Pais de origen') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="u_name" name="u_name" value="{{$user->country->c_name}}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="observation_name">{!! trans('medio de contacto') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="u_name" name="u_name" value="{{$user->means->p_text}}" readonly>
                            </div>
                        </div>
                    </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-12">
            <div class="card ">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Solicitud de usuario') !!}</h5>
                </div>
                <!-- /.card-header -->
                    <div class="card-body">
                        @foreach($requestUsers as $requestUser)
                            <div>
                                <p>Solicitud #{{$requestUser->id}}</p>
                            </div>
                            <div class="row">

                                <div class="form-group col-md-2">
                                    <label for="">{!! trans('Campo a actualizar') !!}</label>
                                    <input type="text" class="form-control form-control-sm" id="" name="name" value="{{$requestUser->name}}" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="u_name">{!! trans('Solicitud') !!}</label>
                                    <input type="text" class="form-control form-control-sm" id="u_name" name="u_name" value="{{$requestUser->value}}" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="observation_name">{!! trans('Observacion') !!}</label>
                                    <input type="text" class="form-control form-control-sm" id="u_name" name="u_name" value="{{$requestUser->request_observation ? $requestUser->request_observation:'sin observacion...'}}" readonly>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="observation_name">{!! trans('Estado') !!}</label>
                                    <input type="text" class="form-control form-control-sm" id="u_name" name="u_name" value="{{$requestUser->state}}" readonly>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="observation_name">{!! trans('Fecha') !!}</label>
                                    <input type="text" class="form-control form-control-sm" id="u_name" name="u_name" value="{{$requestUser->created_at}}" readonly>
                                </div>
                                @if(\Auth::user()->roles()->first()->id != 6 && \Auth::user()->roles()->first()->id != 4 && $requestUser->request_state < 1)
                                    <div class="form-group row">
                                        <form class="mx-3" method="POST" action="{{route('profile.request.state', [$requestUser->id, 1])}}">
                                            @csrf
                                            <div class="btn-group" role="group" aria-label="First group">
                                                <button type="submit" id="" class="btn btn-warning btn-sm float-right" onclick="return confirm('{!! trans('Desea aprobar este registro') !!}?');"> {!! trans('Aprobar') !!}</button>
                                            </div>
                                        </form>
                                        <form  class="mx-3" method="POST" action="{{route('profile.request.state', [$requestUser->id, 2])}}">
                                            @csrf
                                            <div class="btn-group " role="group" aria-label="Second group">
                                                <button type="submit" id="" class="btn btn-warning btn-sm float-right" onclick="return confirm('{!! trans('Desea rechzar este registro') !!}?');"> {!! trans('Rechazar') !!}</button>
                                            </div>
                                        </form>
                                    </div>
                                @endif
                            </div>
                            <hr size="2px" color="black" />
                        @endforeach
                        <a href="{{route('profile.list_basic_data')}}" class="btn btn-warning btn-sm float-right">{!! trans('Regresar') !!}</a>

                    </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
</div>
@endsection

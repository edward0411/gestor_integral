@extends('layouts.master_panel')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-9">
            <div class="card ">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Editar moneda') !!}</h5>
                </div>
                <!-- /.card-header -->
                <form method="POST" action="{{route('coins.update')}}">
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="c_currency">{!! trans('Moneda') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="c_currency" name="c_currency" value="{{$coins->c_currency}}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="c_type_currency">{!! trans('Tipo de Moneda') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="c_type_currency" name="c_type_currency" value="{{$coins->c_type_currency}}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="c_trm_currency">{!! trans('TRM Moneda') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="c_trm_currency" name="c_trm_currency" value="{{$coins->c_trm_currency}}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">{!! trans('Orden') !!}</label>
                                <input type="number" class="form-control form-control-sm" id="c_order" name="c_order" value="{{$coins->c_order}}" required>
                            </div>
                            @if ($coins->c_state == 1)
                            <div class="form-group col-md-4">
                                <label for="c_state"> {!! trans('Estado') !!}</label> <br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="c_state" name="c_state" class="custom-control-input" value="1" checked>
                                    <label class="custom-control-label" for="c_state"> {!! trans('Activo')
                                        !!}</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="c_state_2" name="c_state" class="custom-control-input" value="0">
                                    <label class="custom-control-label" for="c_state_2"> {!! trans('Inactivo')
                                        !!}</label>
                                </div>
                            </div>
                            @else
                            <div class="form-group col-md-4">
                                <label for="c_state"> {!! trans('Estado') !!}</label> <br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="c_state_2" name="c_state" class="custom-control-input" value="1" checked>
                                    <label class="custom-control-label" for="c_state"> {!! trans('Activo')
                                        !!}</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="c_state" name="c_state" class="custom-control-input" value="0">
                                    <label class="custom-control-label" for="c_state_2"> {!! trans('Inactivo')
                                        !!}</label>
                                </div>
                            </div>
                           @endif
                        </div>
                        <input type="hidden" name="id" value="{{ $coins->id}}">
                        <button type="submit" id="" class="btn btn-warning btn-sm"> {!! trans('Guardar') !!}</button>
                        <a href="{{route('coins.index')}}" class="btn btn-warning btn-sm float-right">{!! trans('Regresar') !!}</a>
                    </div>
                </form>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
</div>
@endsection


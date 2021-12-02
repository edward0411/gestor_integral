@extends('layouts.master_panel')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Editar paramétrica') !!}</h5>
                </div>
                <!-- /.card-header -->
                <form method="POST" action="">
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="p_category">{!! trans('Categoria') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="p_category" name="p_category" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="p_value">{!! trans('Valor') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="p_value" name="p_value" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="p_text">{!! trans('Texto') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="p_text" name="p_text">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="p_order">{!! trans('Orden') !!}</label>
                                <input type="number" class="form-control form-control-sm" id="p_order" name="p_order">
                            </div>
                        </div>
                        <button type="submit" id="" class="btn btn-warning btn-sm"> {!! trans('Guardar') !!}</button>
                        <a href="{{route('parametrics.index')}}" class="btn btn-warning btn-sm float-right">{!! trans('Regresar') !!}</a>
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


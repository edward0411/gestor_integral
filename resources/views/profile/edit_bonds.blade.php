@extends('layouts.master_panel')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Editar Bono') !!}</h5>
                </div>
                <!-- /.card-header -->
                <form method="POST" action="">
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="id_user">{!! trans('Nick Name') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="id_user" name="id_user" value="" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="type_bono"> {!! trans('Clasificación') !!}</label>
                                <select class="form-control form-control-sm" id="type_bono" name="type_bono" required>
                                    <option value="">{!! trans('Selecione...') !!}</option>
                                    
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="type_value"> {!! trans('Tipo') !!}</label>
                                <select class="form-control form-control-sm" id="type_value" name="type_value" required>
                                    <option value="">{!! trans('Selecione...') !!}</option>
                                    
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="b_value">{!! trans('Valor') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="b_value" name="b_value" value="" required>
                            </div>
                        </div>
                        <button type="submit" id="" class="btn btn-warning btn-sm"> {!! trans('Guardar') !!}</button>
                        <a href="{{route('profile.index_bonds')}}" class="btn btn-warning btn-sm float-right">{!! trans('Regresar') !!}</a>
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

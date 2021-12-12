@extends('layouts.master_panel')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Crear área') !!}</h5>
                </div>
                <!-- /.card-header -->
                <form method="POST" action="{{route('areas.store')}}">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="a_name">{!! trans('Área') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="a_name" name="a_name" value="" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="a_name">{!! trans('Orden') !!}</label>
                                <input type="number" class="form-control form-control-sm" id="a_order" name="a_order" value="" required>
                            </div>
                        </div>
                        <button type="submit" id="" class="btn btn-warning btn-sm"> {!! trans('Guardar') !!}</button>
                        <a href="{{route('areas.index')}}" class="btn btn-warning btn-sm float-right">{!! trans('Regresar') !!}</a>
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

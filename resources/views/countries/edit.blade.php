@extends('layouts.master_panel')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Editar país') !!}</h5>
                </div>
                <!-- /.card-header -->
                <form method="POST" action="{{route('countries.update')}}">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="c_indicative">{!! trans('Indicativo') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="c_indicative" name="c_indicative" value="{{$country->c_indicative}}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="c_name">{!! trans('Nombre') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="c_name" name="c_name" value="{{$country->c_name}}">
                            </div>
                        </div>
                        <input type="hidden" name="c_id" value="{{ $country->id}}">
                        <button type="submit" id="" class="btn btn-warning btn-sm"> {!! trans('Guardar') !!}</button>
                        <a href="{{route('countries.index')}}" class="btn btn-warning btn-sm float-right">{!! trans('Regresar') !!}</a>
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

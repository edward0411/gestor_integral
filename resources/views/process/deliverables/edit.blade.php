@extends('layouts.master_panel')
@section('css')
<style>
    
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Editar Entregable') !!}</h5>
                </div>
                <!-- /.card-header -->
                <form method="POST" action="{{route('process.deliverables.store')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_deliverable" value="{{$data->id}}">
                    <input type="hidden" name="id_work" value="{{$data->work_id}}">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="deliver_date">{!! trans('Cotización N°') !!}</label>
                                <p>{{$data->work->requestQuote->id}}</p>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="id_coin">{!! trans('Fecha entregable') !!}</label>
                                <p>{{$fecha}}</p>
                                
                            </div>
                            <div class="form-group col-md-6">
                                <label for="file"> {!! trans('Entregable') !!}</label>
                                @if ($data->file != null)
                                    <p>{{$data->file}}</p>
                                @endif
                                <input type="file" name="file_deliverable" class="form-control form-control-sm">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cuenta_cobro"> {!! trans('Cuenta de cobro') !!}</label>
                                <small><b>*</b> Favor subir en formato PDF</small>
                                @if ($data->cuenta_cobro != null)
                                    <p>{{$data->cuenta_cobro}}</p>
                                @endif
                                <input type="file" name="cuenta_cobro" class="form-control form-control-sm">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="obs_deliverable">{!! trans('Observaciones') !!}</label>
                                <textarea name="obs_deliverable" cols="30" rows="3" class="form-control form-control-sm">{{$data->observaciones}}</textarea>
                            </div>
                        </div>
                        <button type="submit" id="" class="btn btn-warning btn-sm"> {!! trans('Guardar') !!}</button>
                        <a href="{{route('process.deliverables.index')}}" class="btn btn-warning btn-sm float-right">{!! trans('Regresar') !!}</a>
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

@section('script')
<script type="text/javascript">
    
       
    </script>
@endsection

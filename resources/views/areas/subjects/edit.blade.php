@extends('layouts.master_panel')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Editar materia') !!}</h5>
                </div>
                <!-- /.card-header -->
                <form method="POST" action="{{route('areas.subjects.update')}}">
                    @csrf
                    <input type="hidden" name="id_area" value="{{$id}}">
                    <input type="hidden" name="id" value="{{$subjects->id}}">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="s_name">{!! trans('Materia') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="s_name" name="s_name" value="{{$subjects->s_name}}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="s_order">{!! trans('Orden') !!}</label>
                                <input type="number" class="form-control form-control-sm" id="s_order" name="s_order" value="{{$subjects->s_order}}" max="{{$max}}" title="Por favor ingresa un numero del 1 al {{$max}}" min="1"  required>
                            </div>
                        </div>
                        <button type="submit" id="" class="btn btn-warning btn-sm"> {!! trans('Guardar') !!}</button>
                        <a href="{{route('areas.subjects.index',$subjects->id)}}" class="btn btn-warning btn-sm float-right">{!! trans('Regresar') !!}</a>
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

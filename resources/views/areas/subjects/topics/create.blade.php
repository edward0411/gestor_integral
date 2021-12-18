@extends('layouts.master_panel')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Crear tema') !!}</h5>
                </div>
                <!-- /.card-header -->
                <form method="POST" action="{{route('areas.subjects.topics.store')}}">
                    @csrf
                    <input type="hidden" name="id_subject" value="{{$subject->id}}">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="s_name">{!! trans('Materia') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="s_name" name="s_name" value="{{$subject->s_name}}" required disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="a_name">{!! trans('Tema') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="t_name" name="t_name" value="" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="a_name">{!! trans('Orden') !!}</label>
                                <input type="number" class="form-control form-control-sm" id="t_order" name="t_order" max="{{$max}}" title="Por favor ingresa un numero del 100 al {{$max}}" min="1" placeholder="Asignar el valor {{$max}} como ultimo registro" value="" required>
                            </div>
                        </div>
                        <button type="submit" id="" class="btn btn-warning btn-sm"> {!! trans('Guardar') !!}</button>
                        <a href="{{route('areas.subjects.topics.index',$subject->id)}}" class="btn btn-warning btn-sm float-right">{!! trans('Regresar') !!}</a>
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

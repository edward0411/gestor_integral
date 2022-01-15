@extends('layouts.master_panel')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Crear información de sistema') !!}</h5>
                </div>
                <!-- /.card-header -->
                <form method="POST" action="">
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="id_system">{!! trans('Sistema') !!}</label>
                                <select name="id_system" class="form-control form-control-sm" id="id_system" required>
                                    <option value="" selected>{!! trans('Seleccione...') !!}</option>
                                    @foreach($list_systems as $systems)
                                    <option value="{{$systems->id}}" >{{$systems->p_text}}</option> 
                                    @endforeach                                
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="t_s_namefile">{!! trans('Archivo') !!}</label>
                                <input type="file" class="form-control form-control-sm" id="t_s_namefile" name="t_s_namefile" required>
                            </div>
                        </div>
                        <button type="submit" id="" class="btn btn-warning btn-sm"> {!! trans('Guardar') !!}</button>
                        <a href="{{route('pre_registration.index_registration')}}" class="btn btn-warning btn-sm float-right">{!! trans('Regresar') !!}</a>
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

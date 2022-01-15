@extends('layouts.master_panel')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Crear información de idiomas') !!}</h5>
                </div>
                <!-- /.card-header -->
                <form method="POST" action="">
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="id_language">{!! trans('Idiomas') !!}</label>
                                <select name="id_language " class="form-control form-control-sm" id="id_language" required>
                                    <option value="" selected>{!! trans('Seleccione...') !!}</option>
                                    @foreach($list_languages as $languages)
                                    <option value="{{$languages->id}}" >{{$languages->p_text}}</option> 
                                    @endforeach                            
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="l_t_namefile">{!! trans('Archivo') !!}</label>
                                <input type="file" class="form-control form-control-sm" id="l_t_namefile" name="l_t_namefile" required>
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

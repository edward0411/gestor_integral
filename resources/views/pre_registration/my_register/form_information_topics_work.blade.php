@extends('layouts.master_panel')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Crear información de temas trabajables') !!}</h5>
                </div>
                <!-- /.card-header -->
                <form method="POST" action="">
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="id_area">{!! trans('Áreas') !!}</label>
                                <select name="id_area" class="form-control form-control-sm" onchange="fill_subjects()" required>
                                    <option value="" selected>{!! trans('Seleccione...') !!}</option>
                                    @foreach($areas as $area)
                                    <option value="{{$area->id}}">{{$area->a_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="id_subject">{!! trans('Materias') !!}</label>
                                <select name="id_subject" class="form-control form-control-sm" required>
                                    <option value="" selected>{!! trans('Seleccione...') !!}</option>
                                    
                                    <option value="" ></option>
                                    
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="id_topic">{!! trans('Temas') !!}</label>
                                <select name="id_topic" class="form-control form-control-sm" required>
                                    <option value="" selected>{!! trans('Seleccione...') !!}</option>
                                    
                                    <option value="" ></option>
                                    
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="t_b_namefile">{!! trans('Archivo') !!}</label>
                                <input type="file" class="form-control form-control-sm" id="t_b_namefile" name="t_b_namefile" required>
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

@section('scripts')

<script type="text/javascript">





</script>

@endsection

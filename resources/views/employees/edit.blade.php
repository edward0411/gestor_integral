@extends('layouts.master_panel')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Editar Empleado') !!}</h5>
                </div>
                <!-- /.card-header -->
                <form method="POST" action="{{route('employees.update')}}">
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="name">{!! trans('Nombre Completo') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="u_name" name="u_name" value="{{$employee[0]->u_name}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="name">{!! trans('Nick Name') !!} <i class="fa fa-asterisk" style="font-size:10px;color: red"></i></label>
                                <input type="text" class="form-control form-control-sm" id="u_nickname " name="u_nickname" value="{{$employee[0]->u_nickname}}" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="role">{!! trans('Tipo de Documento') !!} <i class="fa fa-asterisk" style="font-size:10px;color: red"></i></label>
                                <select class="form-control form-control-sm" id="u_type_doc" name="u_type_doc" required>
                                    <option value="{{$employee[0]->u_type_doc}}">{{$employee[0]->p_text}}</option>
                                    @foreach ($type_docs as $type)
                                    <option value="{{$type->id}}">{{$type->p_text}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="name">{!! trans('Número Documento') !!} <i class="fa fa-asterisk" style="font-size:10px;color: red"></i></label>
                                <input type="text" class="form-control form-control-sm" id="u_num_doc" name="u_num_doc" value="{{$employee[0]->u_num_doc}}" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="correo">{!! trans('Número celular') !!} <i class="fa fa-asterisk" style="font-size:10px;color: red"></i></label>
                                <input type="number" class="form-control form-control-sm" id="u_key_number" name="u_key_number" value="{{$employee[0]->u_key_number}}" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="role">{!! trans('Pais de origen') !!} <i class="fa fa-asterisk" style="font-size:10px;color: red"></i></label>
                                <select class="form-control form-control-sm" id="u_id_country" name="u_id_country" required>
                                    <option value="{{$employee[0]->u_id_country}}">{{$employee[0]->c_name}}</option>
                                    @foreach ($countries as $country)
                                    <option value="{{$country->id}}">{{$country->c_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="correo">{!! trans('Correo Electrónico') !!} <i class="fa fa-asterisk" style="font-size:10px;color: red"></i></label>
                                <input type="email" class="form-control form-control-sm" id="email" name="email" value="{{$employee[0]->email}}" required autocomplete="email">
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{ $employee[0]->id}}">
                        <button type="submit" id="" class="btn btn-warning btn-sm"> {!! trans('Guardar') !!}</button>
                        <a href="{{route('employees.index')}}" class="btn btn-warning btn-sm float-right">{!! trans('Regresar') !!}</a>
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

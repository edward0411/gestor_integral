@extends('layouts.master_panel')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Crear Empleado') !!}</h5>
                </div>
                <!-- /.card-header -->
                <form method="POST" action="{{route('employees.store')}}">
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="u_name"><i class="fa fa-asterisk" style="font-size:10px;color: red"></i> {!! trans('Nombre Completo') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="u_name" name="u_name" value="">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="u_nick_name"><i class="fa fa-asterisk" style="font-size:10px;color: red"></i> {!! trans('Nick Name') !!} <small>(No usar espacios.)</small></label>
                                <input type="text" class="form-control form-control-sm" id="u_nickname " name="u_nick_name" value="" onChange="bringIndicative();" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="u_type_doc"><i class="fa fa-asterisk" style="font-size:10px;color: red"></i> {!! trans('Tipo de Documento') !!}</label>
                                <select class="form-control form-control-sm" id="u_type_doc" name="u_type_doc" required>
                                    <option value="">{!! trans('Selecione...') !!}</option>
                                    @foreach ($type_docs as $type)
                                    <option value="{{$type->id}}">{{$type->p_text}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="u_num_doc"><i class="fa fa-asterisk" style="font-size:10px;color: red"></i> {!! trans('Número Documento') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="u_num_doc" name="u_num_doc" value="" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="u_key_number"><i class="fa fa-asterisk" style="font-size:10px;color: red"></i> {!! trans('Número celular') !!} <small>(No usar ni puntos ni espacios.)</small></label>
                                <input type="number" class="form-control form-control-sm" id="u_key_number" name="u_key_number" value="" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="id_contry"><i class="fa fa-asterisk" style="font-size:10px;color: red"></i> {!! trans('Pais de origen') !!}</label>
                                <select class="form-control form-control-sm" id="u_id_country" name="id_contry" onChange="bringIndicative();" required>
                                    <option value="">{!! trans('Selecione...') !!}</option>
                                    @foreach ($countries as $country)
                                    <option value="{{$country->id}}">{{$country->c_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="u_indicativo"><i class="fa fa-asterisk" style="font-size:10px;color: red"></i> {!! trans('Indicativo') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="u_indicativo" name="u_indicativo" value="{{ old('u_indicativo') }}" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email"><i class="fa fa-asterisk" style="font-size:10px;color: red"></i> {!! trans('Correo Electrónico') !!}</label>
                                <input type="email" class="form-control form-control-sm" id="email" name="email" value="" required autocomplete="email">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="role"><i class="fa fa-asterisk" style="font-size:10px;color: red"></i> {!! trans('Rol') !!}</label>
                                <select class="form-control form-control-sm" id="role" name="role" required>
                                    <option value="">{!! trans('Selecione...') !!}</option>
                                    @foreach ($roles as $rol)
                                    <option value="{{$rol->id}}">{{$rol->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
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

@section('script')

<script type="text/javascript">
    var countries = [
        @foreach($countries as $item) {
            "id_indicative": "{{$item->id}}",
            "indicative": "{{$item->c_indicative}}",
         },
        @endforeach
    ];

    function bringIndicative() {

        var selectedCountry = $("#u_id_country").val();
        nuevo = $.grep(countries, function(n, i) {
            return n.id_indicative == selectedCountry
        });
        $.each(nuevo, function(key, value) {
           $('#u_indicativo').val(value.indicative);
        });

    }

</script>


@endsection



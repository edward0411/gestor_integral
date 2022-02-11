@extends('layouts.master_panel')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Editar tutor') !!}</h5>
                </div>
                <!-- /.card-header -->
                <form method="POST" action="{{route('tutors.store_tutor')}}">
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="u_name">{!! trans('Nombre completo') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="u_name" name="u_name" value="{{$data[0]->u_name}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="u_nickname">{!! trans('Nick name') !!} <small>(No usar espacios.)</small></label>
                                <input type="text" class="form-control form-control-sm" id="u_nickname" name="u_nickname" value="{{$data[0]->u_nickname}}" onchange="spc();" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="u_type_doc">{!! trans('Tipo de documento') !!}</label>
                                <select name="u_type_doc" id="u_type_doc" class="form-control form-control-sm">
                                    <option value="">Seleccione...</option>

                                    @foreach($type_docs as $document)
                                    <option value="{{$document->id}}" {{ $document->id == $data[0]->u_type_doc ? 'selected' : '' }}>{{$document->p_text}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="u_num_doc">{!! trans('Número documento') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="u_num_doc" name="u_num_doc" value="{{$data[0]->u_num_doc}}" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="u_id_country">{!! trans('País de origen') !!}</label>
                                <select name="u_id_country" id="u_id_country" class="form-control form-control-sm" onChange="bringIndicative();" required>
                                    <option value="">Seleccione país</option>
                                    @foreach ($countries as $country)
                                    <option value="{{$country->id}}" {{ $country->id == $data[0]->u_id_country ? 'selected' : '' }}>{{$country->c_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="u_indicativo">{!! trans('Indicativo') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="u_indicativo" name="u_indicativo" value="{{$data[0]->u_indicativo}}" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="u_key_number">{!! trans('Número de celular') !!} <small>(No usar ni puntos ni espacios.)</small></label>
                                <input type="text" class="form-control form-control-sm" onkeyup="num(this);" onblur='num(this);' id="u_key_number" name="u_key_number" value="{{$data[0]->u_key_number}}" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="u_id_means">{!! trans('Medio de contacto') !!}</label>
                                <select name="u_id_means" id="u_id_means" class="form-control form-control-sm">
                                    <option value="">Seleccione...</option>
                                    @foreach ($means as $mean)
                                    <option value="{{$mean->id}}" {{ $mean->id == $data[0]->u_id_means ? 'selected' : '' }}>{{$mean->p_text}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email">{!! trans('Correo') !!}</label>
                                <input type="email" class="form-control form-control-sm" id="email" name="email" value="{{$data[0]->email}}" required>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{$data[0]->id}}">
                        <button type="submit" id="" class="btn btn-warning btn-sm"> {!! trans('Guardar') !!}</button>
                        <a href="{{route('tutors.index')}}" class="btn btn-warning btn-sm float-right">{!! trans('Regresar') !!}</a>
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

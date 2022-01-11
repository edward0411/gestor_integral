@extends('layouts.master_panel')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-9">
            <div class="card ">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Editar perfil') !!}</h5>
                </div>
                <!-- /.card-header -->
                <form method="POST" action="">
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="u_name">{!! trans(' Nombre Completo') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="u_name" name="u_name" value="{{ old('u_name') }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="u_nickname">{!! trans('Nick Name') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="u_nickname" name="u_nickname" value="{{ old('u_nickname') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="u_type_doc">{!! trans('Tipo de Documento') !!}</label>
                                <select class="form-control form-control-sm" id="u_type_doc" name="u_type_doc" required>
                                    <option value="">{!! trans('Selecione...') !!}</option>
                                    @foreach ($type_docs as $type)
                                    <option value="{{$type->id}}">{{$type->p_text}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="u_num_doc">{!! trans('Número Documento') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="u_num_doc" name="u_num_doc" value="{{ old('u_num_doc') }}" required>
                                 
                            </div>
                            <div class="form-group col-md-6">
                                <label for="u_id_country">{!! trans('Pais de origen') !!}</label>
                                <select name="u_id_country" id="u_id_country" class="form-control form-control-sm">
                                    <option value="">Seleccione país</option>
                                    @foreach ($countries as $country)
                                    <option value="{{$country->id}}">{{$country->c_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="u_indicativo">{!! trans('Indicativo') !!}</label>
                                <input id="u_indicativo" type="number" class="form-control form-control-sm" name="u_indicativo" value="{{ old('u_indicativo') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="u_key_number">{!! trans('Número celular') !!}</label>
                                <input id="u_key_number" onkeyup="num(this);" onblur='num(this);' type="number" class="form-control form-control-sm" name="u_key_number" value="{{ old('u_key_number') }}" required>

                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">{!! trans('Correo') !!}</label>
                                <input  type="email" class="form-control form-control-sm" name="email" value="{{ old('email') }}" required>
    
                            </div>   
                        </div>
                        <button type="submit" id="" class="btn btn-warning btn-sm"> {!! trans('Guardar') !!}</button>
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

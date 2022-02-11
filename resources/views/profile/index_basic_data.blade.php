@extends('layouts.master_panel')
@if(\Auth::user()->roles()->first()->id == 4)
@section('title','Cliente perfil')
@elseif(\Auth::user()->roles()->first()->id == 6)
@section('title','Tutor perfil')
@endif

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center align-items-center">
        <div class="col-12">
            <div class="card ">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Editar perfil') !!}</h5>
                </div>
                <!-- /.card-header -->
                <form method="POST" action="{{route('profile.request')}}">
                    <div class="card-body">
                        @csrf
                        <div class="row">

                            <div class="form-group col-md-3">
                                <label for="">{!! trans(' Nombre Completo') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="" name="name" value="{{$data->u_name}}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="u_name">{!! trans('Solicitud') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="u_name" name="u_name" value="{{ old('u_name') }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="observation_name">{!! trans('Observaciones') !!}</label>
                                <textarea name="observation_name" id="" class="form-control form-control-sm" cols="2" rows="2"></textarea>
                            </div>

                            @if(\Auth::user()->roles()->first()->id != 6 && \Auth::user()->roles()->first()->id != 4)
                            <div class="form-group col-md-3">
                                <div class="btn-group mr-2" role="group" aria-label="First group">
                                    <button type="submit" id="" class="btn btn-warning btn-sm float-right"> {!! trans('Aprobar') !!}</button>
                                </div>
                                <div class="btn-group mr-2" role="group" aria-label="Second group">
                                    <button type="submit" id="" class="btn btn-warning btn-sm float-right"> {!! trans('Rechazar') !!}</button>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="">{!! trans('Nick Name') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="" name="nickname" value="{{$data->u_nickname}}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="u_name">{!! trans('Solicitud') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="u_nickname" name="u_nickname" value="{{ old('u_nickname') }}" >
                                @if ($errors->has('u_nickname'))
                                    <p class="text-danger">{{ $errors->first('u_nickname') }}</p>
                                @endif
                            </div>
                            <div class="form-group col-md-3">
                                <label for="observation_nickname">{!! trans('Observaciones') !!}</label>
                                <textarea name="observation_nickname" id="" class="form-control form-control-sm" cols="2" rows="2"></textarea>
                            </div>
                            @if(\Auth::user()->roles()->first()->id != 6 && \Auth::user()->roles()->first()->id != 4)
                            <div class="form-group col-md-3">
                                <div class="btn-group mr-2" role="group" aria-label="First group">
                                    <button type="submit" id="" class="btn btn-warning btn-sm float-right"> {!! trans('Aprobar') !!}</button>
                                </div>
                                <div class="btn-group mr-2" role="group" aria-label="Second group">
                                    <button type="submit" id="" class="btn btn-warning btn-sm float-right"> {!! trans('Rechazar') !!}</button>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="row">
                            @if(\Auth::user()->roles()->first()->id == 6)
                            <div class="form-group col-md-3">
                                <label for="">{!! trans('Tipo de Documento') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="" name="type_doc" value="{{$data->parametric->p_text}}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="u_type_doc">{!! trans('Solicitud') !!}</label>
                                <select class="form-control form-control-sm" id="u_type_doc" name="u_type_doc" >
                                    <option value="">{!! trans('Selecione...') !!}</option>
                                    @foreach ($type_docs as $type)
                                    <option value="{{$type->id}}" {{(old('u_type_doc')==$type->id)? 'selected':''}}>{{$type->p_text}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="observation_type">{!! trans('Observaciones') !!}</label>
                                <textarea name="observation_type" id="" class="form-control form-control-sm" cols="2" rows="2"></textarea>
                            </div>
                            @if(\Auth::user()->roles()->first()->id != 6 && \Auth::user()->roles()->first()->id != 4)
                            <div class="form-group col-md-3">
                                <div class="btn-group mr-2" role="group" aria-label="First group">
                                    <button type="submit" id="" class="btn btn-warning btn-sm float-right"> {!! trans('Aprobar') !!}</button>
                                </div>
                                <div class="btn-group mr-2" role="group" aria-label="Second group">
                                    <button type="submit" id="" class="btn btn-warning btn-sm float-right"> {!! trans('Rechazar') !!}</button>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="">{!! trans('Número Documento') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="" name="num_doc" value="{{$data->u_num_doc}}" readonly>

                            </div>
                            <div class="form-group col-md-3">
                                <label for="observation_doc">{!! trans('Solicitud') !!}</label>
                                <input type="number" class="form-control form-control-sm" id="u_num_doc" name="u_num_doc" value="{{ old('u_num_doc') }}" >
                                @if ($errors->has('u_num_doc'))
                                    <p class="text-danger">{{ $errors->first('u_num_doc') }}</p>
                                @endif
                            </div>
                            <div class="form-group col-md-3">
                                <label for="u_name">{!! trans('Observaciones') !!}</label>
                                <textarea name="observation_doc" id="" class="form-control form-control-sm" cols="2" rows="2"></textarea>
                            </div>
                            @if(\Auth::user()->roles()->first()->id != 6 && \Auth::user()->roles()->first()->id != 4)
                            <div class="form-group col-md-3">
                                <div class="btn-group mr-2" role="group" aria-label="First group">
                                    <button type="submit" id="" class="btn btn-warning btn-sm float-right"> {!! trans('Aprobar') !!}</button>
                                </div>
                                <div class="btn-group mr-2" role="group" aria-label="Second group">
                                    <button type="submit" id="" class="btn btn-warning btn-sm float-right"> {!! trans('Rechazar') !!}</button>
                                </div>
                            </div>
                            @endif
                            @endif
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="">{!! trans('Pais de origen') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="" name="id_country" value="{{$data->c_name}}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="u_id_country">{!! trans('Solicitud') !!}</label>
                                <select name="u_id_country" id="u_id_country" class="form-control form-control-sm" onChange="bringIndicative();">
                                    <option value="">Seleccione...</option>
                                    @foreach ($countries as $country)
                                    <option value="{{$country->id}}" {{(old('u_id_country')==$country->id)? 'selected':''}}>{{$country->c_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="observation_country">{!! trans('Observaciones') !!}</label>
                                <textarea name="observation_country" id="" class="form-control form-control-sm" cols="2" rows="2"></textarea>
                            </div>
                            @if(\Auth::user()->roles()->first()->id != 6 && \Auth::user()->roles()->first()->id != 4)
                            <div class="form-group col-md-3">
                                <div class="btn-group mr-2" role="group" aria-label="First group">
                                    <button type="submit" id="" class="btn btn-warning btn-sm float-right"> {!! trans('Aprobar') !!}</button>
                                </div>
                                <div class="btn-group mr-2" role="group" aria-label="Second group">
                                    <button type="submit" id="" class="btn btn-warning btn-sm float-right"> {!! trans('Rechazar') !!}</button>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="">{!! trans('Indicativo') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="" name="indicative" value="{{$data->u_indicativo}}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="u_indicativo">{!! trans('Solicitud') !!}</label>
                                <input id="u_indicativo" type="text" class="form-control form-control-sm" name="u_indicativo" value="{{ old('u_indicativo') }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="observation_indicative">{!! trans('Observaciones') !!}</label>
                                <textarea name="observation_indicative" id="" class="form-control form-control-sm" cols="2" rows="2"></textarea>
                            </div>
                            @if(\Auth::user()->roles()->first()->id != 6 && \Auth::user()->roles()->first()->id != 4)
                            <div class="form-group col-md-3">
                                <div class="btn-group mr-2" role="group" aria-label="First group">
                                    <button type="submit" id="" class="btn btn-warning btn-sm float-right"> {!! trans('Aprobar') !!}</button>
                                </div>
                                <div class="btn-group mr-2" role="group" aria-label="Second group">
                                    <button type="submit" id="" class="btn btn-warning btn-sm float-right"> {!! trans('Rechazar') !!}</button>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="">{!! trans('Número celular') !!}</label>
                                <input id=""  type="number" class="form-control form-control-sm" name="key_number" value="{{$data->u_key_number}}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="u_key_number">{!! trans('Solicitud') !!}</label>
                                <input id="u_key_number" onkeyup="num(this);" onblur='num(this);' type="number" class="form-control form-control-sm" name="u_key_number" value="{{ old('u_indicativo') }}">
                                @if ($errors->has('u_key_number'))
                                    <p class="text-danger">{{ $errors->first('u_key_number') }}</p>
                                @endif
                            </div>
                            <div class="form-group col-md-3">
                                <label for="observation_number">{!! trans('Observaciones') !!}</label>
                                <textarea name="observation_number" id="" class="form-control form-control-sm" cols="2" rows="2"></textarea>
                            </div>
                            @if(\Auth::user()->roles()->first()->id != 6 && \Auth::user()->roles()->first()->id != 4)
                            <div class="form-group col-md-3">
                                <div class="btn-group mr-2" role="group" aria-label="First group">
                                    <button type="submit" id="" class="btn btn-warning btn-sm float-right"> {!! trans('Aprobar') !!}</button>
                                </div>
                                <div class="btn-group mr-2" role="group" aria-label="Second group">
                                    <button type="submit" id="" class="btn btn-warning btn-sm float-right"> {!! trans('Rechazar') !!}</button>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="">{!! trans('Medio de contacto') !!}</label>
                                <input  type="email" class="form-control form-control-sm" name="id_means" value="{{$data->means->p_text}}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="u_id_means">{!! trans('Solicitud') !!}</label>
                                <select name="u_id_means" id="u_id_means" class="form-control form-control-sm">
                                    <option value="">Seleccione...</option>
                                    @foreach ($means as $mean)
                                    <option value="{{$mean->id}}" {{(old('u_id_means')==$mean->id)? 'selected':''}}>{{$mean->p_text}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="observation_means">{!! trans('Observaciones') !!}</label>
                                <textarea name="observation_means" id="" class="form-control form-control-sm" cols="2" rows="2"></textarea>
                            </div>
                            @if(\Auth::user()->roles()->first()->id != 6 && \Auth::user()->roles()->first()->id != 4)
                            <div class="form-group col-md-3">
                                <div class="btn-group mr-2" role="group" aria-label="First group">
                                    <button type="submit" id="" class="btn btn-warning btn-sm float-right"> {!! trans('Aprobar') !!}</button>
                                </div>
                                <div class="btn-group mr-2" role="group" aria-label="Second group">
                                    <button type="submit" id="" class="btn btn-warning btn-sm float-right"> {!! trans('Rechazar') !!}</button>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="row">
                            @if(\Auth::user()->roles()->first()->id == 4)
                            <div class="form-group col-md-3">
                                <label for="">{!! trans('Tipo de moneda por defecto') !!}</label>
                                <input  type="email" class="form-control form-control-sm" name="id_money" value="{{$data->c_type_currency}} - {{$data->c_currency}}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="u_id_money">{!! trans('Solicitud') !!}</label>
                                <select name="u_id_money" id="u_id_money" class="form-control form-control-sm">
                                    <option value="">Seleccione...</option>
                                    @foreach ($coins as $coin)
                                    <option value="{{$coin->id}}" {{(old('u_id_money')==$coin->id)? 'selected':''}}>{{$coin->c_type_currency}} - {{$coin->c_currency}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="observation_money">{!! trans('Observaciones') !!}</label>
                                <textarea name="observation_money" id="" class="form-control form-control-sm" cols="2" rows="2"></textarea>
                            </div>
                            @if(\Auth::user()->roles()->first()->id != 6 && \Auth::user()->roles()->first()->id != 4)
                            <div class="form-group col-md-3">
                                <div class="btn-group mr-2" role="group" aria-label="First group">
                                    <button type="submit" id="" class="btn btn-warning btn-sm float-right"> {!! trans('Aprobar') !!}</button>
                                </div>
                                <div class="btn-group mr-2" role="group" aria-label="Second group">
                                    <button type="submit" id="" class="btn btn-warning btn-sm float-right"> {!! trans('Rechazar') !!}</button>
                                </div>
                            </div>
                            @endif
                            @endif
                        </div>
                        <div class="row">
                            @if(\Auth::user()->roles()->first()->id == 6)
                            <div class="form-group col-md-3">
                                <label for="">{!! trans('Correo') !!}</label>
                                <input  type="email" class="form-control form-control-sm" name="email" value="{{$data->email}}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="email">{!! trans('Solicitud') !!}</label>
                                <input  type="email" class="form-control form-control-sm" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <p class="text-danger">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                            <div class="form-group col-md-3">
                                <label for="observation_email">{!! trans('Observaciones') !!}</label>
                                <textarea name="observation_email" id="" class="form-control form-control-sm" cols="2" rows="2"></textarea>
                            </div>
                            @if(\Auth::user()->roles()->first()->id != 6 && \Auth::user()->roles()->first()->id != 4)
                            <div class="form-group col-md-3">
                                <div class="btn-group mr-2" role="group" aria-label="First group">
                                    <button type="submit" id="" class="btn btn-warning btn-sm float-right"> {!! trans('Aprobar') !!}</button>
                                </div>
                                <div class="btn-group mr-2" role="group" aria-label="Second group">
                                    <button type="submit" id="" class="btn btn-warning btn-sm float-right"> {!! trans('Rechazar') !!}</button>
                                </div>
                            </div>
                            @endif
                            @endif
                        </div>
                        <button type="submit" id="" class="btn btn-warning btn-sm"> {!! trans('Validar') !!}</button>
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

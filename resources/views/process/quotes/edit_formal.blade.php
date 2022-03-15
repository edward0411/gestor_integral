@extends('layouts.master_panel')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-12">
            <div class="card ">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Editar Cotización formal') !!}</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="deliver_date">{!! trans('Cliente') !!}</label>
                            <p>{{$data->requestQuoteTutor->request->users->u_nickname}}</p>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="deliver_date">{!! trans('Fecha de entrega') !!}</label>
                            <p>{{$data->requestQuoteTutor->request->date_delivery}}</p>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="id_service">{!! trans('Tipo de servicio') !!}</label>
                            <p>{{$data->requestQuoteTutor->request->parametric->p_text}}</p>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="deliver_date">{!! trans('Tutor') !!}</label>
                            <p>{{$data->requestQuoteTutor->user->u_nickname}}</p>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="deliver_date">{!! trans('Valor moneda tutor') !!}</label>
                            <p>{{$data->requestQuoteTutor->user->coins->c_type_currency}} - {{number_format($data->requestQuoteTutor->value)}}</p>
                        </div>
                        @php
                            $valor = $data->requestQuoteTutor->value;
                            if($data->requestQuoteTutor->user->coins->c_trm_currency != 1){
                                $valor = $data->requestQuoteTutor->value * $data->requestQuoteTutor->user->coins->c_trm_currency;
                            }

                            $valor_client = $valor / $trm;
                        @endphp
                        <div class="form-group col-md-4">
                            <label for="id_service">{!! trans('Valor pesos colombianos COP') !!}</label>
                            <p>$ {{number_format($valor)}}</p>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="id_service">Valor en {{$data->requestQuoteTutor->request->users->coins->c_currency}} moneda del cliente  </label>
                            <p>{{$data->requestQuoteTutor->request->users->coins->c_type_currency}} - {{number_format($valor_client,2)}}</p>
                        </div>
                    </div>  
                           
                   
                </div>
            </div>
            <div class="card ">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Crear valore de cotización') !!}</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('process.quotes.store')}}" method="POST" class="form-group">
                    @csrf
                        <input type="hidden" name="id_quote" id="id_quote" value="{{$data->id}}">
                        <input type="hidden" name="id_request_tutor" id="id_request_tutor" value="{{$data->requestQuoteTutor->id}}">
                        <input type="hidden" name="value_trm_client" id="value_trm_client" value="{{$trm}}">
                        <input type="hidden" name="value_quote_cop" id="value_quote_cop" value="{{$valor}}">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <small>Recuerde realizar la cotización en <b>{{$data->requestQuoteTutor->request->users->coins->c_type_currency}} - {{$data->requestQuoteTutor->request->users->coins->c_currency}}</b></small>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="deliver_date">{!! trans('Tipo de utilidad') !!}</label>
                                <select class="form-control" name="type_utility" id="type_utility" required>
                                    <option value="">Seleccione...</option>
                                    @foreach($type_value as $value)
                                        <option value="{{$value->id}}" {{ $value->id == $data->utilityType->id ? 'selected' : '' }}>{{$value->p_text}}</option> 
                                    @endforeach    
                                </select>
                               
                            </div>
                            <div class="form-group col-md-4">
                                <label for="deliver_date">{!! trans('Valor utilidad') !!}</label>
                                <input type="number" step="0.01" class="form-control form-control-sm" id="value_utility" name="value_utility" value="{{$data->value_utility}}" onchange="CalcularCotizacion()" required>
                            </div>
                            @if($data->requestBond != null)
                                <input type="hidden" id="trm_bond" value="{{$data->requestBond->trm_assigned}}">
                                @if($data->requestBond->bond->value_bond->p_text == 'Porcentaje')
                                    <input type="hidden" id="type_bond" value="1">
                                    @php 
                                        $val_bond = (float)$data->requestBond->bond->b_value;
                                    @endphp
                                @else
                                    <input type="hidden" id="type_bond" value="2">
                                    @php
                                        $val_bond = (float)$data->requestBond->bond->b_value * (float)$data->requestBond->trm_assigned;
                                       
                                    @endphp
                                @endif
                            @else
                                @php
                                    $val_bond = 0
                                @endphp
                            @endif
                            <input type="hidden" id="val_bond" value="{{$val_bond}}">
                            
                            <div class="form-group col-md-4">
                                <label for="deliver_date">{!! trans('Asignar bono') !!}</label>
                                <select class="form-control" name="id_bond" id="id_bond" onchange="CalcularCotizacion()">
                                    @if($val_bond == 0)
                                        <option value="0">Sin asignar</option>
                                    @else
                                        @if($data->requestBond->bond->value_bond->p_text == 'Porcentaje')
                                            <option value="-1">{{$data->requestBond->bond->type_bond->p_text}} - {{$data->requestBond->bond->b_value}} %</option>
                                        @else
                                            <option value="-1">{{$data->requestBond->bond->type_bond->p_text}} - {{$data->requestBond->bond->b_value}}  {{$data->requestBond->bond->coins->c_type_currency}}</option>
                                        @endif
                                        <option value="0">Sin asignar</option>
                                    @endif
                                   
                                    
                                    @foreach($bonds as $bond)
                                        @if($bond->value_bond->p_text == "Porcentaje")
                                            <option value="{{$bond->id}}">{{$bond->type_bond->p_text}} - {{$bond->b_value}}%</option>
                                        @else
                                            <option value="{{$bond->id}}">{{$bond->type_bond->p_text}} - {{number_format($bond->b_value)}} {{$bond->coins->c_type_currency}}</option>
                                        @endif 
                                    @endforeach  
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="deliver_date">{!! trans('Valor Cot. formal') !!}</label>
                                <input type="number" class="form-control form-control-sm" name="value_cot_formal" id="value_cot_formal" value="{{$data->value}}" readonly>
                            </div>
                            @php
                                $val_cop = (float)$data->value * (float)$data->trm_assigned;
                            @endphp
                            <div class="form-group col-md-4">
                                <label for="deliver_date">{!! trans('Valor Cot. en pesos colombianos') !!}</label>
                                <input type="number" class="form-control form-control-sm" name="value_cot_cop" id="value_cot_cop" value="{{$val_cop}}" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="deliver_date">{!! trans('Fecha Cotización') !!}</label>
                                <input type="date" class="form-control form-control-sm" name="date_quote" id="date_quote" value="{{$fecha}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="deliver_date">{!! trans('Fecha max. cotización') !!}</label>
                                <input type="date" class="form-control form-control-sm" name="date_validate" id="date_validate" value="{{$fechaMax}}">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="deliver_date">{!! trans('Nota interna comercial') !!}</label>
                                <textarea name="private_note" id="" class="form-control form-control-sm" rows="2" >{{$data->private_note}}</textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="deliver_date">{!! trans('Observaciones') !!}</label>
                                <textarea name="observation" id="" class="form-control form-control-sm" rows="2" >{{$data->observation}}</textarea>
                            </div>
                           
                        </div>  
                        <button type="submit" id="" class="btn btn-warning btn-sm"> {!! trans('Guardar') !!}</button>
                        
                        <a href="{{route('process.request.index',Auth::user()->roles()->first()->id)}}" class="btn btn-warning btn-sm float-right">{!! trans('Regresar')!!}</a>
                    </form>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">

    var type_value = [
        @foreach ($type_value as $item)           
            {
            "id": "{{ $item->id }}",
            "text": "{{ $item->p_text }}"
            },
        @endforeach
    ];

    var bonds = [
        @foreach ($bonds as $bond)           
            {
            "id": "{{ $bond->id }}",
            "type": "{{ $bond->value_bond->p_text }}",
            "value": "{{ $bond->b_value }}",
            },
        @endforeach
    ]; 

    function separator(numb) {
        var str = numb.toString().split(".");
        str[0] = str[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return str.join(".");
    }

    function CalcularCotizacion(){

        var type_utility = $('#type_utility').val();
        var val_utility = $('#value_utility').val();
        var val_quote_cop = $('#value_quote_cop').val();
        var val_trm = $('#value_trm_client').val();
        var id_bond = $('#id_bond').val();
        var v1 = 0;
        var v2 = 0;
        var v3 = 0;
        var v_cop = 0;
        var v_cot = 0;

        if(Boolean(type_utility) == false){
            alert('Por favor seleccione un tipo de utilidad');
            return false;
        }

        nuevo = $.grep(type_value, function(n, i) {
            return n.id === type_utility
        });

        if(nuevo[0].text == 'Porcentaje')
        {
            if (val_utility > 100) {
                alert('El valor en porcentaje no puede superar el 100%');
                return false;
            }
            v1 = (parseFloat(val_quote_cop)/100)*parseFloat(val_utility);         
        }else{
            v1 = parseFloat(val_utility) * parseFloat(val_trm);
        }

        v_cop = parseFloat(val_quote_cop) + parseFloat(v1);

        if(id_bond > 0){
            nuevo = $.grep(bonds, function(n, i) {
                return n.id === id_bond
            });

            if (nuevo[0].type == 'Porcentaje') {
                v2 = parseFloat(nuevo[0].value);
                v3 = (v_cop/100)*v2;
                v_cop = v_cop - v3;  
            }else{
                v2 = parseFloat(nuevo[0].value) * parseFloat(val_trm);
                v_cop = v_cop - v2;
            }


        }else if( id_bond < 0){

            trm_bond = $('#trm_bond').val();
            v_bond = $('#val_bond').val();
            type_bond = $('#type_bond').val();

            console.log(trm_bond,v_bond,v_cop,)

            if (type_bond == 1) { 
                v3 = (v_cop/100) * parseFloat(v_bond);
                v_cop = v_cop - v3; 
            }else{
                v2 = parseFloat(v_bond) * parseFloat(trm_bond);
                v_cop = v_cop - v2;
            }
        }

        v_cot = v_cop/parseFloat(val_trm);

        $('#value_cot_cop').val(Number.parseFloat(v_cop).toFixed(2));
        $('#value_cot_formal').val(Number.parseFloat(v_cot).toFixed(2));

    }

</script>
@endsection

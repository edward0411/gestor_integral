@extends('layouts.master_panel')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-12">
            <div class="card ">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Crear Cotización formal') !!}</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="deliver_date">{!! trans('Cliente') !!}</label>
                            <p>{{$request->request->users->u_nickname}}</p>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="deliver_date">{!! trans('Fecha de entrega') !!}</label>
                            <p>{{$request->request->date_delivery}}</p>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="id_service">{!! trans('Tipo de servicio') !!}</label>
                            <p>{{$request->request->parametric->p_text}}</p>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="deliver_date">{!! trans('Tutor') !!}</label>
                            <p>{{$request->user->u_nickname}}</p>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="deliver_date">{!! trans('Valor moneda tutor') !!}</label>
                            <p>{{$request->user->coins->c_type_currency}} - {{number_format($request->value)}}</p>
                        </div>
                        @php
                            $valor = $request->value;
                            if($request->user->coins->c_trm_currency != 1){
                            $valor = $request->value * $request->user->coins->c_trm_currency;
                            }
                        @endphp
                        <div class="form-group col-md-4">
                            <label for="id_service">{!! trans('Valor pesos colombianos COP') !!}</label>
                            <p>$ {{number_format($valor)}}</p>
                        </div>
                    </div>  
                           
                   
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

</script>
@endsection

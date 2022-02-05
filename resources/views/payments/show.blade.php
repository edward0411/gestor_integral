@extends('layouts.master_panel')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center align-items-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header color-header">
                    <h5 class="text-white" style="font-weight: bold;">{!! trans('Información de solicitud') !!}</h5>
                </div>
                <div class="card-body table-responsive">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="">Fecha de entrega:</label>
                            <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="{{$quote->requestQuoteTutor->request->date_delivery}}" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Observación:</label>
                            <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="{{$quote->requestQuoteTutor->request->observation}}" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Tipo de servicio:</label>
                            <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="{{$quote->requestQuoteTutor->request->parametric->p_text}}"  disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Estado de solicitud:</label>
                            <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="{{$quote->requestQuoteTutor->request->requestState->name}}" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Cliente:</label>
                            <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="{{$quote->requestQuoteTutor->request->users->u_name}}" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header color-header">
                    <h5 class="text-white" style="font-weight: bold;">{!! trans('Información de Cotización') !!}</h5>
                </div>
                <div class="card-body table-responsive">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="">Valor:</label>
                            <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="${{number_format($quote->value)}}" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Valor de utilidad:</label>
                            <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="${{number_format($quote->value_utility)}}" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Saldo:</label>
                            <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="${{number_format($quote->balance)}}" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">observación:</label>
                            <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="{{$quote->observation ? $quote->observation:'sin observación...'}}" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Nota privada:</label>
                            <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="{{$quote->private_note}}" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Tipo de utilidad:</label>
                            <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="{{$quote->utilityType->p_text}}" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Fecha de cotización:</label>
                            <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="{{$quote->created_at}}" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header color-header">
                    <h5 class="text-white" style="font-weight: bold;">{!! trans('Información de Cotización de tutor') !!}</h5>
                </div>
                <div class="card-body table-responsive">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="">Valor:</label>
                            <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="${{number_format($quote->requestQuoteTutor->value)}}" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Posible fecha de entrega:</label>
                            <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="${{$quote->requestQuoteTutor->application_date}}" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">observación:</label>
                            <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="{{$quote->requestQuoteTutor->observation ? $quote->requestQuoteTutor->observation:'sin observación...'}}" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Fecha de la cotizacion del tutor:</label>
                            <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="{{$quote->requestQuoteTutor->created_at}}" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Nombre del tutor:</label>
                            <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="{{$quote->requestQuoteTutor->user->u_name}}" disabled>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-header color-header">
                    <h5 class="text-white" style="font-weight: bold;">{!! trans('Información de pagos') !!}</h5>
                </div>
                <div class="card-body">
                    <a href="{{route('process.request.create')}}" class="btn btn-warning btn-sm"><i class="fas fa-plus-circle"></i> {!! trans('Crear pago') !!}</a>
                  </div>
                <div class="card-body table-responsive">
                    <table id="tabledata1" class="table table-bordered table-striped">
                        <thead>
                          <tr class="bg-warning text-center">
                            <th>{!! trans('Numeral') !!} </th>
                            <th>{!! trans('Valor') !!}</th>
                            <th>{!! trans('Tipo de pago') !!}</th>
                            <th>{!! trans('Referencia de pago') !!}</th>
                            <th>{!! trans('Vaucher') !!}</th>
                            <th>{!! trans('Observacion') !!}</th>
                            <th>{!! trans('Fecha de pago') !!}</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($quote->payments as $payment)
                            <tr>
                                <td>{{$payment->id}}</td>
                                <td>${{number_format($payment->value)}}</td>
                                <td>{{$payment->payment_type}}</td>
                                <td>{{$payment->payment_reference}}</td>
                                <td>{{$payment->vaucher ? $payment->vaucher:'sin vaucher...' }}</td>
                                <td>{{$payment->observation ? $payment->observation:'Sin observación...'}}</td>
                                <td>{{$payment->created_at}}</td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

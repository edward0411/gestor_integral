@extends('layouts.master_panel')
@section('title','Pagos a tutores')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header color-header">
              <h5 class="card-title" style="font-weight: bold;">{!! trans('Listado de pagos a tutores') !!}</h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tabledata" class="table table-bordered table-striped">
                <thead>
                  <tr class="bg-warning text-center">
                    <th>{!! trans('Numeral de pago') !!} </th>
                    <th>{!! trans('Tipo de servicio') !!}</th>
                    <th>{!! trans('Tutor') !!}</th>
                    <th>{!! trans('Valor') !!}</th>
                    <th>{!! trans('Acciones') !!}</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($tutorPayments as $tutorPayment)
                  {{dd($tutorPayment->requestQuoteTutor)}}
                    <tr>
                        <td>{{$tutorPayment->id}}</td>
                        <td>{{$tutorPayment->requestQuoteTutor->request->parametric->p_text}}</td>
                        <td>{{$tutorPayment->requestQuoteTutor->user->u_name}}</td>
                        <td>${{number_format($tutorPayment->requestQuoteTutor->value)}}</td>
                        <td>
                            <a href="{{route('wallet.show', $tutorPayment->id)}}" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i> {!! trans('Ver pagos') !!}</a>
                        </td>
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

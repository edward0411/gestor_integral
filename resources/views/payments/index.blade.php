@extends('layouts.master_panel')
@section('title','Pagos')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header color-header">
              <h5 class="card-title" style="font-weight: bold;">{!! trans('Listado de solicitudes') !!}</h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tabledata1" class="table table-bordered table-striped">
                <thead>
                  <tr class="bg-warning text-center">
                    <th>{!! trans('Numeral de solicitud') !!} </th>
                    <th>{!! trans('Tipo de servicio') !!}</th>
                    <th>{!! trans('Cliente') !!}</th>
                    <th>{!! trans('Fecha de inicio de solicitud') !!}</th>
                    <th>{!! trans('Fecha de entrega') !!}</th>
                    <th>{!! trans('Valor') !!}</th>
                    <th>{!! trans('Acciones') !!}</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($quotes as $quote)
                    <tr>
                        <td>{{$quote->id}}</td>
                        <td>{{$quote->requestQuoteTutor->request->parametric->p_text}}</td>
                        <td>{{$quote->requestQuoteTutor->request->users->u_name}}</td>
                        <td>{{$quote->requestQuoteTutor->request->created_at}}</td>
                        <td>{{$quote->requestQuoteTutor->request->date_delivery}}</td>
                        <td>${{number_format($quote->value)}}</td>
                        <td>
                            <a href="{{route('payment.show', $quote->id)}}" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i> {!! trans('Ver pagos') !!}</a>
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

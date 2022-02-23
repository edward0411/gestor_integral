@extends('layouts.master_panel')

@section('content')

<div class="container-fluid">
    <div class="card-header">
        <h5 class="text-dark" style="font-weight: bold;">Información de pagos del tutor {{$work->requestQuote->requestQuoteTutor->user->u_name}}</h5>
    </div>
    <div class="row justify-content-center align-items-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header color-header">
                    <h5 class="text-white" style="font-weight: bold;">{!! trans('Información de trabajo') !!}</h5>
                </div>
                <div class="card-body table-responsive">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="">Fecha de inicio:</label>
                            <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="{{$work->start_date}}" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Fecha de fin:</label>
                            <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="{{$work->end_date}}" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Tipo de trabajo:</label>
                            <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="{{$work->requestQuote->requestQuoteTutor->request->parametric->p_text}}"  disabled>
                        </div>
                        @if((\Auth::user()->roles()->first()->id == 1))
                            <div class="form-group col-md-4">
                                <label for="">Cliente:</label>
                                <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="{{$work->requestQuote->requestQuoteTutor->request->users->u_name}}" disabled>
                            </div>
                        @endif

                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header color-header">
                    <h5 class="text-white" style="font-weight: bold;">{!! trans('Información de trabajos entregados') !!}</h5>
                </div>
                <div class="card-body table-responsive">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="">Fecha de entrega:</label>
                            <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="{{($work->deliverable->date_delivery)}}" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Estado de entrega:</label>
                            <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="{{$work->deliverable->state_deliverable}}" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Estado:</label>
                            <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="{{$work->deliverable->state}}" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Archivo:</label>
                            @if ($work->deliverable->file)
                                <a href="{{ asset('folders/wallet/'.$work->deliverable->file)}}" target="_blank">{{$work->deliverable->file}}</a></td>
                            @else
                                <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="Sin archivo..." disabled>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header color-header">
                    <h5 class="text-white" style="font-weight: bold;">{!! trans('Detalles de trabajos') !!}</h5>
                </div>
                @if ($work->workDetails->count() > 0)
                    @foreach($work->workDetails as $workDetail)
                        <div class="card-body table-responsive">
                            <div>
                                <span>Detalle # {{$workDetail->id}}</span>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="">Observacion:</label>
                                    <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="{{($workDetail->observation ? $workDetail->observation:'sin observacion...')}}" disabled>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Fecha:</label>
                                    <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="{{$workDetail->created_at}}" disabled>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Archivo:</label>
                                    @if ($workDetail->file)
                                        <a href="{{ asset('folders/wallet/'.$workDetail->file)}}" target="_blank">{{$workDetail->file}}</a></td>
                                    @else
                                        <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="Sin archivo..." disabled>
                                    @endif
                                </div>
                            </div>
                            <hr size="2px" color="black"/>
                        </div>
                    @endforeach
                @else
                    <div class="form-group col-md-4">
                        <label for="">Sin detalles</label>
                    </div>
                @endif
            </div>

            <div class="card">
                <div class="card-header color-header">
                    <h5 class="text-white" style="font-weight: bold;">{!! trans('Información de pago') !!}</h5>
                </div>
                @if ($work->walletVirtual->count() > 0)
                    <div class="card-body table-responsive">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="">Total cuenta:</label>
                                <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="${{number_format($work->requestQuote->requestQuoteTutor->value)}}" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Valor pagado:</label>
                                <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="${{number_format($work->walletVirtual->value)}}" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Saldo:</label>
                                <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="${{number_format($work->walletVirtual->balance)}}" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Estado:</label>
                                <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="{{$work->walletVirtual->state}}" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Observación:</label>
                                <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="{{($work->walletVirtual->observation ? $work->walletVirtual->observation:'sin observacion...')}}" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Fecha:</label>
                                <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="{{$work->walletVirtual->created_at}}" disabled>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="form-group col-md-4">
                        <label for="">Sin detalles</label>
                    </div>
                @endif
            </div>

            <div class="card">
                <div class="card-header color-header">
                    <h5 class="text-white" style="font-weight: bold;">{!! trans('Historial de pagos') !!}</h5>
                </div>
                @if((\Auth::user()->roles()->first()->id == 1))
                    <div class="card-body">
                        <a href="#" class="btn btn-warning btn-sm {{$work->walletVirtual->balance <= 0 ? 'disabled':'hiden'}} " data-toggle="modal" data-target="#modalCreate" ><i class="fas fa-plus-circle"></i> {!! trans('Crear pago') !!}</a>
                    </div>
                @endif
                <div class="card-body table-responsive">
                    <table id="tabledata1" class="table table-bordered table-striped">
                        <thead>
                          <tr class="bg-warning text-center">
                            <th>{!! trans('Numeral de pago') !!} </th>
                            <th>{!! trans('Valor') !!}</th>
                            <th>{!! trans('Referencia de pago') !!}</th>
                            <th>{!! trans('Vaucher') !!}</th>
                            <th>{!! trans('Observacion') !!}</th>
                            <th>{!! trans('Fecha de pago') !!}</th>
                            @if((\Auth::user()->roles()->first()->id == 1))
                                <th>{!! trans('Acciones') !!}</th>
                            @endif
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($work->walletVirtual->walletDetails as $walletDetail)
                            <tr>
                                <td>{{$walletDetail->id}}</td>
                                <td>${{number_format($walletDetail->value)}}</td>
                                <td>{{$walletDetail->reference}}</td>
                                <td>@if ($walletDetail->vaucher)
                                        <a href="{{ asset('folders/wallet/'.$walletDetail->vaucher)}}" target="_blank">{{$walletDetail->vaucher}}</a></td>
                                    @else
                                        Sin vaucher...
                                    @endif
                                <td>{{$walletDetail->observation ? $walletDetail->observation:'Sin observación...'}}</td>
                                <td>{{$walletDetail->created_at}}</td>
                                @if((\Auth::user()->roles()->first()->id == 1))
                                    <td>
                                        <a href="" class="btn btn-warning btn-xs" onclick="showWalletDetail({{$walletDetail->id}})" data-toggle="modal" data-target="#modalEdit"><i class="fas fa-pencil-alt"></i> {!! trans('Editar') !!}</a>
                                        <a href="{{route('walletDetail.delete', $walletDetail->id)}}" class="btn btn-danger btn-xs" onclick="return confirm('{!! trans('Desea eliminar este registro') !!}?');"><i class="fas fa-trash"></i> {!! trans('Eliminar') !!}</a>
                                    </td>
                                @endif
                            </tr>
                          @endforeach
                          <td class="color-header">TOTAL</td>
                          <td class="color-header">${{number_format($work->walletVirtual->value)}}</td>
                          <td class="color-header">SALDO</td>
                          <td class="color-header">${{number_format($work->walletVirtual->balance)}}</td>

                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
    @include('wallet_virtual.modals')

</div>

@endsection
@section('script')

    {{-- js utiles --}}
    <script type="text/javascript" src="{{ asset("js/events/util.js") }}"></script>

    <script type="text/javascript">

        // VARIABLES GLOBALES

        $(document).ready(function() {
            handleReady();
        });

        const handleReady = () => {
            $('#formCreate').ajaxForm({
                dataType: 'json',
                clearForm: true,
                beforeSubmit: function(data) {
                    $('#message').emtpy;
                },
                success: function(data) {
                    console.log("res", data);
                    if (data.response) {
                        processResponse('message', 'succes', data.message)
                        location.reload();
                    }else{
                        console.log("res else", data);
                        processResponse('message', 'danger', data.message)
                    }
                },
                error: function(data) {
                    processError(data, 'message')
                }
            });
        }

        function processError(data, div) {
            errors = "";
            dataError = data;
            $.each(data.responseJSON.errors, function(index, elemento) {
                errors += "<li>"+elemento+"</li>"
            })
            if(errors==""){
                errors = data.responseJSON.message;
            }
            processResponse('message', 'danger', 'Error al guardar: '+data.message)
        }

        const showWalletDetail = (id) => {
            var url = `{{url('/panel/administrativo/wallet/showWalletDetail/${id}')}}`;
            var data = {
                "_token": $('meta[name="csrf-token"]').attr('content'),
            };

            $.ajax({
                type: 'GET',
                url: url,
                data: data,
                success: function(response) {
                    paint(response.data)
                }
            });
        }

        const paint = (data) => {
            $("#id").val(data.id);
            $("#valueEdit").val(data.value);
            $("#referenceEdit").val(data.reference);
            $("#observationEdit").val(data.observation);
        }
    </script>
@endsection

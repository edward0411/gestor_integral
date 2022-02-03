@extends('layouts.master_panel')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center align-items-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header color-header">
                    <h5 class="text-white" style="font-weight: bold;">{!! trans('Sala #' . $communication->id) !!}</h5>
                </div>
                <div class="card-body table-responsive">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="">Cliente:</label>
                            <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="{{ $communication->user->u_nickname }}" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Fecha de inicio de cotización:</label>
                            <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="{{ $communication->request->created_at }}" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Fecha de entrega:</label>
                            <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="{{ $communication->request->date_delivery }}" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Monitor:</label>
                            <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="{{ $communication->request->requestState->name }}" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Comercial:</label>
                            <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="{{ $communication->request->requestState->name }}" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Tipo de Servicio:</label>
                            <input type="text" class="form-control form-control-sm" name="maquina" style="text-align:center;" value="{{ $communication->request->parametric->p_text }}" disabled>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <form action="{{route('communications.messages.store', $communication->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-9 ">
                                <textarea class="form-control" name="message" id="message" cols="30" rows="3"></textarea>
                            </div>
                            <div class="form-group col-md-3">
                                <button type="submit" id="" class="btn btn-warning btn-sm"><i class="fas fa-comments"> Enviar</i></button>
                            </div>
                        </div>  
                    </form>
                </div>
                <hr>
                <div class="row">
                    @foreach($communication->messages as $message)                    
                        <div class="form-group col-md-9 {{ $message->id_user == auth()->user()->id ? 'float-right' : 'float-left' }}">
                            <div class="card-body">
                                <div class="card-header color-instructor">
                                    <h5 class="text-white" style="font-weight: bold;">{{ $message->user->u_nickname }} </h5>                                    
                                </div>
                                <div class="card-body table-responsive" style="border: 1px solid #cccccc;">
                                    <p>{{ $message->m_text_message }}</p>
                                    <small style="text-align:rigth;">Enviado el {{ $message->m_date_message }}.</small>
                                </div>
                            </div>  
                        </div>
                        <div class="form-group col-md-3 {{ $message->id_user == auth()->user()->id ? 'float-left' : 'float-right' }}"></div>
                    @endforeach                                       
                </div>
                
            </div>
        </div>
    </div>
</div>
</div>
@endsection
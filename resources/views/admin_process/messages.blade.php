@extends('layouts.master_panel')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center align-items-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header color-header">
                    <h5 class="text-white" style="font-weight: bold;">{!! trans('Proceso #' . $admin_process->id) !!}</h5>
                </div>
                <div class="card-body table-responsive">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Tutor:</label>
                            <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="{{ $admin_process->user->u_nickname }}" disabled>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Fecha de recibido el mensaje:</label>
                            <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="{{ $admin_process->created_at }}" disabled>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <form action="{{route('admin_process.messages_admin.store',$admin_process->id)}}" method="POST">
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

                    @foreach($admin_process->messages_admin as $message)
                    @php
                        $roleIDs = array_map(function ($i) {return $i['id'];}, $message->user->roles->toArray())
                    @endphp
                    
                    @if($message->id_user == auth()->user()->id)                        
                        <div class="form-group col-md-3 float-left"></div>
                    @endif                  
                    <div class="form-group col-md-9 {{ $message->id_user == auth()->user()->id ? 'float-right' : 'float-left' }}">
                        <div class="card-body">
                            @if (in_array(1, $roleIDs))
                                <div class="card-header color-header">
                            @endif
                            @if (in_array(6, $roleIDs))
                                <div class="card-header color-instructor">
                            @endif
                            @if (in_array(3, $roleIDs))
                                <div class="card-header color-comercial">
                            @endif
                                <h5 class="text-white" style="font-weight: bold;">{{ $message->user->u_nickname }} </h5>                       
                            </div>                                    
                            <div class="card-body table-responsive" style="border: 1px solid #cccccc;">
                                <p>{{ $message->ma_text_message }}</p>
                                <small style="text-align:rigth;">Enviado el {{ $message->ma_date_message }}.</small>
                            </div>
                        </div>  
                    </div>
                    @if($message->id_user != auth()->user()->id)
                        <div class="form-group col-md-3 float-left"></div>
                    @endif
                @endforeach   
                                                        
                </div>
                
            </div>
        </div>
    </div>
</div>
</div>
@endsection
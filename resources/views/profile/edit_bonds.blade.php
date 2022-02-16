@extends('layouts.master_panel')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Editar Bono') !!}</h5>
                </div>
                <!-- /.card-header -->
                <form method="POST" action="{{route('profile.store')}}">
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="id_user">{!! trans('Nick Name') !!}</label>
                                <select class="form-control form-control-sm select2" id="id_user" name="id_user" onChange="bringCoins();" required>
                                    <option value="">Seleccione</option> 
                                    @foreach($data as $datas)
                                    <option value="{{$datas->id_user}}" {{ $datas->id_user == $bonds->id_user ? 'selected' : '' }} >{{$datas->u_nickname}}</option> 
                                    @endforeach 
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="id_coin">{!! trans('Tipo de moneda por defecto') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="id_coin" name="id_coin" value="{{$bonds->coins->c_type_currency}} - {{$bonds->coins->c_currency}}" disabled>
                                <input type="hidden" class="form-control form-control-sm" id="id_coins" name="id_coins" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="type_bond"> {!! trans('Clasificación') !!}</label>
                                <select class="form-control form-control-sm" id="type_bond" name="type_bond" required>
                                    <option value="">Seleccione...</option>
                                    @foreach($type_bonds as $bond)
                                    <option value="{{$bond->id}}" {{ $bond->id == $bonds->id_type_bond ? 'selected' : '' }}>{{$bond->p_text}}</option> 
                                    @endforeach                                   
                                </select>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="id_type_value"> {!! trans('Tipo') !!}</label>
                                <select class="form-control form-control-sm" id="type_value" name="type_value" required>
                                    <option value="">Seleccione...</option>
                                    @foreach($type_value as $value)
                                   
                                    <option value="{{$value->id}}" {{ $value->id == $bonds->id_type_value ? 'selected' : '' }}>{{$value->p_text}}</option> 
                                    @endforeach 
                                   
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="b_value">{!! trans('Valor') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="b_value" name="b_value" value="{{$bonds->b_value}}" required>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{$bonds->id}}">
                        <button type="submit" id="" class="btn btn-warning btn-sm"> {!! trans('Guardar') !!}</button>
                        <a href="{{route('profile.index_bonds',1)}}" class="btn btn-warning btn-sm float-right">{!! trans('Regresar') !!}</a>
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
    
    var data = [
        @foreach($data as $item) {
            "id_coins": "{{$item->id}}",
            "type_coin": "{{$item->c_type_currency}} - {{$item->c_currency}}",
            "id_user": "{{$item->id_user}}",

         },
        @endforeach
    ];

    function bringCoins() {

        var selectedUsers = $("#id_user").val();
        nuevo = $.grep(data, function(n, i) {
            return n.id_user == selectedUsers
        });
        
        $.each(nuevo, function(key, value) {
           $('#id_coin').val(value.type_coin);
           $('#id_coins').val(value.id_coins);

          
        });

    }
</script>
@endsection

@extends('layouts.master_panel')
@section('css')
<style>
     .select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: 4px;
            height: calc(1.8125rem + 2px);
            font-size: .875rem;
            padding: .25rem .5rem;
            color: #495057;
            line-height: 1.5;
        }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Crear Bono') !!}</h5>
                </div>
                <!-- /.card-header -->
                <form method="POST" action="{{route('profile.store')}}">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="id_user">{!! trans('Nick Name') !!}</label>
                                <select class="form-control form-control-sm select2" id="id_user" name="id_user" required>
                                    <option value="">{!! trans('Selecione...') !!}</option> 
                                    @foreach($data as $datas)
                                    <option value="{{$datas->id}}" >{{$datas->u_nickname}}</option> 
                                    @endforeach 
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="type_bond"> {!! trans('Clasificación') !!}</label>
                                <select class="form-control form-control-sm" id="type_bond" name="type_bond" required>
                                    <option value="">{!! trans('Selecione...') !!}</option> 
                                @foreach($type_bonds as $bonds)
                                <option value="{{$bonds->id}}" >{{$bonds->p_text}}</option> 
                                @endforeach    
                            </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="type_value"> {!! trans('Tipo') !!}</label>
                                <select class="form-control form-control-sm" id="type_value" name="type_value" required>
                                    <option value="">{!! trans('Selecione...') !!}</option> 
                                    @foreach($type_value as $value)
                                    <option value="{{$value->id}}" >{{$value->p_text}}</option> 
                                    @endforeach 
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="b_value">{!! trans('Valor') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="b_value" name="b_value" value="" required>
                            </div>
                        </div>
                        <button type="submit" id="" class="btn btn-warning btn-sm"> {!! trans('Guardar') !!}</button>
                        <a href="{{route('profile.index_bonds')}}" class="btn btn-warning btn-sm float-right">{!! trans('Regresar') !!}</a>
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

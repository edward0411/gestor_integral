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
                <form method="POST" action="{{route('profile.update')}}">
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="id_user">{!! trans('Nick Name') !!}</label>
                                <select class="form-control form-control-sm select2" id="id_user" name="id_user" required>
                                    <option value="">Seleccione</option> 
                                    @foreach($data as $datas)
                                    <option value="{{$datas->id}}" {{ $datas->id == $bonds[0]->id_user ? 'selected' : '' }} >{{$datas->u_nickname}}</option> 
                                    @endforeach 
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="type_bond"> {!! trans('Clasificación') !!}</label>
                                <select class="form-control form-control-sm" id="id_type_bond" name="id_type_bond" required>
                                    <option value="">Seleccione</option>
                                    @foreach($type_bonds as $bond)
                                    <option value="{{$bond->id}}" {{ $bond->id == $bonds[0]->id_type_bond ? 'selected' : '' }}>{{$bond->p_text}}</option> 
                                    @endforeach                                   
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="id_type_value"> {!! trans('Tipo') !!}</label>
                                <select class="form-control form-control-sm" id="id_type_value" name="id_type_value" required>
                                    <option value="">Seleccione</option>
                                    @foreach($type_value as $value)
                                    <option value="{{$value->id}}" {{ $bond->id == $bonds[0]->id_type_value ? 'selected' : '' }}>{{$value->p_text}}</option> 
                                    @endforeach 
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="b_value">{!! trans('Valor') !!}</label>
                                <input type="text" class="form-control form-control-sm" id="b_value" name="b_value" value="{{$bonds[0]->b_value}}" required>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{$bonds[0]->id}}">
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

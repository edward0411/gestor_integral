@extends('layouts.master_panel')
@section('title','Cambiar contraseña')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Cambio de contraseña') !!}</h5>
                </div>
                <!-- /.card-header -->
                <form method="POST" action="{{route('profile.change_password_store')}}">
                    @csrf
                    <input type="hidden" name="id_user" value="">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="password">{!! trans('Contraseña actual') !!}</label>
                                <input type="password" name="password" id="password"  class="form-control" placeholder="contraseña actual" >
                            </div>
                            <div class="form-group col-md-4">
                                <label for="new_password">{!! trans('Nueva contraseña') !!}</label>
                                <input type="password" name="new_password" id="new_password"  class="form-control" placeholder="nueva contraseña" >
                            </div>
                            <div class="form-group col-md-4">
                                <label for="new_password_confirmation">{!! trans('Confirmar contraseña') !!}</label>
                                <input type="password" name="new_password_confirmation" id="new_password_confirmation"  class="form-control" placeholder="confirmar contraseña" >
                            </div>
                        </div>
                        <button type="submit" id="" class="btn btn-warning btn-sm"> {!! trans('Guardar') !!}</button>
                        <a href="" class="btn btn-warning btn-sm float-right">{!! trans('Cancelar') !!}</a>
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

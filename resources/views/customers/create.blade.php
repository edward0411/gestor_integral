@extends('layouts.master_panel')

@section('content')

<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-12">
          <div class="card card-warning">
            <div class="card-header">
              <h5 class="card-title" style="font-weight: bold;">{!! trans('Crear cliente') !!}</h5>
            </div>
            <!-- /.card-header -->
            <form method="POST" action="">
              <div class="card-body">
                @csrf
               <div class="row">
                <div class="form-group col-md-6">
                  <label for="p_category">{!! trans('Nickname') !!}</label>
                   <input type="text" class="form-control form-control-sm" id="" name="p_category" value="" required>
                  
                 </div>
                 <div class="form-group col-md-6">
                   <label for="p_value">{!! trans('Telefono') !!}</label>
                   <input type="text" class="form-control form-control-sm" id="p_value" name="p_value" value="" required>
                
                 </div>
               </div>
              
  
                <button type="submit" id="" class="btn btn-warning btn-sm"> {!! trans('Guardar') !!}</button>
                <a href="{{route('customers.index')}}" class="btn btn-warning btn-sm float-right">{!! trans('Regresar') !!}</a>
  
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
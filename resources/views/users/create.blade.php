@extends('layouts.master_panel')

@section('content')

<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-12">
          <div class="card">
            <div class="card-header color-header">
              <h5 class="card-title" style="font-weight: bold;">{!! trans('Crear Usuario') !!}</h5>
            </div>
            <!-- /.card-header -->
            <form method="POST" action="">
              <div class="card-body">
                @csrf
               <div class="row">
                <div class="form-group col-md-4">
                  <label for="name">{!! trans('Nombre') !!}</label>
                   <input type="text" class="form-control form-control-sm" id="name" name="name" value="">
                  
                 </div>
                 <div class="form-group col-md-4">
                   <label for="correo">{!! trans('Correo Electrónico') !!}</label>
                   <input type="email" class="form-control form-control-sm" id="email" name="email" value="">
                
                 </div>
                 <div class="form-group col-md-4">
                   <label for="password">{!! trans('Contraseña') !!}</label>
                   <input type="password" class="form-control form-control-sm" id="password" name="password" >
              
                 </div>
   
                 <div class="form-group col-md-4">
                   <label for="role">{!! trans('Roles') !!}</label>
                   <select class="form-control form-control-sm" id="role" name="role">
                     <option value="">{!! trans('Selecione un rol') !!}</option>
                    
                       <option value="" ></option>
                     
                   </select>
                 
                 </div>
   
                 <div class="form-group col-md-4">
                   <label for="role">{!! trans('Personas') !!}</label>
                   <select class="form-control form-control-sm" id="person" name="person">
                     <option value="">{!! trans('Asigne una persona al usuario') !!}</option>
               
   
                       <option value="" ></option>
   
                  
                   </select>
                 
                 </div>
               </div>
              
  
                <button type="submit" id="" class="btn btn-warning btn-sm"> {!! trans('Guardar') !!}</button>
                <a href="{{route('parametrics.index')}}" class="btn btn-warning btn-sm float-right">{!! trans('Regresar') !!}</a>
  
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
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-12 text-center">
              <a href="" class="h1"><b>Gestor </b>Integral</a>
              <br>
              <br>
            </div>
            <div  class="col-md-12 text-center">
              <span>Seleccione el tipo de usuario para ingresar a la plataforma</span>
              <br>
              <br>
            </div>
            <div  class="col-md-12 text-center">
              <a href="{{route('login_tutors')}}" class="btn btn-primary">Tutores</a>
              <br>
              <br>
            </div>
            <div  class="col-md-12 text-center">
              <a href="{{route('login_clients')}}" class="btn btn-primary">Clientes</a>
              <br>
              <br>
            </div><div  class="col-md-12 text-center">
              <a href="{{route('login_employee')}}" class="btn btn-primary">Empleado</a>
              <br>
              <br>
            </div>
    </div>
</div>
@endsection
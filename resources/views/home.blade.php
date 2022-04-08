@extends('layouts.master_panel')
@section('title','Gestor integral')

@section('content')


<div class="container-fluid">
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header" style="background-color: rgb(26, 124, 148);">
          <h2 class="card-title">Gestor Integral</h2>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="row">

          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$count_hoy}}</h3>

                <p>Solicitudes para entrega hoy</p>
              </div>
              <div class="icon">
                <i class="icofont-coins"></i>
              </div>
              <a href="{{route('process.request.index',$id_rol)}}" class="small-box-footer">ver solicitudes <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3>{{$count_semana}}</h3>

                <p>Solicitudes para entrega esta semana</p>
              </div>
              <div class="icon">
                <i class="icofont-tags"></i>
              </div>
              <a href="{{route('process.request.index',$id_rol)}}" class="small-box-footer">ver solicitudes <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$count_mes}}</h3>

                <p>Solicitudes para entrega este mes</p>
              </div>
              <div class="icon">
                <i class="icofont-tasks"></i>
              </div>
              <a href="{{route('process.request.index',$id_rol)}}" class="small-box-footer">ver solicitudes <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

        </div>


        </div>
      <!-- /.card-body -->

    </div>
    <!-- /.card-->

  </div>
  <!-- /.col-->

</div>
<!-- /.row-->

</div>
<!-- /.container-->


@endsection

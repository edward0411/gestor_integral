@extends('layouts.master_panel')



@section('content')


    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-9">
                <div class="card" style="background-color:rgba(255,255,255,0.85);">
                    <div class="card-header color-header">
                        <h5 class="card-title" style="font-weight: bold;">Pre Registro</h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h5>{{$countData[0]}} - Pendientes</h5>
                                        <h5>{{$countData[1]}} - Aprobadas</h5>
                                        <h5>{{$countData[2]}} - Rechazadas</h5>
                                        <br>
                                        <h4>Información Bancaria</h4>
                                    </div>
                                    <div class="icon">
                                        <i class="icofont-notebook"></i>
                                    </div>
                                    <a href="{{route('pre_registration.my_register.form_information_bank')}}" class="small-box-footer">Mas información <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-4 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h5>{{$countData[3]}} - Pendientes</h5>
                                        <h5>{{$countData[4]}} - Aprobadas</h5>
                                        <h5>{{$countData[5]}} - Rechazadas</h5>
                                        <br>
                                        <h4>Idiomas</h4>
                                    </div>
                                    <div class="icon">
                                        <i class="icofont-support-faq"></i>
                                    </div>
                                    <a href="{{route('pre_registration.my_register.form_information_language')}}" class="small-box-footer">Mas información <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-4 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h5>{{$countData[6]}} - Pendientes</h5>
                                        <h5>{{$countData[7]}} - Aprobadas</h5>
                                        <h5>{{$countData[8]}} - Rechazadas</h5>
                                        <br>
                                        <h4>Temas Trabajables</h4>
                                    </div>
                                    <div class="icon">
                                        <i class="icofont-clip-board"></i>
                                    </div>
                                    <a href="{{route('pre_registration.my_register.form_information_topics_work')}}" class="small-box-footer">Mas información <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-4 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h5>{{$countData[9]}} - Pendientes</h5>
                                        <h5>{{$countData[10]}} - Aprobadas</h5>
                                        <h5>{{$countData[11]}} - Rechazadas</h5>
                                        <br>
                                        <h4>Servicios</h4>
                                    </div>
                                    <div class="icon">
                                        <i class="icofont-dashboard-web"></i>
                                    </div>
                                    <a href="{{route('pre_registration.my_register.form_information_service')}}" class="small-box-footer">Mas información <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-4 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h5>{{$countData[12]}} - Pendientes</h5>
                                        <h5>{{$countData[13]}} - Aprobadas</h5>
                                        <h5>{{$countData[14]}} - Rechazadas</h5>
                                        <br>
                                        <h4>Sistemas</h4>
                                    </div>
                                    <div class="icon">
                                        <i class="icofont-listine-dots"></i>
                                    </div>
                                    <a href="{{route('pre_registration.my_register.form_information_system')}}" class="small-box-footer">Mas información <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                        </div>
                        <!-- /.row -->

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

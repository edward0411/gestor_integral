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
                                        <h3>011</h3>

                                        <p>Información Bancaria</p>
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
                                        <h3>012</h3>

                                        <p>Idiomas</p>
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
                                        <h3>014</h3>

                                        <p>Temas Trabajables</p>
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
                                        <h3>015</h3>

                                        <p>Servicios</p>
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
                                        <h3>016</h3>

                                        <p>Sistemas</p>
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

@extends('layouts.master_panel')
@section('title','Pre Registro')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-12">
                <div class="card" style="background-color:rgba(255,255,255,0.85);">
                    <div class="card-header color-header">
                        <h5 class="card-title" style="font-weight: bold;">Mi Registro</h5>
                    </div>
                    <input type="hidden" name="" id="state_user" value="{{$user->u_state}}">
                    <div  class="card-body">
                        <div id="color_state_user" class="small-box">
                            <div class="inner"> <h4>Estado:</h4>
                                <p id="text_state">
                                   
                                </p>
                            </div> 
                        </div>
                        <span>Estado: {{$user->u_state}}</span>
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
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        var val = $('#state_user').val();
        
        if (val == 0) {
            $("#color_state_user").addClass("bg-yellow"); 
            $("#text_state").html("Creado sin información suficiente"); 
        }else if (val == 1) {
            $("#color_state_user").addClass("bg-primary"); 
            $("#text_state").html("Pendiente por aprobación"); 
        }else if (val == 2) {
            $("#color_state_user").addClass("bg-success"); 
            $("#text_state").html("Aprobado"); 
        }else if (val == 3) {
            $("#color_state_user").addClass("bg-danger");
            $("#text_state").html("Rechazado");  
        }
    });
</script>
@endsection
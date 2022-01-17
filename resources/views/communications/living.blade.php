@extends('layouts.master_panel')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center align-items-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header color-header">
                    <h5 class="text-white" style="font-weight: bold;">{!! trans('Sala #001') !!}</h5>
                </div>
                <div class="card-body table-responsive">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="">Cliente:</label>
                            <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="JorgeRomero23" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Fecha de inicio de cotización:</label>
                            <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="01-01-2021" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Fecha de entrega:</label>
                            <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="06-05-2022" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Monitor:</label>
                            <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="Monitor_035" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Comercial:</label>
                            <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="Comercial_001" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Tipo de Servicio:</label>
                            <input type="text" class="form-control form-control-sm" name="maquina" style="text-align:center;" value="Tesis  " disabled>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <form action="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-9 ">
                                <textarea class="form-control" name="" id="" cols="30" rows="3"></textarea>
                            </div>
                            <div class="form-group col-md-3">
                                <button type="submit" id="" class="btn btn-warning btn-sm"><i class="fas fa-comments"> Enviar</i></button>
                            </div>
                        </div>  
                    </form>
                </div>
                <hr>
                <div class="row">  
                    <div class="form-group col-md-9 float-right">
                        <div class="card-body">
                            <div class="card-header color-instructor">
                                <h5 class="text-white" style="font-weight: bold;">{!! trans('Monitor_035') !!} </h5>
                                
                            </div>
                            <div class="card-body table-responsive" style="border: 1px solid #cccccc;">
                                <p>
                                    Buenos días. Hasta el momento no se ha podido validar un tutor que cumpla con los requerimientos del proceso pero seguimos trabajando en poder asignar el tutor adecuado.
                                </p>
                                <small style="text-align:rigth;">Enviado el 02-01-2022 10:20:45 a.m.</small>
                            </div>
                        </div>  
                    </div>
                    <div class="form-group col-md-3 float-left"></div>

                    <div class="form-group col-md-9 float-right">
                        <div class="card-body">
                            <div class="card-header color-commercial">
                                <h5 style="font-weight: bold;">{!! trans('Comercial_001') !!} </h5>
                                
                            </div>
                            <div class="card-body table-responsive" style="border: 1px solid #cccccc;">
                                <p>
                                    Buenos días.  Ya voy a validar en el sistema y te confirmo como va el proceso.
                                </p>
                                <small style="text-align:rigth;">Enviado el 02-01-2022 10:20:45 a.m.</small>
                            </div>
                        </div>  
                    </div>
                    <div class="form-group col-md-3 float-left"></div>

                    
                    <div class="form-group col-md-9 float-right">
                        <div class="card-body">
                            <div class="card-header color-client">
                                <h5 class="text-white" style="font-weight: bold;">{!! trans('JorgeRomero23') !!} </h5>
                                
                            </div>
                            <div class="card-body table-responsive" style="border: 1px solid #cccccc;">
                                <p>
                                    Buenos días. Tengo una duda, ya hay alguien a cargo de mi cotización. Quedo atento.
                                </p>
                                <small style="text-align:rigth;">Enviado el 02-01-2022 10:15:26 a.m.</small>
                            </div>
                        </div>  
                    </div>
                    <div class="form-group col-md-3 float-left"></div>

                    <div class="form-group col-md-3 float-left"></div>
                    <div class="form-group col-md-9 float-right">
                        <div class="card-body">
                            <div class="card-header color-header">
                                <h5 class="text-white" style="font-weight: bold;">{!! trans('TusTareas.com') !!} </h5>
                                
                            </div>
                            <div class="card-body table-responsive" style="border: 1px solid #cccccc;">
                                <p>
                                    Bienvenido a tusTareas.com nos complace darte la bienvenida a nuestra plataforma,
                                    por medio de esta sala puedes dejar tus comentarios, dudas e inquietudes sobre tu 
                                    cotización #001, nuestro personal esta atento a responder tus mensajes.
                                </p>
                                <small style="text-align:rigth;">Enviado el 01-01-2022 11:52:00 a.m.</small>
                            </div>
                        </div>  
                    </div>

                   
                    
                </div>
                
            </div>
        </div>
    </div>
</div>
</div>
@endsection
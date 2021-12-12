@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-12 text-center">
              <a href="" class="h1"><b>Gestor </b>Integral</a>
              <br>
              <br>
            </div>
            <div class="col-md-6">
                <!-- /.login-logo -->
                <div class="card card-outline card-warning">
                  <div class="card-header text-center color-header">
                    <a href="" class="h1"><b>Cliente</b></a>
                  </div>
                  <div class="card-body">
                    <p class="login-box-msg">Regístrese para iniciar su sesión como cliente</p>
                   
                    <form action="{{ route('loginClients') }}" method="post">
                      @csrf
            
                      <div class="row">
                        <div class="form-group col-md-12">
                          <div class="input-group mb-3">
                            <input id="u_nickname" type="text" class="form-control @error('u_nickname') is-invalid @enderror" name="u_nickname" value="{{ old('u_nickname') }}" placeholder="Nick name" required autocomplete="u_nickname">
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                            @error('u_nickname')
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                             @enderror
                           
                         </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="input-group mb-3">
                         <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="current-password">
                         <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                          </div>
                        </div>
               
                                              @error('password')
                                                  <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                              @enderror
                       </div>
                      </div>
                        </div>
                      <div class="row">
                        <div class="col-6">
                            <div>
                                <input type="checkbox" id="tyc" required>
                                <a data-toggle="modal" data-target="#modal-show-page" href="">Tratamiento de datos</a>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                          <button type="submit" class="btn btn-warning btn-sm float-right">{{ __('Iniciar Sesión') }}</button>
                        </div>
                        <!-- /.col -->
                      </div>
                      <div id="modal-show-page" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    
                                    <h4 class="modal-title" id="myModalLabel">Tratamiento de datos</h4>
                                </div>
                                <div class="modal-body">
                                    Aqui va todo el texto
                                </div>  
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                      </div><!-- /.modal -->
                    </form>
            
                    <p class="mb-0">
                      <a href="{{ route('registerClients') }}" class="text-center" style="color:#1A7C94">Registrarme</a>
                    </p>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
    </div>
</div>
@endsection
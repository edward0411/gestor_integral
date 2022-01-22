@extends('layouts.master_panel')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-12">
            <div class="card ">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Editar cotización') !!}</h5>
                </div>
                <!-- /.card-header -->
                <form method="POST" action="">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="u_key_number">{!! trans('Fecha de entrega') !!}</label>
                                <input type="date" class="form-control form-control-sm" id="u_key_number" name="u_key_number " value="" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="u_id_money">{!! trans('Tipo de servicio') !!}</label>
                                <select name="u_id_money" id="u_id_money" class="form-control form-control-sm">
                                    <option value="">Seleccione...</option>
                                    <option value="1">Tesis</option>
                                    <option value="2">Examen</option>
                                    <option value="3">Trabajo</option>
                                </select>
                            </div>
                        
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-header color-header">
                            <h5 class="text-white" style="font-weight: bold;">{!! trans('Preguntas') !!}</h5>
                          </div>
                          <div class="card-body" style="border: 1px solid #cccccc;">
                              <div class="rows">
                                <div class="form-group col-md-6">
                                    <label for="u_key_number">{!! trans('Pregunta 1') !!}</label>
                                    <input type="text" class="form-control form-control-sm" id="u_key_number" name="u_key_number " value="" required>
                                </div>
                                <div class="form-group col-md-6 float-right">
                                    <label for="u_key_number">{!! trans('Respuesta 1') !!}</label>
                                    <input type="text" class="form-control form-control-sm" id="u_key_number" name="u_key_number " value="" required>
                                </div>
                              </div><br><br>
                              <div class="rows">
                                <div class="form-group col-md-6">
                                    <label for="u_key_number">{!! trans('Pregunta 2') !!}</label>
                                    <input type="text" class="form-control form-control-sm" id="u_key_number" name="u_key_number " value="" required>
                                </div>
                                <div class="form-group col-md-6 float-right">
                                    <label for="u_key_number">{!! trans('Respuesta 2') !!}</label>
                                    <input type="text" class="form-control form-control-sm" id="u_key_number" name="u_key_number " value="" required>
                                </div>
                              </div>
                          </div>

                    </div>
                    <!-- Idiomas -->
                    <div class="card-body">
                        <div class="card-header color-header">
                          <h5 class="text-white" style="font-weight: bold;">{!! trans('Idiomas') !!}</h5>
                        </div>
                        <div class="card-body" style="border: 1px solid #cccccc;">
                            <label for="descripcion">{!! trans('Agregar Idioma') !!}</label> <i id="addElementIdioma" data-count="0"  class="fas fa-plus-square add-item"></i><br>
            
                          <table class="table table-bordered" id="tblIdioma">
                            <thead class="bg-warning text-center">
                              <tr>
                                <th class="text-white" style="width: 40%;">{!! trans('Idiomas') !!}</th>
                                <th class="text-white" style="width: 10%;">{!! trans('Acción') !!}</th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                          </table>
                       </div>
                    </div>
                    <!-- /Idiomas -->
                    <!-- Sistemas -->
                    <div class="card-body">
                        <div class="card-header color-header">
                          <h5 class="text-white" style="font-weight: bold;">{!! trans('Sistemas') !!}</h5>
                        </div>
                        <div class="card-body" style="border: 1px solid #cccccc;">
                            <label for="descripcion">{!! trans('Agregar Sistema') !!}</label> <i id="addElementSistema" data-count="0"  class="fas fa-plus-square add-item"></i><br>
            
                          <table class="table table-bordered" id="tblSistema">
                            <thead class="bg-warning text-center">
                              <tr>
                                <th class="text-white" style="width: 40%;">{!! trans('Sistemas') !!}</th>
                                <th class="text-white" style="width: 10%;">{!! trans('Acción') !!}</th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                          </table>
                       </div>
                    </div>
                    <!-- /Sistemas -->
                    <div class="card-body">
                        <div class="card-header color-header">
                          <h5 class="text-white" style="font-weight: bold;">{!! trans('Temas') !!}</h5>
                        </div>
                        <div class="card-body" style="border: 1px solid #cccccc;">
                            <label for="descripcion">{!! trans('Agregar Tema') !!}</label> <i id="addElementTema" data-count="0"  class="fas fa-plus-square add-item"></i><br>
            
                          <table class="table table-bordered" id="tblTema">
                            <thead class="bg-warning text-center">
                              <tr>
                                <th class="text-white" style="width: 40%;">{!! trans('Áreas') !!}</th>
                                <th class="text-white" style="width: 40%;">{!! trans('Materias') !!}</th>
                                <th class="text-white" style="width: 40%;">{!! trans('Temas') !!}</th>
                                <th class="text-white" style="width: 10%;">{!! trans('Acción') !!}</th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                          </table>
                       </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="u_key_number">{!! trans('Archivos') !!}</label>
                                <input type="file" class="form-control form-control-sm" id="u_key_number" name="u_key_number " value="" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="u_id_money">{!! trans('Observaciones') !!}</label>
                                <textarea name="texto_observacion"  id="" class="form-control form-control-sm" rows="2"></textarea>
                            </div>
                        
                        </div>
                    </div>

                    <div class="card-body">
                        <button type="submit" id="" class="btn btn-warning btn-sm"> {!! trans('Guardar') !!}</button>
                        <a href="{{route('quotes.myQuotes')}}" class="btn btn-warning btn-sm float-right">{!! trans('Regresar') !!}</a>
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

@section('script')
<script type="text/javascript">

$(document).ready(function () {

$("#addElementIdioma").click(function () {adcionarIdioma()});
$("#addElementSistema").click(function () {adcionarSistema()});
$("#addElementTema").click(function () {adcionarTema()});

});

function deletesCell(e){
    e.closest('tr').remove();
  }

function adcionarIdioma()
  {
      var total = $("#addElementIdioma").attr('data-count');


      var cell =  `

        <tr>
            <td>
              <div class="form-group">
                <select name="u_id_money" id="u_id_money" class="form-control form-control-sm">
                                    <option value="">Seleccione idioma</option>
                                    <option value="1">Ingles</option>
                                    <option value="2">Español</option>
                                    <option value="3">Frances</option>
                                </select>
              </div>
            </td>
            <td>
              <button type="button" class="btn btn-danger btn-sm  delete-cell" onclick="deletesCell(this)">{!! trans('Eliminar') !!}</button>
            </td>
          </tr>
       `;
       total ++;
      $("#addElementIdioma").attr('data-count',total);
      $("#tblIdioma tbody").append(cell);

      $('.select2').select2();

  }

  function adcionarSistema()
  {
      var total = $("#addElementTema").attr('data-count');


      var cell =  `

        <tr>
            <td>
              <div class="form-group">
                <select name="u_id_money" id="u_id_money" class="form-control form-control-sm">
                                    <option value="">Seleccione sistema</option>
                                    <option value="1">Ingles</option>
                                    <option value="2">Español</option>
                                    <option value="3">Frances</option>
                                </select>
              </div>
            </td>
            <td>
              <button type="button" class="btn btn-danger btn-sm  delete-cell" onclick="deletesCell(this)">{!! trans('Eliminar') !!}</button>
            </td>
          </tr>
       `;
       total ++;
      $("#addElementTema").attr('data-count',total);
      $("#tblSistema tbody").append(cell);

      $('.select2').select2();

  }

  function adcionarTema()
  {
      var total = $("#addElementSistema").attr('data-count');


      var cell =  `

        <tr>
            <td>
              <div class="form-group">
                <select name="u_id_money" id="" class="form-control form-control-sm">
                                    <option value="">Seleccione área</option>
                                    <option value="1">Salud ocupacional</option>
                                </select>
              </div>
            </td>
            <td>
            <div class="form-group">
                <select name="u_id_money" id="" class="form-control form-control-sm">
                                    <option value="">Seleccione materia</option>
                                    <option value="1">Enfermeria basica</option>
                                </select>
              </div>
            </td>
            <td>
            <div class="form-group">
                <select name="u_id_money" id="" class="form-control form-control-sm">
                                    <option value="">Seleccione tema</option>
                                    <option value="1">Vacunación</option>
                                </select>
              </div>
            </td>
            <td>
              <button type="button" class="btn btn-danger btn-sm  delete-cell" onclick="deletesCell(this)">{!! trans('Eliminar') !!}</button>
            </td>
          </tr>
       `;
       total ++;
      $("#addElementSistema").attr('data-count',total);
      $("#tblTema tbody").append(cell);

      $('.select2').select2();

  }


</script>
@endsection

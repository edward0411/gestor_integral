 <!-- Modal  editar-->
 <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cambiar estado de agendamiento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                <label >Estado de agendamiento</label>
                <select class="form-control" >
                    <option value="Elegir">Elegir</option>
                    {{-- @foreach($status as $value)
                        <option class="font-weight-bold text-uppercase" style="color: {{$value->colour}}" value="{{$value->id}}">{{$value->name}}</option>
                    @endforeach --}}
                </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" >Guardar</button>
        </div>
      </div>
    </div>
</div>


 <!-- Modal  crear-->
 <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Generar nuevo pago</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="card-body table-responsive">

            <div class="row">
                <div class="form-group col-md-4">
                    <label for="">Valor</label>
                    <input type="number" class="form-control form-control-sm" name="" style="text-align:center;" value="">
                </div>
                <div class="form-group col-md-4">
                    <label for="">Referencia de pago</label>
                    <input type="text" class="form-control form-control-sm" name="" style="text-align:center;" value="">
                </div>
                <div class="form-group col-md-4">
                    <label for="">Vaucher</label>
                    <input type="file" class="form-control form-control-sm" name="" style="text-align:center;" value="">
                </div>
                <div class="form-group col-md-4">
                    <label for="">Observación</label>
                    <textarea class="form-control form-control-sm" name="observaciones" id="observaciones_`+id_cuenta+`_tutors_bank_details" cols="5" rows="1"></textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" >Guardar</button>
        </div>
      </div>
    </div>
</div>

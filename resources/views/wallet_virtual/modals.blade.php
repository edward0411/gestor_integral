 <!-- Modal  editar-->
 <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar pago</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" id="formEdit" action="{{route('walletDetail.edit', $work->id)}}"  enctype="multipart/form-data">
            @csrf
            <div class="card-body table-responsive">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Valor</label>
                        <input type="number" class="form-control form-control-sm" name="value" id="valueEdit" style="text-align:center;" required>
                        <input type="hidden" class="form-control form-control-sm" name="id" id="id" style="text-align:center;">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Referencia de pago</label>
                        <input type="text" class="form-control form-control-sm" name="reference" id="referenceEdit"  style="text-align:center;" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Vaucher</label>
                        <input type="file" class="form-control form-control-sm" name="vaucher" id="vaucherEdit"  style="text-align:center;">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Observación</label>
                        <textarea class="form-control form-control-sm" name="observation" id="observationEdit" cols="5" rows="1"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" >Editar</button>
            </div>
        </form>
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
        <form method="POST" id="formCreate" action="{{route('wallet.store', $work->id)}}"  enctype="multipart/form-data">
            @csrf
            <div class="card-body table-responsive">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Valor</label>
                        <input type="number" class="form-control form-control-sm" name="value" id="value" style="text-align:center;" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Referencia de pago</label>
                        <input type="text" class="form-control form-control-sm" name="reference" id="payment_reference"  style="text-align:center;" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Vaucher</label>
                        <input type="file" class="form-control form-control-sm" name="vaucher" id="vaucher"  style="text-align:center;">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Observación</label>
                        <textarea class="form-control form-control-sm" name="observation" id="observation" cols="5" rows="1"></textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Pagar con TRM actual</label>
                        <div class="d-flex ">
                            <label for="">Sí</label>
                            <input type="radio" class="form-control form-control-sm" name="trm" id="yes"  style="text-align:center;" required>
                            <label for="">No</label>
                            <input type="radio" class="form-control form-control-sm" name="trm" id="no"  style="text-align:center;" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" >Guardar</button>
            </div>
            <div id="message"></div>

        </form>
      </div>
    </div>
</div>

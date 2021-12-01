@extends('layouts.master_panel',
$vars=[ 'breadcrum' => ['Administración','Roles'],
'title'=>'Roles',
'activeMenu'=>'6'
])
@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-12">
            <div class="card card-warning">
                <div class="card-header" style="font-weight: bold;">
                    <h5 class="card-title">Crear rol</h5>
                </div>
                <form role="form" method="POST" action="">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nombre del rol</label>
                                    <input type="text" name="name" id="name" class="form-control form-control-sm" placeholder="" value="">
                                    <input type="hidden" name="id_rol" id="id_rol" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-warning btn-sm" name="guardar" vuale="guardar">Guardar</button>
                        <a href="" type="button" class="btn btn-warning btn-sm float-right" name="cancelar" vuale="cancelar">Cancelar</a>
                    </div>
                </form>
            </div>
            <div class="card card-warning">
                <div class="card-header">
                    <h5 class="card-title">Lista de roles</h5>
                </div>
                <div class="card-body">
                    <table id="tabledata1" class="table table-bordered table-striped">
                        <thead>
                            <tr class="bg-warning text-center">
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <input type="button" value="Editar" class="btn btn-warning btn-xs" onclick="">
                                            <input type="hidden" id="" value="">
                                            <input type="hidden" id="" value="">
                                        </div>
                                        <div class="col">
                                            <a href="" class="btn btn-danger btn-xs" onclick="return confirm('{!! trans('Desea eliminar este registro') !!}?');"><i class="fas fa-trash"></i> {!! trans('Eliminar') !!}</a>
                                        </div>
                                        <div class="col">
                                            <a href="{{ route('roles.permission')}}" type="button" class="btn btn-info btn-xs" name="permisos" vuale="permisos"><i class="fas fa-key"></i> Permisos</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
@endsection

@section('script')
<script>
    function editar(id) {

        //alert("Hola Editar "+id);
        v_name = $('#ed_name_' + id).val();
        v_id_rol = $('#ed_id_rol_' + id).val();

        $('#name').val(v_name);
        $('#id_rol').val(v_id_rol);

    }

</script>
@endsection


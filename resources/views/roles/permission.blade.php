@extends('layouts.master_panel',
$vars=[ 'breadcrum' => ['Administración','Roles', 'Permisos'],
'title'=>'Roles - Permisos - ',
'activeMenu'=>'6'
])
@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header color-header">
                    <h3 class="card-title">Permisos para el rol <strong>{{ $role['name'] }}</strong></h3>
                </div>
                <!-- /.card-header -->
                <form role="form" method="POST" action="{{route('roles.permission.store')}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="hidden" name="roleid" value="{{$role['id']}}">
                                    @foreach ($permissions as $permission)
                                    <div class="form-check">
                                        <input 
                                        class="form-check-input" 
                                        type="checkbox" 
                                        name = 'permisions[]'
                                        value = '{{$permission['name']}}'
                                        @foreach($permissions_role as $permission_rol)
                                            {{ ($permission_rol==$permission['name'])?'checked':'' }}
                                        @endforeach 
                                        >
                                        <label class="form-check-label">{{$permission['name']}}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <input type="hidden" name="id" id="id" class="form-control" value="0">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-warning btn-sm" name="guardar" vuale="guardar">Guardar</button>
                        <a href="{{route('roles.index')}}" type="button" class="btn btn-warning btn-sm float-right" name="cancelar" vuale="cancelar">Regresar</a>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
@endsection


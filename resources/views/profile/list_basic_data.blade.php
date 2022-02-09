@extends('layouts.master_panel')
@section('title','Solicitud usuario')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Listado de solicitud de usuario') !!}
                    </h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="tabledata1" class="table table-bordered table-striped">
                        <thead>
                            <tr class="bg-warning text-center">
                                <th>{!! trans('Usuario') !!}</th>
                                <th>{!! trans('Fecha de modificación') !!}</th>
                                <th>{!! trans('Acciones') !!}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Cliente2</td>
                                <td>2022 - 02 - 08</td>
                                <td>
                                    <a href=""class="btn btn-warning btn-xs"><i class="far fa-eye"></i> {!!trans('Ver') !!}</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
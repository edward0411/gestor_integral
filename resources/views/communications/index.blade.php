@extends('layouts.master_panel')
@section('title','Bandeja de Comunicaciones')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="tabledata1" class="table table-bordered table-striped">
                        <thead>
                            <tr class="bg-warning text-center">
                                <th>{!! trans('N° de proceso') !!} </th>
                                <th>{!! trans('Cliente') !!} </th>
                                <th>{!! trans('Tutor') !!} </th>
                                <th>{!! trans('Comercial') !!}</th>
                                <th>{!! trans('Monitor') !!}</th>
                                <th>{!! trans('Fecha de inicio') !!}</th>
                                <th>{!! trans('Estado') !!}</th>
                                <th>{!! trans('Acciones') !!}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#001</td>
                                <td>JorgeRomero23</td>
                                <td>Sin asignación</td>
                                <td>Comercial_001</td>
                                <td>Monitor_035</td>
                                <td>01-01-2022</td>
                                <td>En cotización</td>
                                <td>
                                    <a href="{{route('communications.living',1)}}" class="btn btn-warning btn-xs"><i class="fas fa-eye"></i> {!! trans('Ver') !!}</a>
                                </td>
                            </tr>
                            <tr>
                                <td>#026</td>
                                <td>Anita_lovers</td>
                                <td>Ciencias_Romero</td>
                                <td>Comercial_032</td>
                                <td>Monitor_084</td>
                                <td>08-12-2021</td>
                                <td>En Desarrollo</td>
                                <td>
                                    <a href="#" class="btn btn-warning btn-xs"><i class="fas fa-eye"></i> {!! trans('Ver') !!}</a>
                                </td>
                            </tr>
                            <tr>
                                <td>#008</td>
                                <td>RuizCamacho85</td>
                                <td>Profesos_Quimica</td>
                                <td>Comercial_012</td>
                                <td>Monitor_012</td>
                                <td>14-01-2022</td>
                                <td>Entregado Pdte Validación</td>
                                <td>
                                    <a href="#" class="btn btn-warning btn-xs"><i class="fas fa-eye"></i> {!! trans('Ver') !!}</a>
                                </td>
                            </tr>
                            <tr>
                                <td>#011</td>
                                <td>JuliCorzo1992</td>
                                <td>AlbertEinstein</td>
                                <td>Comercial_005</td>
                                <td>Monitor_012</td>
                                <td>22-11-2021</td>
                                <td>Entregado y Validado.</td>
                                <td>
                                    <a href="#" class="btn btn-warning btn-xs"><i class="fas fa-eye"></i> {!! trans('Ver') !!}</a>
                                </td>
                            </tr>
                            <tr>
                                <td>#091</td>
                                <td>Monita1990</td>
                                <td>AlbertEinstein</td>
                                <td>Comercial_032</td>
                                <td>Monitor_084</td>
                                <td>04-10-2021</td>
                                <td>En Desarrollo</td>
                                <td>
                                    <a href="#" class="btn btn-warning btn-xs"><i class="fas fa-eye"></i> {!! trans('Ver') !!}</a>
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

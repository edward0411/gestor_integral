@extends('layouts.master_panel')
@section('css')
<style>
     .select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: 4px;
            height: calc(1.8125rem + 2px);
            font-size: .875rem;
            padding: .25rem .5rem;
            color: #495057;
            line-height: 1.5;
        }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header color-header">
                    <h5 class="card-title" style="font-weight: bold;">{!! trans('Crear Calificación') !!}</h5>
                </div>
                <!-- /.card-header -->
                <form method="POST" action="{{route('qualificate_store')}}">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="id_deliverable">{!! trans('Entregable N°') !!}</label>
                                <input type="text" name="id_deliverable" class="form-control form-control-sm" value="{{$deliverable->id}}" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="date_deliverable">{!! trans('Fecha de subida de entregable') !!}</label>
                                <input type="date" name="date_deliverable" class="form-control form-control-sm" value="{{$deliverable->date_delivery}}" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="type_bond"> {!! trans('Calificación') !!}</label>
                                <select class="form-control form-control-sm" id="type_bond" name="type_bond" onchange="filtersQualificate()" required>
                                    <option value="">{!! trans('Selecione...') !!}</option> 
                                    @foreach($types as $type)
                                        <option value="{{$type->id}}" >{{$type->p_text}}</option> 
                                    @endforeach    
                            </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="num_qualificate"> {!! trans('Rango de calificación') !!}</label>
                                <select class="form-control form-control-sm" id="num_qualificate" name="num_qualificate" required>
                                    <option value="">{!! trans('Selecione...') !!}</option> 
                                    
                                </select>
                            </div>
                        </div>
                        <button type="submit" id="" class="btn btn-warning btn-sm"> {!! trans('Guardar') !!}</button>
                        <a href="{{route('process.deliverables.index')}}" class="btn btn-warning btn-sm float-right">{!! trans('Regresar') !!}</a>
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
    
        var qualificates = [
            @foreach($qualificates as $qualites) {
                "id": "{{$qualites->id}}",
                "point_value": "{{$qualites->point_value}}",
                "type_state": "{{$qualites->type_state}}",
             },
            @endforeach
        ];
    
        function filtersQualificate() {
    
            var selectedType = $("#type_bond").val();
            nuevo = $.grep(qualificates, function(n, i) {
                return n.type_state == selectedType
            });
            $('#num_qualificate').empty()
            $('#num_qualificate').append($('<option></option>').val('').html('Seleccione...'));
            $.each(nuevo, function(key, value) {
                $('#num_qualificate').append($('<option></option>').val(value.id).html(value.point_value));
            });
    
        }
    </script>
@endsection

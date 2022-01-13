<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Gestor Integral | Blank Page</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href=" {{ asset('plugins/fontawesome-free/css/all.min.css') }} ">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href=" {{ asset('dist/css/adminlte.min.css') }} ">
    
    <link rel="stylesheet" href=" {{ asset('css/admin_panel.css') }}">
    <link rel="stylesheet" href=" {{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href=" {{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <link href=" {{ asset("icofont/icofont.min.css")}}" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include("partials.navbar")
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        @include("partials.sidebar")
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>@yield('title')</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <!-- /.card -->
            @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              {{Session::get('error')}}
            </div>
        @endif
        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              {{Session::get('success')}}
            </div>
        @endif
        
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
    @endif
            <section class="content">
                @yield("content")
            </section>
            <!-- /.content -->
        </div>

      
        <!-- /.content-wrapper -->
        <footer class="main-footer" style="width:100%; margin-left: 0px!important;background-color:#1A7C94 ;color:rgba(230,230,230,1);border-top:0px solid gray;">
            <div class="text-center">
                <p> Desarrollado por <a href=""></a></a> para Gestion Integral | Copyright &copy; 2021 Gestion Integral.</p>
            </div>
            <div class="float-right d-none d-sm-inline-block" style="margin-top:-30px;">
                <b>Versión</b> {{config('app.version')}}
            </div>
        </footer>
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-light">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset("plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset("plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js") }}"></script>




<!-- bs-custom-file-input -->
<script src="{{ asset("/plugins/bs-custom-file-input/bs-custom-file-input.min.js") }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset("/dist/js/adminlte.min.js") }}"></script>
<!-- Select2 App -->
<script src="{{ asset("plugins/select2/js/select2.full.min.js") }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset("/dist/js/demo.js") }}"></script>

<!-- DataTables -->

<script src="{{ asset("plugins/datatables/jquery.dataTables.min.js") }}"></script>
<script src="{{ asset("plugins/datatables-bs4/js/dataTables.bootstrap4.min.js") }}"></script>
<script src="{{ asset("plugins/datatables-responsive/js/dataTables.responsive.min.js") }}"></script>
<script src="{{ asset("plugins/datatables-responsive/js/responsive.bootstrap4.min.js") }}"></script>

<script src="{{ asset("plugins/datatables-buttons/js/dataTables.buttons.min.js") }}"></script>
<script src="{{ asset("plugins/datatables-buttons/js/buttons.bootstrap4.min.js") }}"></script>

<script type="text/javascript" language="javascript" src="{{ asset("plugins/jszip/jszip.min.js") }}"></script>
<script type="text/javascript" language="javascript" src="{{ asset("plugins/pdfmake/pdfmake.min.js") }}"></script>
<script type="text/javascript" language="javascript" src="{{ asset("plugins/pdfmake/vfs_fonts.js") }}"></script>
<script type="text/javascript" language="javascript" src="{{ asset("plugins/datatables-buttons/js/buttons.html5.min.js") }}"></script>
<script type="text/javascript" language="javascript" src="{{ asset("plugins/datatables-buttons/js/buttons.print.min.js") }}"></script>

 
<script src="https://malsup.github.io/jquery.form.js"></script> 

<script type="text/javascript">

    $(document).ready(function(){
    
     
    
      $(function () {   
        $('.select2').select2()
      });
    
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      });
    
        $('#tabledata1').DataTable( {
            responsive: true,
          dom: 'Bfrtlip',
            buttons: [
    
                {
                    extend: 'excel',
                    text: '<i class="fas fa-file-excel"> Excel</i>',
                    className:'btn btn-default'
                    },
    
                    {
                    extend: 'pdf',
                    text: '<i class="fas fa-file-pdf"> Pdf</i>',
                    className:'btn btn-default'
                    },
                    {
                    extend: 'print',
                    text: '<i class="fas fa-print"> Imprimir</i>',
                    className:'btn btn-default'
                    },
            ],
            language:
             {
               "sProcessing":     "Procesando...",
               "sLengthMenu":     "Mostrar _MENU_ registros",
               "sZeroRecords":    "No se encontraron resultados",
               "sEmptyTable":     "Ningún dato disponible en esta tabla",
               "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
              "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
              "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
               "sSearch":         "Buscar:",
              "sUrl":            "",
               "sInfoThousands":  ",",
               "sLoadingRecords": "Cargando...",
               "oPaginate": {
                   "sFirst":    "Primero",
                  "sLast":     "Último",
                   "sNext":     "Siguiente",
                   "sPrevious": "Anterior"
              },
             "oAria": {
                  "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                  "sSortDescending": ": Activar para ordenar la columna de manera descendente"
             }
          }
        } );
    
      $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
    
      });
      </script>
    @yield('script')
</body>
</html>


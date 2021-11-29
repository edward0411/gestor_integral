<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gestor Integral | Blank Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->

  <link rel="stylesheet" href=" {{ asset('plugins/fontawesome-free/css/all.min.css') }} ">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href=" {{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }} ">
  <!-- iCheck -->
  <link rel="stylesheet" href=" {{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }} ">
  <!-- JQVMap -->
  <link rel="stylesheet" href=" {{ asset('plugins/jqvmap/jqvmap.min.css') }} ">
  <!-- Theme style -->
  <link rel="stylesheet" href=" {{ asset('dist/css/adminlte.min.css') }} ">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href=" {{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }} ">
  <!-- Daterange picker -->
  <link rel="stylesheet" href=" {{ asset('plugins/daterangepicker/daterangepicker.css') }} ">
  <!-- summernote -->
  <link rel="stylesheet" href=" {{ asset('plugins/summernote/summernote-bs4.css') }} ">

  <link rel="stylesheet" href="{{ asset("dist/css/select2-bootstrap.css")}}">

  <link href=" {{ asset("icofont/icofont.min.css")}}" rel="stylesheet">

  <link rel="stylesheet" href=" {{ asset('css/admin_panel.css') }}">
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
            <h1>Gestor Integral</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

     

      <!-- /.card -->

      <section class="content">
        @yield("content")
    </section>


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset("plugins/moment/moment.min.js") }}"></script>
<script src="{{ asset("plugins/inputmask/min/jquery.inputmask.bundle.min.js") }}"></script>
<!-- date-range-picker -->
<script src="{{ asset("plugins/daterangepicker/daterangepicker.js") }}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset("plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js") }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset("plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js") }}"></script>
<!-- Bootstrap Switch -->
<script src=".{{ asset("plugins/bootstrap-switch/js/bootstrap-switch.min.js") }}"></script>





<!-- jQuery -->
<script src="{{ asset("plugins/jquery/jquery.min.js") }}"></script>
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

<script src="{{ asset("/dist/js/jquery.form.min.js") }}"></script>

<script type="text/javascript">
    $(document).ready(function () {
      bsCustomFileInput.init();
    });
    
    $(function () {
      $('.select2').select2()
    
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
          $("#tabledata1").DataTable({
                "responsive": true,
                "dom": "Bfrtip",
                "buttons": [
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
                        {
                        extend: 'pageLength',
                        text: '<i class="fas fa-bars"> Mostrar filas</i>',
                        className:'btn btn-default'
                        },
                ],
                "language": {
                    "decimal":        "",
                    "emptyTable":     "No se encontraron registros",
                    "info":           "Mostrando _START_ a _END_ da _TOTAL_ registros",
                    "infoEmpty":      "Mostrando 0 a 0 da 0 registros",
                    "infoFiltered":   "(Filtrado de _MAX_ total registros)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "Mostrar _MENU_ filas",
                    "loadingRecords": "Cargando...",
                    "processing":     "Porcesando...",
                    "search":         "Buscar:",
                    "zeroRecords":    "No se encontraron registros",
                    "aria": {
                        "sortAscending":  ": Ordenar ascendente",
                        "sortDescending": ": Ordenar descendente"
                    },
                    "paginate": {
                        "first":      "Primero",
                        "last":       "Último",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    }
                }
            });
         });
    
         function open(){
           document.getElementById("vent").style.display="block"
         }
         function close(){
           document.getElementById("vent").style.display="none"
         }
    </script>
    
    
    @yield('script')
</body>
</html>

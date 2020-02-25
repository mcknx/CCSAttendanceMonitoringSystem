<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CCS Attendance</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css"> -->
  <link rel="stylesheet" href="{{asset('/AdminLTE-master/plugins/fontawesome-free/css/all.min.css')}}">

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <!-- <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"> -->
  <link rel="stylesheet" href="{{asset('/AdminLTE-master/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <!-- <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
  <link rel="stylesheet" href="{{asset('/AdminLTE-master/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

  <!-- JQVMap -->
  <!-- <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css"> -->
  <link rel="stylesheet" href="{{asset('/AdminLTE-master/plugins/jqvmap/jqvmap.min.css')}}">

  <!-- Theme style -->
  <!-- <link rel="stylesheet" href="dist/css/adminlte.min.css"> -->
  <link rel="stylesheet" href="{{asset('/AdminLTE-master/dist/css/adminlte.min.css')}}">

  <!-- overlayScrollbars -->
  <!-- <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css"> -->
  <link rel="stylesheet" href="{{asset('/AdminLTE-master/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">

  <!-- Daterange picker -->
  <!-- <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css"> -->
  <link rel="stylesheet" href="{{asset('/AdminLTE-master/plugins/daterangepicker/daterangepicker.css')}}">

  <!-- summernote -->
  <!-- <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css"> -->
  <link rel="stylesheet" href="{{asset('/AdminLTE-master/plugins/summernote/summernote-bs4.css')}}">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  

</head>
<script type="text/javascript">
        function zoom() {
            document.body.style.zoom = "80%" 
        }
</script>
<body onload="zoom()" class="hold-transition sidebar-mini layout-fixed">
  <!-- Page Preloder -->
 <div id="preloder">
    <div class="loader"></div>
  </div>
<div class="wrapper">
<div class="wrapper">

  <!-- Navbar -->
  @include("navbar")
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/dashboard')}}" class="brand-link">
      <img src="/AdminLTE-master/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">CCS Attendance</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!-- <div class="image">
          <img src="/AdminLTE-master/dist/img/asma.jpg" class="img-circle elevation-2" alt="User Image">
        </div> -->
        <!-- <div class="info">
          <a href="#" class="d-block">Mckeen Asma</a>
        </div> -->
        <div class="info">
          <span class="text-white">Welcome! {{ ucfirst(Auth()->user()->name) }}</span>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <!-- <i class="nav-icon fas fa-tachometer-alt"></!-->
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/attendance')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Attendance Management</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/professor')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Professor Management</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/subject')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Subject Management</p>
                </a>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <section class="content-wrapper">
    <div class="card card-solid">
        @include("attendancelist")

    </div>
    </div>
  </section>
  <!-- /.content-wrapper -->
  @include("footer")
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<!-- <script src="plugins/jquery/jquery.min.js"></script> -->
<script src="{{asset('/AdminLTE-master/plugins/jquery/jquery.min.js')}}"></script>

<!-- jQuery UI 1.11.4 -->
<!-- <script src="plugins/jquery-ui/jquery-ui.min.js"></script> -->
<script src="{{asset('/AdminLTE-master/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<!-- <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<script src="{{asset('/AdminLTE-master/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- ChartJS -->
<!-- <script src="plugins/chart.js/Chart.min.js"></script> -->
<script src="{{asset('/AdminLTE-master/plugins/chart.js/Chart.min.js')}}"></script>

<!-- Sparkline -->
<!-- <script src="plugins/sparklines/sparkline.js"></script> -->
<script src="{{asset('/AdminLTE-master/plugins/sparklines/sparkline.js')}}"></script>

<!-- JQVMap -->
<!-- <script src="plugins/jqvmap/jquery.vmap.min.js"></script> -->
<script src="{{asset('/AdminLTE-master/plugins/jqvmap/jquery.vmap.min.js')}}"></script>

<!-- <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
<script src="{{asset('/AdminLTE-master/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>

<!-- jQuery Knob Chart -->
<!-- <script src="plugins/jquery-knob/jquery.knob.min.js"></script> -->
<script src="{{asset('/AdminLTE-master/plugins/jquery-knob/jquery.knob.min.js')}}"></script>

<!-- daterangepicker -->
<!-- <script src="plugins/moment/moment.min.js"></script> -->
<script src="{{asset('/AdminLTE-master/plugins/moment/moment.min.js')}}"></script>

<!-- <script src="plugins/daterangepicker/daterangepicker.js"></script> -->
<script src="{{asset('/AdminLTE-master/plugins/daterangepicker/daterangepicker.js')}}"></script>

<!-- Tempusdominus Bootstrap 4 -->
<!-- <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> -->
<script src="{{asset('/AdminLTE-master/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>

<!-- Summernote -->
<!-- <script src="plugins/summernote/summernote-bs4.min.js"></script> -->
<script src="{{asset('/AdminLTE-master/plugins/summernote/summernote-bs4.min.js')}}"></script>

<!-- overlayScrollbars -->
<!-- <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> -->
<script src="{{asset('/AdminLTE-master/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

<!-- AdminLTE App -->
<!-- <script src="dist/js/adminlte.js"></script> -->
<script src="{{asset('/AdminLTE-master/dist/js/adminlte.js')}}"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="dist/js/pages/dashboard.js"></script> -->
<script src="{{asset('/AdminLTE-master/dist/js/pages/dashboard.js')}}"></script>

<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<script src="{{asset('/AdminLTE-master/dist/js/demo.js')}}"></script>

</body>
</html>

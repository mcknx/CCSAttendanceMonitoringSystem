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
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
    </ul>
    <!-- SEARCH FORM -->
    <form action="/searchSubject" class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" name="search" type="search" placeholder="Search Subject Title" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="/AdminLTE-master/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">CCS Attendance</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/AdminLTE-master/dist/img/asma.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Mckeen Asma</a>
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
                <a href="{{url('/attendance')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Attendance Mgt</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/professor')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Professor Mgt</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/subject')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Subject Mgt</p>
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
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Subject Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Subject Management</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @if($layout == 'subjectIndex')
    <div class="container-fluid mt-4">
        <div class="container-fluid mt-4">
            <div class="row justify-content-center">
                <section class="col-md-12">
                    @include("subjectslist")
                </section>
            </div>
        </div>
    </div>
@elseif($layout == 'subjectCreate')
    <div class="container-fluid mt-4 " id="create-form">
        <div class="row">
            <section class="col-md-7">
                @include("subjectslist")
            </section>
            <section class="col-md-5">

                <div class="card mb-3">
                    <div class="card-body">
                        <blockquote class="card-title">Enter the informations of the new subject</blockquote>
                        <br>
                        <form action="{{ url('/subjectStore') }}" method="post">
                            @csrf
                            <br>
                            <br>
                            <div class="form-group">
                                <label>Subject Title</label>
                                <input name="Subj_title" type="text" class="form-control"  placeholder="Enter First Name">
                            </div>
                            <div class="form-group">
                                <label>Subject Day</label>
                                <input name="Subj_day" type="text" class="form-control"  placeholder="Enter Last Name">
                            </div>

                            
                            <div class="form-group">
                                <label>Subject Time</label>
                                <input name="Subj_time" type="text" class="form-control"  placeholder="Enter Middle Name">
                            </div>
                            
                            <div class="form-group">
                                <label>Subject Description</label>
                                <input name="Subj_desc" type="text" class="form-control"  placeholder="Enter Subject ID">
                            </div>

                            <div class="form-group">
                                <label>Subject Units</label>
                                <input name="Subj_units" type="text" class="form-control"  placeholder="Enter Subject ID">
                            </div>

                            <div class="form-group">
                                <label>Subject Room</label>
                                <input name="Subj_room" type="text" class="form-control"  placeholder="Enter Subject ID">
                            </div>

                            <div class="form-group">
                                <label>Subject Yr & Sec</label>
                                <input name="Subj_yr_sec" type="text" class="form-control"  placeholder="Enter Subject ID">
                            </div>

                            <div class="form-group">
                                <label>Professor</label>
                                <!-- <input  type="number" class="form-control"  placeholder="Enter Subject ID"> -->
                                <br>
                                <select name="Prof_ID">
                                  @foreach($professors as $professor)
                                  <!-- <option value="">{{ $professor->Prof_fname.' '.$professor->Prof_mname.' '.$professor->Prof_lname }}</option> -->
                                  <option value="">{{ $professor->id }}</option>
                                  @endforeach
                                </select>
                            </div>

                            <input type="submit" class="btn btn-info" value="Save">
                            <input type="reset" class="btn btn-warning" value="Reset">
                        </form>
                    </div>
                </div>

            </section>
        </div>
    </div>
@elseif($layout == 'subjectShow')
    <div class="container-fluid mt-4">
      <h6 class='$classname'>{{$message}}</h6>
        <div class="row">
            <section class="col">
                @include("subjectslist")
            </section>
            <section class="col"></section>
        </div>
    </div>
@elseif($layout == 'subjectEdit')
    <div class="container-fluid mt-4">
        <div class="row">
            <section class="col-md-7">
                @include("subjectslist")
            </section>
            <section class="col-md-5">

                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Update informations of subject</h5>
                        <form action="{{ url('/subjectUpdate/'.$subject->id) }}" method="post">
                            @csrf
                            <br>
                            <div class="form-group">
                                <label>Subject Title</label>
                                <input value="{{ $subject->Subj_title }}" name="Subj_title" type="text" class="form-control"  placeholder="Enter First Name">
                            </div>
                            <div class="form-group">
                                <label>Subject Day</label>
                                <input value="{{ $subject->Subj_day }}" name="Subj_day" type="text" class="form-control"  placeholder="Enter Last Name">
                            </div>

                            
                            <div class="form-group">
                                <label>Subject Time</label>
                                <input value="{{ $subject->Subj_time }}"name="Subj_time" type="text" class="form-control"  placeholder="Enter Middle Name">
                            </div>
                            
                            <div class="form-group">
                                <label>Subject Description</label>
                                <input value="{{ $subject->Subj_desc }}" name="Subj_desc" type="text" class="form-control"  placeholder="Enter Subject ID">
                            </div>

                            <div class="form-group">
                                <label>Subject Units</label>
                                <input value="{{ $subject->Subj_units }}" name="Subj_units" type="text" class="form-control"  placeholder="Enter Subject ID">
                            </div>

                            <div class="form-group">
                                <label>Subject Room</label>
                                <input value="{{ $subject->Subj_room }}" name="Subj_room" type="text" class="form-control"  placeholder="Enter Subject ID">
                            </div>

                            <div class="form-group">
                                <label>Subject Yr & Sec</label>
                                <input value="{{ $subject->Subj_yr_sec }}" name="Subj_yr_sec" type="text" class="form-control"  placeholder="Enter Subject ID">
                            </div>

                            <div class="form-group">
                                <label>Professor ID</label>
                                <input value="{{ $subject->Prof_ID }}" name="Prof_ID" type="number" class="form-control"  placeholder="Enter Subject ID">
                            </div>

                            <input type="submit" class="btn btn-info" value="Update">
                            <input type="reset" class="btn btn-warning" value="Reset">

                        </form>
                    </div>
                </div>

            </section>
        </div>
    </div>
@endif
        <!-- @include("subjectslist") -->
        <!-- <div class="card-footer">
          <nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0">
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
              <li class="page-item"><a class="page-link" href="#">6</a></li>
              <li class="page-item"><a class="page-link" href="#">7</a></li>
              <li class="page-item"><a class="page-link" href="#">8</a></li>
            </ul>
          </nav>
        </div> -->
        <!-- /.card-footer -->
        </section>
    </div>
    </div>

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

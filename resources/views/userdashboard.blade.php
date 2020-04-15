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
  <script src="{{asset('/AdminLTE-master/plugins/jquery/jquery.min.js')}}"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="shortcut icon" />

  <!-- Google font -->
  <link
    href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap"
    rel="stylesheet"
  />

  <!-- Stylesheets -->
  <link rel="stylesheet" href="{{asset('solmusic/css/bootstrap.min.css')}}" />
  <link rel="stylesheet" href="{{asset('solmusic/css/font-awesome.min.css')}}" />
  <link rel="stylesheet" href="{{asset('solmusic/css/owl.carousel.min.css')}}" />
  <link rel="stylesheet" href="{{asset('solmusic/css/slicknav.min.css')}}" />

  <!-- Main Stylesheets -->
  <link rel="stylesheet" href="{{asset('solmusic/css/style.css')}}" />

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
            document.body.style.zoom = "120%" 
        }
</script>
<body onload="zoom()" class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  @include("navbar-user")
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/userdashboard')}}" class="brand-link">
    <!-- <img src="/AdminLTE-master/dist/img/ccs.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8; width: 50px; height: 150px;"> -->
           <span>CCS Attendance</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!-- <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
        </div>
        <div class="info">
          <!-- <span class="text-white"></span> -->
          <a href="" data-toggle="modal" data-target="#modal-default" class="nav-item p-2 text-danger">{{ (Auth()->user()->username) }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{url('/userdashboard')}}" class="nav-link text-white active">
              <i class="nav-icon fas fa-tachometer-alt "></i>
              <p>
                Dashboard
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- <li class="nav-item">
                <a href="../../index.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li> -->
              <!-- <li class="nav-item">
                <a href="../../index2.html" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My statistics</p>
                </a>
              </li> -->
              <!-- <li class="nav-item">
                <a href="../../index3.html" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Absences/Tardiness</p>
                </a>
              </li> -->
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
      @if (Session::has('message'))
            <div class="alert alert-danger">
              {{Session::get('message')}}
            </div>
            @endif

            @if (Session::has('success'))
            <div class="alert alert-success">
              {{Session::get('success')}}
            </div>
            @endif
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="/AdminLTE-master/dist/img/avatar5.png"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ ucfirst(Auth()->user()->name) }}</h3>

                <p class="text-muted text-center">Professor</p>

                <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-view-table"><b>View Table</b></button>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
                  

                    <div class="item active">
                      <!-- <img src="chicago.jpg" alt="Chicago" style="width:100%;"> -->
                      <blockquote ><strong><h6 class="text-primary">Today's Subject</h6></strong></blockquote>
                      @if ($subject_today == null) 
                        <p>No class for today</p>
                      @endif

                      @if ($subject_today != null) 
                      <ul class="list-group list-group-unbordered mb-3">
                          <li class="list-group-item">
                            <b>Subject Title</b><br>
                              <kbd><strong>{{$subject_today->Subj_title}}</strong></kbd>.
                          </li>
                          <li class="list-group-item">
                            <b>Subject Description</b><br>
                              <kbd><strong>{{$subject_today->Subj_desc}}</strong></kbd>.
                          </li>
                          <li class="list-group-item">
                            <b>Day Schedule(s)</b> 
                              <br>
                              @if($subject_today->Subj_dayM == 1 )
                                  <kbd><strong>Mon</strong></kbd>,  
                              @endif

                              @if($subject_today->Subj_dayT == 1 )   
                              
                                  <kbd><strong>Tue</strong></kbd>,  
                            
                              @endif

                              @if($subject_today->Subj_dayW == 1 ) 
                              
                                  <kbd><strong>Wed</strong></kbd>,  
                          
                              @endif

                              @if($subject_today->Subj_dayTH == 1 ) 
                        
                                  <kbd><strong>Thu</strong></kbd>,  
                            
                              @endif

                              @if($subject_today->Subj_dayF == 1 ) 
                      
                                  <kbd><strong>Fri</strong></kbd>,  
                          
                              @endif

                              @if($subject_today->Subj_dayS == 1 ) 
                          
                                  <kbd><strong>Sat</strong></kbd>,  
                    
                              @endif

                              @if($subject_today->Subj_daySu == 1 ) 
                          
                                  <kbd><strong>Sun</strong></kbd>. 
                          
                              @endif
                            
                          </li>

                          <li class="list-group-item">
                            <b>Time Schedule</b> 
                            <?php
                              $dt = strtotime($subject_today->Subj_timein);
                              $dt2 = strtotime($subject_today->Subj_timeout);
                              $record1 = date("g:i:sa", $dt);
                              $record2 = date("g:i:sa", $dt2);
                            ?>
                              <br>
                                <kbd><strong>{{$record1}}</strong></kbd> - 
                                <kbd><strong>{{$record2}}</strong></kbd>.
                          </li>
                          <li class="list-group-item">
                            <b>Room</b>
                            <br>
                            <kbd><strong>{{ $subject_today->Subj_room }}</strong></kbd>.
                          </li>
                          <li class="list-group-item">
                            <b>Units</b>
                            <br>
                            <kbd><strong>{{ $subject_today->Subj_units }}</strong></kbd>.
                          </li>
                          <li class="list-group-item">
                            <b>Section</b>
                            <br>
                            <kbd><strong>{{ $subject_today->Subj_yr_sec }}</strong></kbd>.
                          </li>
                        </ul>
                        @endif
                    </div>
                  
                    
                  </div>

                  <!-- Left and right controls -->
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
          

          
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity Requests</a></li>
                  <li class="nav-item"><a class="nav-link" href="#status" data-toggle="tab">Attendance Status</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Create Activity Request</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    
                      
                      @foreach ($activity_requests as $activity_request)
                        @foreach ($activity_request as $item)
                        <div class="timeline">
                          <!-- Post -->
                          <?php
                            
                            $dt = strtotime($item->notified_at);
                            $record = date("l, M d, Y", $dt);
                            $dayAbbrv = date("D", $dt);

                            $dt2 = strtotime($item->notified_at);
                            $recordN = date("g:i:sa", $dt2);
                          ?>
                          <div class="time-label">
                            <span class="bg-red">{{$record}}</span>
                        
                          </div>
                          <div>
                          <i class="fas fa-envelope bg-blue"></i>
                            <div class="post timeline-item">
                              <div class="timeline-body">
                                <div class="user-block">
                                  <img class="img-circle img-bordered-sm" src="/AdminLTE-master/dist/img/avatar5.png" alt="user image">
                                  <span class="username">
                                    <a href="" data-toggle="modal" data-target="#modal-default-edit" onClick="onClickModalRemark('{{$item->id}}')">{{ ucfirst(Auth()->user()->name) }}</a>
                                    <!-- <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a> -->
                                  </span>

                                  
                                  <span class="description">Created Activity Request! - {{ $record }} @<kbd><strong>{{ $recordN }}</strong></kbd><br>
                                    Subject: <strong>{{ $item->subject->Subj_desc }}</strong>, <br>
                                    Room: <strong>{{ $item->subject->Subj_room }}</strong>, <br>
                                    Section: <strong>{{ $item->subject->Subj_yr_sec }}</strong>, <br>
                                    <?php
                                      $dt = strtotime($item->subject->Subj_timein);
                                      $dt2 = strtotime($item->subject->Subj_timeout);
                                      $record1 = date("g:i:sa", $dt);
                                      $record2 = date("g:i:sa", $dt2);
                                    ?>
                                    Schedule: <strong>{{ $record1 }} - {{ $record2 }}</strong> <br>
                                  </span>
                                </div>
                              <!-- /.user-block -->
                              <!-- <hr> -->
                              <p>
                                <strong class="text-primary">Activity Request Description</strong><br>
                                  {{ $item->post }}.

                                <br>
                                <strong class="text-primary">File</strong><br>
                                @if ($item->file == null) 
                                  No uploaded file.
                                @endif
                                <a href="{{ asset('user-files/' . $item->file) }}">{{ $item->file }}</a>
                              </p>
                              <p>
                                <a href="#" class="link-black text-sm mr-2" data-toggle="modal" data-target="#modal-default-edit" onClick="onClickModalRemark('{{$item->id}}')"><i class="fas fa-edit mr-1"></i> Edit</a>
                                <a href="" class="link-black text-sm" onClick="onClickModalDelete('{{$item->id}}')"><i class="far fa-trash-alt mr-1"></i> Delete</a>
                                <span class="float-right">
                                  <!-- <a href="#" class="link-black text-sm">
                                    <i class="far fa-comments mr-1"></i> Comments (5)
                                  </a> -->
                                </span>
                              </p>

                              <!-- <input class="form-control form-control-sm" type="text" placeholder="Type a comment"> -->
                              </div>
                            </div>
                          </div>
                          <!-- /.post -->

                         
                          <div>
                            <i class="fas fa-clock bg-gray"></i>
                          </div>
                          </div>
                           <!-- Modal for edit -->
                           <div class="modal fade" id="modal-default-edit">
                            <div class="modal-dialog">
                              <form action="{{ url('/editActivityRequest/'.$item->id) }}" class="form-horizontal" id="myForm" enctype="multipart/form-data" method="post">
                              {{ csrf_field() }}
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title col-form-label"><strong>Edit Activity Request  - {{ $record }} @<kbd>{{ $recordN }}</kbd> for <kbd>{{ $item->subject->Subj_desc }}</kbd></strong></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="form-group row">
                                    <label for="inputExperienceEdit" class="col-sm-2 col-form-label">Activity Request Description</label>
                                      <div class="col-sm-10">
                                        <textarea class="form-control" name="post" id="inputExperienceEdit" placeholder="Add post"></textarea>
                                      </div>
                                    </div>

                                    <div class="form-group row">
                                    <label for="myFile" class="col-sm-2 col-form-label">File</label>
                                      <div class="col-sm-10">
                                        <ul>
                                          <li id="showFile"></li>
                                        </ul>
                                        <input type="file" name="file" id="myFile">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                  </div>
                                </div>
                              </form>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div>
                          <!-- /. Modal for edit -->
                        @endforeach
                      @endforeach
                      
                      <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
                      <script>
                        function onClickModalRemark(request_id){
                  
                            axios.get('/showActivityRequest/' + request_id)
                            .then(function (response) {
                              console.log(response);
                              document.getElementById('inputExperienceEdit').value = response.data.post;
                              document.getElementById('showFile').innerHTML = response.data.file;
        
                              document.getElementById("myForm").action = "/editActivityRequest/"+request_id;
                            })
                            .catch(function (error) {
                              // handle error
                              console.log(error);
                            });
                        }
                        function onClickModalDelete(request_id){
                          if (confirm("Are you sure?")){
                            axios.get('/deleteActivityRequest/' + request_id)
                            .then(function (response) {
                              console.log(response);
                            })
                            .catch(function (error) {
                              // handle error
                              console.log(error);
                            });
                          }
                        }
                      </script>
                    </div>
                  
                  <!-- /.tab-pane -->
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="status">
                    <div class="timeline">
                      @foreach ($sessions as $session) 
                        @foreach ($session as $item) 
                        <!-- Post -->
                        <?php
                            $dt = strtotime($item->record->Rec_dateCreated);
                            $recordNow = date("l, M d, Y", $dt);
                            $dayAbbrv = date("D", $dt);

                            $dt2 = strtotime($item->notified_at);
                            $recordNotify = date("g:i:sa", $dt2);
                          ?>
                    
                        <div class="time-label">
                          <span class="bg-red">{{$recordNow}}</span>
                        </div>
                        <div>
                          <i class="fas fa-check-circle bg-pink"></i>
                          <div class="post clearfix timeline-item">
                          <div class="timeline-body">
                            <div class="user-block">
                              <img class="img-circle img-bordered-sm" src="/AdminLTE-master/dist/img/avatar5.png" alt="user image">
                                <span class="username">
                                  <p class="text-primary"><strong>Maam Darlyn</strong></p>
                                  <!-- <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a> -->
                                </span>

                                <?php
                                  $dt = strtotime($item->subject->Subj_timein);
                                  $dt2 = strtotime($item->subject->Subj_timeout);
                                  $record1 = date("g:i:sa", $dt);
                                  $record2 = date("g:i:sa", $dt2);
                                ?>
                                  
                                @if ($item->Ses_status == 1)
                                <span class="description">You are marked present! - {{ $recordNow }} - @<kbd><strong>{{ $recordNotify }}</strong></kbd><br>
                                  Subject: <strong>{{ $item->subject->Subj_desc }}</strong>, <br>
                                  Room: <strong>{{ $item->subject->Subj_room }}</strong>, <br>
                                  Section: <strong>{{ $item->subject->Subj_yr_sec }}</strong>, <br>
                                  Schedule: <strong>{{ $record1 }} - {{ $record2 }}</strong> <br>
                                </span>
                                @endif

                                @if ($item->Ses_status == 2)
                                <span class="description">You are marked absent! - {{ $recordNow }} - @<kbd><strong>{{ $recordNotify }}</strong></kbd> <br>
                                  Subject: <strong>{{ $item->subject->Subj_desc }}</strong>, <br>
                                  Room: <strong>{{ $item->subject->Subj_room }}</strong>, <br>
                                  Section: <strong>{{ $item->subject->Subj_yr_sec }}</strong>, <br>
                                  Schedule: <strong>{{ $record1 }} - {{ $record2 }}</strong> <br>
                                  
                                </span>
                                @endif

                                @if ($item->Ses_status == 3)
                                <span class="description"><kbd>You are marked late! - {{ $recordNow }} - @<kbd><strong>{{ $recordNotify }}</strong></kbd><br>
                                  Subject: <strong>{{ $item->subject->Subj_desc }}</strong>, <br>
                                  Room: <strong>{{ $item->subject->Subj_room }}</strong>, <br>
                                  Section: <strong>{{ $item->subject->Subj_yr_sec }}</strong>, <br>
                                  Schedule: <strong>{{ $record1 }} - {{ $record2 }}</strong> <br>
                                </span>
                                @endif
                                
                              </div>
                              <!-- /.user-block -->
                              <p>
                                @if ($item->Ses_status != 1 && $item->Ses_remarks == null)
                                <kbd><strong>Reason</strong></kbd><br>
                                  <p>No Reason</p>
                                @endif
                              {{ $item->Ses_remarks }}
                              </p>
                              @if ($item->Ses_status != 1)
                              <form action="{{ url('/sessionUpdateRemarksByUser/'.$item->id) }}" class="form-horizontal" method="post">
                              @csrf
                                <div class="input-group input-group-sm mb-0">
                                  <input class="form-control form-control-sm" name="Ses_remarks" placeholder="Edit Reason">
                                  <div class="input-group-append">
                                    <button type="submit" class="btn btn-danger">Send</button>
                                  </div>
                                </div>
                              </form>
                              @endif
                            </div>
                          </div>
                        </div>
                        <!-- /.post -->
                        @endforeach
                      @endforeach
                      <div>
                          <i class="fas fa-clock bg-gray"></i>
                        </div>
                  </div>
                  </div>

                  <div class="tab-pane" id="settings">
                    <form action="{{ url('/storeRequest/'. Auth()->user()->username ) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    {{ csrf_field() }}

                        <div class="form-group row">
                          <label for="inputExperience" class="col-sm-2 col-form-label">Select Subject</label>
                          <div class="col-sm-10">
                            <!-- <textarea class="form-control" name="post" id="inputExperience" placeholder="Add post"></textarea> -->
                            <select class="form-control" name="selectedSubject">
                              @foreach ($subjects as $subject)
                              <option value="{{ $subject->id }}">{{ $subject->Subj_desc }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputExperience" class="col-sm-2 col-form-label">Add Activity Request Description</label>
                          <div class="col-sm-10">
                            <textarea class="form-control" name="post" id="inputExperience" placeholder="Add post"></textarea>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="myFile" class="col-sm-2 col-form-label">Add File</label>
                          <div class="col-sm-10">
                            <input type="file" name="file" id="myFile">
                          </div>
                        </div>
                        <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include("footer")

  <!-- Modals -->
  <div class="modal fade" id="modal-view-table">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form action="">
          <div class="modal-header">
            <h4 class="modal-title text-justify">Subjects</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table table-responsive">
              <thead class="thead-light">
              <tr>
                  <th scope="col">Professor ID</th>
                  <th scope="col">Title</th>
                  <th scope="col">Day</th>
                  <th scope="col">Time-in</th>
                  <th scope="col">Time-out</th>
                  <th scope="col">Description</th>
                  <th scope="col">Units</th>
                  <th scope="col">Room</th>
                  <th scope="col">Year & Section</th>
                  <th scope="col">Professor Code</th>
              </tr>
              </thead>
              <tbody>
              @foreach($subjects as $subject)
                  <tr>
                      <td>{{ $subject->prof_id }}</td>
                      <td>{{ $subject->Subj_title }}</td>
                      <td>
                      @if($subject->Subj_dayM == 1 )
                    
                      <kbd><strong>Mon</strong></kbd>,  
                
                  @endif

                  @if($subject->Subj_dayT == 1 )   
                  
                      <kbd><strong>Tue</strong></kbd>,  
                
                  @endif

                  @if($subject->Subj_dayW == 1 ) 
                  
                      <kbd><strong>Wed</strong></kbd>,  
              
                  @endif

                  @if($subject->Subj_dayTH == 1 ) 
            
                      <kbd><strong>Thu</strong></kbd>,  
                
                  @endif

                  @if($subject->Subj_dayF == 1 ) 
          
                      <kbd><strong>Fri</strong></kbd>,  
              
                  @endif

                  @if($subject->Subj_dayS == 1 ) 
              
                      <kbd><strong>Sat</strong></kbd>,  
        
                  @endif

                  @if($subject->Subj_daySu == 1 ) 
              
                      <kbd><strong>Sun</strong></kbd>. 
              
                  @endif
                      </td>
                      <td>{{ $subject->Subj_timein }}</td>
                      <td>{{ $subject->Subj_timeout }}</td>
                      <td>{{ $subject->Subj_desc }}</td>
                      <td>{{ $subject->Subj_units }}</td>
                      <td>{{ $subject->Subj_room }}</td>
                      <td>{{ $subject->Subj_yr_sec }}</td>
                      <td>{{ $subject->Prof_code }}</td>
                  </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
          </div>
        </form>
      </div>
    </div>
  </div>
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
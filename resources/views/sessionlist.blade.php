  
<!-- Main content -->
<section class="content">
  

<!-- Default box -->
<div class="card card-solid">

  
  <div class="card-body pb-0" >
    <p class="text-danger"><strong>Please reload the page for updates</strong></p>  
    <h5><blockquote><?= $day ?> Schedules</blockquote></h5>
    
    <div class="row d-flex align-items-stretch">
      @foreach($sessions as $session)
      <div class="col-12 col-sm-6 col-md-4  flex-row align-items-stretch">
        <div class="card bg-light">
          <div class="card-header  border-bottom-0">
          </div>
          <div class="card-body pt-0" style="padding: 5px !important;">
            <div class="row">
              <div class="col-5 text-right">
                <p class=" text-active"><b>Room: </b> {{ucfirst($session->subject->Subj_room)}} </p>
                <p class=" text-active"><b>Section: </b> {{ucfirst($session->subject->Subj_yr_sec)}} </p>
                <p class="text-active "><b>Subject: </b> {{ucfirst($session->subject->Subj_desc)}} </p>
                <p class="text-active "><b>Schedule: </b> <br>

                
               
                @if($session->subject->Subj_dayM == 1 )
                  @if($day == "Monday" )
                    <kbd><strong>Mon</strong></kbd>,  
                  @else 
                    Mon,
                  @endif
                @endif

                @if($session->subject->Subj_dayT == 1 )   
                  @if($day == "Tuesday" )
                    <kbd><strong>Tue</strong></kbd>,  
                  @else 
                    Tue,
                  @endif
                @endif

                @if($session->subject->Subj_dayW == 1 ) 
                  @if($day == "Wednesday" )
                    <kbd><strong>Wed</strong></kbd>,  
                  @else 
                    Wed,
                  @endif
                @endif

                @if($session->subject->Subj_dayTH == 1 ) 
                  @if($day == "Thursday" )
                    <kbd><strong>Thu</strong></kbd>,  
                  @else 
                    Thu,
                  @endif
                @endif

                @if($session->subject->Subj_dayF == 1 ) 
                  @if($day == "Friday" )
                    <kbd><strong>Fri</strong></kbd>,  
                  @else 
                    Fri,
                  @endif
                @endif

                @if($session->subject->Subj_dayS == 1 ) 
                  @if($day == "Saturday" )
                    <kbd><strong>Sat</strong></kbd>,  
                  @else 
                  Sat,
                  @endif
                @endif

                @if($session->subject->Subj_daySu == 1 ) 
                  @if($day == "Sunday" )
                    <kbd><strong>Sun</strong></kbd>,  
                  @else 
                  Sun.
                  @endif
                @endif

                </p>
              </div>
              <div class="col-7 text-center">
                @if($session->subject->professor->Prof_gender == 'm')
                  <a href="" data-toggle="modal" data-target="#modal-user" onclick="onClickUserView('{{$session->subject->professor->user->id}}')" data-placement="top" title="View Profile"><img src="/AdminLTE-master/dist/img/user.png" alt="" width="120px;" class="img-circle img-fluid"></a>
                  @if (count($session->subject->activity_requests) != 0)
                    <span class="badge badge-warning navbar-badge ">{{count($session->subject->activity_requests)}}</span>
                  @endif
                  <i data-toggle="modal" data-target="#modal-user" class="far fa-bell pull-right" data-placement="top" title="New Notification!" style="cursor: pointer;"></i>
                @endif

                @if($session->subject->professor->Prof_gender == 'f')
                  <a href="" data-toggle="modal" data-target="#modal-user" data-placement="top" title="View Profile"><img src="/AdminLTE-master/dist/img/user1.png" alt="" width="120px;" class="img-circle img-fluid"></a>
                  @if (count($session->subject->activity_requests) != 0)
                    <span class="badge badge-warning navbar-badge ">{{count($session->subject->activity_requests)}}</span>
                  @endif
                  <i data-toggle="modal" data-target="#modal-user" class="far fa-bell pull-right" data-placement="top" title="New Notification!" style="cursor: pointer;"></i>
                @endif
                
                <h2 class="lead"><b>{{ucfirst($session->subject->professor->Prof_fname)}} {{ucfirst($session->subject->professor->Prof_lname)}}</b></h2>
                <blockquote class="md-12">
                <ul class="ml-4 mb-0 fa-ul text-left">
                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-clock"></i></span> <b>Timein:</b><br> {{ucfirst($session->subject->Subj_timein)}}</li>
                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-clock"></i></span> <b>Timeout:</b><br> {{ucfirst($session->subject->Subj_timeout)}}</li>
                </ul>
                </blockquote>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="text-center">
            <div class="row">
           
                <div class="col-sm-12">
                    <!-- radio -->
                    <div class="form-group clearfix">
                      <div class="icheck-success d-inline">
                        <input class="toastrDefaultSuccess" type="radio" id="{{$session->subject->professor->Prof_code}}{{$session->id}}1" onclick="if(confirm('Are you sure?')){ return onClick('{{$session->id}}', '1')} else { location.reload() }" name="radio_attendance{{$session->id}}" value="1" formaction="" @if($session->Ses_status == 1 ) checked @endif>
                        <label for="{{$session->subject->professor->Prof_code}}{{$session->id}}1">
                          Present
                        </label>
                      </div>
                      <div class="icheck-danger d-inline">
                        <input class="swalDefaultError" type="radio" id="{{$session->subject->professor->Prof_code}}{{$session->id}}2" onclick="if(confirm('Are you sure?')){ return onClick('{{$session->id}}', '2')} else { location.reload() }" name="radio_attendance{{$session->id}}" name="radio_attendance{{$session->id}}" value="2" @if($session->Ses_status == 2 ) checked @endif>
                        <label for="{{$session->subject->professor->Prof_code}}{{$session->id}}2">
                          Absent
                        </label>
                      </div>
                      <div class="icheck-warning d-inline">
                        <input class="swalDefaultWarning" type="radio" id="{{$session->subject->professor->Prof_code}}{{$session->id}}3" onclick="if(confirm('Are you sure?')){ return onClick('{{$session->id}}', '3')} else { location.reload() }" name="radio_attendance{{$session->id}}" name="radio_attendance{{$session->id}}" value="3" @if($session->Ses_status == 3 ) checked @endif>
                        <label for="{{$session->subject->professor->Prof_code}}{{$session->id}}3">
                          Late
                        </label>
                      </div>

                      <div class="icheck-warning">
                        <button type="button" onclick="onClickModalRemark('{{$session->id}}')" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
                          Remarks
                          <i class="far fa-comments"></i>
                          @if($session->Ses_remarks)
                          <span class="badge badge-danger navbar-badge">!</span>
                          @endif
                        </button>
                      </div>
                    </div>
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  <!-- /.card-body -->

   <!-- Modals -->
      <!-- Remarks -->
      <div class="modal" id="modal-info">
        <div class="modal-dialog">
          <div class="modal-content bg-info">
            <div class="modal-header">
              <h4 class="modal-title">Remark Section</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <div class="form-group">
              <label>Add Remarks</label>
              <textarea class="form-control" rows="3" id="remark" placeholder="Enter Remarks"></textarea>
            </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-outline-light" onclick="onClickRemarks()">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.remarks -->

      <!-- Remarks -->
      <div class="modal" id="modal-user">
        <div class="modal-dialog-xl">
          <div class="modal-content bg-default">
            <div class="modal-header bg-info">
              <h4 class="modal-title ">User Profile Section</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <div class="form-group">
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

                            <h3 class="profile-username text-center" id="prof_name"></h3>

                            <p class="text-muted text-center">Professor</p>

                            <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-view-table"><b>View Table</b></button>
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <div class="card card-primary card-outline">
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
                                  <p class="no_class"></p>
                                  
                                  <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Subject Title</b><br>
                                          <kbd><strong id="subj_title"></strong></kbd>.
                                    </li>
                                    <li class="list-group-item">
                                      <b>Subject Description</b><br>
                                        <kbd><strong id="subj_desc"></strong></kbd>.
                                    </li>

                                    <li class="list-group-item">
                                      <b>Day Schedule(s)</b> 
                                        <br>
                                            <kbd><strong id="sub_mon"></strong></kbd>,  
                                            <kbd><strong id="sub_tue"></strong></kbd>,  
                                            <kbd><strong id="sub_wed"></strong></kbd>,  
                                            <kbd><strong id="sub_thu"></strong></kbd>,  
                                            <kbd><strong id="sub_fri"></strong></kbd>,  
                                            <kbd><strong id="sub_sat"></strong></kbd>,  
                                            <kbd><strong id="sub_sun"></strong></kbd>. 
                                    </li>

                                    <li class="list-group-item">
                                        <b>Time Schedule</b> 
                                          <br>
                                            <kbd><strong id="sub_timein"></strong></kbd> - 
                                          <kbd><strong id="sub_timeout"></strong></kbd>.
                                    </li>

                                    <li class="list-group-item">
                                      <b>Room</b>
                                      <br>
                                      <kbd><strong id="sub_room"></strong></kbd>.
                                    </li>
                                    <li class="list-group-item">
                                      <b>Units</b>
                                      <br>
                                      <kbd><strong id="sub_units"></strong></kbd>.
                                    </li>
                                    <li class="list-group-item">
                                      <b>Section</b>
                                      <br>
                                      <kbd><strong id="sub_yr_sec"></strong></kbd>.
                                    </li>
                                  </ul>
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
                      

                      
                      <!-- /.col -->
                      <div class="col-md-9">
                        <div class="card">
                          <div class="card-header p-2">
                            <ul class="nav nav-pills">
                              <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                              <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Create Activity Request</a></li>
                            </ul>
                          </div>

                          <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                  <!-- Post -->
                                  <div class="post">
                                    <div class="user-block">
                                      <img class="img-circle img-bordered-sm" src="/AdminLTE-master/dist/img/avatar5.png" alt="user image">
                                      <span class="username">
                                        <a href="" data-toggle="modal" data-target="#modal-default-edit" onClick="onClickModalRemark('')" id="prof_name1"></a>
                                        <!-- <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a> -->
                                      </span>
                                    </div>
                                  </div>
                                </div>
                            </div>
                          </div>
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

              <!-- Modals -->
              <div class="modal fade" id="modal-view-table">
              </div>
            </div>
            </div>
            <div class="modal-footer justify-content-between bg-info">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-default" onclick="onClickRemarks()">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.remarks -->
</div>
<!-- /.card -->

</section>
<!-- /.content -->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="{{asset('/AdminLTE-master/plugins/toastr/toastr.min.js')}}"></script>
<script>
  // const axios = require('axios').default;
  const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})
  var selectedSessionId = null;

  function onClickModalRemark(session_id){
    selectedSessionId = session_id;

    axios.get('/showSessionData/' + selectedSessionId)
    .then(function (response) {
      console.log(response);
      $('.modal-backdrop').remove();
      document.getElementById('remark').value = response.data.Ses_remarks;
    })
    .catch(function (error) {
      // handle error
      console.log(error);
    });
  }

  function onClickUserView(user_id){
    axios.get('/showUserData/' + user_id)
    .then(function (response) {
      // alert(user_id)
      // console.log(response);
      $('.modal-backdrop').remove();
      var subject_today = response.data[2];
      if (subject_today == null) {
        document.getElementById('no_class').innerHTML = "No class for today";
      }
      if (subject_today != null) {
        // Title
        document.getElementById('subj_title').innerHTML = subject_today.Subj_title;
        // Desc
        document.getElementById('subj_desc').innerHTML = subject_today.Subj_desc;

        // Day Sched
        // console.log(subject_today);
        if (subject_today.Subj_dayM == 1) {
          document.getElementById('sub_mon').innerHTML = "Mon";
        }
        if (subject_today.Subj_dayT == 1) {
          document.getElementById('sub_tue').innerHTML = "Tue";
        }
        if (subject_today.Subj_dayW == 1) {
          document.getElementById('sub_wed').innerHTML = "Wed";
        }
        if (subject_today.Subj_dayTH == 1) {
          document.getElementById('sub_thu').innerHTML = "Thu";
        }
        if (subject_today.Subj_dayF == 1) {
          document.getElementById('sub_fri').innerHTML = "Fri";
        }
        if (subject_today.Subj_dayS == 1) {
          document.getElementById('sub_sat').innerHTML = "Sat";
        }
        if (subject_today.Subj_daySu == 1) {
          document.getElementById('sub_sun').innerHTML = "Sun";
        }

        // Time Sched
        document.getElementById('sub_timein').innerHTML = subject_today.Subj_timein;
        document.getElementById('sub_timeout').innerHTML = subject_today.Subj_timeout;

        // Room
        document.getElementById('sub_room').innerHTML = subject_today.Subj_room;

        // Units
        document.getElementById('sub_units').innerHTML = subject_today.Subj_units;
        // Section
        document.getElementById('sub_yr_sec').innerHTML = subject_today.Subj_yr_sec;
      }
      console.log(subject_today)
      document.getElementById('prof_name1').innerHTML = response.data[0].name;
      document.getElementById('prof_name').innerHTML = response.data[0].name;
      console.log(response.data[0].name);
    })
    .catch(function (error) {
      // handle error
      console.log(error);
    });
  }

  function onClick(session_id, prof_status){
    // alert('Professor: ' + prof_code + ' is ' + prof_status)

    axios.post('/sessionUpdate/' + session_id, {
      Ses_status: prof_status
    })
    .then(function (response) {
      // handle success
      console.log(response);
      if(prof_status == 1){
        Toast.fire({
          icon: 'success',
          title: 'Present! updated successfully'
        })
      }
      if(prof_status == 2){
        Toast.fire({
          icon: 'error',
          title: 'Absent! updated successfully'
        })
      }
      if(prof_status == 3){
        Toast.fire({
          icon: 'warning',
          title: 'Late! updated successfully'
        })
      }
    })
    .catch(function (error) {
      // handle error
      console.log(error);
    })
    .then(function () {
      // always executed
    });
  }
  function onClickRemarks(){
    // alert('Professor: ' + prof_code + ' is ' + prof_status)
    $('.modal-backdrop').remove();
    var remark = document.getElementById('remark').value;
    axios.post('/sessionUpdateRemarks/' + selectedSessionId, {
      Ses_remarks: remark
    })
    .then(function (response) {
      // handle success
      console.log(response);
      $('#modal-info').modal('hide');
      $('.modal-backdrop').remove();
      document.getElementById('remark').value = "";
    })
    .catch(function (error) {
      // handle error
      console.log(error);
    });
  }


</script>
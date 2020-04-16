  
<!-- Main content -->
<section class="content">
  

<!-- Default box -->
<div class="card card-solid">

  
  <div class="card-body pb-0" >
    <p class="text-danger"><strong>Please reload the page for updates</strong></p>  
    <h5><blockquote><?= $day ?> Schedules</blockquote></h5>
    <a href="/showUserData/3"wa></a>
    
    
    <div class="row d-flex justify-content-center">
      @foreach($sessions as $session)
      <div class="col-12 col-sm-6 col-md-4" >
      
        <div id="myCard" class="card bg-white shadow mb-5 border ">
      
          <div class="card-header border-bottom-0">
          </div>
          <div class="card-body pt-0 align-self-stretch" style="padding: 5px !important;">
            <div class="row align-self-stretch">
              <div class="col-5 text-right" >
                <p class=" text-active" style="margin: 0;"><b>Room: </b> {{ucfirst($session->subject->Subj_room)}} </p>
                <p class=" text-active" style="margin: 0;"><b>Section: </b> {{ucfirst($session->subject->Subj_yr_sec)}} </p>
                <p class="text-active " style="margin: 0; "><b>Subject: </b> <p style="margin: 0; font-size: 12px; margin-bottom: -20px;">{{ucfirst($session->subject->Subj_desc)}} </p></p>
                <p class="text-active " style="margin: 0;"><b>Schedule: </b> <br>

                
               
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
                  <a href="" data-toggle="modal" data-target="#modal-user" onclick="onClickUserView( '{{$session->id}}')" data-placement="top" title="View Profile"><img src="/AdminLTE-master/dist/img/user.png" alt="" width="60px;" class="img-circle img-fluid"></a>
                  <?php
                    $count = 0;
                    foreach ($session->subject->activity_requests as $activity_request){
                      if ($activity_request->notified == 0) {
                        $count++;
                      }
                    }
                  ?>
                  @if ($count != 0)
                  <span class="badge badge-warning navbar-badge ">{{$count}}</span>
                  @endif
                  <i data-toggle="modal" data-target="#modal-user" onclick="onClickUserView( '{{$session->id}}')" class="far fa-bell pull-right" data-placement="top" title="New Notification!" style="cursor: pointer;"></i>
                @endif

                @if($session->subject->professor->Prof_gender == 'f')
                  <a href="" data-toggle="modal" data-target="#modal-user" onclick="onClickUserView( '{{$session->id}}')" data-placement="top" title="View Profile"><img src="/AdminLTE-master/dist/img/user1.png" alt="" width="60px;" class="img-circle img-fluid"></a>
                  <?php
                    $count = 0;
                    foreach ($session->subject->activity_requests as $activity_request){
                      if ($activity_request->notified == 0) {
                        $count++;
                      }
                    }
                  ?>
                  @if ($count != 0)
                  <span class="badge badge-warning navbar-badge ">{{$count}}</span>
                  @endif
                  <i data-toggle="modal" data-target="#modal-user" onclick="onClickUserView( '{{$session->id}}')" class="far fa-bell pull-right" data-placement="top" title="New Notification!" style="cursor: pointer;"></i>
                @endif
                
                <h2 class="lead"><b>{{ucfirst($session->subject->professor->Prof_fname)}} {{ucfirst($session->subject->professor->Prof_lname)}}</b></h2>
                <blockquote class="md-12" style="margin: 0;">
                <ul class="ml-4 mb-0 fa-ul text-left">
                      <li class="small"><span class="fa-li" style="margin: 0;"><i class="fas fa-lg fa-clock"></i></span> <b>Timein:</b><br> {{ucfirst($session->subject->Subj_timein)}}</li>
                      <li class="small"><span class="fa-li" style="margin: 0;"><i class="fas fa-lg fa-clock"></i></span> <b>Timeout:</b><br> {{ucfirst($session->subject->Subj_timeout)}}</li>
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
    <!-- User View -->
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
    <!-- /.user View -->

    <!-- Remarks -->
    <div class="modal" id="modal-user">
      <div class="modal-dialog-lg">
        <div class="modal-content bg-default">
          <div class="modal-header bg-info">
            <h4 class="modal-title ">User Profile Section</h4>
            <button type="button" class="close" data-dismiss="modal" onclick="onClickClearSession()" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <div class="form-group">
            <!-- Main content -->
              <section class="content">
                <div class="container">
                  <div class="row">
                    <div class="col-md-3">

                      <!-- Profile Image -->
                      <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                          <div class="text-center">
                          <img class="profile-user-img img-fluid img-circle"
                                src="/AdminLTE-master/dist/img/boxed-bg.png"
                                alt="User profile picture">
                          </div>

                          <h3 class="profile-username text-center" id="prof_name"></h3>

                          <p class="text-muted text-center">Professor</p>
                          
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
                                <div id="class_status"></div>
                                
                                
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
                            <li class="nav-item"><a class="nav-link active" onclick="onClickReShowActivityRequests()"  href="#activity" data-toggle="tab" >Activity Requests</a></li>
                            <li class="nav-item"><a class="nav-link" onclick="onClickReShowViewTable()" href="#view-table" data-toggle="tab" >View Table</a></li>
                          </ul>
                        </div>

                        <div class="card-body">
                          <div class="tab-content">
                            <div id="activity">
                            </div>

                            <div id="view-table">
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

            
          </div>
          </div>
          <div class="modal-footer justify-content-between bg-info">
            <button type="button" class="btn btn-default" onclick="onClickClearSession()" data-dismiss="modal">Close</button>
            <!-- <button type="button" class="btn btn-default" onclick="onClickRemarks()">Save changes</button> -->
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
  var actRequestStorage = null;
  var subjectsStorage = null;

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

  function onClickClearSession() {
    actRequestStorage = null;
    subjectsStorage = null;
  }
  function OnclickBlankActivity(id) {
    document.getElementById(id).innerHTML = "";
  }
  function onClickUserView(ses_id){
    // user_id
    // alert( ses_id)
    axios.get('/showUserData/' + ses_id)
    .then(function (response) {
      
      // console.log(response);
      // $('.modal-backdrop').remove();
      var subject_today = response.data[2];
      var activity_requests = response.data[5];
      var subjects = response.data[3];
      var mon = "";
      var tue = "";
      var wed = "";
      var thu = "";
      var fri = "";
      var sat = "";
      var sun = "";

      document.getElementById('prof_name').innerHTML = response.data[0].name;
      // console.log(subject_today)

      // Day Sched
        // console.log(subject_today);
        if (subject_today.Subj_dayM == 1) {
          mon = "Mon";
        }
        if (subject_today.Subj_dayT == 1) {
          tue = "Tue";
        }
        if (subject_today.Subj_dayW == 1) {
          wed = "Wed";
        }
        if (subject_today.Subj_dayTH == 1) {
          thu = "Thu";
        }
        if (subject_today.Subj_dayF == 1) {
          fri = "Fri";
        }
        if (subject_today.Subj_dayS == 1) {
          sat = "Sat";
        }
        if (subject_today.Subj_daySu == 1) {
          sun = "Sun";
        }
      if (subject_today === null) {
        document.getElementById('class_status').innerHTML = "<p>No class for today</p>";
      }
      if (subject_today != null) {
        
        document.getElementById('class_status').innerHTML = 
        `
        <ul class="list-group list-group-unbordered mb-3">
          <li class="list-group-item">
              <b>Subject Title</b><br>
                <kbd><strong id="subj_title">`+ subject_today.Subj_title +`</strong></kbd>.
          </li>
          <li class="list-group-item">
            <b>Subject Description</b><br>
              <kbd><strong id="subj_desc">`+ subject_today.Subj_desc +`</strong></kbd>.
          </li>

          <li class="list-group-item">
            <b>Day Schedule(s)</b> 
              <br>
                  <kbd><strong id="sub_mon">`+ mon +`</strong></kbd>,  
                  <kbd><strong id="sub_tue">`+ tue +`</strong></kbd>,  
                  <kbd><strong id="sub_wed">`+ wed +`</strong></kbd>,  
                  <kbd><strong id="sub_thu">`+ thu +`</strong></kbd>,  
                  <kbd><strong id="sub_fri">`+ fri +`</strong></kbd>,  
                  <kbd><strong id="sub_sat">`+ sat +`</strong></kbd>,  
                  <kbd><strong id="sub_sun">`+ sun +`</strong></kbd>. 
          </li>

          <li class="list-group-item">
              <b>Time Schedule</b> 
                <br>
                  <kbd><strong id="sub_timein">`+ subject_today.Subj_timein +`</strong></kbd> - 
                <kbd><strong id="sub_timeout">`+ subject_today.Subj_timeout +`</strong></kbd>.
          </li>

          <li class="list-group-item">
            <b>Room</b>
            <br>
            <kbd><strong id="sub_room">`+ subject_today.Subj_room +`</strong></kbd>.
          </li>
          <li class="list-group-item">
            <b>Units</b>
            <br>
            <kbd><strong id="sub_units">`+ subject_today.Subj_units +`</strong></kbd>.
          </li>
          <li class="list-group-item">
            <b>Section</b>
            <br>
            <kbd><strong id="sub_yr_sec">`+ subject_today.Subj_yr_sec +`</strong></kbd>.
          </li>
        </ul>
                                `
        // Show Table
        onClickShowViewTable(ses_id)

        // Show Requests
        onClickShowActivityRequests(ses_id);
        
      }
      // console.log(activity_requests[0])
      console.log(activity_requests)
      var activity_request = activity_requests[0];
      
      document.getElementById('prof_name1').innerHTML = response.data[0].name;
      document.getElementById('prof_name').innerHTML = response.data[0].name;
      console.log(response.data[0].name);


    })
    .catch(function (error) {
      // handle error
      console.log(error);
    });
  }

  function onClickShowActivityRequests(ses_id) {
    axios.get('/showUserData/' + ses_id)
    .then(function (response) {
      var subject_today = response.data[2];
      var activity_requests = response.data[5];
      var activity_request = activity_requests[0];

      // Clear
      OnclickBlankActivity('view-table')
      OnclickBlankActivity('activity')
      
      for (var i = 1; i < activity_requests.length; i++) {
        if (activity_requests[i].length === 0) {
          continue;
        }
        actRequestStorage = document.getElementById('activity').innerHTML += 
        `
        <div class="active tab-pane" >
          <div class="timeline">
            <!-- Post -->
            <div class="time-label">
              <span class="bg-red">`+ activity_requests[i][0] +`</span>
            </div>
            <div>
              <i class="fas fa-envelope bg-blue"></i>
              <div  class="post timeline-item">
                <div class="timeline-body">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="/AdminLTE-master/dist/img/user1.png" alt="user image">
                    <span class="username">
                      <a href="" data-toggle="modal" data-target="#modal-default-edit">`+ response.data[0].name +`</a> 
                    </span>
                    
                    <span class="description">Created Activity Request! - `+ activity_requests[i][0] +`@<kbd><strong>`+ activity_requests[i][1] +`</strong></kbd><br>
                      Subject: <strong>`+ activity_requests[i][2] +`</strong>, <br>
                      Room: <strong>`+ activity_requests[i][3] +`</strong>, <br>
                      Section: <strong>`+ activity_requests[i][4] +`</strong>, <br>
                    
                      Schedule: <strong> `+ activity_requests[i][5] +` - `+ activity_requests[i][6] +`</strong> <br>
                    </span>
                  </div>

                  <p>
                    <strong class="text-primary">Activity Request Description</strong><br>
                    `+ activity_requests[i][7] +`.

                    <br>
                    <strong class="text-primary">File</strong><br>
                    <a href="{{ asset('user-files/`+activity_requests[i][8]+`') }}">`+ activity_requests[i][8] +`</a>
                  </p>

                  <p id="mark">
                    <a href="#" class="link-black text-sm" onclick="onClickMarkAsRead(`+ activity_requests[i][10] +`)"><i class="far fa-check-square"></i> Mark as Read</a>
                  </p>
                  </div>
                </div>
              <!-- ./post -->
            </div>
          </div>
        </div>
        
        
      `
      }
      
    })
    .catch(function (error) {
      // handle error
      console.log(error);
    });
    
  }

  function onClickShowViewTable(ses_id){
    OnclickBlankActivity('activity')
    axios.get('/showUserData/' + ses_id)
    .then(function (response) {
      // Clear
      OnclickBlankActivity('view-table')
      OnclickBlankActivity('activity') 
      var subjects = response.data[3];
      console.log(subjectsStorage)
      var res = ""

      for (var i = 0; i < subjects.length; i++) {
        var subDay = "";

        if (subjects[i].Subj_dayM === 1) {
          subDay+="<kbd><strong>Mon</strong></kbd>,"
        }
        if (subjects[i].Subj_dayT === 1) {
          subDay+="<kbd><strong>Tue</strong></kbd>,"
        }
        if (subjects[i].Subj_dayW === 1) {
          subDay+="<kbd><strong>Wed</strong></kbd>,"
        }
        if (subjects[i].Subj_dayTH === 1) {
          subDay+="<kbd><strong>Thu</strong></kbd>,"
        }
        if (subjects[i].Subj_dayF === 1) {
          subDay+="<kbd><strong>Fri</strong></kbd>,"
        }
        if (subjects[i].Subj_dayS === 1) {
          subDay+="<kbd><strong>Sat</strong></kbd>,"
        }
        if (subjects[i].Subj_daysSu === 1) {
          subDay+="<kbd><strong>Sun</strong></kbd>."
        }

        res += `
            <tr>
              <td>`+ subjects[i].prof_id +`</td>
              <td>`+ subjects[i].Subj_title +`</td>
              <td>`+ subDay +`</td>
              <td>`+ subjects[i].Subj_timein +`</td>
              <td>`+ subjects[i].Subj_timeout +`</td>
              <td>`+ subjects[i].Subj_desc +`</td>
              <td>`+ subjects[i].Subj_units +`</td>
              <td>`+ subjects[i].Subj_room +`</td>
              <td>`+ subjects[i].Subj_yr_sec +`</td>
              <td>`+ subjects[i].Prof_code +`</td>
            </tr>
        `
      }
      var content = `
      <div class="active tab-pane" >
        <div  class="post">
          <h4 class="modal-title text-justify">Subjects</h4>
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
            `+res+`
            </tbody>
          </table>
        </div>    
      </div>
      `;
      
      subjectsStorage = document.getElementById('view-table').innerHTML = content;
      
    })
    .catch(function (error) {
      // handle error
      console.log(error);
    });
    
  }

  function onClickReShowActivityRequests() {
    OnclickBlankActivity('view-table')
    // console.log(actRequestStorage)
    document.getElementById('activity').innerHTML = actRequestStorage;
  }

  function onClickReShowViewTable() {
    OnclickBlankActivity('activity')
    // console.log(subjectsStorage)
    document.getElementById('view-table').innerHTML = subjectsStorage;
    
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

  function onClickMarkAsRead(act_req_id){
    // alert(act_req_id)
    // var remark = document.getElementById('remark').value;
    axios.post('/markActivityRequest/' + act_req_id)
    .then(function (response) {
      // handle success
      console.log(response);
    })
    .catch(function (error) {
      // handle error
      console.log(error);
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
  
<!-- Main content -->
<section class="content">
  

<!-- Default box -->
<div class="card card-solid">

  
  <div class="card-body pb-0" >
    <h5><blockquote><?= $day ?> Schedules</blockquote></h5>
    <div class="row d-flex align-items-stretch">
      @foreach($sessions as $session)
      
      <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch">
        <div class="card bg-light">
          <div class="card-header  border-bottom-0">
          </div>
          <div class="card-body pt-0" style="padding: 5px !important;">
            <div class="row">
              <div class="col-5 text-right">
                <p class=" text-active"><b>Room: </b> {{ucfirst($session->subject->Subj_room)}} </p>
                <p class=" text-active"><b>Section: </b> {{ucfirst($session->subject->Subj_yr_sec)}} </p>
                <p class="text-active "><b>Subject: </b> {{ucfirst($session->subject->Subj_desc)}} </p>
                <p class="text-active "><b>Schedule: </b> Web Designer </p>
              </div>
              <div class="col-7 text-center">
                <img src="/AdminLTE-master/dist/img/user.png" alt="" width="120px;" class="img-circle img-fluid">
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
                        <input class="toastrDefaultSuccess" type="radio" id="{{$session->subject->professor->Prof_code}}{{$session->id}}1" onclick="onClick('{{$session->id}}', '1')" name="radio_attendance{{$session->id}}" value="1" formaction="" @if($session->Ses_status == 1 ) checked @endif>
                        <label for="{{$session->subject->professor->Prof_code}}{{$session->id}}1">
                          Present
                        </label>
                      </div>
                      <div class="icheck-danger d-inline">
                        <input class="swalDefaultError" type="radio" id="{{$session->subject->professor->Prof_code}}{{$session->id}}2" onclick="onClick('{{$session->id}}' , '2')" name="radio_attendance{{$session->id}}" value="2" @if($session->Ses_status == 2 ) checked @endif>
                        <label for="{{$session->subject->professor->Prof_code}}{{$session->id}}2">
                          Absent
                        </label>
                      </div>
                      <div class="icheck-warning d-inline">
                        <input class="swalDefaultWarning" type="radio" id="{{$session->subject->professor->Prof_code}}{{$session->id}}3" onclick="onClick('{{$session->id}}' , '3')" name="radio_attendance{{$session->id}}" value="3" @if($session->Ses_status == 3 ) checked @endif>
                        <label for="{{$session->subject->professor->Prof_code}}{{$session->id}}3">
                          Late
                        </label>
                      </div>

                      <div  class="icheck-warning">
                        <button type="button" onclick="onClickModalRemark('{{$session->id}}')" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
                          Remarks
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
      <!-- Present -->

      <!-- Absent -->

      <!-- Late -->
    </div>
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
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
  </div>
  <!-- /.card-footer -->
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
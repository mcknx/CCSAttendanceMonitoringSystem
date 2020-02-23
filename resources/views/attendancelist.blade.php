@foreach($attendances as $attendance)
      <!-- Default box -->
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  Teacher
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>{{ $attendance->Prof_fname }} {{ $attendance->Prof_mname }} {{ $attendance->Prof_lname }}</b></h2>
                      <p class="text-muted text-sm"><b>About: </b> (Subjects) </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <!-- <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li> -->
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="/AdminLTE-master/dist/img/AdminLTELogo.png" alt="" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <a href="{{ url('/edit/'.$attendance->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="{{ url('/edit/'.$attendance->id) }}" class="btn btn-sm bg-teal">
                    Present
                    </a>
                    <a href="#" class="btn btn-sm btn-warning">
                      Absent
                    </a>
                    <a href="#" class="btn btn-sm btn-danger">
                      Late
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        <!-- /.card-body -->

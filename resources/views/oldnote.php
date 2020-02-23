<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Attendance Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Attendance Management</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @if($layout == 'attendanceIndex')
    <div class="container-fluid mt-4">
        <div class="container-fluid mt-4">
            <div class="row justify-content-center">
                <section class="col-md-12">
                    @include("attendancelist")
                </section>
            </div>
        </div>
    </div>
@elseif($layout == 'attendanceCreate')
    <div class="container-fluid mt-4 " id="create-form">
        <div class="row">
            <section class="col-md-7">
                @include("attendancelist")
            </section>
            <section class="col-md-5">

                <div class="card mb-3">
                    <div class="card-body">
                        <blockquote class="card-title">Enter the informations of the new attendance</blockquote>
                        <br>
                        <form action="{{ url('/attendanceStore') }}" method="post">
                            @csrf
                            <br>
                            <br>
                            <div class="form-group">
                                <label>First Name</label>
                                <input name="Prof_fname" type="text" class="form-control"  placeholder="Enter First Name">
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input name="Prof_lname" type="text" class="form-control"  placeholder="Enter Last Name">
                            </div>

                            
                            <div class="form-group">
                                <label>Middle Name</label>
                                <input name="Prof_mname" type="text" class="form-control"  placeholder="Enter Middle Name">
                            </div>
                            
                            <!-- <div class="form-group">
                                <label>Subject(s)</label>
                                <input name="Subj_ID" type="text" class="form-control"  placeholder="Enter Subject ID">
                            </div> -->
                            
                            <input type="submit" class="btn btn-info" value="Save">
                            <input type="reset" class="btn btn-warning" value="Reset">
                        </form>
                    </div>
                </div>

            </section>
        </div>
    </div>
@elseif($layout == 'attendanceShow')
    <div class="container-fluid mt-4">
        <div class="row">
            <section class="col">
                @include("attendancelist")
            </section>
            <section class="col"></section>
        </div>
    </div>
@elseif($layout == 'attendanceEdit')
    <div class="container-fluid mt-4">
        <div class="row">
            <section class="col-md-7">
                @include("attendancelist")
            </section>
            <section class="col-md-5">

                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Update informations of attendance</h5>
                        <form action="{{ url('/attendanceUpdate/'.$attendance->id) }}" method="post">
                            @csrf
                            <br>
                            <div class="form-group">
                                <label>First Name</label>
                                <input value="{{ $attendance->Prof_fname }}" name="Prof_fname" type="text" class="form-control"  placeholder="Enter First Name">
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input value="{{ $attendance->Prof_lname }}" name="Prof_lname" type="text" class="form-control"  placeholder="Enter Last Name">
                            </div>

                            
                            <div class="form-group">
                                <label>Middle Name</label>
                                <input value="{{ $attendance->Prof_mname }}" name="Prof_mname" type="text" class="form-control"  placeholder="Enter Middle Name">
                            </div>
                            
                            <!-- <div class="form-group">
                                <label>Subject(s)</label>
                                <input value="{{ $attendance->Subj_ID }}" name="Subj_ID" type="text" class="form-control"  placeholder="Enter Subject ID">
                            </div> -->

                            <input type="submit" class="btn btn-info" value="Update">
                            <input type="reset" class="btn btn-warning" value="Reset">

                        </form>
                    </div>
                </div>

            </section>
        </div>
    </div>
@endif
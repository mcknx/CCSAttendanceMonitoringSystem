<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" data-toggle="push-menu" href="#"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{url('/userdashboard')}}" class="nav-link">Home</a>
    </li>
  </ul>
  
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
      <!-- <li class="nav-item dropdown"> -->
        <!-- <a class="nav-link" data-toggle="dropdown" href="#"> -->
          <!-- <i class="far fa-comments"></i> -->
          <!-- <img src="/AdminLTE-master/dist/img/asma.jpg" width="20%" class="img-circle elevation-2" alt="User Image"> -->
          <!-- <span class="text-danger"> -->
            <!-- </span> -->
        <!-- </a> -->
        <!-- <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!- Message Start -->
            <!-- <div class="media"> -->
              <!-- <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle"> -->
              <!-- <div class="media-body"> -->
                <!-- <h3 class="dropdown-item-title"> -->
                  <!-- <center>Settings</center> -->
                  <!-- <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span> -->
                <!-- </h3> -->
                <!-- <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p> -->
              <!-- </div> -->
            <!-- </div> -->
            <!-- Message End -->
          <!-- </a> -->
          <!-- <div class="dropdown-divider"></div> -->
          <!-- <a href="" class="dropdown-item dropdown-footer">Logout</a> -->
        <!-- </div> -->
      <!-- </li> -->
      <li>
        <!-- <a href="" data-toggle="modal" data-target="#modal-default" class="nav-item p-2"> -->
        <span class="p-2">
        Welcome! {{ ucfirst(Auth()->user()->name) }}
        </span>
      <!-- </a> -->
    </li>
      <!-- <li><a href="" data-toggle="modal" data-target="#modal-default" class="nav-item p-2">Settings</a></li> -->
      <li><a href="{{url('logout')}}" class="nav-item">Logout</a></li>
      
    </ul>
</nav>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{url('/changeCredentialUser/' .  Auth()->user()->id )}}">
          <div class="modal-header">
            <h4 class="modal-title">Change credentials</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- <p>One fine body&hellip;</p> -->
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
            {{ csrf_field() }}
            <div class="form-label-group has-feedback">
            <div class="card-body box-profile">
                <div class="text-center">
                <?php
                use App\Professor;
                $professor = Professor::where('user_id', '=', Auth()->user()->id)->first();
                $waw = $professor->Prof_gender;
                ?>
                @if (Auth()->user()->avatar)
                <img class="profile-user-img img-fluid img-circle"
                       src="{{ Auth()->user()->avatar }}"
                       alt="User profile picture">
                @endif

                @if (Auth()->user()->avatar == null)
                  @if ($waw == 'm')
                    <img class="profile-user-img img-fluid img-circle"
                        src="/AdminLTE-master/dist/img/user.png"
                        alt="User profile picture">
                  @endif
                  @if ($waw == 'f')
                    <img class="profile-user-img img-fluid img-circle"
                        src="/AdminLTE-master/dist/img/user1.png"
                        alt="User profile picture">
                  @endif
                @endif

                
                </div>

                <h3 class="profile-username text-center">{{ ucfirst(Auth()->user()->name) }}</h3>
                <p class="text-muted text-center">{{ Auth()->user()->email }}</p>
                <p class="text-muted text-center">Professor</p>
                
              </div>
              <hr>
              <div class="alert alert-warning">Note: Only change one credential at a time.</div>
            <center><a id="c_detail" class="btn btn-primary text-white">Change User Details <i class="fas fa-arrow-down"></i></a></center>
            <div id="show_c_detail">
              <label for="fname">Name:</label>
                <input name="fname" type="text" class="form-control" placeholder="Enter First Name"  autocomplete ="off">
              <label for="mname">Middle Name:</label>
                <input name="mname" type="text" class="form-control" placeholder="Enter Middle Name"  autocomplete ="off">
              <label for="lname">Last Name:</label>
                <input name="lname" type="text" class="form-control" placeholder="Enter Last Name"  autocomplete ="off">

              </div>
                <br>
              <center><a id="c_pass" class="btn btn-primary text-white">Change Password <i class="fas fa-arrow-down"></i></a></center>
              
              <div id="show_c_pass">
                <label for="inputPassword">Password</label>
                  <input id="password" type="password" name="password" id="inputPassword" class="form-control" placeholder="Enter Password" >
                <label for="confirmPassword">Confirm Password</label>
                  <input id="password-confirm" type="password" name="password_confirmation" id="confirmPassword" class="form-control" placeholder="Enter Confirm Password" >
              </div>
            </div>
            
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
  $("#show_c_pass").hide();
  $("#show_c_detail").hide();
  $(document).ready(function(){
    $("#c_pass").click(function(){
      $("#show_c_pass").toggle();
    });
  });
  $(document).ready(function(){
    $("#c_detail").click(function(){
      $("#show_c_detail").toggle();
    });
  });
</script>
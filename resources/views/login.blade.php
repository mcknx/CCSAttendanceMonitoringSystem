<!DOCTYPE html>
<html>
<head>
<title>Login College of Computer Science Faculty Attendance</title>
 
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!--Bootsrap 4 CDN-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{url('style.css')}}">
 
</head>
<body>
<div class="container-fluid">
  <div class="row no-gutter" style="border-left: 50px solid #007bff;">
    <div class="d-none d-md-flex col-md-4 col-lg-6" style="padding-top: 200px;"><img src="/AdminLTE-master/dist/img/ccs.jpg" width="500px" height="200px"  alt=""></div>
    <div class="col-md-8 col-lg-6" style="border-left: 30x solid #007bff;">
      <div class="login d-flex align-items-center py-5">
        <div class="container" style="border-top: 5px solid #007bff; border-bottom: 5px solid #007bff; padding: 100px 10px 100px 0; background: white;">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <center><h3 class="login-heading mb-4">College of Computer Science Faculty Attendance Login</h3></center>
               <form action="{{url('post-login')}}" method="POST" id="logForm">
 
                 {{ csrf_field() }}
 
                <div class="form-label-group">
                  <input type="username" name="username" id="inputEmail" class="form-control" placeholder="Username" autocomplete ="off" required>
                  <label for="inputEmail">Username</label>
 
                  @if ($errors->has('username'))
                  <span class="error">{{ $errors->first('username') }}</span>
                  @endif    

                </div> 
 
                <div class="form-label-group">
                  <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                  <label for="inputPassword">Password</label>
                   
                  @if ($errors->has('password'))
                  <span class="error">{{ $errors->first('password') }}</span>
                  @endif  
                </div>
 
                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Sign In</button>
                <!-- <div class="text-center">Don't have an account?
                  <a class="small" href="{{url('registration')}}">Sign Up</a></div> -->
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
 
</body>
</html>
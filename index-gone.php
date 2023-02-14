<style type="text/css">
@media(max-width: 600px){
 #left-content{
  display: none;
 }
 #header{
  display: none;
 } 
 #top-ribbon{
  display: none;
 }

}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
<link rel="stylesheet" href="applicant-dashboard/bs4/css/bootstrap.min.css">
<link rel="stylesheet" href="applicant-dashboard/fa/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="applicant-dashboard/bs4/js/jquery-3.3.1.js"></script>
  <script src="applicant-dashboard/jquery/cdnjs/jquery.min.js"></script>
  <script src="applicant-dashboard/bs4/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="applicant-dashboard/bs4/css/bootstrap-theme.min.css">
  <script src="applicant-dashboard/bs4/js/bootstrapValidator.min.js"></script>
  <link rel="stylesheet" type="text/css" href="applicant-dashboard/css/style.css" />
  <link rel="stylesheet" type="text/css" href="applicant-dashboard/css/slide.css" />
  
  
	<title>Application | SISTER LEONELLA CONSOLATA MEDICAL COLLEGE</title>
	<link rel="icon" href="applicant-dashboard/images/logo1.png">
</head>

<body>
<div class="container-fluid">
<div class="row" id="header">
<div class="col-sm-2">
	<img src="applicant-dashboard/images/logo1.png" style="height:80px;">
</div>	
<div class="col-sm-10">
<h3><b>SISTER LEONELLA CONSOLATA MEDICAL COLLEGE</b></h3>
<h5>Online Courses Application</h5>
	
</div>

</div>
	
</div>
<div class="container-fluid">
<div class="row" id="top-ribbon">
	
</div>
</div>
<div class="container-fluid">
<div class="row" id="middle-content">
<div class="col-sm-8">
<div id="left-content">
<img src="applicant-dashboard/images/app-banner3.png" style="height:504px;margin-left:-15px;">
</div>
</div>
<div class="col-sm-4">

<form id="login-form" class="form-login" name="login" method="post">

                    <h2 class="form-login-heading"><img src="applicant-dashboard/images/logo1.png" style="height:100px;"><br><br><b>Applicant Login</b></h2>
                       <div id="notify">
                     
                      </div>

                    <div class="login-wrap">
                        <input type="email" class="form-control" name="email" placeholder="Enter Email" autofocus>
                        <br>
                        <input type="password" class="form-control" name="password" required placeholder="Password">
                        <hr>
                        <button class="btn btn-theme btn-block" name="submit" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
                         <hr>
                         
                        Don't have account? <a href="./registration"> Create account</a>
                        <br>
                        <label class="checkboxx">
                            <span class="pull-left">
                                <a data-toggle="modal" href=""> Forgot Password?</a>

                            </span>
                        </label>
                        <br>
                       
                </form>

</div>
</div>
</div>
<div class="container-fluid">
<div class="row" id="footer-content">
<br>
 &copy; Sister Leonella Consolata Medical College 2022. All rights reserved

</div>
	
</div>
</body>
</html>
<script type="text/javascript">
     $(document).ready(function(){
      $('#login-form').submit(function(e){
        e.preventDefault();
        attemptLogin();
      });
     });

     function attemptLogin(){
          var username = $('#login-form input:eq(0)').val();
          var password = $('#login-form input:eq(1)').val();

          var json = JSON.stringify([username,password]);
          $('#login-form button').html('<i class="fa fa-pulse fa-refresh"></i> Signing in');
          $.post('applicant-dashboard/core/core.php',
          {
            data:json
          },function(data,status){
             $('#login-form button').html('<i class="fa fa-lock"></i> Sign in ');
             if(data ==='success'){
              $('#login-form button').html('<i class="fa fa-pulse fa-refresh"></i> Redirecting ');
              document.location.href='./applicant-dashboard';
             }
             if (data === 'wrong')
             {
                document.getElementById("notify").innerHTML="<h6 class='alert alert-danger'>Invaid Email/Password</h6>";
             }
             if (data === 'empty') {
               document.getElementById("notify").innerHTML="<h6 class='alert alert-danger'>Ooops! email "+username+" is not registered. \nPlease check whether it is your correct email.\n If its correct, create an account then login. \nThanks</h6>";
              
             }
          }
          );

        }
   </script>
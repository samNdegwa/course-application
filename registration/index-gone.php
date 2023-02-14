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
<?php include '../applicant-dashboard/core/init.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
<link rel="stylesheet" href="../applicant-dashboard/bs4/css/bootstrap.min.css">
<link rel="stylesheet" href="../applicant-dashboard/fa/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="../applicant-dashboard/bs4/js/jquery-3.3.1.js"></script>
  <script src="../applicant-dashboard/jquery/cdnjs/jquery.min.js"></script>
  <script src="../applicant-dashboard/bs4/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="../applicant-dashboard/bs4/css/bootstrap-theme.min.css">
  <script src="../applicant-dashboard/bs4/js/bootstrapValidator.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../applicant-dashboard/css/style.css" />
  <link rel="stylesheet" type="text/css" href="../applicant-dashboard/css/slide.css" />
	<title>Application Account | SISTER LEONELLA CONSOLATA MEDICAL COLLEGE</title>
	<link rel="icon" href="../applicant-dashboard/images/logo1.png">
</head>

<body style="background:white;">
<div class="container-fluid">
<div class="row" id="header">
<div class="col-sm-0">
	
</div>	
<div class="col-sm-1">
<img src="../applicant-dashboard/images/logo1.png" class="img-rounded" style="height:70px;">
</div>
<div class="col-sm-11">
<h3><b>Sister Leonella Consolata Medical College</b></h3>
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
<img src="../applicant-dashboard/images/app-banner3.png" style="height:552px;margin-left:-15px;">
</div>
</div>
<div class="col-sm-4">

<form id="account-form" class="form-login" name="login" method="post" action="">

                    <h2 class="form-login-heading"><span class="fa fa-pencil-square"></span> Creat Account Here</h2>
                      <div id="notify">
                     
                      </div>
                    <div class="login-wrap">
                    Enter Phone Number
                        <input type="text" class="form-control" name="phone" placeholder="Enter Phone" autofocus>
                    Enter Personal Email
                        <input type="email" class="form-control" name="email1" placeholder="Enter Email" autofocus>
                    Re_enter Personal Email
                        <input type="email" class="form-control" name="email2" placeholder="Re_enter Email" autofocus>
                    Enter Password
                        <input type="password" class="form-control" name="pass1" required placeholder="Password">
                    Re_enter Password
                        <input type="password" class="form-control" name="pass2" required placeholder="Password">    
                        <hr>
                        
                        <button class="btn btn-theme btn-block" id="submit-registration"> <span class="fa fa-user"></span> Create Account</button>
                        
                         <hr>
                       
                        I have account? <a href="../"> Login</a>
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
      $('#account-form').submit(function(e){
        e.preventDefault();
        attemptLogin();
      });
     });

     function attemptLogin(){
          var phone = $('#account-form input:eq(0)').val();
          var email1 = $('#account-form input:eq(1)').val();
          var email2 = $('#account-form input:eq(2)').val();
          var pass1 = $('#account-form input:eq(3)').val();
          var pass2 = $('#account-form input:eq(4)').val();
          
          var json = JSON.stringify([phone,email1,email2,pass1,pass2]);
          $('#account-form button').html('<i class="fa fa-pulse fa-refresh"></i> Creating Account...');
          $.post('../applicant-dashboard/includes/create-account.php',
          {
            data:json
          },function(data,status){
            
             if(data ==='success'){
              $('#account-form button').html('<i class="fa fa-pulse fa-refresh"></i> Redirecting... ');
              alert("Congratulation! You have successifully created an account. Use your email and password you have created to login and apply course of your choice. \nThanks");
              document.location.href='../';
             }
             if (data === 'error')
             {
                 document.getElementById("notify").innerHTML="<h6 class='alert alert-danger'>Ooops! Unable to create account.\nTry again</h6>";
                 $('#account-form button').html('<i class="fa fa-user"></i> Creating Account');
             }
             if (data === 'account-exist') {
                document.getElementById("notify").innerHTML="<h6 class='alert alert-danger'>Ooops! Unable to create account. \nEmail "+email2+" is already registered. Please use another email</h6>";
                $('#account-form button').html('<i class="fa fa-user"></i> Creating Account');
             }
             if (data === 'passwords') {
               document.getElementById("notify").innerHTML="<h6 class='alert alert-danger'>Ooops! Passwords do not match.\nTry again</h6>";
              $('#account-form button').html('<i class="fa fa-user"></i> Creating Account');
             }
             if (data === 'emails') {
               document.getElementById("notify").innerHTML="<h6 class='alert alert-danger'>Ooops! Emails do not match.\nTry again</h6>";
              $('#account-form button').html('<i class="fa fa-user"></i> Creating Account');
             }
          }
          );

        }
   </script>
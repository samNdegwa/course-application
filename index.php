<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login | SLCMC</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
 <link rel="icon" href="applicant-dashboard/images/logo1.png">
</head>
<body>
  
  <div class="limiter">
    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
      <div class="wrap-login100 p-l-55 p-r-55 p-b-54">
        <form class="login100-form validate-form" id="login-form">
          <span class="login100-form-title">
            <img src="applicant-dashboard/images/logo1.png" style="height:100px;">
            
          </span>
           <h6 style="text-align:center;">Courses Application</h6><br>
           <div id="notify">
             
           </div>
          <div class="wrap-input100 validate-input m-b-23" data-validate = "Email is required">
            <span class="label-input100">Email</span>
            <input class="input100" type="text" name="email" placeholder="Type your email">
            <span class="focus-input100" data-symbol="&#xf206;"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Password is required">
            <span class="label-input100">Password</span>
            <input class="input100" type="password" name="password" placeholder="Type your password">
            <span class="focus-input100" data-symbol="&#xf190;"></span>
          </div>
          
          <div class="text-right p-t-8 p-b-31">
            <a href="registration/forgot-password.php">
              Forgot password?
            </a>
          </div>
          
          <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              <button class="login100-form-btn">
                Login
              </button>
            </div>
          </div>

          <div class="txt1 text-center p-t-20">
            <span>
              Don't have account? <a href="registration" style="color:blue">Register</a>
            </span>
          </div>

        </form>
        <br>
         <h6 style="text-align:center;"><span style="font-size:0.7em;">&copy; Sr Leonella Consolata Medical College 2023.</span></h6>
      </div>
    </div>
  </div>
  

  <div id="dropDownSelect1"></div>
  
<!--===============================================================================================-->
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="js/main.js"></script>

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
               document.getElementById("notify").innerHTML=" <h6 class='alert alert-danger'>Ooops! email "+username+" is not registered. Kindly create an account then login. Thanks</h6>";
              
             }
             if(data === 'inactive'){
              document.location.href='registration/account-activation.php?auth=authorization';
             }
          }
          );

        }
   </script>
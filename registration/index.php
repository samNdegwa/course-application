<style type="text/css">
@media(max-width: 600px){
 .image-holder{
  display: none;
 }
}
</style>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../applicant-dashboard/fa/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <title>Registration | SLCMC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../applicant-dashboard/images/logo1.png">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
    <div class="wrapper">
      <div class="inner">
        <div class="image-holder">
          <img src="images/medical.png" alt="">
        </div>
        <form id="account-form" style="margin-top:-50px;" action="" method="post">
          <h3><img src="../applicant-dashboard/images/logo1.png" class="img-rounded" style="height:70px;"><br>
          Create Account</h3>
          <div id="notify">
            
          </div>
          <div class="form-row">
            <input type="number" class="form-control" name="phone" placeholder="Enter phone number" required="">
            <input type="text" class="form-control" name="fname" placeholder="Enter First Name">
          </div>
          <div class="form-row">
            <input type="email" class="form-control" name="email1" placeholder="Enter Email" required="">
            <input type="email" class="form-control" name="email2" placeholder="Confirm Email" required="">
          </div>
           <div class="form-row">
            <input type="password" class="form-control" name="pass1" placeholder="Enter Password" required="">
            <input type="password" class="form-control" name="pass2" placeholder="Confirm Password" required="">
          </div>
          <button id="submit-registration" class="btn"><i class="fa fa-user-plus" aria-hidden="true"></i>  Create</button><br>
          Have account? <a href="../">Login</a>

          <br><br><br>
        <h6 style="bottom: 10px">&copy; Sister Leonella Consolata Medical College 2022. All rights reserved</h6>
        </form>
        
      </div>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/main.js"></script>
  </body><!-- This templates was made by Colorlib (https://colorlib.com) -->
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
          var namee = $('#account-form input:eq(1)').val();
          var email1 = $('#account-form input:eq(2)').val();
          var email2 = $('#account-form input:eq(3)').val();
          var pass1 = $('#account-form input:eq(4)').val();
          var pass2 = $('#account-form input:eq(5)').val();
          
          var json = JSON.stringify([phone,email1,email2,pass1,pass2]);

          $('#account-form button').html('<i class="fa fa-pulse fa-refresh"></i> Loading... ');
          $.post('../applicant-dashboard/includes/create-account.php',
          {
            data:json
          },function(data,status){
            
             if(data ==='success'){
              $('#account-form button').html('<i class="fa fa-pulse fa-refresh"></i> Loading... ');
              Toastify({ 
                    text: "Congratulation!\n You have successifully created an account. Use your email and password you have created to login and apply course of your choice. \nThanks",
                    duration: 6000,
                    className: "primary",
                   style: {
                       background: "linear-gradient(to right, #00b09b, #96c93d)",
                     }
                }).showToast();
              document.location.href='account-activation.php?auth=authorization';
             }
             if (data === 'error')
             {
              Toastify({ 
                    text: "Ooops! Unable to create account.\nTry again",
                    duration: 6000,
                    className: "primary",
                   style: {
                       background: "linear-gradient(to right, #E64134, #96c93d)",
                     }
                }).showToast();
                 $('#account-form button').html('<i class="fa fa-user-plus" aria-hidden="true"></i> Create');
             }
             if (data === 'account-exist') {
                 Toastify({ 
                    text: "Ooops! Unable to create account. \nEmail "+email2+" is already registered. Please use another email",
                    duration: 6000,
                    className: "primary",
                   style: {
                       background: "linear-gradient(to right, #E64134, #96c93d)",
                     }
                }).showToast();
                $('#account-form button').html('<i class="fa fa-user-plus" aria-hidden="true"></i> Create');
             }
             if (data === 'passwords') {
              Toastify({ 
                    text: "Ooops! Passwords do not match.\nTry again",
                    duration: 6000,
                    className: "primary",
                   style: {
                       background: "linear-gradient(to right, #E64134, #96c93d)",
                     }
                }).showToast();
              $('#account-form button').html('<i class="fa fa-user-plus" aria-hidden="true"></i> Create');
             }
             if (data === 'emails') {
              Toastify({ 
                    text: "Ooops! Emails do not match.\nTry again",
                    duration: 6000,
                    className: "primary",
                   style: {
                       background: "linear-gradient(to right, #E64134, #96c93d)",
                     }
                }).showToast();
              $('#account-form button').html('<i class="fa fa-user-plus" aria-hidden="true"></i> Create');
             }
          }
          );

        }
   </script>
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
    <title>Password Recover | SLCMC</title>
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
        <form id="activation-form" style="margin-top:-50px;text-align:center;" action="" method="post">
          <h3><img src="../applicant-dashboard/images/logo1.png" class="img-rounded" style="height:70px;"><br>
           Password Recovery</h3>
          <div id="notify">
            
          </div>
          <span style="color:green">Enter your Email</span>
            <input type="email" class="form-control" name="activation_code" placeholder="Enter your email" required="" style="width:100%;">
          
          <button id="password-recover" class="btn"><i class="fa fa-key" aria-hidden="true"></i>  Recover Password </button><br><br><br>

        <br><a href="../"><i class="fa fa-sign-in" aria-hidden="true"></i> Back to login</a><br><br><br>
        <h6 style="bottom: 10px">&copy; Sister Leonella Consolata Medical College 2023. All rights reserved</h6>
        </form>

          <br>
          <form id="reset-password-form" style="margin-top:-50px;text-align:center;display:none" action="" method="post">
          <h3><img src="../applicant-dashboard/images/logo1.png" class="img-rounded" style="height:70px;"><br>
           Password Recovery</h3>
           <div id="notifications">
             
           </div>
          <div id="notify1">
            Recovery password has been sent to your email
          </div>
            <input type="password" class="form-control" name="recovry-pass" placeholder="Enter recovery password sent to your email" required="" style="width:100%;"><br>
            <input type="password" class="form-control" name="new-password" placeholder="Enter new password" required="" style="width:100%;"><br>
            <input type="password" class="form-control" name="confirm-pass" placeholder="Confirm new password" required="" style="width:100%;">
          
          <button id="reset-recover" class="btn"><i class="fa fa-key" aria-hidden="true"></i>  Reset Password </button>
           <br><br><a href="../"><i class="fa fa-sign-in" aria-hidden="true"></i> Back to login</a><br><br><br>

        <br><br><br><br>
        <h6 style="bottom: 10px">&copy; Sister Leonella Consolata Medical College 2023. All rights reserved</h6>
        </form>
        
      </div>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/main.js"></script>
  </body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>

<script type="text/javascript">
     $(document).ready(function(){
      $('#activation-form').submit(function(e){
        e.preventDefault();
        attemptActivation();
      });
        $('#reset-password-form').submit(function(e){
        e.preventDefault();
        attemptReset();
      });
     });

     function attemptActivation(){
          var email = $('#activation-form input:eq(0)').val();
          
          var json = JSON.stringify([email]);
          $('#activation-form button').html('<i class="fa fa-pulse fa-refresh"></i> Loading...');
          $.post('../applicant-dashboard/includes/password-recovery.php',
          {
            data:json
          },function(data,status){
              if(data.replace(/^\s+|\s+$/gm,'') === 'empty')
              {
                 document.getElementById("notify").innerHTML="<h6 style='color:red'>Error! "+email+" is not registered. Kindly create account</h6>";
              }
               if(data.replace(/^\s+|\s+$/gm,'') === 'success')
              {
                document.getElementById("activation-form").style.display='none';
                document.getElementById("reset-password-form").style.display='block';
                 //document.getElementById("notify").innerHTML="<h6 style='color:red'>Password sent</h6>";
              }
          });

        }

        function attemptReset(){
          var pass1 = $('#reset-password-form input:eq(0)').val();
          var pass2 = $('#reset-password-form input:eq(1)').val();
          var pass3 = $('#reset-password-form input:eq(2)').val();
          
          var json = JSON.stringify([pass1,pass2,pass3]);

          $('#reset-password-form button').html('<i class="fa fa-pulse fa-refresh"></i> Loading...');
          $.post('../applicant-dashboard/includes/reset-password-recovery.php',
          {
            data:json
          },function(data,status){
             if(data.replace(/^\s+|\s+$/gm,'') === 'success')
              {
                Toastify({ 
                    text: "Sucess!\n Password reset successifully. Kindly login in with new password \nThanks",
                    duration: 6000,
                    className: "primary",
                   style: {
                       background: "linear-gradient(to right, #00b09b, #96c93d)",
                     }
                }).showToast();
              document.location.href='../';
              }
               if(data.replace(/^\s+|\s+$/gm,'') === 'different')
              {
                  Toastify({ 
                    text: "Error!\n Wrong recovery password.",
                    duration: 6000,
                    className: "primary",
                   style: {
                       background: "linear-gradient(to right, #E64134, #96c93d)",
                     }
                }).showToast();
              }
               if(data.replace(/^\s+|\s+$/gm,'') === 'mismatch')
              {
               Toastify({ 
                    text: "Error!\n Password mismatch. Kindly type your password correctly.",
                    duration: 6000,
                    className: "primary",
                   style: {
                       background: "linear-gradient(to right, #E64134, #96c93d)",
                     }
                }).showToast();
              }
               if(data.replace(/^\s+|\s+$/gm,'') === 'error')
              {
                Toastify({ 
                    text: "Error!\n Unable to reset your password. Kindly check your internet.",
                    duration: 6000,
                    className: "primary",
                   style: {
                       background: "linear-gradient(to right, #E64134, #96c93d)",
                     }
                }).showToast();
              }
          });

        }  
   </script>
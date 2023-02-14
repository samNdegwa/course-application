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
    <title>Activation | SLCMC</title>
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
           Account Activation</h3>
          <div id="notify">
            
          </div>
          <span style="color:green">An activation code has been sent to your email. If you didn't receive, click 'Resend Code'.</span>
            <input type="number" class="form-control" name="activation_code" placeholder="Enter Activation Code" required="" style="width:100%;">
          
          <button id="activate-code" class="btn"><i class="fa fa-key" aria-hidden="true"></i>  Activate </button><br><br>

          <a href="#" id="resend-code" class="btn"><i class="fa fa-paper-plane" aria-hidden="true"></i>  Resend Code </a><br>

        <br><a href="../"><i class="fa fa-sign-in" aria-hidden="true"></i> Back to login</a><br><br><br>
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
      $('#activation-form').submit(function(e){
        e.preventDefault();
        attemptActivation();
      });
       
      $('#resend-code').click(function(){
        var json = JSON.stringify(['0']);
        $('#resend-code').html('<i class="fa fa-pulse fa-refresh"></i> Resending code...');
        $.post('../applicant-dashboard/includes/resend-activation-code.php',
          {
            data:json
          },function(data,status){
            if(data === 'success'){
              Toastify({ 
                    text: "Activation code has been sent to your email. \nThanks",
                    duration: 6000,
                    className: "primary",
                   style: {
                       background: "linear-gradient(to right, #00b09b, #96c93d)",
                     }
                }).showToast();
               $('#resend-code').html('<i class="fa fa-paper-plane" aria-hidden="true"></i> Resend Code');
            }
          });
      });
     });

     function attemptActivation(){
          var code = $('#activation-form input:eq(0)').val();
          
          var json = JSON.stringify([code]);
          $('#activation-form button').html('<i class="fa fa-pulse fa-refresh"></i> Activating...');
          $.post('../applicant-dashboard/includes/activate-account.php',
          {
            data:json
          },function(data,status){
              if(data === 'different')
              {
                Toastify({ 
                    text: "Ooops! Wrong code.\nTry again",
                    duration: 6000,
                    className: "primary",
                   style: {
                       background: "linear-gradient(to right, #E64134, #96c93d)",
                     }
                }).showToast();
              $('#activation-form button').html('<i class="fa fa-key" aria-hidden="true"></i> Activate');
              }
              if(data === 'error')
              {
                Toastify({ 
                    text: "Ooops! Unable to activate. \nCheck your internet and try again",
                    duration: 6000,
                    className: "primary",
                   style: {
                       background: "linear-gradient(to right, #E64134, #96c93d)",
                     }
                }).showToast();
              $('#activation-form button').html('<i class="fa fa-key" aria-hidden="true"></i> Activate');
              }
              if(data === 'success')
              {
                 Toastify({ 
                    text: "Congratulation!\n You have successifully activated your account. Use your email and password you have created to login and apply course of your choice. \nThanks",
                    duration: 6000,
                    className: "primary",
                   style: {
                       background: "linear-gradient(to right, #00b09b, #96c93d)",
                     }
                }).showToast();
                document.location.href='../';

               // window.history.pushState(stateObj,"Page", "../");
              }
          });

        }
   </script>
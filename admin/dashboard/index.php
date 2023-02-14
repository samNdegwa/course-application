<?php 
include 'core/init.php'; 
include 'functions/file-counter.php'; 
$user=$_SESSION['myEmail'];
if(empty($user)=== true){
  ?>
  <script>
  document.location.href='../';
  </script>
  <?php
} else {
?>
<!DOCTYPE html>
<html>
  <?php include 'widgets/top-scripts.php';?>
<body class="hold-transition sidebar-mini sidebar-collapse layout-footer-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <?php include 'widgets/default-top-navigation.php'; ?>
  </nav>
  <!-- /.navbar -->
  <?php include 'widgets/side-bar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="all-main-contents">
    <!-- Content Header (Page header) -->
  <?php
   include 'widgets/main-body.php';
   include 'functions/upload_csv_group_sms.php';

  ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include 'widgets/footer.php'; ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
</body>
</html>
<?php
} 
include 'widgets/bottom-script.php';
?>

<script>
  $(function(){
    // Simcards menu ...
    $('#view-all-applications').click(function (){
      //$('#all-main-contents').html('<i class="fa fa-spinner fa-spin"></i> Opening ...');
    });
    $('#view-unpaid-app').click(function (){
      $('#all-main-contents').html('<i class="fa fa-spinner fa-spin"></i> Opening ...');
      $('#all-main-contents').load('widgets/unpaid-application.php');
    });
    $('#view-paid-unprocessed').click(function (){
      $('#all-main-contents').html('<i class="fa fa-spinner fa-spin"></i> Opening ...');
      $('#all-main-contents').load('widgets/paid-unprocessed-application.php');
    });
     $('#settingss').click(function (){
         alert("settingss coming soon...")
    });
     $('#unpaid_applications').click(function (){
      $('#unpaid_applications').html('<i class="fa fa-spinner fa-spin"></i> Opening ...');
      $('#all-main-contents').load('widgets/unpaid-application.php');
    });
      $('#paid-unprocessed').click(function (){
      $('#paid-unprocessed').html('<i class="fa fa-spinner fa-spin"></i> Opening ...');
      $('#all-main-contents').load('widgets/paid-unprocessed-application.php');
    });

    $('#booked_application').click(function (){
      $('#booked_application').html('<i class="fa fa-spinner fa-spin"></i> Opening ...');
      $('#all-main-contents').load('widgets/booked-applications-control.php');

     });

      $('#view-all-intakes').click(function (){
       $('#all-main-contents').html('<i class="fa fa-spinner fa-spin"></i> Opening ...');
      $('#all-main-contents').load('widgets/view-intakes.php');
    });

      $('#approved_application').click(function (){
       $('#approved_application').html('<i class="fa fa-spinner fa-spin"></i> Opening ...');
      $('#all-main-contents').load('widgets/approved-applications.php');
    });

      $('#view-processed-app').click(function (){
       $('#all-main-contents').html('<i class="fa fa-spinner fa-spin"></i> Opening ...');
      $('#all-main-contents').load('widgets/approved-applications.php');
    });

       $('#view-all-payments').click(function (){
       $('#all-main-contents').html('<i class="fa fa-spinner fa-spin"></i> Opening ...');
        $('#all-main-contents').load('widgets/view-all-payments.php');
    });

    $('#send-single-message').click(function (){
       $('#all-main-contents').html('<i class="fa fa-spinner fa-spin"></i> Opening ...');
        $('#all-main-contents').load('widgets/send-single-message.php');
    }); 

    $('#send-groups').click(function (){
       $('#all-main-contents').html('<i class="fa fa-spinner fa-spin"></i> Opening ...');
        $('#all-main-contents').load('widgets/send-group-messages.php');
    }); 

    $('#view-messages').click(function (){
       $('#all-main-contents').html('<i class="fa fa-spinner fa-spin"></i> Opening ...');
        $('#all-main-contents').load('widgets/all-messages.php');
    }); 
    
});

</script>



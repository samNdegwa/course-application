<?php
include '../core/init.php';
$status=$_SESSION['sent_single_status'];
$phone=$_SESSION['phone_single'];
$name=$_SESSION['name_single'];
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><i class="nav-icon fas fa-money-bill"></i> Delivery Status</h4>

                </div>
                <div class="card-body">
                  <?php
                  if($status === 'Success') {
                      ?>
                      <div class="row">
                      <div class="col-sm-1">
                      </div>
                      <div class="col-sm-10">
                      <div class="alert alert-success" role="alert" style="min-height:100px;">
                      <h5><span class="fa fa-check"></span> <strong>Success!</strong><br> Messages successifully sent to <?php echo $name.' phone number '.$phone; ?></h5>
                      </div>
                     </div>
                     <div class="col-sm-1">
                      </div>

                      </div>
                      <div class="row">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-7">
                    
                    <button type="submit" class="btn btn-primary" style="float:center;" id="btn-send-new-single"><i class="fa fa-paper-plane" aria-hidden="true"></i> Send Another Message</button>
                    
                   </div>
                   <div class="col-sm-1">
                    </div>

                    </div>
                      <?php
                  } else {
                    ?>
                    <div class="row">
                    <div class="col-sm-1">
                    </div>
                    <div class="col-sm-10">
                    <div class="alert alert-danger" role="alert" style="min-height:100px;">
                    <h5><span class="fa fa-times"></span> <strong>Failed!</strong><br> Messages Not sent to <?php echo $name.' phone number '.$phone; ?>.<br> Please check your phone number or network connection</h5>
                    
                    </div>
                   </div>
                   <div class="col-sm-1">
                    </div>

                    </div>
                    
                    <div class="row">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-7">
                    
                    <button type="submit" class="btn btn-primary" style="float:center;" id="btn-send-new-single"><i class="fa fa-paper-plane" aria-hidden="true"></i> Send Another Message</button>
                    
                   </div>
                   <div class="col-sm-1">
                    </div>

                    </div>
                    <?php
                  }
                  ?>
                </div>

            </div>

        </div>

    </div>

</div>


<script>
 $(function(){
      $('#btn-send-new-single').click(function (){
       $('#all-main-contents').html('<i class="fa fa-spinner fa-spin"></i> Opening ...');
        $('#all-main-contents').load('widgets/send-single-message.php');
    }); 
  });    
</script>
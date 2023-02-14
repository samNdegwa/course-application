<?php
include '../core/init.php';
$group=$_SESSION['group_name'];
$entries=$_SESSION['total_number'];
$stamp=$_SESSION['stamp'];

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><i class="nav-icon fas fa-envelope"></i> Broadcast Complete!</h4>

                </div>
                <div class="card-body">
                <div class="row">
                   <div class="col-sm-3">
                   </div>
                   <div class="col-sm-6">
                   <div class="card" style="background:#8FF186;color:white;text-align:center;">
                   <br><br>
                     <h5><?php echo $group?></h5>
                     <h5>Total Entries: <?php echo $entries;?> </h5>

                     <div class="card" style="background:#8FF186;color:white;">
                     <br><br>
                     <?php
                     $sqls="SELECT * FROM tb_messages WHERE stamp='$stamp' AND status='Success'";
    $results=mysqli_query($con,$sqls) or die(mysql_error());
    $success=0;
    while($rows=mysqli_fetch_array($results))
      {   
          $success++;
      }

    $sqlf="SELECT * FROM tb_messages WHERE stamp='$stamp' AND status='Not Sent'";
    $resultf=mysqli_query($con,$sqlf) or die(mysql_error());
    $fail=0;
    while($rowf=mysqli_fetch_array($resultf))
      {   
          $fail++;
      }
      $_SESSION['fails']=$fail;
       ?>
      <h6>Delivery Status: <br></h6>
      Success: <?php echo $success; ?><br>
      Failed: <?php  echo $fail; ?>
         
              
                      <br><br>
                     <?php
                      if($fail > 0){
                        ?>
                         <button class="btn btn-secondary" id="retry-sending" >Retry <?php echo $fail;?> Sms</button>
                        <?php

                      } else {

                      }
                     ?>
                     </div>
                   </div>
                   </div>
                   <div class="col-sm-3">
                   </div>
                </div>
                  
                </div>

            </div>

        </div>

    </div>

</div>
<script>
    $(function (){
      $('#retry-sending').click(function(){
        retrySending();
      });
    });
    function retrySending() {
       var json = JSON.stringify([]);
      $('#retry-sending').html('<i class="fas fa-spinner fa-pulse"></i> Re-trying to complete, Please wait...');
      $.post('functions/retry-sending-group-sms.php',
          {
            data:json
          },function(data,status){
             $('#retry-sending').html('<i class="fas fa-spinner fa-pulse"></i> Broadcasting, Please wait...');
             if(status === "success"){
              $("#all-main-contents").load("functions/group-send-status.php");
             } 
        
          });
      
      }
</script>
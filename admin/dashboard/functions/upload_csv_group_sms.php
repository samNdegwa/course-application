<?php
include '../core/init.php';
if ($_POST['upload_csv_cert_renewal_group']) {
	 date_default_timezone_set('Africa/Nairobi');
  $now = new DateTime();
  $stamp = $now->format('YmdHi');
  
  $currentTime=$now->format('H:i');
  $currentDate=$now->format('d-m-Y');
 
 $group_name=$_POST['group_name'];
 $_SESSION['group_name']=$group_name;

  $file=$_FILES['csvfilerenew']['tmp_name'];
  $handle=fopen($file,"r");
	?>
    <script>
        document.getElementById("all-main-contents").innerHTML="";
     </script>
    
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" style="width:100%;"><i class="nav-icon fas fa-envelope"></i> Sms Broadcast
                    </h4>


                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"><?php echo $group_name;?> List to be contacted</h4>
                                </div>
                                <div class="card-body">
          <table class="table table-bordered table-striped table-hover table-responsive">
         <thead>    
       <tr">
       <th>#</th>
       <th>Name</th>
       <th>Phone Number</th>
    
       </tr>
       </thead>
       <tbody>

	<?php
  
  $no=0;
  while (($cont=fgetcsv($handle, 1000,",")) !==false) {
  	$name=$cont[0];
  	$phone=$cont[1];
    
    include 'data-validation.php'; 

  	$no++;

     $msg='Dear Parent, your son/daughter shall proceed for a short break from 11/02/2023 till 26/02/23. All fee arrears MUST be cleared before resumption. For clarification call us on 0724303431 Consolata Medical College';

  	$query="INSERT INTO tb_messages(name,phone,message,group_name,stamp) VALUES ('".$name."','".$newNumber."','".$msg."','".$group_name."','".$stamp."')";
  	mysqli_query($con, $query);

  	?>
  		<tr >
  		  <td ><?php echo $no;?></td>
  			<td ><?php echo $name;?></td>
  			<td ><?php echo $newNumber;?></td>
        
  		</tr>
  	
     
  	<?php
  $newNumber="";
} 
   
  $_SESSION['stamp']=$stamp;
  $_SESSION['total_number']=$no;
?>
</tbody>

</table>
                                    
                      </div>

                      </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5><?php echo $group_name;?> <button class="btn btn-outline-danger btn-small" style="float:right;" id="btn-cancel-violation"><i class="fa fa-times" aria-hidden="true"></i> Cancel</button></h5>
                                </div>
                                <div class="card-body">
                                  <form method="POST" id="form-send-group-messages">
                                  <div class="card-body">
                                  <div class="form-group">
                                   <label>Sample message To be broadcasted</label>
                                    <textarea class="form-control" id="receiver-message" rows="5" disabled><?php echo $msg;?></textarea>
                                     </div>
                                     <div class="form-group" style="text-align:center;">
                                      <h5>Total Enteries : <?php echo $no;?></h5>
                                      <h5>Total Cost : KES <?php echo $no*0.8;?></h5>
                                     </div>
                                     <div class="form-group" style="text-align:center;">
                                      <small class="alert alert-secondary" role="alert">Please confirm whether your Africastalking account have enough fund</small>
                                     </div>
                                     </div>
                                     <div class="card-footer">
                                   <h6 id="btn-display"><button type="submit" class="btn btn-primary" style="float:left;" id="btn-send-violation"><i class="fa fa-paper-plane" aria-hidden="true"></i> Broadcast</button> </h6>
                                   <h5 id="sending-status" style="color:green;"></h5>
                                   
                                   </div>  
                                   
                                  </form>

                                   
                                  
                                </div>

                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>

</div>
<script>
    $(function (){
      $('#form-send-group-messages').submit(function(e){
        e.preventDefault();
        sendGroup();
      });
        $("#violation-list").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $("#btn-cancel-violation").click(function(){
           $('#btn-cancel-violation').html('<i class="fa fa-spinner spin"></i>Cancelling...');
          
          $("#all-main-contents").load("functions/cancel-sending-group-sms.php");
          
      });
    });

    function sendGroup() {
       var json = JSON.stringify([]);
      $('#btn-display').html('');
      $('#sending-status').html('<i class="fas fa-spinner fa-pulse"></i> Sending, Please wait...');
      $.post('functions/sending-message-group.php',
          {
            data:json
          },function(data,status){
             $('#sending-status').html('<i class="fas fa-spinner fa-pulse"></i> Broadcasting, Please wait...');
             if(status === "success"){
              $("#all-main-contents").load("functions/group-send-status.php");
             } 
        
          });
      
      }
</script>
	<?php
  
}
?>
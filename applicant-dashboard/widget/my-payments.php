<?php
include '../includes/student-data.php';
?>
<div class="card">
  <div class="card-header">
    My Payment
  </div>
  <div class="card-body">
  <?php 
   if (empty($payStatus)) {
   	echo '<h5 class="card-title">Special title treatment</h5>';
    ?>
    <h5>How to pay</h5>
                     <img src="./images/mpesa.png" style="height:50px;">
                     <ul>
                      <li>Lipa na Mpesa</li> 
                      <li>Select Pay Bill</li>
                      <li>Enter Business Number as 339327</li>
                      <li>Enter <b><?php echo $incode;?></b> as the account number</li>
                      <li>Then enter the amount – <b>Ksh.<?php echo $balance;?></b>.</li>
                       </ul>
                       If 2 hours elapse (On a working day) before your payment reflect in system, kindly contact our office through +254724303431.
   
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <?php } 
     else {
     	?>
       <div id="table-wrapper">
       <div id="table-scroll">
      <table class="table table-hover table-bordered table-sm">
      <thead>    
       <tr>
       <th>S/N</th>
       <th>Payment Mode</th>
       <th>Reference</th>
       <th>Amount</th>
       <th>#code</th>
       <th>Date </th>
       
       </tr>
       </thead>
       <tbody>
     	<?php
      $sqlp="SELECT * FROM payments WHERE batch_code ='$incode'";
      $resultp=mysqli_query($con,$sqlp) or die(mysql_error());
      $ser=0;
      while($rowp=mysqli_fetch_array($resultp))
       { 
       	$ser++;
       	$ref = $rowp['reference'];
       	$mode =$rowp['mode'];
       	$amount =$rowp['amount'];
       	$dat=$rowp['date'];
       	?>
        <tr>
        	<td><?php echo $ser;?></td>
        	<td><?php echo $mode;?></td>
        	<td><?php echo $ref;?></td>
        	<td><?php echo $amount?></td>
        	<td><?php echo $incode;?></td>
        	<td><?php echo $dat;?></td>
        </tr>
       	<?php
       }

       ?>
       </tbody>
        </table>
           </div>
           </div>
       <?php
     }
    ?>
  </div>
</div>
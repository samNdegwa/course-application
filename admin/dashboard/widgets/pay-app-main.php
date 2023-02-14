<?php
include '../core/init.php';
date_default_timezone_set('Africa/Nairobi');
    $now = new DateTime();
    $hrs = $now->format('H');
    $mt = $now->format('i');
    $date = $now->format('Y-m-d');
    $json = $_POST['data'];
    $data = json_decode($json);
    $code=$data[0];

    $stud_id;

    $sqlbatch="SELECT * FROM  application_batches WHERE batch_code='$code'";
    $resultbatch=mysqli_query($con,$sqlbatch) or die(mysql_error());
       while($rowb=mysqli_fetch_array($resultbatch))
         { 
             $stud_id=$rowb['student_id'];
         }

    $sqla="SELECT * FROM  payments WHERE batch_code='$code'";
    $resulta=mysqli_query($con,$sqla) or die(mysql_error());
    $totalAmount=0;
    while($rowa=mysqli_fetch_array($resulta))
         { 
             $amount=$rowa['amount'];
             $totalAmount=$totalAmount+$amount;
         }


    ?>
 <div class="row">
<div class="col-sm-12">
<div class="card">
  <div class="card-header">
    <h6 class="btn-secondary" style="padding-left:5px;"> <i class="fa fa-credit-card" aria-hidden="true"></i> Payment Status</h6>
  </div>
  <div class="card-body">
  <b>Due:</b> 1000&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <b>Paid:</b> <?php echo $totalAmount;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Bal:</b> <?php echo 1000-$totalAmount;?>
  </div>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="card">
  <div class="card-header">
    <h6 class="btn-secondary" style="padding-left:5px;"> <i class="fa fa-money" aria-hidden="true"></i> Update Payment</h6>
  </div>
  <div class="card-body">
   <form id="payment-form">
   <div class="row">
  <div class="col-sm-6">
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">Amount Paid</label>
    <div class="col-sm-6">
      <input type="text"  class="form-control" required="" id="amount-paid">
    </div>
  </div>
  </div>
  <div class="col-sm-6">
   <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Mode</label>
    <div class="col-sm-8">
      <select class="form-control" id="pay-mode">
        <option>Mpesa</option>
      </select>
    </div>
  </div>
  </div>
  </div>
  <div class="row">
  <div class="col-sm-12">
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-3 col-form-label">Reference</label>
    <div class="col-sm-9">
     <input type="text"  class="form-control" id="pay-ref" required="">
    </div>
  </div>
  </div>
 
  </div>
  </form>
  </div>
</div>
</div>
</div>


<style>
* {
  box-sizing: border-box;
}

.zoom {
  transition: transform .2s;
  margin: 0 auto;
}

.zoom:hover {
  -ms-transform: scale(2.5); /* IE 9 */
  -webkit-transform: scale(2.5); /* Safari 3-8 */
  transform: scale(2.5);
  position: absolute; 

}
</style>



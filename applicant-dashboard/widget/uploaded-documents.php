<?php
include '../includes/student-data.php';
?>
<div class="row" style="min-height:400px;text-align:center;">
<div class="col-sm-4">
<br>
Passport Photo<br>
<img src="./uploads/<?php echo $passport;?>" style="height:200px;"> <br>
<a href="./uploads/<?php echo $passport;?>"><button class="btn btn-danger"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
</div>
<div class="col-sm-4">
<br>
ID/Birth Certificate<br>
<img src="./uploads/<?php echo $front_id;?>" style="height:200px;"> <br>
<a href="./uploads/<?php echo $front_id;?>"><button class="btn btn-danger"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
	
</div>
<div class="col-sm-4">
<br>
KCSE Results<br>
<img src="./uploads/<?php echo $kcse_slip;?>" style="height:200px;"><br>
<a href="./uploads/<?php echo $kcse_slip;?>"><button class="btn btn-danger"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
</div>
	
</div>

<div >
	<br><br><br>
</div>
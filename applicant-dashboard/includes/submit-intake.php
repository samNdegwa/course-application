<?php
include 'student-data.php';
  $json = $_POST['data'];
  $data = json_decode($json);
  $code=rand(111111,999999);
   $intake=$data[0];
   $resi=$data[1];
   $reason=$data[2];

   if($resi === 'Boarding')
   {
    $reason='None';
   }
   $sqlc = "INSERT INTO `application_batches` (`batch_code`,`student_id`,`intake_id`, `payment`,`mode`,`mode_reason`, `status`) VALUES ('$code','$id','$intake','0','$resi','$reason','0')";  
         if (!mysqli_query($con,$sqlc)){
           echo "error";
        } else {
           echo "success";
        }
?>
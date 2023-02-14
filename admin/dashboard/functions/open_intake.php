<?php
include '../core/init.php';
date_default_timezone_set('Africa/Nairobi');
    $now = new DateTime();
    $hrs = $now->format('H');
    $mt = $now->format('i');
    $date = $now->format('Y-m-d  H:i');
    $json = $_POST['data'];
    $data = json_decode($json);

    $intake_id = $data[0];
    $intake_name = $data[1];

     $sql3="SELECT * FROM current_intake WHERE intake_id='$intake_id'";
        $result3=mysqli_query($con,$sql3) or die(mysql_error());
        while($row3=mysqli_fetch_array($result3))
         { 
            $checkStatus=$row3['intake_id'];
         }

         if($intake_id === $checkStatus)
         {
           echo "success";
         } else {

     $sqlc = "INSERT INTO `current_intake` (`intake_id`) VALUES ('$intake_id')";  
         if (!mysqli_query($con,$sqlc)){
           echo "error";
        } else {
           echo "success";
        }
    }
?>
<?php
include '../core/init.php';
date_default_timezone_set('Africa/Nairobi');
    $now = new DateTime();
    $hrs = $now->format('H');
    $mt = $now->format('i');
    $date = $now->format('Y-m-d  H:i');
    $json = $_POST['data'];
    $data = json_decode($json);

    $month = $data[0];
    $year = $data[1];

     $sqlc = "INSERT INTO `intakes` (`year`,`month`) VALUES ('$year','$month')";  
         if (!mysqli_query($con,$sqlc)){
           echo "error";
        } else {
           echo "success";
        }
?>
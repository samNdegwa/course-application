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

     $sql = "DELETE FROM `current_intake` WHERE intake_id='$intake_id'";
     if ($con->query($sql) === TRUE) {
       echo "success";
       } else {
          echo "error";
      }   
    
?>
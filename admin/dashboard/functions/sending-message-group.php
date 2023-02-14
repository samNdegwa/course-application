<?php
include '../core/init.php';
require_once ('AfricasTalkingGateway.php');
$entries=$_SESSION['total_number'];
$stamp=$_SESSION['stamp'];

    $phones=[];
    $messages=[];
    $names=[];
    $sql="SELECT * FROM tb_messages WHERE stamp='$stamp'";
    $result=mysqli_query($con,$sql) or die(mysql_error());
    $cnt=0;
    while($row=mysqli_fetch_array($result))
      {   
          $phone=$row['phone'];
          $text=$row['message'];
          $name=$row['name'];

         
          $phones[$cnt]=$phone;
          $messages[$cnt]=$text;
          $names[$cnt]=$name;
         
          $cnt=$cnt+1; 

      }
      
      $in=0;
      while($in<$entries)
      {
        
        $myPhone=$phones[$in];
        $msg=$messages[$in];
        $myName=$names[$in];
       
        $username  = "leonella1";
        $apikey    = "734a4cb692897fa2413c7367a668f86be435c9e538e95a6801220082cf7f2a08";

        $recipients  = $myPhone;
        $message="";
        $message  =$msg;

        $gateway  = new AfricasTalkingGateway($username, $apikey);

        try{

               $status="Not Sent";
               $results = $gateway->sendMessage($recipients,$message,'SLCMC');

               foreach ($results as $result) {
               date_default_timezone_set('Africa/Nairobi');
               $now = new DateTime();
               $time=$now->format('H:i');
               $date=$now->format('d-m-Y');
               $status=$result->status;
               $cost=$result->cost;
               if ($status == 'Success') {
               $sql = "UPDATE tb_messages SET date_sent='$date', time_sent='$time', status='$status', cost='$cost'  WHERE name='$myName' AND stamp='$stamp'";
                if ($con->query($sql) === TRUE) {
  
               } else {
  
                 }

                } else {}
     

    } 
}
catch ( AfricasTalkingGatewayException $e)
{
  
}
        $in++;
        
       }

        echo 'success';

    ?>
   



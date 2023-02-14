<?php
    include '../core/init.php';
     require_once ('AfricasTalkingGateway.php');
     date_default_timezone_set('Africa/Nairobi');
    $now = new DateTime();
    $today = $now->format('Ymd');
    $entries=$_SESSION['fails'];
    $stamp=$_SESSION['stamp'];
    $name=[];
    $phones=[];
    $txts=[];
    $sql="SELECT * FROM tb_messages WHERE stamp='$stamp' AND status='Not Sent'";
    $result=mysqli_query($con,$sql) or die(mysql_error());
    $cnt=0;
    while($row=mysqli_fetch_array($result))
      {   
          $namee=$row['name'];
          $mes=$row['message'];
          $phone=$row['phone'];
         

          $name[$cnt]=$namee;
          $txts[$cnt]=$mes;
          $phones[$cnt]=$phone;
          
      }
      
      $in=0;
      while($in<$entries)
      {
        $myName=$name[$in];
        $myPhone=$phones[$in];
        $going_message = $txts[$in];
      
        $username  = "leonella1";
        $apikey    = "734a4cb692897fa2413c7367a668f86be435c9e538e95a6801220082cf7f2a08";

$recipients  = $myPhone;
$message="";
$message  =$going_message;

$gateway  = new AfricasTalkingGateway($username, $apikey);

try{
  
  $results = $gateway->sendMessage($recipients,$message,'SLCMC');

  foreach ($results as $result) {
    date_default_timezone_set('Africa/Nairobi');
     $now = new DateTime();
     $time=$now->format('H:i');
     $date=$now->format('d-m-Y');
     $status=$result->status;
     $cost=$result->cost;
     if ($status === 'Success') {
     $sql = "UPDATE tb_messages SET date_sent='$date', time_sent='$time', status='$status', cost='$cost'  WHERE name='$myName' AND stamp='$stamp' AND status='Not Sent'";
     if ($con->query($sql) === TRUE) {
  
       } else {
  
        }

     } else {
      $sql = "UPDATE tb_messages SET message='$going_message' WHERE name='$myName' AND stamp='$stamp' AND status='Not Sent'";
     if ($con->query($sql) === TRUE) {
  
       } else {
  
        }

     }
    } 
}
catch ( AfricasTalkingGatewayException $e)
{
  
}
        $in++;
        
       }
     echo 'success';
  
?>
<?php
include '../core/init.php';
require_once ('AfricasTalkingGateway.php');
$json = $_POST['data'];
$data = json_decode($json);

$name=$data[0];
$phone=$data[1];
$txt=$data[2];

$_SESSION['phone_single']=$phone;
$_SESSION['name_single']=$name;

    
$username  = "leonella1";
$apikey    = "734a4cb692897fa2413c7367a668f86be435c9e538e95a6801220082cf7f2a08";

$recipients  = $phone;
$message=$name.', '.$txt;

$gateway  = new AfricasTalkingGateway($username, $apikey);

try{
  
  $results = $gateway->sendMessage($recipients,$message,'SLCMC');

  foreach ($results as $result) {
    date_default_timezone_set('Africa/Nairobi');
     $now = new DateTime();
     $time=$now->format('H:i');
     $date=$now->format('d-m-Y');
     $stamp=$now->format('YmdHi');

     $status=$result->status;
     $cost=$result->cost;

       $query="INSERT INTO tb_messages(name,phone,message,date_sent,time_sent,stamp,status,cost)VALUES ('".$name."','".$phone."','".$txt."','".$date."','".$time."','".$stamp."','".$status."','".$cost."')";
    mysqli_query($con, $query);

     $_SESSION['sent_single_status']=$status;
    
    } 
}
catch ( AfricasTalkingGatewayException $e)
{
  
}echo "success";


  
?>
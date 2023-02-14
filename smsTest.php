<?php
require_once ('AfricasTalkingGateway.php');
$username  = "leonella1";
$apikey    = "734a4cb692897fa2413c7367a668f86be435c9e538e95a6801220082cf7f2a08";

$recipients  = '0726159307';
$message="asdfghjkl sdfghj dfghjmk";

$gateway  = new AfricasTalkingGateway($username, $apikey);

try{
  
  $results = $gateway->sendMessage($recipients,$message);

  foreach ($results as $result) {
     $status=$result->status;
     $cost=$result->cost; 

     echo $status;
    } 
}
catch ( AfricasTalkingGatewayException $e)
{
  
}
       
?>
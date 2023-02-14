<?php
include '../core/init.php';
date_default_timezone_set('Africa/Nairobi');
    $now = new DateTime();
    $hrs = $now->format('H');
    $mt = $now->format('i');
    $date = $now->format('Y-m-d  H:i');
    $json = $_POST['data'];
    $data = json_decode($json);
    $amount=$data[0];
    $mode=$data[1];
    $ref=$data[2];
    $code=$data[3];

    $sqla="SELECT * FROM  payments WHERE reference='$ref'";
    $resulta=mysqli_query($con,$sqla) or die(mysql_error());
    while($rowa=mysqli_fetch_array($resulta))
         { 
             $dbref=$rowa['reference'];
         }

    $sqls="SELECT * FROM  application_batches WHERE batch_code='$code'";
    $results=mysqli_query($con,$sqls) or die(mysql_error());
    while($rows=mysqli_fetch_array($results))
         { 
             $stud_id=$rows['student_id'];
         }

    $sqlp="SELECT * FROM  students WHERE stud_id='$stud_id'";
    $resultp=mysqli_query($con,$sqlp) or die(mysql_error());
    while($rowp=mysqli_fetch_array($resultp))
         { 
             $myPhone=$rowp['phone'];
         }

    $sqlb="SELECT * FROM  payments WHERE batch_code='$code'";
    $resultb=mysqli_query($con,$sqlb) or die(mysql_error());
    $totalAmount=0;
    while($rowb=mysqli_fetch_array($resultb))
         { 
             $dbamount=$rowb['amount'];
             $totalAmount=$totalAmount+$dbamount;
         }

         $allPaid=$amount+$totalAmount;
         if($allPaid>=1000)
          {
          	 $sql = "UPDATE application_batches SET payment='1' WHERE batch_code='$code'";
          	 if ($con->query($sql) === TRUE) {
               
            } else {
                
            }
          } 
                     
     if(empty($dbref) === true)
     {
     $sqlc = "INSERT INTO `payments` (`batch_code`,`mode`,`reference`, `amount`, `date`) VALUES ('$code','$mode','$ref','$amount','$date')";  
         if (!mysqli_query($con,$sqlc)){
           echo "error";
        } else {
           sendSms($myPhone,$amount,$code); 
           echo "success";
        }
    } else {
    	echo "used";
    }

function sendSms($num,$amou,$cod) {
        require_once ('AfricasTalkingGateway.php');
        $username  = "leonella1";
        $apikey    = "734a4cb692897fa2413c7367a668f86be435c9e538e95a6801220082cf7f2a08";
        $recipients  = $num;
        $message  ='Sr Leonella Consolata Med College. Your payment of Kshs '.$amou.' for application number '.$cod.' has been received. Visit our portal at consolatamedcollege.ac.ke/app to check status of your application. Thanks';
        $gateway  = new AfricasTalkingGateway($username, $apikey);
        try{
               $results = $gateway->sendMessage($recipients,$message,'SLCMC');
               foreach ($results as $result) {
               $status=$result->status;
               $cost=$result->cost;
               if ($status == 'Success') {
                 
                } else {
                 
                }

    } 
}
catch ( AfricasTalkingGatewayException $e)
{

} 
    }

?>
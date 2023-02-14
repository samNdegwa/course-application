<?php
include '../core/init.php';
 $sql="SELECT * FROM application_batches WHERE payment='0'";
    $result=mysqli_query($con,$sql) or die(mysql_error());
    $unpaid=0;
    while($row=mysqli_fetch_array($result))
               {  
                $c=$row['batch_code'];
                $unpaid++;
               }

$sqlpay="SELECT * FROM application_batches WHERE payment='1'";
    $resultpay=mysqli_query($con,$sqlpay) or die(mysql_error());
    $paid=0;
    while($rowpay=mysqli_fetch_array($resultpay))
               {  
                $c=$rowpay['batch_code'];
                $paid++;
               }  

  $sqlpayu="SELECT * FROM application_batches WHERE payment='1' AND status='0'";
    $resultpayu=mysqli_query($con,$sqlpayu) or die(mysql_error());
    $paid_unapproved=0;
    while($rowpayu=mysqli_fetch_array($resultpayu))
               {  
                $c=$rowpayu['batch_code'];
                $paid_unapproved++;
               } 

  $sqlapr="SELECT * FROM application_batches WHERE status='1'";
    $resultapr=mysqli_query($con,$sqlapr) or die(mysql_error());
    $aproved=0;
    while($rowapr=mysqli_fetch_array($resultapr))
               {  
                $c=$rowapr['batch_code'];
                $aproved++;
               }

   // $sqlrej="SELECT * FROM application_batches WHERE status='2'";
   //  $resultrej=mysqli_query($con,$sqlrej) or die(mysql_error());
   //  $rejected=0;
   //  while($rowrej=mysqli_fetch_array($resultrej))
   //             {  
   //              $c=$rowrej['batch_code'];
   //              $rejected++;
   //             }

   $sqlrej="SELECT * FROM application_batches WHERE status='2'";
    $resultrej=mysqli_query($con,$sqlrej) or die(mysql_error());
    $booked=0;
    while($rowrej=mysqli_fetch_array($resultrej))
               {  
                $c=$rowrej['batch_code'];
                $booked++;
               }                                             
             


?>
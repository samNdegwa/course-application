<?php
include '../core/init.php';
date_default_timezone_set('Africa/Nairobi');
    $now = new DateTime();
    $hrs = $now->format('H');
    $mt = $now->format('i');
    $date = $now->format('m-d');
    $json = $_POST['data'];
    $data = json_decode($json);
    $code=$data[0];
    $app_id=$data[1];
    $course=$data[2];

    $sqlbatch="SELECT * FROM applicants WHERE applicant_id='$app_id'";
    $resultbatch=mysqli_query($con,$sqlbatch) or die(mysql_error());
       while($rowb=mysqli_fetch_array($resultbatch))
         { 
             $batch_id=$rowb['batch_id'];
             $stud_id=$rowb['stud_id'];
             $course_id=$rowb['course_id'];
             $intake_id=$rowb['intake_id'];
         }

    $sqlin="SELECT * FROM courses WHERE course_id='$course_id'";
    $resultin=mysqli_query($con,$sqlin) or die(mysql_error());
       while($rowi=mysqli_fetch_array($resultin))
         { 
            $intial=$rowi['admission_initial'];
         }

       $sql="SELECT * FROM intakes WHERE id='$intake_id'";
       $result=mysqli_query($con,$sql) or die(mysql_error());
       while($row=mysqli_fetch_array($result))
         { 
            $yearin=$row['year'];
            $monthin=$row['month'];
         }    

    $sqlp="SELECT * FROM  students WHERE stud_id='$stud_id'";
    $resultp=mysqli_query($con,$sqlp) or die(mysql_error());
    while($rowp=mysqli_fetch_array($resultp))
         { 
             $myPhone=$rowp['phone'];
             $email=$rowp['email'];
             $name=$rowp['first_name'].' '.$rowp['last_name'];
         }  

    // Get previous admission for this intake on this course

     $sq="SELECT * FROM  student_admission INNER JOIN applicants ON student_admission.app_id=applicants.applicant_id WHERE course_id='$course_id' AND intake_id='$intake_id' ORDER BY applicant_id DESC";
    $res=mysqli_query($con,$sq) or die(mysql_error());
       while($ro=mysqli_fetch_array($res))
         { 
             $index=$ro['indexing'];
         }

   
         if(empty($index) === true)
         {
          $index=0;
         }
            
         $newIdex=$index+1; 

         if(strlen($newIdex) < 10)
         {
          $enterindex = '0'.$newIdex;
         } else {
          $enterindex = $newIdex;
         }
         //........................create admission
         if($monthin ==='January'){$mn="01";}if($monthin ==='February'){$mn="02";}if($monthin ==='March'){$mn="03";}if($monthin ==='Aprily'){$mn="04";}if($monthin ==='May'){$mn="05";}if($monthin ==='June'){$mn="06";}if($monthin ==='July'){$mn="07";}if($monthin ==='August'){$mn="08";}if($monthin ==='September'){$mn="09";}if($monthin ==='October'){$mn="10";}if($monthin ==='November'){$mn="11";}if($monthin ==='December'){$mn="12";}

           $yr=$yearin[2].$yearin[3];

           $addmissionNo = $intial.'/'.$enterindex.'/'.$mn.'/'.$yr;


         $sql = "UPDATE application_batches SET approval_date='$date', status='2' WHERE batch_code='$batch_id'";
          	 if ($con->query($sql) === TRUE) {
               
            } else {
                
            } 
            
             $sql = "UPDATE applicants SET status='2' WHERE applicant_id='$app_id'";
          	 if ($con->query($sql) === TRUE) {
               
            } else {
                
            } 

      $sqlc = "INSERT INTO `student_admission` (`app_id`,`indexing`,`admission_number`) VALUES ('$app_id','$enterindex','$addmissionNo')";  
         if (!mysqli_query($con,$sqlc)){
           echo "error";
        } else {
           sendSms($myPhone,$course);
           sendApprovalEmail($email,$course,$name); 
           echo "success";
        }
 

               
//...............................................Send sms
        function sendSms($num,$course) {
        require_once ('AfricasTalkingGateway.php');
        $username  = "leonella1";
        $apikey    = "734a4cb692897fa2413c7367a668f86be435c9e538e95a6801220082cf7f2a08";
        $recipients  = $num;
        $message  ='Congratulations! You have booked '.$course.' at Sr Leonella Consolata Med College. Login to our portal at consolatamedcollege.ac.ke to download admission letter. Thanks';
        $gateway  = new AfricasTalkingGateway($username, $apikey);
        try{
               $results = $gateway->sendMessage($recipients,$message,'SLCMC');
               foreach ($results as $result) {
               $status=$result->status;
               $cost=$result->cost;
    
        } 
        }
          catch ( AfricasTalkingGatewayException $e)
        {

      } 
    } 

    function sendApprovalEmail($email,$course,$name) {
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

     $mail = new PHPMailer\PHPMailer\PHPMailer(true);

               try {
                 //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'no_reply@consolatamedcollege.ac.ke';                     //SMTP username
    $mail->Password   = 'cmrmtonalnvatzbs'; //Phpcode@20222                              //SMTP password
    $mail->SMTPSecure = 'ssl';        //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('no_reply@consolatamedcollege.ac.ke', 'Sister Leonella Consolata Medical College');
    $mail->addAddress($email);     //Add a recipient
    $mail->addReplyTo('no_reply@consolatamedcollege.ac.ke');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Course Application Booking';
    $mail->Body    = 'Congratulations '.$name.'!<br> You have '.$course.' at Sr Leonella Consolata Medical College . Login to our portal at consolatamedcollege.ac.ke to download admission letter, student rules and regulations, Medical Agreement Form and Admission Agreement form. These forms must be duly filled and presented during admission.<br> <br>
        Regards.<br>
        ---<br>
      The Principal,<br>  
      Sister Leonella Consolata Medical College<br>
      P.O Box 25 - 10100 Nyeri<br>
      Cell:  +254724303431<br>
      Physical Address:  Along Nyeri-Mathari-Ihururu Road<br>
      Website:  www.consolatamedcollege.ac.ke';
      //$mail->addAttachment('doc/'.$file_name);

    $mail->send();
    //echo json_encode(array("message" => "Message has been sent"));
   // echo "success";
} catch (Exception $e) {
    //echo json_encode(array("message" => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"));
  // echo "error";

}
    }


?>
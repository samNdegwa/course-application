<?php
include '../core/init.php';
date_default_timezone_set('Africa/Nairobi');
    $now = new DateTime();
    $hrs = $now->format('H');
    $mt = $now->format('i');
    $date = $now->format('Y-m-d');
    $json = $_POST['data'];
    $data = json_decode($json);
    $app_id=$data[0];
    $course=$data[1];

    $sqlbatch="SELECT * FROM applicants WHERE applicant_id='$app_id'";
    $resultbatch=mysqli_query($con,$sqlbatch) or die(mysql_error());
       while($rowb=mysqli_fetch_array($resultbatch))
         { 
             $batch_id=$rowb['batch_id'];
             $stud_id=$rowb['stud_id'];
         }

    $sqlp="SELECT * FROM  students WHERE stud_id='$stud_id'";
    $resultp=mysqli_query($con,$sqlp) or die(mysql_error());
    while($rowp=mysqli_fetch_array($resultp))
         { 
             $myPhone=$rowp['phone'];
             $email=$rowp['email'];
             $name=$rowp['first_name'].' '.$rowp['last_name'];
         }     

       $sql = "UPDATE application_batches SET approval_date='$date', status='1' WHERE batch_code='$batch_id'";
          	 if ($con->query($sql) === TRUE) {
               
            } else {
                
            } 
            
             $sql = "UPDATE applicants SET status='1' WHERE applicant_id='$app_id'";
          	 if ($con->query($sql) === TRUE) {
               sendSms($myPhone,$course);
               sendApprovalEmail($email,$course,$name); 
               echo "success";
            } else {
                echo "error";
            } 

               
//...............................................Send sms
        function sendSms($num,$course) {
        require_once ('AfricasTalkingGateway.php');
        $username  = "leonella1";
        $apikey    = "734a4cb692897fa2413c7367a668f86be435c9e538e95a6801220082cf7f2a08";
        $recipients  = $num;
        $message  ='Congratulations! Your application for '.$course.' at Sr Leonella Consolata Med College has been approved. Login to our portal at consolatamedcollege.ac.ke to download provisional letter. You have 30days to book this slot, failure to which it will be given to another person. Thanks';
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
    $mail->Subject = 'Course Application Approval';
    $mail->Body    = 'Congratulations '.$name.'!<br> Your application for '.$course.' at Sr Leonella Consolata Medical College has been approved. Login to our portal at consolatamedcollege.ac.ke to download provisional letter. You have 30days to book this slot, failure to which it will be given to another person. Procedure for booking are indicated in provisional letter provided in portal.<br> <br>
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
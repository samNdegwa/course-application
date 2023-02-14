<?php
include '../core/init.php';
$email=$_SESSION['myemail'];
  $sql="SELECT * FROM  students WHERE email='$email'";
  $result=mysqli_query($con,$sql) or die(mysql_error());
  while($row=mysqli_fetch_array($result))
       { 
        $id=$row['stud_id'];
        $phone=$row['phone'];
        $national_id=$row['national_id'];
        $first_name=$row['first_name'];
        $second_name=$row['second_name'];
        $last_name=$row['last_name'];
        $post_address=$row['post_address'];
        $country=$row['country'];
        $county=$row['county'];
        $denomination=$row['denomination'];
        $district=$row['district'];
        $other_faith=$row['other_faith'];
        $sponsor_name=$row['sponsor_name'];
        $sponsor_phone=$row['sponsor_phone'];
        $sponsor_relationship=$row['sponsor_relationship'];
        $dob=$row['dob'];
        $gender=$row['gender'];
        $p_marital_status=$row['p_marital_status'];
        $p_physical_status=$row['p_physical_status'];
        $mother_name=$row['mother_name'];
        $mother_phone=$row['mother_phone'];
        $father_name=$row['father_name'];
        $father_phone=$row['father_phone'];
        $primary_name=$row['primary_name'];
        $primary_marks=$row['primary_marks'];
        $kcpeYear=$row['kcpeYear'];
        $secondary_name=$row['secondary_name'];
        $secondary_grade=$row['secondary_grade'];
        $secondary_address=$row['secondary_address'];
        $secoYear=$row['secoYear'];
        $tertialyEdu=$row['tertialyEdu'];
        $tertialyGrade=$row['tertialyGrade'];
        $gradYear=$row['gradYear'];
        $post_level=$row['post_level'];
        $eng=$row['eng'];
        $kis=$row['kis'];
        $mat=$row['mat'];
        $che=$row['che'];
        $phy=$row['phy'];
        $bio=$row['bio'];
        $his=$row['his'];
        $geo=$row['geo'];
        $cre=$row['cre'];
        $agr=$row['agr'];
        $bst=$row['bst'];
        $other=$row['other'];
        $front_id=$row['front_id'];
        $back_id=$row['back_id'];
        $kcse_slip=$row['kcse_slip'];
        $higher_attachment=$row['higher_attachment'];
        $passport=$row['passport'];
       }
       $back=strlen($back_id);
       $front=strlen($front_id);
       $kcse=strlen($kcse_slip);
       $higher=strlen($higher_attachment);
       $pass=strlen($passport);

       $sqlbatch="SELECT * FROM  application_batches WHERE student_id='$id'";
       $resultbatch=mysqli_query($con,$sqlbatch) or die(mysql_error());
       while($rowb=mysqli_fetch_array($resultbatch))
         { 
             $incode=$rowb['batch_code'];
         }
         //.......................................Get person intake
         $sq="SELECT intakes.id, intakes.month, intakes.year, application_batches.approval_date FROM application_batches INNER JOIN intakes ON application_batches.intake_id=intakes.id WHERE student_id='$id'";
         $res=mysqli_query($con,$sq) or die(mysql_error());
         while($row=mysqli_fetch_array($res))
               {  
                $current_intake=$row['id'];
                $intake= $row['month']." ".$row['year'];
                $approval_date=$row['approval_date'];
               }

       //------------------------------------------Check if application has been paid
        $sqlpay="SELECT * FROM  payments WHERE batch_code='$incode'";
       $resultpay=mysqli_query($con,$sqlpay) or die(mysql_error());
       $totalPaid=0;
       while($rowp=mysqli_fetch_array($resultpay))
         { 
             $payStatus=$rowp['amount'];
             $totalPaid=$totalPaid+$payStatus;
         }

          $balance=1000-$totalPaid;
       //...........................................Get current intake
       // $sqlin="SELECT * FROM  current_intake";
       // $resultin=mysqli_query($con,$sqlin) or die(mysql_error());
       // while($rowc=mysqli_fetch_array($resultin))
       //   { 
       //       $current_intake=$rowc['intake_id'];
       //   }
         //..................................check if there is course applied for this intake.
         $sqlc="SELECT * FROM  applicants WHERE  batch_id='$incode'";
       $resultc=mysqli_query($con,$sqlc) or die(mysql_error());
       while($rowc=mysqli_fetch_array($resultc))
         { 
             $any_course=$rowc['applicant_id'];
         }   

      //.....................................Check if has approve coures

      $sqliapr="SELECT * FROM  applicants WHERE stud_id='$id' AND intake_id='$current_intake' AND status='1'";
       $resultapr=mysqli_query($con,$sqliapr) or die(mysql_error());
       while($rowd=mysqli_fetch_array($resultapr))
         { 
             $approved_app=$rowd['applicant_id'];
             $appr_course=$rowd['course_id'];
         }   
       $pproved=strlen($appr_course);

       //.....................................Check if has booked course

      $sqliapr="SELECT * FROM  applicants WHERE stud_id='$id' AND intake_id='$current_intake' AND status='2'";
       $resultapr=mysqli_query($con,$sqliapr) or die(mysql_error());
       while($rowd=mysqli_fetch_array($resultapr))
         { 
             $booked_app=$rowd['applicant_id'];
             $book_course=$rowd['course_id'];
         }   
       $booked_course=strlen($book_course);  
?>       
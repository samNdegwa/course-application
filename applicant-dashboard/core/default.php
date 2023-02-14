<?php 
require 'connection/database.php';
session_start();
  $email=$_SESSION['myemail'];
  $sql="SELECT * FROM  students WHERE email='$email'";
  $result=mysqli_query($con,$sql) or die(mysql_error());
  while($row=mysqli_fetch_array($result))
       { 
        $id=$row['stud_id'];
        $national_id=$row['national_id'];
        $p_marital_status=$row['p_marital_status'];
        $secondary_name=$row['secondary_name'];
        $eng=$row['eng'];
        $front_id=$row['front_id'];
        $back_id=$row['back_id'];
        $kcse_slip=$row['kcse_slip'];
        $higher=$row['higher_attachment'];
        $pass=$row['passport'];
       }

  $sql1="SELECT * FROM  applicants WHERE stud_id='$id'";
  $result1=mysqli_query($con,$sql1) or die(mysql_error());
  $no=0;
  while($row1=mysqli_fetch_array($result1))
       { 
          $applicant_id=$row1['applicant_id'];
          $no++;
       }

       //...........................................Get current intake
       $sqlin="SELECT * FROM  current_intake";
       $resultin=mysqli_query($con,$sqlin) or die(mysql_error());
       while($rowc=mysqli_fetch_array($resultin))
         { 
             $current_intake=$rowc['intake_id'];
         }

      //.....................................Check if has approve coures
     // $appr_course;
      $sqliapr="SELECT * FROM  applicants WHERE stud_id='$id' AND intake_id='$current_intake' AND status='1'";
       $resultapr=mysqli_query($con,$sqliapr) or die(mysql_error());
       while($rowd=mysqli_fetch_array($resultapr))
         { 
             $appr_course=$rowd['course_id'];
         }   
        //$approved=strlen($appr_course);
        $array = array();
        $array[0]=$national_id;
        $array[1]=$p_marital_status;
        $array[2]=$secondary_name;
        $array[3]=$eng;
        $array[4]=$front_id;
        $array[5]=$back_id;
        $array[6]=$kcse_slip;
        $array[7]=$higher;
        $array[8]=$no;
        $array[9]=$pass;

       // $array[8]=$approved;

        $json=json_encode($array);

        echo $json;
        
       ?>
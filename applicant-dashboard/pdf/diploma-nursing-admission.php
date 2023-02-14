<?php
include '../includes/student-data.php';
require_once 'dompdf/autoload.inc.php'; //we've assumed that the dompdf directory is in the same directory as your PHP file. If not, adjust your autoload.inc.php i.e. first line of code accordingly.

// reference the Dompdf namespace

use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

//Get user information
$sql="SELECT applicants.applicant_id, courses.course_title, applicants.date_applied, intakes.year, intakes.month, intakes.report_date,applicants.status,student_admission.admission_number FROM applicants
   INNER JOIN courses ON applicants.course_id=courses.course_id INNER JOIN intakes ON applicants.intake_id=intakes.id INNER JOIN student_admission ON applicants.applicant_id=student_admission.app_id WHERE applicant_id='$booked_app'";
    $result=mysqli_query($con,$sql) or die(mysql_error());
    while($row=mysqli_fetch_array($result))
               {  
                  $couese_name=$row['course_title'];
                  $intake_month=$row['month'];
                  $intake_year=$row['year'];
                  $report_date=$row['report_date'];
                  $date_applied=$row['date_applied'];
                  $admission=$row['admission_number'];
                  $status=$row['status'];
                }

     // Letter head image
$image = 'letter.jpg';
// Read image path, convert to base64 encoding
$imageData = base64_encode(file_get_contents($image));

// Format the image SRC:  data:{mime};base64,{data};
$src = 'data:'.mime_content_type($image).';base64,'.$imageData;

// sign image
$image2 = 'sign.png';
$image3 = 'qrcode.png';
// Read image path, convert to base64 encoding
$imageData2 = base64_encode(file_get_contents($image2));

// Format the image SRC:  data:{mime};base64,{data};
$src2 = 'data:'.mime_content_type($image2).';base64,'.$imageData2;  
$imageData3 = base64_encode(file_get_contents($image3));
$src3 = 'data:'.mime_content_type($image3).';base64,'.$imageData3;         

$txt='<div style="font-family: serif; font-size: 11pt;">
<img src="'.$src.'" style="width:100%"><br>

     <b>Our Ref: <i>SLCMC/ADM/'.$intake_month.'/'.$intake_year.'</i></b>            

      <b style="float:right;">Date: '.$approval_date.'</b><br>

     <b>Name: '.$first_name.' '.$second_name.' '.$last_name.'</b><br>

     <b>Admission No: '.$admission.'</b><br><br><br>
 
     <b>RE: <u>LETTER OF ADMISSION</u></b> 

     <p>
       I am pleased to congratulate you on securing a chance at our college for a <b>'.$couese_name.'</b>.  This course runs for <b>three (3)</b> years on full time basis. The reporting date shall be on the <b>'.$report_date.'</b> at <b>8:30 a.m.</b> in company of a guardian responsible for your fees. 
     </p>
     <p>
      Please note that your registration process shall be completed on the admission day upon receipt and verification of the under listed items: 
       </p>
        <ol type="i">
           <li>A copy of a provisional offer letter including the fee structure and all other attachments. </li> 
           <li>Evidence of payment of the commitment fee to secure the slot as was stated in the provisional offer letter. </li> 

          <li>Deposit slip of further payment to clear 50% of the first Instalment of 1st year as stated in the provisional offer letter. </li> 

          <li>Certified copies of National ID (1), KCSE Certificate/ Result Slip (1), High School Leaving Certificate (1), Birth Certificate (1), Baptismal Certificate (1) </li> 

          <li>Springs files (2) and recently taken passport sized photos (2) </li> 

          <li>Original KSCE certificate/Result Slip</li> 

          <li>Copy of medical insurance cover in which you are a beneficiary or contributor. </li> 
   
         <li>Copy of college rules (last page only), Admission Agreement Form, Medical Agreement Form, all signed by both the student and guardian </li> 

        </ol>
   
        <p>Further note all the listed books and personal effects shall be verified.</p>   
 
        <p>We wish you the best of luck in your training with us.</p> 


     <p> Yours faithfully, </p><br><br><br><br><br>
          <img src="'.$src2.'" style="width:100px"> <img src="'.$src3.'" style="width:100px; float:right;"><br>
     <b>JUMA ALFRED</b><br>
     
      <u><b><i>The College Principal</i></b></u>
     
     <br><br><br><br>
     <i style="font-size:0.5em;">This is a system generated document. &copy; Sister Leonella Consolata Medical College 2022. All rights reserved</i>
     </di>';

$dompdf->loadHtml($txt);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('diploma in nursing.pdf',array('Attachment'=>0));

?>
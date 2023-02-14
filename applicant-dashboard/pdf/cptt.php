<?php
include '../includes/student-data.php';
require_once 'dompdf/autoload.inc.php'; //we've assumed that the dompdf directory is in the same directory as your PHP file. If not, adjust your autoload.inc.php i.e. first line of code accordingly.

// reference the Dompdf namespace

use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

//Get user information
$sql="SELECT applicants.applicant_id, courses.course_title, applicants.date_applied, intakes.year, intakes.month, intakes.report_date,applicants.status FROM applicants INNER JOIN courses ON applicants.course_id=courses.course_id INNER JOIN intakes ON applicants.intake_id=intakes.id WHERE applicant_id='$approved_app'";
    $result=mysqli_query($con,$sql) or die(mysql_error());
    while($row=mysqli_fetch_array($result))
               {  
                  $couese_name=$row['course_title'];
                  $intake_month=$row['month'];
                  $intake_year=$row['year'];
                  $report_date=$row['report_date'];
                  $date_applied=$row['date_applied'];
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
// Read image path, convert to base64 encoding
$imageData2 = base64_encode(file_get_contents($image2));

// Format the image SRC:  data:{mime};base64,{data};
$src2 = 'data:'.mime_content_type($image2).';base64,'.$imageData2;          

$txt='<div style="font-family: serif; font-size: 11pt;">
<img src="'.$src.'" style="width:100%"><br>

     <b>Our Ref: <i>SLCMC/ADM/'.$intake_month.'/'.$intake_year.'</i></b>                 

      <b style="float:right;">Date: '.$approval_date.'</b><br>

     <b>Dear: '.$first_name.' '.$second_name.' '.$last_name.'</b><br><br><br>
 
     <b><u>RE: PROVISONAL OFFER LETTER</u></b> 

     <p>
       Following your application and fulfilment of the course requirements, I am pleased to offer you a slot for <b>'.$couese_name.'.</b>  This course runs for <b>(1) year  </b> on full time basis. The reporting date shall be on <b>'.$report_date.'</b> at <b>8:30 a.m.</b> in company or a guardian responsible for your fees. 
     </p>
     <p>
      Please note that this offer is only provisional and is subject to payment of a commitment fee of <b>Ksh. Ksh. 15,100</b> to secure the slot. The deposit slip shall be sent to the college within <b>one month</b>  from the stated date failure to which the chance shall be forfeited without further reference.</p> 

      <p>Further note that once the slot is secured, you will be required to complete your admission process on the admission day upon physical presentation of the following listed items: </p>
        <ol type="i">
           <li>Deposit slip of further payment of Ksh 15,100 to clear 50% of the 1st trimester of 1st year of study.  The rest of the fees shall be paid as scheduled on the fee structure (attached). </li> 
           <li>Certified copies of National ID (1), KCSE Certificate/ Result Slip (1), High School Leaving Certificate (1), Birth Certificate (1), Baptismal Certificate (1). Certification must be done by the commissioner of Oaths/ Magistrate. </li>
           <li>1 Box File, 1 Spring file and recently taken passport sized photos (2) </li>
           <li>Copy of medical insurance cover in which you are a beneficiary or contributor.  </li>
           <li>Personal effects to be used in college (attached) </li>
           <li>Copy of college rules (last page only), Admission Agreement Form and Medical Agreement Form all signed by both the student and guardian.  These forms can be downloaded from the college portal using the email address and password used during application. </li>  

        </ol>
   
        <p>Congratulations on your selection to take up a course in our reputable institution.</p> 
    

     <p> Yours faithfully, </p><br><br><br><br><br>
          <img src="'.$src2.'" style="width:100px"><br>
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
<?php
include '../includes/student-data.php';
$email=$_SESSION['myemail'];
 if($booked_course == 0){
 if(strlen($appr_course) > 0){
  //------------------------------------------------------------------Application received pending booking
   $sql="SELECT applicants.applicant_id, courses.course_id, courses.course_title, applicants.date_applied, intakes.year, intakes.month, applicants.status FROM applicants
   INNER JOIN courses ON applicants.course_id=courses.course_id INNER JOIN intakes ON applicants.intake_id=intakes.id WHERE applicant_id='$approved_app'";
    $result=mysqli_query($con,$sql) or die(mysql_error());
    while($row=mysqli_fetch_array($result))
               {  
                  $couese_name=$row['course_title'];
                  $cid=$row['course_id'];
                  $intake=$row['month'].', '.$row['year'];
                  $date_applied=$row['date_applied'];
                  $status=$row['status'];
                }
?>
<div class="card">
  <div class="card-header">
    <h4 style="color:green">Dear <?php echo  $first_name.',';?></h4>
  </div>
  <div class="card-body">
    <h6 class="card-title">Your application for <b style="color:#17A2B8"><?php echo $couese_name;?></b> for <b><?php echo $intake;?> intake</b> has been Received. </h6>
    <p class="card-text">Kindly download provisional letter below. Read and follow the instructions given therein <b>to book this slot.</b><br><br><b>NOTE:</b><br>This is a competitive process where slots are allocated on first come first served basis</p>
      <?php
         if($cid === '1')
         {
          ?>
          <a href="./pdf/neuphrology.php" class="btn btn-danger" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download Provisional Letter</a>
          <?php
          }
          if($cid === '2')
          {
          ?>
          <a href="./pdf/diploma-nursing.php" class="btn btn-danger" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download Provisional Letter</a><br><br>
           <a href="./pdf/documents/Fees Structure and Other Requirements - Nursing.pdf" class="btn btn-danger" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download Fees Structure & Other Requirements</a>
          <?php
          }
          if($cid === '5')
          {
            ?>
          <a href="./pdf/dptt.php" class="btn btn-danger" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download Provisional Letter</a>
          <?php
          }
          if($cid === '7')
          {
            ?>
          <a href="./pdf/cptt.php" class="btn btn-danger" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download Provisional Letter</a>
          <?php
          }
           if($cid === '3')
          {
            ?>
          <a href="./pdf/midwifery.php" class="btn btn-danger" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download Provisional Letter</a>
          <?php
          }
          ?>
    
   
  </div>
</div>
<?php
 } else {

  //--------------------------check if intake is set
  $ql="SELECT * FROM application_batches WHERE student_id='$id'";
    $re=mysqli_query($con,$ql) or die(mysql_error());
    while($ro=mysqli_fetch_array($re))
               {  
                $bat=$ro['batch_code'];
               }
    if(empty($bat)===true){
         ?>
          <script>
            $("#home-panel").load("widget/set-intake.php");
          </script>
         <?php
      } else {
       
       ?>
       <div class="card">
       <div class="card-header">
          <h6 class="card-title" style="color:green;text-align:center;">&nbsp;&nbsp <span style="float:left;"><i class="fa fa-pencil-square-o"></i> My Applications for <?php echo $intake.' Intake  &nbsp;&nbsp'?></span> &nbsp;&nbsp
                  <?php '#'.$incode;?>
                   <button class="btn btn-outline-primary btn-sm" style="float:right;" id="add-more-course"><i class="fa fa-plus-square" aria-hidden="true"></i> Apply More</button>
                  </h6>
       </div>
       <div class="card-body">
       <?php
        $sqlmy="SELECT applicants.applicant_id, courses.course_title, applicants.date_applied, intakes.year, intakes.month, applicants.status FROM applicants INNER JOIN courses ON applicants.course_id=courses.course_id INNER JOIN intakes ON applicants.intake_id=intakes.id WHERE batch_id='$incode'";
        $resultmy=mysqli_query($con,$sqlmy) or die(mysql_error());
                  ?>
                  
       <div id="table-wrapper">
       <div id="table-scroll">
      <table class="table table-hover table-bordered table-sm">
      <thead>    
       <tr>
       <th>S/N</th>
       <th>Course Title</th>
       <th>Date</th>
       <th>Intake</th>
       <th>Status</th>
       
       </tr>
       </thead>
                  <?php
                  $no=0;
                  while($rowmy=mysqli_fetch_array($resultmy))
                   {   
                    $no++;
                  $couese_name=$rowmy['course_title'];
                   $intake=$rowmy['month'].' '.$rowmy['year'];
                  $date_applied=$rowmy['date_applied'];
                  $status=$rowmy['status'];
                  if ($status==='0') {
                    $status='<b style="color:blue">Pending...<b>';
                  }
                  if ($status==='1') {
                    $status='Approved';
                  }
                  if ($status==='2') {
                    $status='Rejected';
                  }
    
                  
                    ?>
                    <tbody>
            <tr id="tr">
         <td><?php echo $no;?></td> 
         <td><?php echo $couese_name;?></td>
          <td><?php echo $date_applied;?></td>
          <td><?php echo $intake;?></td>
         <td><?php echo $status;?></td>
        
         </tr>
         </tbody>
         
    <?php 


            
      }
      ?>
           </table>
           <?php
         if (empty($any_course) === true) {
            echo "<h6 class='alert alert-info' style='text-align:center;'>No Application Made. Click 'Apply More' above to apply</h6>";
         }
           ?>
           </div>
           </div>
           </div>
           </div>
           <br><br>
              <?php
                   if ( $totalPaid < 1000) {
                    echo "<h6 style='width:100%;text-align:center;'>Kindly pay <b>Kshs ".$balance.".00</b> application fees for your application to be processed.</h6>";
                     ?>
                     <div style="text-align:center;">
                     <img src="./images/mpesa.png" style="height:50px;"><br>
                     
                     <button class="btn btn-primary" id="openSTK" ><i class="fa fa-money"></i> Click Here to Pay</button>
                     </div>
                      <div style="text-align:center;display:none" id="payment-status" >
                          Payment Intiated, Kindly check phone with number <?php echo $phone;?> to complete payment.<br><br>
                          <button class="btn btn-success" id="refresh-payment"><i class="fa fa-refresh"></i>Refresh</button>

                      </div>
                     <?php
                   } else {
                      echo "Payment for this application number ".$incode." has been received your application is under review. Thanks";
                   }
    }
  }
} else {



  //------------------------------------------------------------------------------Course booked
   $sql="SELECT applicants.applicant_id, courses.course_id, courses.course_title, applicants.date_applied, intakes.year, intakes.month, applicants.status FROM applicants
   INNER JOIN courses ON applicants.course_id=courses.course_id INNER JOIN intakes ON applicants.intake_id=intakes.id WHERE applicant_id='$booked_app'";
    $result=mysqli_query($con,$sql) or die(mysql_error());
    while($row=mysqli_fetch_array($result))
               {  
                  $couese_name=$row['course_title'];
                  $cid=$row['course_id'];
                  $intake=$row['month'].', '.$row['year'];
                  $date_applied=$row['date_applied'];
                  $status=$row['status'];
                }
  ?>
   <div class="card">
  <div class="card-header">
    <h4 style="color:green">Congratulations <?php echo  $first_name.'!';?></h4>
  </div>
  <div class="card-body">
    <h6 class="card-title">You have secured <b style="color:#17A2B8"><?php echo $couese_name;?></b> for <b><?php echo $intake;?> intake</b>. </h6>
    <p class="card-text">Kindly download admission letter and Other Requirements documents below. These documents must be presented to college during reporting day.</p>
      <?php
         if($cid === '1')
         {
          ?>
          <a href="./pdf/nephrology-admission.php" class="btn btn-danger" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download Admission Letter</a>
           <br><br>
           <a href="./pdf/documents/admission agreement form - latest.pdf" class="btn btn-outline-danger btn-sm" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Admission Agreemnet Form</a>
           <br><br>
           <a href="./pdf/documents/STUDENTS RULES AND REGULATIONS.pdf" class="btn btn-outline-danger btn-sm" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Rules and Regulations</a>
            <br><br>
           <a href="./pdf/documents/medical agreement form.pdf" class="btn btn-outline-danger btn-sm" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Medical Agreement Form</a>
          <?php
          }
          if($cid === '2')
          {
          ?>
          <a href="./pdf/diploma-nursing-admission.php" class="btn btn-outline-danger btn-sm" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download Admission Letter</a>
          <br><br>
           <a href="./pdf/documents/admission agreement form - latest.pdf" class="btn btn-outline-danger btn-sm" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Admission Agreemnet Form</a>
           <br><br>
           <a href="./pdf/documents/STUDENTS RULES AND REGULATIONS.pdf" class="btn btn-outline-danger btn-sm" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Rules and Regulations</a>
            <br><br>
           <a href="./pdf/documents/medical agreement form.pdf" class="btn btn-outline-danger btn-sm" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Medical Agreement Form</a>
          <?php
          }
          if($cid === '5')
          {
            ?>
          <a href="./pdf/dptt-admission.php" class="btn btn-danger" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download Admission Letter</a>
           <br><br>
           <a href="./pdf/documents/admission agreement form - latest.pdf" class="btn btn-outline-danger btn-sm" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Admission Agreemnet Form</a>
           <br><br>
           <a href="./pdf/documents/STUDENTS RULES AND REGULATIONS.pdf" class="btn btn-outline-danger btn-sm" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Rules and Regulations</a>
            <br><br>
           <a href="./pdf/documents/medical agreement form.pdf" class="btn btn-outline-danger btn-sm" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Medical Agreement Form</a>
          <?php
          }
          if($cid === '7')
          {
            ?>
          <a href="./pdf/cptt-admission.php" class="btn btn-danger" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download Admission Letter</a>
           <br><br>
           <a href="./pdf/documents/admission agreement form - latest.pdf" class="btn btn-outline-danger btn-sm" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Admission Agreemnet Form</a>
           <br><br>
           <a href="./pdf/documents/STUDENTS RULES AND REGULATIONS.pdf" class="btn btn-outline-danger btn-sm" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Rules and Regulations</a>
            <br><br>
           <a href="./pdf/documents/medical agreement form.pdf" class="btn btn-outline-danger btn-sm" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Medical Agreement Form</a>
          <?php
          }
           if($cid === '3')
          {
            ?>
          <a href="./pdf/midwifery-admission.php" class="btn btn-danger" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download Admission Letter</a>
           <br><br>
           <a href="./pdf/documents/admission agreement form - latest.pdf" class="btn btn-outline-danger btn-sm" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Admission Agreemnet Form</a>
           <br><br>
           <a href="./pdf/documents/STUDENTS RULES AND REGULATIONS.pdf" class="btn btn-outline-danger btn-sm" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Rules and Regulations</a>
            <br><br>
           <a href="./pdf/documents/medical agreement form.pdf" class="btn btn-outline-danger btn-sm" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Medical Agreement Form</a>
          <?php
          }
          ?>
    
   
  </div>
</div>
  <?php
}
    ?>      
           <script>
             $(function () {
              $("#add-more-course").click(function(){
                $('#add-more-course').html('<i class="fa fa-pulse fa-refresh"></i> Loading...');
                $("#home-panel").load("widget/course-application-panel.php");

              });
              $("#openSTK").click(function(){
                openSTK();

              });
              
                $("#refresh-payment").click(function(){
                $("#home-panel").load("widget/my-applications.php");

              });
               
             });
    
             function openSTK(){
                 var json = JSON.stringify(['intake']);
                $('#openSTK').html('<i class="fa fa-pulse fa-refresh"></i> Loading...');
                $.post('includes/initiate-stk.php',
                  {
                   data:json
                  },function(data,status){
                     if(data.replace(/\s/g, '') ==='success'){
                         var payBtn = document.getElementById("openSTK");
                         var payStatus = document.getElementById("payment-status");
                
                         payBtn.style.display = 'none';
                         payStatus.style.display = 'block';
                         
                     }else{
                         
                     }
                  }
                  );
             }
           </script>
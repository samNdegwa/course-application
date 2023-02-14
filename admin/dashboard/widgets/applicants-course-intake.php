<?php
include '../core/init.php';
date_default_timezone_set('Africa/Nairobi');
    $now = new DateTime();
    $hrs = $now->format('H');
    $mt = $now->format('i');
    $date = $now->format('Y-m-d');
    $json = $_POST['data'];
    $data = json_decode($json);
    $course_id=$data[0];
    $intake_id=$data[1];
    $intake=$data[2];
    $course_title=$data[3];

?>

  <div class="container-fluid">
<div class="row">
<div class="col-sm-12">
<div class="card">
  <div class="card-header">
    <h5><?php echo $course_title;?> booked applications for <?php echo $intake;?> Intake</h5>
  </div>
  <div class="table-responsive">
  <div class="card-body">
   <table class="table table-bordered">
    <?php
    $sql="SELECT * FROM applicants INNER JOIN students ON applicants.stud_id=students.stud_id INNER JOIN student_admission ON applicants.applicant_id=student_admission.app_id WHERE course_id='$course_id' AND intake_id='$intake_id' AND applicants.status='2' ORDER BY admission_number ASC";
    $result=mysqli_query($con,$sql) or die(mysql_error());
    ?>
    <thead>
      <th style="display:none;">id</th>
      <th>#</th>
      <th>Adm. Number</th>
      <th>Student Name</th>
      <th>Phone Number</th>
  
    </thead>
    <tbody>
     <?php 
      $no=1;
      while($row=mysqli_fetch_array($result))
      { 
        $applicant_id =$row['applicant_id '];
        $second_name=$row['second_name'];
        $first_name=$row['first_name'];
        $last_name=$row['last_name'];
        $email=$row['email'];
        $phone=$row['phone'];
        $admission=$row['admission_number'];

       ?> 
          <tr>
            <td style="display:none;"><?php echo $applicant_id;?></td>
            <td><?php echo $no;?></td>
            <td><?php echo $admission;?></td>
            <td><?php echo $first_name.' '.$second_name.' '.$last_name;?></td>
            <td><?php echo $email;?></td>
            <td><button class="btn btn-info btn-sm" id="open_student" onclick='open_student($(this))'><i class="fa fa-eye-slash" aria-hidden="true"></i></button></td>
           
          </tr> 
      <?php
       $no++;
   }
      
      ?>
    </tbody>
      
    </table>
   
  </div>
  </div>
</div>
</div>
</div>
</div>
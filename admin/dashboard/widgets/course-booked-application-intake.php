<?php
include '../core/init.php';
date_default_timezone_set('Africa/Nairobi');
    $now = new DateTime();
    $hrs = $now->format('H');
    $mt = $now->format('i');
    $date = $now->format('Y-m-d');
    $json = $_POST['data'];
    $data = json_decode($json);
    $intake_id=$data[0];
    $intake=$data[1];

?>

  <div class="container-fluid">
<div class="row">
<div class="col-sm-12">
<div class="card">
  <div class="card-header">
    <h5><b><?php echo $intake;?></b> Booked Applications</h5>
  </div>
  <div class="table-responsive">
  <div class="card-body">
   <table class="table table-bordered">
    <?php
    $sql="SELECT * FROM courses ORDER BY course_id DESC";
    $result=mysqli_query($con,$sql) or die(mysql_error());
    ?>
    <thead>
      <th style="display:none;">id</th>
      <th>#</th>
      <th>Course</th>
      <th>Booked</th>
      <th>Action</th>
  
    </thead>
    <tbody>
     <?php 
      $no=1;
      while($row=mysqli_fetch_array($result))
      { 
        $course_id=$row['course_id'];
        $course_title=$row['course_title'];
       

        $sql1="SELECT * FROM applicants WHERE course_id='$course_id' AND intake_id='$intake_id' AND status='2'";
        $result1=mysqli_query($con,$sql1) or die(mysql_error());
         $apps=0;
        while($row1=mysqli_fetch_array($result1))
         { 
            $coi=$row1['course_id'];
            $apps++;
         }

         if($apps === 0){

         } else {

       ?> 
          <tr>
            <td style="display:none;"><?php echo $course_id;?></td>
            <td style="display:none;"><?php echo $intake_id;?></td>
            <td style="display:none;"><?php echo $intake;?></td>
            <td><?php echo $no;?></td>
            <td><?php echo $course_title;?></td>
            <td><?php echo $apps;?></td>
            <td><button class="btn btn-info btn-sm" id="open_course_applications" onclick='open_course_applications($(this))'><i class="fa fa-eye-slash" aria-hidden="true"></i></button></td>
           
          </tr> 
      <?php
       $no++;
   }
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
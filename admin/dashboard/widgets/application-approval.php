<?php
include '../core/init.php';
date_default_timezone_set('Africa/Nairobi');
    $now = new DateTime();
    $hrs = $now->format('H');
    $mt = $now->format('i');
    $date = $now->format('Y-m-d');
    $json = $_POST['data'];
    $data = json_decode($json);
    $code=$data[0];

    $stud_id;

    $sqlbatch="SELECT * FROM  application_batches WHERE batch_code='$code'";
    $resultbatch=mysqli_query($con,$sqlbatch) or die(mysql_error());
       while($rowb=mysqli_fetch_array($resultbatch))
         { 
             $stud_id=$rowb['student_id'];
         }

 //.......................................................get student details
  $sql11="SELECT * FROM  students WHERE stud_id='$stud_id'";
  $result11=mysqli_query($con,$sql11) or die(mysql_error());
  while($row=mysqli_fetch_array($result11))
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
       }

       if($higher_attachment === 'no')
       {
        $higher_attachment = 'noimage.jpg';
       }

    ?>
 <div class="row">
<div class="col-sm-12">
<div class="card">
  <div class="card-header">
    <h6 class="btn-secondary" style="padding-left:5px;"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> A. Courses Applied (Select Course to Approve)</h6>
  </div>
  <div class="card-body">
  <div class="table-responsive">
  <?php
    $sql="SELECT * FROM applicants INNER JOIN courses ON applicants.course_id=courses.course_id WHERE batch_id='$code'";
    $result=mysqli_query($con,$sql) or die(mysql_error());

  ?>
  <table class="table table-striped table-bordered table-hover table-sm">
    <thead>
    	<tr style="background:#22A4F1;color:white">
        <th style="display:none;">no</th>
    		<th>#</th>
    		<th>Course Name</th>
    		<th>KCSE</th>
    		<th>Others</th>
        <th>Action</th>
    		
    </thead>
    <tbody>
      <?php 
      $no=1;
      while($row=mysqli_fetch_array($result))
      { 
      	?>
        <tr>
          <td style="display:none;"><?php echo $row['applicant_id'];?></td>
        	<td><?php echo $no;?></td>
        	<td><?php echo $row['course_title'];?></td>
        	<td><?php echo $row['min_grade'];?></td>
        	<td><?php echo $row['other_qualities'];?></td>
          <td><button class="btn btn-info btn-sm" id="approve-app" onclick='approve_app($(this))'><i class="fa fa-check" aria-hidden="true"></i></button></td>
        </tr>
      <?php 
      $no++;
      }
       ?>
    	
    </tbody>
  </table>
  <button class="btn btn-danger btn-sm" id="reject-app" onclick="reject_app()" style="float:right;">Reject All</button>
</div>
  </div>
</div>
</div>
</div>



<div class="row">
<div class="col-sm-12">
<div class="card">
  <div class="card-header">
    <h6 class="btn-secondary" style="padding-left:5px;"><i class="fa fa-graduation-cap" aria-hidden="true"></i> B. Academic Details</h6>
  </div>
  <div class="card-body">
  <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col"></th>
      <th>Exam</th>
      <th scope="col">Institution</th>
      <th scope="col">Grade/Marks/Class</th>
      <th scope="col">Year</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Primary</th>
      <td>KCPE</td>
      <td><?php echo $primary_name; ?></td>
      <td><?php echo $primary_marks; ?></td>
      <td><?php echo $kcpeYear; ?></td>
    </tr>
    <tr>
      <th scope="row">Secondary</th>
      <td>KCSE</td>
      <td><?php echo $secondary_name; ?></td>
      <td><?php echo 'Mean:'.$secondary_grade.'<br> (Eng-'.$eng.';Kis-'.$kis.';Mat-'.$mat.';Bio-'.$bio.';Che-'.$che.';Phy-'.$phy.')'; ?></td>
      <td><?php echo $secoYear; ?></td>
    </tr>
     <tr>
      <th scope="row">Post Secondary</th>
      <td><?php echo $post_level;?></td>
      <td><?php echo $tertialyEdu; ?></td>
      <td><?php echo $tertialyGrade; ?></td>
      <td><?php echo $gradYear; ?></td>
    </tr>
  </tbody>
</table>
  
  </div>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="card">
  <div class="card-header">
    <h6 class="btn-secondary" style="padding-left:5px;"><i class="fa fa-file" aria-hidden="true"></i> C. Attachments</h6>
  </div>
  <div class="card-body">
 <div class="row">
 <div class="col-sm-3">
 <h6>Identification</h6>
 <img src="../../applicant-dashboard/uploads/<?php echo $front_id;?>" style="width:150px;" class="zoom">
 </div>	
 <div class="col-sm-1">
 </div>
  <div class="col-sm-3">
  <h6>KCSE Results</h6>
 <img src="../../applicant-dashboard/uploads/<?php echo $kcse_slip;?>" style="width:150px;" class="zoom">
 </div>	
 <div class="col-sm-2">
 </div>
  <div class="col-sm-3">
  <h6>Post Secondary</h6>
 <img src="../../applicant-dashboard/uploads/<?php echo $higher_attachment;?>" style="width:150px;" class="zoom">
 </div>	
 </div>

  </div>
</div>
</div>
</div>


<style>
* {
  box-sizing: border-box;
}

.zoom {
  transition: transform .2s;
  margin: 0 auto;
}

.zoom:hover {
  -ms-transform: scale(2.5); /* IE 9 */
  -webkit-transform: scale(2.5); /* Safari 3-8 */
  transform: scale(2.5);
  position: absolute; 

}
</style>


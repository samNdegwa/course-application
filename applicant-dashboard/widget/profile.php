<?php include '../includes/student-data.php';
date_default_timezone_set('Africa/Nairobi');
    $now = new DateTime();
    $hrs = $now->format('H');
    $mt = $now->format('i');
    $date = $now->format('Y-m-d');
    $time=$now->format('H:i');
if ($gender=='') {
   $gender="---Select---";
 } 
if ($country=='') {
   $country="---Select---";
 } 

?>

<div class="card">
  <div class="card-header">
    <h3><img src="./uploads/<?php echo $passport;?>" height="50px;"> My Profile</h3>
  </div>
  <div class="card-body">
  <div class="row">
<div class="col-sm-12">
<div class="card">
  <div class="card-header">
    <h6 class="btn-secondary" style="padding-left:5px;"><i class="fa fa-user" aria-hidden="true"></i> Personal Details</h6>
  </div>
  <div class="card-body">
  <table class="table">
    <tr>
      <td><b>Name:</b></td><td><?php echo $first_name.' '.$second_name.' '.$last_name;?></td>
    </tr>
     <tr>
      <td><b>Telephone:</b></td><td><?php echo $phone;?></td>
    </tr>
     <tr>
      <td><b>Email:</b></td><td><?php echo $email;?></td>
    </tr>
  </table>
 
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
  </div>
</div>
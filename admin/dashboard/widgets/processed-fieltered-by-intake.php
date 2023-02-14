<?php 
include '../core/init.php';
$json = $_POST['data'];
$data = json_decode($json);

$intake = $data[0];
?>
<div class="container-fluid">
<div class="row">
<div class="col-sm-12">
<div class="card">
  <div class="card-header">
  <div class="row">
    <div class="col-sm-3">
       <b style="float:left;">
    <button class="btn btn-info btn-sm"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Excel</button>
    <button class="btn btn-danger btn-sm"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</button>
    </b>
    </div>
    <div class="col-sm-5">
    <form class="form-inline">
  <div class="form-group">
    <select id="inputIntake" class="form-control">
        <option selected>---Select---</option>
        <?php
         $sq="SELECT * FROM intakes ORDER BY id DESC";
         $res=mysqli_query($con,$sq) or die(mysql_error());
         while($row=mysqli_fetch_array($res))
               {  
                echo "<option value='".$row['id']."'>".$row['month']." ".$row['year']."</option>";
               }
      ?>
      </select>
  </div>
   <span class="btn btn-info" id="searchIntakeApplications"><i class="fa fa-search" aria-hidden="true"></i></span>
  </form>
 
    </div>
    <div class="col-sm-4">
      <b style="float:right;">
    <input type="text" name="search_app" class="form-control" placeholder="Enter Applicant Name to search " onkeyup="searchAppFunction()" id="serach_app"></b>
    </div>
  </div>
  </div>
  <div class="card-body">
  <h5>Approved Applications</h5>
  <div class="table-responsive">
  <?php
    $sql="SELECT * FROM application_batches INNER JOIN students ON application_batches.student_id=students.stud_id INNER JOIN intakes ON application_batches.intake_id=intakes.id INNER JOIN applicants ON applicants.batch_id=application_batches.batch_code INNER JOIN courses ON applicants.course_id=courses.course_id  WHERE applicants.status='1' AND application_batches.intake_id='$intake' ORDER BY applicant_id DESC";
    $result=mysqli_query($con,$sql) or die(mysql_error());

  ?>
  <table class="table table-bordered" id="unpaid_applications">
    <thead>
      <tr>
        <th>#</th>
        <th>Intake</th>
        <th>Application No.</th>
        <th>Applicant Name</th>
        <th>Contact No.</th>
        <th>Course</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $no=1;
      while($row=mysqli_fetch_array($result))
      { 
        ?>
        <tr>
          <td><?php echo $no;?></td>
          <td><?php echo $row['month'].' '.$row['year'];?></td>
          <td><?php echo $row['batch_code'];?></td>
          <td><?php echo $row['first_name'].' '.$row['second_name'].' '.$row['last_name'];?></td>
          <td><?php echo $row['phone'];?></td>
          <td><?php echo $row['course_title'];?></td>
          <td><button class="btn btn-success btn-sm">Admit</button></td>
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



<script>
$(function(){
  $('#searchIntakeApplications').click(function(){
    var intake = document.getElementById("inputIntake").value;
    if(intake === '---Select---'){
     document.getElementById('inputIntake').style.border='1px solid red';
    } else {
      document.getElementById('inputIntake').style.border='1px solid black';
      var json = JSON.stringify([intake]);
      $.post('widgets/processed-fieltered-by-intake.php',
                {
                   data:json
                },function(data,status){
                  //$('#all-main-contents').load('widgets/processed-fieltered-by-intake.php');
                  document.getElementById('all-main-contents').innerHTML=data;
                  });
    }
  });
});

  function searchAppFunction() {
        // Declare variables
        var input, filter, table, tr, td, i;
        input = document.getElementById("serach_app");
        filter = input.value.toUpperCase();
        table = document.getElementById("unpaid_applications");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[3];
          if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";

            } else {
              tr[i].style.display = "none";

            }
          }
        }
      }


</script>

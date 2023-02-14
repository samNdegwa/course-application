<?php include '../core/init.php';?>
<div class="container-fluid">
<div class="row">
<div class="col-sm-12">
<div class="card">
  <div class="card-header">
    <h5><b>Booked Applications</b></h5>
  </div>
  <div class="table-responsive">
  <div class="card-body">
   <table class="table table-bordered">
    <?php
    $sql="SELECT * FROM intakes ORDER BY id DESC";
    $result=mysqli_query($con,$sql) or die(mysql_error());
    ?>
    <thead>
      <th style="display:none;">id</th>
      <th>#</th>
      <th>Intake</th>
      <th>Booked</th>
      <th>Status</th>
      <th>Action</th>
    </thead>
    <tbody>
     <?php 
      $no=1;
      while($row=mysqli_fetch_array($result))
      { 
        $id=$row['id'];
        $year=$row['year'];
        $month=$row['month'];
        $cstatus="<span class='badge badge-danger'>Closed</span>";

        $sql1="SELECT * FROM application_batches WHERE intake_id='$id'";
        $result1=mysqli_query($con,$sql1) or die(mysql_error());
         $apps=0;
        while($row1=mysqli_fetch_array($result1))
         { 
            $inta=$row1['intake_id'];
            $apps++;
         }

        $sql2="SELECT * FROM application_batches WHERE intake_id='$id' AND status='2'";
        $result2=mysqli_query($con,$sql2) or die(mysql_error());
         $approved=0;
        while($row2=mysqli_fetch_array($result2))
         { 
            $inta=$row2['intake_id'];
            $approved++;
         }

        $sql3="SELECT * FROM current_intake WHERE intake_id='$id'";
        $result3=mysqli_query($con,$sql3) or die(mysql_error());
        while($row3=mysqli_fetch_array($result3))
         { 
            $checkStatus=$row3['intake_id'];
         }

         if($id === $checkStatus) {
          $cstatus='<span class="badge badge-info">Runing</span>';
         }
       ?> 
          <tr>
            <td style="display:none;"><?php echo $id;?></td>
            <td><?php echo $no;?></td>
            <td><?php echo $month.' '.$year;?></td>
            <td><?php echo $approved;?></td>
            <td><?php echo $cstatus;?></td>
            <td><button class="btn btn-info btn-sm" id="open_intake_applications" onclick='open_intake_applications($(this))'><i class="fa fa-eye-slash" aria-hidden="true"></i></button></td>
           
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
      $('#open_intake_applications').submit(function(e){
        open_intake_applications();
      }); 
       $('#open_course_applications').submit(function(e){
        open_course_applications();
      }); 
      
     });

   function open_intake_applications(btn){
     var tr = $(btn).parent().parent();
     var intakeId = $(tr).children('td:eq(0)').html();
     var intake = $(tr).children('td:eq(2)').html();

     var json = JSON.stringify([intakeId,intake]);
         $.post('widgets/course-booked-application-intake.php',
                {
                   data:json
                },function(data,status){
                    document.getElementById("all-main-contents").innerHTML=data;
              });
   }

   function open_course_applications(btn){
     var tr = $(btn).parent().parent();
     var course_id = $(tr).children('td:eq(0)').html();
     var intake_id = $(tr).children('td:eq(1)').html();
     var intake = $(tr).children('td:eq(2)').html();
     var course_title = $(tr).children('td:eq(4)').html();

     var json = JSON.stringify([course_id,intake_id,intake,course_title]);
       $.post('widgets/applicants-course-intake.php',
                {
                   data:json
                },function(data,status){
                    document.getElementById("all-main-contents").innerHTML=data;
              });
   }
</script>


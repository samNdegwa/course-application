<?php include '../core/init.php';?>
<div class="container-fluid">
<div class="row">
<div class="col-sm-12">
<div class="card">
  <div class="card-header">
    <h5><b>Intakes</b><b style="float:right;"><button class="btn btn-secondary btn-sm" id="intakeRefresh"><i class="fa fa-refresh" aria-hidden="true"></i></button><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#intakeModal">Creat New</button></b></h5>
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
      <th>Applications</th>
      <th>Approved</th>
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

        $sql2="SELECT * FROM application_batches WHERE intake_id='$id' AND status='1'";
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
            <td><?php echo $apps;?></td>
            <td><?php echo $approved;?></td>
            <td><?php echo $cstatus;?></td>

            <?php
              if($id === $checkStatus) {
                 ?>
                  <td><button class="btn btn-danger btn-sm" id="close-intake" onclick='close_intake($(this))'><i class="fa fa-times-circle" aria-hidden="true"></i></button></td>
                 <?php
              } else {
                ?>
                  <td><button class="btn btn-success btn-sm" id="open-intake" onclick='open_intake($(this))'><i class="fa fa-folder-open" aria-hidden="true"></i></button></td>
                <?php
              }
            ?>
           
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

<!--create intake Modal -->
<div class="modal fade" id="intakeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
        Create New Intake  
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
   <div class="form-group row">
    <label for="staticEmail" class="col-sm-3 col-form-label">Month</label>
    <div class="col-sm-9">
      <select class="form-control" id="intake-month">
        <option>---Select----</option>
        <option>January</option>
        <option>February</option>
        <option>March</option>
        <option>April</option>
        <option>May</option>
        <option>June</option>
        <option>July</option>
        <option>August</option>
        <option>September</option>
        <option>October</option>
        <option>November</option>
        <option>December</option>
      </select>
    </div>
    </div>
   <div class="form-group row">
    <label for="staticEmail" class="col-sm-3 col-form-label">Year</label>
    <div class="col-sm-9">
      <select class="form-control" id="intake-year">
        <option>---Select---</option>
        <option>2022</option>
        <option>2023</option>
        <option>2024</option>
      </select>
    </div>
  </div>
  </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-primary" id="save_intake"><i class="fa fa-floppy-o" aria-hidden="true"></i>  Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
   $(function(){
      $('#close-intake').submit(function(e){
        close_intake();
      }); 

      $('#open-intake').submit(function(e){
        open_intake();
      }); 

      $('#save_intake').click(function(){
        submit_intake();
      });

      $('#intakeRefresh').click(function(){
         $('#all-main-contents').load('widgets/view-intakes.php');
      }); 
      
     });

   function close_intake(btn){
      var tr = $(btn).parent().parent();
    var intake_id = $(tr).children('td:eq(0)').html();
    var intake_name = $(tr).children('td:eq(2)').html();

    if (confirm("Are you sure you want to close "+intake_name+" intake?")) {
      var json = JSON.stringify([intake_id,intake_name]);
          $.post('functions/close_intake.php',
                {
                   data:json
                },function(data,status){
                   if (data === 'success') {
                    $('#intakeModal').modal('hide');
                  Toastify({ 
                    text: "Success!\n "+intake_name+" intake closed successifully",
                    duration: 2000,
                    className: "primary",
                   style: {
                       background: "linear-gradient(to right, #00b09b, #96c93d)",
                     }
                }).showToast();

                   } else {
                    $('#intakeModal').modal('hide');
                     Toastify({ 
                    text: "Error!\n Unable to close Intake. Check your internet connection",
                    duration: 6000,
                    className: "primary",
                   style: {
                       background: "linear-gradient(to right, #E64134, #96c93d)",
                     }
                }).showToast();
                   }
            
                  });

    } else {

    }
   }

    function open_intake(btn){
    var tr = $(btn).parent().parent();
    var intake_id = $(tr).children('td:eq(0)').html();
    var intake_name = $(tr).children('td:eq(2)').html();

    if (confirm("Are you sure you want to open "+intake_name+" intake?\n This will allow applications for this intake")) {
      var json = JSON.stringify([intake_id,intake_name]);
          $.post('functions/open_intake.php',
                {
                   data:json
                },function(data,status){
                   if (data === 'success') {
                    $('#intakeModal').modal('hide');
                  Toastify({ 
                    text: "Success!\n "+intake_name+" intake opened successifully",
                    duration: 2000,
                    className: "primary",
                   style: {
                       background: "linear-gradient(to right, #00b09b, #96c93d)",
                     }
                }).showToast();

                   } else {
                    $('#intakeModal').modal('hide');
                     Toastify({ 
                    text: "Error!\n Unable to open Intake. Check your internet connection",
                    duration: 6000,
                    className: "primary",
                   style: {
                       background: "linear-gradient(to right, #E64134, #96c93d)",
                     }
                }).showToast();
                   }
            
                  });

    } else {

    }
   }

   function submit_intake(){
     var month = document.getElementById("intake-month").value;
     var year = document.getElementById("intake-year").value;
     
     if(month === '---Select----'){
        document.getElementById('intake-month').style.border='1px solid red';
     } else {
      if(year === '---Select---'){
        document.getElementById('intake-month').style.border='1px solid grey';
         document.getElementById('intake-year').style.border='1px solid red';
      } else {
          var json = JSON.stringify([month,year]);
          $.post('functions/submit-new-intake.php',
                {
                   data:json
                },function(data,status){
                   if (data === 'success') {
                    $('#intakeModal').modal('hide');
                  Toastify({ 
                    text: "Success!\n Intake created successifully",
                    duration: 2000,
                    className: "primary",
                   style: {
                       background: "linear-gradient(to right, #00b09b, #96c93d)",
                     }
                }).showToast();

                   } else {
                    $('#intakeModal').modal('hide');
                     Toastify({ 
                    text: "Error!\n Unable to create Intake. Check your internet connection",
                    duration: 6000,
                    className: "primary",
                   style: {
                       background: "linear-gradient(to right, #E64134, #96c93d)",
                     }
                }).showToast();
                   }
            
                  });
      }
     }
   }
</script>

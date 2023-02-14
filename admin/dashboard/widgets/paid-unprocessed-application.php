<?php include '../core/init.php';?>
<div class="container-fluid">
<div class="row">
<div class="col-sm-12">
<div class="card">
  <div class="card-header">
    <h6>Paid Unprocessed Applications<b style="float:right;"><input type="text" name="search_app" class="form-control" placeholder="Enter Application No. " onkeyup="searchAppFunction()" id="serach_app"></b></h6>
  </div>
  <div class="card-body">
  <div class="table-responsive">
  <?php
    $sql="SELECT * FROM application_batches INNER JOIN students ON application_batches.student_id=students.stud_id WHERE payment='1' AND status='0'";
    $result=mysqli_query($con,$sql) or die(mysql_error());

  ?>
  <table class="table table-bordered" id="unpaid_applications">
    <thead>
    	<tr>
      <td style="display:none;"></td>
    		<th>#</th>
    		<th>Application No.</th>
    		<th>Applicant Name</th>
    		<th>Contact No.</th>
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
        <td style="display:none;"><?php echo $row['passport'];?></td>
        	<td><?php echo $no;?></td>
        	<td><?php echo $row['batch_code'];?></td>
        	<td><?php echo $row['first_name'].' '.$row['second_name'].' '.$row['last_name'];?></td>
        	<td><?php echo $row['phone'];?></td>
        	<td>
        	<button class="btn btn-info btn-sm" title="View Application" id="view-unpaid-apps" data-toggle="modal" data-target="#unpaidModal" onclick='view_unpaid($(this))'><i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
        	<button class="btn btn-danger btn-sm" title="Delete Application"><i class="fa fa-trash" aria-hidden="true"></i></button>
        	</td>
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


<!--View Modal -->
<div class="modal fade" id="unpaidModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <b id="app_pass"></b>
       
        <b id="app_name"></b>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; # 
        <b id="app_code"></b>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Status: <span class="badge badge-secondary">Unprocessed</span>
        		
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="unpaid-content">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
	 $(function(){
      $('#view-unpaid-apps').submit(function(e){
        view_unpaid();
      });
       $('#pay-apps').submit(function(e){
        pay_application();
      });

      $('#approve-app').submit(function(e){
        approve_app();
      });

      $('#reject-app').submit(function(e){
        reject_app();
      });
     });

     function view_unpaid(btn){
     	 var tr = $(btn).parent().parent();
          var img = $(tr).children('td:eq(0)').html();
         var code = $(tr).children('td:eq(2)').html();
         var name = $(tr).children('td:eq(3)').html();
         
         document.getElementById("app_pass").innerHTML = '<img src="../../applicant-dashboard/uploads/'+img+'" style="width:50px;" class="rounded-circle">'
         document.getElementById("app_code").innerHTML = code;
         document.getElementById("app_name").innerHTML = name;
         var json = JSON.stringify([code]);
         $.post('widgets/application-approval.php',
                {
                   data:json
                },function(data,status){
                    document.getElementById("unpaid-content").innerHTML=data;
                  });
     }
  function reject_app(){
    alert('Sorry! This action is under construction')
  }   

  function approve_app(btn) {
    var tr = $(btn).parent().parent();
    var id = $(tr).children('td:eq(0)').html();
    var course = $(tr).children('td:eq(2)').html();
    var json = JSON.stringify([id,course]);

     if (confirm("Are you sure you want to approve "+course+"?")) {
       $('#unpaidModal').modal('hide');
      $('#view-unpaid-apps').html('<i class="fa fa-pulse fa-refresh"></i> Aproving... '); 
         $.post('functions/application-approval-submission.php',
                {
                   data:json
                },function(data,status){
                   if (data === 'success') {
                    $('#view-unpaid-apps').html('<i class="fa fa-check" aria-hidden="true"></i> Aproved');
                   Toastify({ 
                    text: "Success!\n Application approved successifully",
                    duration: 6000,
                    className: "primary",
                   style: {
                       background: "linear-gradient(to right, #00b09b, #96c93d)",
                     }
                }).showToast();
                   } else {
                    $('#view-unpaid-apps').html('<i class="fa fa-thumbs-up" aria-hidden="true"></i>');
                    Toastify({ 
                    text: "Error!\n Unable to aprove. Check your internet connection",
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

      function searchAppFunction() {
        // Declare variables
        var input, filter, table, tr, td, i;
        input = document.getElementById("serach_app");
        filter = input.value.toUpperCase();
        table = document.getElementById("unpaid_applications");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[2];
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
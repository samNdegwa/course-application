<?php include '../core/init.php';?>
<div class="container-fluid">
<div class="row">
<div class="col-sm-12">
<div class="card">
  <div class="card-header">
  <div class="row">
    <div class="col-sm-3">
       <b style="float:left;">
    <button class="btn btn-info btn-sm" id="dataExport"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Excel</button>
    <button class="btn btn-danger btn-sm"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</button>
    </b>
    </div>
    <div class="col-sm-4">
    <form >
  <div class="form-group">
    <input type="text" name="search_app" class="form-control" placeholder="Enter Applicant Name to search" onkeyup="searchByIntake()" id="inputIntake">
  </div>
  </form>
 
    </div>
    <div class="col-sm-5">
    <input type="text" name="search_app" class="form-control" placeholder="Search By Intake e.g January 2022" onkeyup="searchAppFunction()" id="serach_app">
    </div>
  </div>
  </div>
  <div class="card-body">
  <h5>Approved Applications</h5>
  <div class="table-responsive">
  <?php
    $sql="SELECT * FROM application_batches INNER JOIN students ON application_batches.student_id=students.stud_id INNER JOIN intakes ON application_batches.intake_id=intakes.id INNER JOIN applicants ON applicants.batch_id=application_batches.batch_code INNER JOIN courses ON applicants.course_id=courses.course_id  WHERE applicants.status='1' ORDER BY applicant_id DESC";
    $result=mysqli_query($con,$sql) or die(mysql_error());

  ?>
  <table class="table table-bordered" id="unpaid_applications">
    <thead>
    	<tr>
      <td style="display:none;"></td>
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
        
        $app_id = $row['applicant_id'];
        $full_name = $row['first_name'].' '.$row['second_name'].' '.$row['last_name'];
        $coursee=$row['course_title'];
        $app_batch_code=$row['batch_code'];
      	?>
        <tr>
        <td style="display:none;"><?php echo $row['passport'];?></td>
        	<td><?php echo $no;?></td>
          <td><?php echo $row['month'].' '.$row['year'];?></td>
        	<td><?php echo $app_batch_code;?></td>
        	<td><?php echo $full_name;?></td>
        	<td><?php echo $row['phone'];?></td>
        	<td><?php echo $coursee;?></td>
          <td><button class="btn btn-success btn-sm"  id="book-apps" data-toggle="modal" data-target="#bookModal" onclick='book_application($(this))'>Book</button></td>
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
<div class="modal fade" id="bookModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <b id="app_pass"></b>
       
        <b id="app_name"></b>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; # 
        <b id="app_code"></b>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Status: <span class="badge badge-secondary">Waiting Booking</span>
            
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
$(document).ready(function() {
   $('#book-apps').submit(function(e){
        book_application();
      });

   $('#send-booking').submit(function(e){
        send_booking();
      });
    $('#reject-application').submit(function(e){
        reject_application();
      });

  $('#dataExport').click(function() {
   var exportType = $(this).data('excel');   
    $('#unpaid_applications').tableExport({
      type : exportType,      
      escape : 'false',
      ignoreColumn: [6]
    }); 
  });
});
function book_application(btn){
       var tr = $(btn).parent().parent();
          var img = $(tr).children('td:eq(0)').html();
         var code = $(tr).children('td:eq(3)').html();
         var name = $(tr).children('td:eq(4)').html();
         
         document.getElementById("app_pass").innerHTML = '<img src="../../applicant-dashboard/uploads/'+img+'" style="width:50px;" class="rounded-circle">'
         document.getElementById("app_code").innerHTML = code;
         document.getElementById("app_name").innerHTML = name;
         var json = JSON.stringify([code]);
         $.post('widgets/application-booking.php',
                {
                   data:json
                },function(data,status){
                    document.getElementById("unpaid-content").innerHTML=data;
                  });
     }

     function send_booking(code,appId,cos,cos_id){

     if (confirm("Are you sure you want to Book Application number "+code+"?")) {
      var json = JSON.stringify([code,appId,cos,cos_id]);
         $.post('functions/book-slot.php',
                {
                   data:json
                },function(data,status){
                 
                     if (data.replace(/^\s+|\s+$/gm,'') === 'success') {
                    $('#view-unpaid-apps').html('<i class="fa fa-check" aria-hidden="true"></i> Aproved');
                   Toastify({ 
                    text: "Success!\n "+cos+" for application number "+code+" booked succesifully",
                    duration: 6000,
                    className: "primary",
                   style: {
                       background: "linear-gradient(to right, #00b09b, #96c93d)",
                     }
                }).showToast();
                   } else {
                    $('#view-unpaid-apps').html('<i class="fa fa-thumbs-up" aria-hidden="true"></i>');
                    Toastify({ 
                    text: "Error!\n Unable to book. Check your internet connection",
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

     function reject_application(){
      alert('Oops! This action is under construction')
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

    function searchByIntake() {
       // Declare variables
        var input, filter, table, tr, td, i;
        input = document.getElementById("inputIntake");
        filter = input.value.toUpperCase();
        table = document.getElementById("unpaid_applications");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[4];
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
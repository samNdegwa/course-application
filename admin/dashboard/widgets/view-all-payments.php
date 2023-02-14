<?php include '../core/init.php';?>
<div class="container-fluid">
<div class="row">
<div class="col-sm-12">
<div class="card">
  <div class="card-header">
  <h5>All Payments

  <b style="float:right;">
  <button class="btn btn-info" id="dataExport"><i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
  <button class="btn btn-danger"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></button>
  </b>
  <b style="float:right;">
  <input type="text" name="search_app" class="form-control" placeholder="Enter # to serach " onkeyup="searchAppFunction()" id="serach_app">
  </b>
  </h5>
  </div>
  <div class="table-responsive">
  <div class="card-body">
    <table class="table table-bordered" id="all-payments-table">
    <?php
    $sql="SELECT * FROM  payments ORDER BY id DESC";
    $result=mysqli_query($con,$sql) or die(mysql_error());
    ?>
    <thead>
      <th style="display:none;">id</th>
      <th>#</th>
      <th>Mode</th>
      <th>Reference</th>
      <th>Amount</th>
      <th>Date</th>
      <th>Action</th>
    </thead>
    <tbody>
     <?php 
      $no=1;
      while($row=mysqli_fetch_array($result))
      { 
        $batch_code=$row['batch_code'];
        $mode=$row['mode'];
        $reference=$row['reference'];
        $amount=$row['amount'];
        $date=$row['date'];

        ?>
         <tr>
           <td style="display:none;"></td>
           <td><?php echo $batch_code;?></td>
           <td><?php echo $mode;?></td>
           <td><?php echo $reference;?></td>
           <td><?php echo $amount;?></td>
           <td><?php echo $date;?></td>
           <td>
           <button class="btn btn-info btn-sm"><i class="fa fa-wrench" aria-hidden="true"></i></button>
           <button class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
           </td>
         </tr>
        <?php
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
$(document).ready(function() {

  $('#dataExport').click(function() {
   var exportType = $(this).data('excel');   
    $('#all-payments-table').tableExport({
      type : exportType,      
      escape : 'false',
      ignoreColumn: [0]
    }); 
  });
});

   function searchAppFunction() {
        // Declare variables
        var input, filter, table, tr, td, i;
        input = document.getElementById("serach_app");
        filter = input.value.toUpperCase();
        table = document.getElementById("all-payments-table");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[0];
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

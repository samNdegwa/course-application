<?php
include '../includes/student-data.php';
	$json = $_POST['data'];
	$data = json_decode($json);

	$length = count($data);

  
  // $whatIWant = substr($str, strpos($str, "-") + 1);
  // $length = count($data);
  // echo $length.' , '.$data[1].' , '.strtok($str, '-').' , '.$whatIWant;

?>
<div class="table-responsive">
  <table class="table table-bordered" id="table_application">
    <thead>
    <tr>
      <th style="display:none;">id</th>
      <th>#</th>
      <th>Course Applied</th>
      <th><i class="fa fa-trash" aria-hidden="true"></i></th>
    </tr>
  </thead>
  <tbody>
  <?php
   $no=1;
   for($i=0;$i<$length;$i++)
   {
   $str = $data[$i];
	$co_id = strtok($str, '-');
	$theCourse = substr($str, strpos($str, "-") + 1);
  ?>
    <tr>
      <td style="display:none;"><?php echo $co_id;?></td>
      <td><?php echo $no;?></td>
      <td><?php echo $theCourse;?></td>
      <td><span class="btn btn-danger btn-sm" onclick='application_remove($(this))' id="remove-application"><i class="fa fa-trash" aria-hidden="true"></i></span></td>
    </tr>
   <?php
    $no++;
     }
   ?>
  </tbody>
  </table>
 <!--   -->

 <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">
  <i class="fa fa-paper-plane" aria-hidden="true"></i> Submit Application
</button>

<!-- <button type="button" class="btn btn-primary btn-sm" id="back-to-application">
  <i class="fa fa-cart-plus" aria-hidden="true"></i> Select More
</button> -->
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header btn-info">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to submit this application?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-close" aria-hidden="true"></i> No</button>
        <button class="btn btn-success btn-sm" onclick="submit_applications()" id="submit-applied-courses"><i class="fa fa-floppy-o" aria-hidden="true"></i> Yes</button>
      </div>
    </div>
  </div>
</div>


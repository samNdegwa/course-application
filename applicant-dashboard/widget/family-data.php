<?php include '../includes/student-data.php'; 
if ($p_marital_status=='') {
  $p_marital_status="---Select---";
}
if ($p_physical_status=='') {
  $p_physical_status="---Select---";
}
?>
<form action="" method="POST" id="family-data-form">
<div class="row">
<div class="col-sm-12">
<div>
<h4 class="btn btn-info" style="width:100%">SECTION B: Family Data</h4>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6">

 <div class="form-group">
   <label>Parent Marital Status</label>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-male"></i></div>
  </span>
  <select class="form-control" name="marital" id="marital">
    <option><?php echo $p_marital_status;?></option>
    <option>Singer Parent</option>
    <option>Married Parent</option>
  </select>

  </div>
  </div>

  <div class="form-group">
   <label>Mother Name </label>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-user"></i></div>
  </span>
  <input type="text"  name="motherName" class="form-control" placeholder="Mother Name...." required=""  value="<?php echo $mother_name; ?>" id="mother-name">

  </div>
  </div>


  <div class="form-group">
   <label>Father Name (if Available) </label>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-user"></i></div>
  </span>
  <input type="text"  name="fatherName" class="form-control" placeholder="fatherName..." value="<?php echo $father_name;?>" id="father-name">

  </div>
  </div>

</div>



  


<!-- Colum two -->
<div class="col-sm-6">
<div class="form-group">
   <label>Parent Physical Status </label>
  <div class="input-group ">
<span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-th"></i></div>
  </span>
  <select class="form-control" name="physicalStatus" id="physical-status">
    <option><?php echo $p_physical_status; ?></option>
    <option>Both Parent Alive</option>
    <option>One Parent Dead</option>
    <option>Both Parent Dead</option>
    <option>Not Applicable</option>
  </select>

  </div>
  </div>

  <div class="form-group">
   <label>Mother Phone Number * </label>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-phone"></i></div>
  </span>
  <input type="text"  name="motherPhone" class="form-control" placeholder="Mother" required="" value="<?php echo $mother_phone; ?>" id="mother-phone">

  </div>
  </div>

  <div class="form-group">
   <label>Father Phone Number </label>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-phone"></i></div>
  </span>
 <input type="text"  name="fatherPhone" class="form-control" placeholder="Father Phone Number...." required=""  value="<?php echo $father_phone; ?>" id="father-phone">

  </div>
  </div>


	
</div>
	
</div>
<div class="row">
<div class="col-sm-12">
<h6> If No Parent alive, Kindly provide your gurdian/sponsor details below</h6>
</div>
</div>
<div class="row">
<div class="col-sm-6">
 <div class="form-group">
   <label>Gurdian/Sponsor Name </label>
  <div class="input-group ">
<span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-user"></i></div>
  </span>
 <input type="text"  name="sponsor" class="form-control" placeholder="Gurdian/Sponsor Name...." required=""  value="<?php echo $sponsor_name; ?>" id="sponsor">

  </div>
  </div>
</div>
  <div class="col-sm-6">
   <div class="form-group">
   <label>Gurdian/Sponsor Phone </label>
  <div class="input-group ">
<span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-phone"></i></div>
  </span>
 <input type="text"  name="sponsorPhone" class="form-control" placeholder="Gurdian/Sponsor Phone Number...." required=""  value="<?php echo $sponsor_phone; ?>" id="sponsorPhone">

  </div>
  </div>

   <h1> <button class="btn btn-info" ><span class="fa fa-send-o"></span> Submit</button></h1><br><br>

</div>
</div>
</form>
<script>
  $(document).ready(function(){
      $('#family-data-form').submit(function(e){
        e.preventDefault();
        familyData();
      });
     });

     function familyData(){
       var marital = $("#marital").val();
       var motherName = $("#mother-name").val();
       var fatherName = $("#father-name").val();
       var physical = $("#physical-status").val();
       var motherPhone = $("#mother-phone").val();
       var fatherPhone = $("#father-phone").val();
        var sponsor = $("#sponsor").val();
       var sponsorPhone = $("#sponsorPhone").val();

       var json = JSON.stringify([marital,motherName,fatherName,physical,motherPhone,fatherPhone,sponsor,sponsorPhone]);
       $('#family-data-form button').html('<i class="fa fa-pulse fa-refresh"></i> Submitting...');
          $.post('includes/family-data.php',
          {
            data:json
          },function(data,status){
            
             if(data ==='success'){
              $('#family-data-form button').html('<i class="fa fa-pulse fa-refresh"></i> Redirecting... ');
              alert("Congratulation! You have successifully filled family data.Fill your academic data here.");
              document.location.href='./';
             }
             if (data === 'error')
             {
                alert("Ooops! Unable to submit data.\ncheck your network connection and try again");
                 $('#family-data-form button').html('<i class="fa fa-send-o"></i> Submit');
             }
            
          }
          );
     }
</script>
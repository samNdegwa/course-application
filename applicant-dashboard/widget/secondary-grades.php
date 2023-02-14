<?php include '../includes/student-data.php'; 
?>
<form action="" method="POST" id="secondary-school-grades-form">
<div class="row">
<div class="col-sm-12">
<div>
<h4 class="btn btn-info" style="width:100%">SECTION C: Secondary School Subjects' Grades</h4>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-4">
<div class="form-group">
   <label>English </label>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-adn"></i></div>
  </span>
  <select class="form-control" id="eng" required="">
    <option><?php echo $eng; ?></option>
    <option>A</option>
    <option>A-</option>
    <option>B+</option>
    <option>B</option>
    <option>B-</option>
    <option>C+</option>
    <option>C</option>
    <option>C-</option>
    <option>D+</option>
    <option>D</option>
    <option>D-</option>
    <option>E</option>
  </select>

  </div>
  </div>
</div>
<div class="col-sm-4">
<div class="form-group">
   <label>Kiswahili </label>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-adn"></i></div>
  </span>
  <select class="form-control" id="kis" required="">
     <option><?php echo $kis; ?></option>
    <option>A</option>
    <option>A-</option>
    <option>B+</option>
    <option>B</option>
    <option>B-</option>
    <option>C+</option>
    <option>C</option>
    <option>C-</option>
    <option>D+</option>
    <option>D</option>
    <option>D-</option>
    <option>E</option>
  </select>

  </div>
  </div>
</div>
<div class="col-sm-4">
  <div class="form-group">
   <label>Mathematics </label>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-adn"></i></div>
  </span>
  <select class="form-control" id="mat" required="">
    <option><?php echo $mat; ?></option>
    <option>A</option>
    <option>A-</option>
    <option>B+</option>
    <option>B</option>
    <option>B-</option>
    <option>C+</option>
    <option>C</option>
    <option>C-</option>
    <option>D+</option>
    <option>D</option>
    <option>D-</option>
    <option>E</option>
  </select>

  </div>
  </div>
</div>
</div>

<div class="row">
<div class="col-sm-4">
 <div class="form-group">
   <label>Biology </label>
  <div class="input-group ">
 <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-adn"></i></div>
  </span>
  <select class="form-control" id="bio" required="">
    <option><?php echo $bio; ?></option>
    <option>A</option>
    <option>A-</option>
    <option>B+</option>
    <option>B</option>
    <option>B-</option>
    <option>C+</option>
    <option>C</option>
    <option>C-</option>
    <option>D+</option>
    <option>D</option>
    <option>D-</option>
    <option>E</option>
    <option>Not Applicable</option>
  </select>

  </div>
  </div>
</div>
<div class="col-sm-4">
<div class="form-group">
   <label>Chemistry </label>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-adn"></i></div>
  </span>
  <select class="form-control" id="che" required="">
     <option><?php echo $che; ?></option>
    <option>A</option>
    <option>A-</option>
    <option>B+</option>
    <option>B</option>
    <option>B-</option>
    <option>C+</option>
    <option>C</option>
    <option>C-</option>
    <option>D+</option>
    <option>D</option>
    <option>D-</option>
    <option>E</option>
    <option>Not Applicable</option>
  </select>

  </div>
  </div>
</div>
<div class="col-sm-4">
<div class="form-group">
   <label>Physics </label>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-adn"></i></div>
  </span>
  <select class="form-control" id="phy" required="">
     <option><?php echo $phy; ?></option>
    <option>A</option>
    <option>A-</option>
    <option>B+</option>
    <option>B</option>
    <option>B-</option>
    <option>C+</option>
    <option>C</option>
    <option>C-</option>
    <option>D+</option>
    <option>D</option>
    <option>D-</option>
    <option>E</option>
    <option>Not Applicable</option>
  </select>

  </div>
  </div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
  <h1 style="text-align:center;"><button class="btn" style="background:#428bca;color:white;width:100px;" ><span class="fa fa-send-o"></span> Submit</button></h1><br><br>
</div>
  
</div>
</form>
<script>
   $(document).ready(function(){
      $('#secondary-school-grades-form').submit(function(e){
        e.preventDefault();
        gradesData();
      });
     });

     function gradesData(){
      var eng = $("#eng").val();
      var kis = $("#kis").val();
      var mat = $("#mat").val();
      var che = $("#che").val();
      var phy = $("#phy").val();
      var bio = $("#bio").val();
      var geo = $("#geo").val();
      var his = $("#his").val();
      var rel = $("#rel").val();
      var agr = $("#agr").val();
      var bst = $("#bst").val();
      var other = $("#other").val();

      var json = JSON.stringify([eng,kis,mat,che,phy,bio,geo,his,rel,agr,bst,other]);
      $('#secondary-school-grades-form button').html('<i class="fa fa-pulse fa-refresh"></i> Submitting...');
          $.post('includes/grades-data.php',
          {
            data:json
          },function(data,status){
            
             if(data ==='success'){
              $('#secondary-school-grades-form button').html('<i class="fa fa-pulse fa-refresh"></i> Redirecting... ');
              
              document.location.href='./';
             }
             if (data === 'error')
             {
                alert("Ooops! Unable to submit data.\ncheck your network connection and try again");
                 $('#secondary-school-grades-form button').html('<i class="fa fa-send-o"></i> Submit');
             }
            
          }
          );
     }
</script>
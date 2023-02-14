<?php include '../includes/student-data.php'; 
date_default_timezone_set('Africa/Nairobi');
    $now = new DateTime();
    $year = $now->format('Y');
if (empty($secondary_grade)===true) {
  $secondary_grade="---Select---";
}
?>
<form action="" method="POST" id="acadamic-data-form">
<div class="row">
<div class="col-sm-12">
<div>
<h4 class="btn btn-info" style="width:100%">SECTION B: Academic Details</h4>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-4">
<div class="form-group">
   <label>Primary School Attended </label>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-university"></i></div>
  </span>
  <input type="text"  name="primarySchool" class="form-control" placeholder="Primary School...." required="" value="<?php echo $primary_name;?>" id="primary-name" >

  </div>
  </div>

</div>
<div class="col-sm-4">
<div class="form-group">
   <label>KCPE Year </label>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-university"></i></div>
  </span>
  <input type="number"  name="primaryYear" class="form-control" required="" value="<?php echo $kcpeYear;?>" id="primary-year">

  </div>
  </div>

</div>
<div class="col-sm-4">
<div class="form-group">
   <label>KCPE Marks </label>
  <div class="input-group ">
 <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-th"></i></div>
  </span>
  <input type="number"  name="primaryMarks" class="form-control"  required="" value="<?php echo $primary_marks;?>" id="primary-marks">

  </div>
  </div>
</div> 
</div>
<!-- .....................................................row ends -->

<div class="row">
<div class="col-sm-4">
 <div class="form-group">
   <label>Secondary School Attended </label>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-university"></i></div>
  </span>
  <input type="text"  name="secondarySchool" class="form-control" placeholder="Secondary School...." required="" value="<?php echo $secondary_name;?>" id="seco-name">

  </div>
  </div>
</div>
<div class="col-sm-4">
<div class="form-group">
   <label>KCSE Year </label>
  <div class="input-group ">
 <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-calendar-o"></i></div>
  </span>
  <input type="number"  name="secondaryYear" class="form-control"  required="" value="<?php echo  $secoYear;?>" id="secondaryYear">

  </div>
  </div>
</div>
<div class="col-sm-4">
<div class="form-group">
   <label>KCSE Mean Grades </label>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-graduation-cap"></i></div>
  </span>
  <select class="form-control" id="seco-grade">
    <option><?php echo $secondary_grade; ?></option>
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
<!-- .....................................................row ends -->

<div class="row">
<div class="col-sm-12">
   <div class="form-group">
   <label>Post Secondary Education Level (If any)</label>
  <div class="input-group ">
 <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-graduation-cap"></i></div>
  </span>
  <input type="text"  name="postLevel" class="form-control" placeholder="e.g Certificate in Theatre Technology" value="<?php echo $post_level;?>" id="postLevel">

  </div>
  </div>
</div>
</div>

<div class="row">
<div class="col-sm-4">
 <div class="form-group">
   <label>Post Secondary Attended </label>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-university"></i></div>
  </span>
  <input type="text"  name="tertialyEdu" class="form-control" placeholder="Name of Institution attended" value="<?php echo  $tertialyEdu;?>" id="tertialyEdu">

  </div>
  </div>
</div>
<div class="col-sm-4">
<div class="form-group">
   <label>Post Secondary Year of Graduation </label>
  <div class="input-group ">
 <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-graduation-cap"></i></div>
  </span>
  <input type="number"  name="postYear" class="form-control" value="<?php echo $gradYear;?>" id="postYear"

  </div>
  </div>
</div>
</div>
<div class="col-sm-4">
 <div class="form-group">
   <label>Grade Attained </label>
  <div class="input-group ">
 <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-graduation-cap"></i></div>
  </span>
  <input type="text"  name="terGrade" class="form-control" placeholder="Grade Attained Post Secondary Education" value="<?php echo $tertialyGrade;?>" id="terGrade">

  </div>
  </div>
</div>

</div> 
<div class="row">
<div class="col-sm-12">
<h5>Extracurricular Activities</h5>
<b>Do you participate in any of the following game(s)?</b>
</div>
</div>
<div class="row">
    <div class="col-sm-2">
       <div class="form-check mb-2">
        <input class="form-check-input" type="checkbox" name="athletics" id="athletics">
        <label class="form-check-label" for="autoSizingCheck">
          Athletics
        </label>
      </div>
    </div>
    <div class="col-sm-2">
     <div class="form-check mb-2">
        <input class="form-check-input" type="checkbox" id="basketball" name="basketball">
        <label class="form-check-label" for="autoSizingCheck">
         Basketball
        </label>
      </div>
    </div>
    <div class="col-sm-2">
      <div class="form-check mb-2">
        <input class="form-check-input" type="checkbox" id="football" name="football">
        <label class="form-check-label" for="autoSizingCheck">
            Football
        </label>
      </div>
    </div>

     <div class="col-sm-2">
       <div class="form-check mb-2">
        <input class="form-check-input" type="checkbox" id="handball" name="handball">
        <label class="form-check-label" for="autoSizingCheck">
          Handball
        </label>
      </div>
    </div>
    <div class="col-sm-2">
     <div class="form-check mb-2">
        <input class="form-check-input" type="checkbox" id="volleyball" name="volleyball">
        <label class="form-check-label" for="autoSizingCheck">
          Volleyball
        </label>
      </div>
    </div>
    <div class="col-sm-2">
      <div class="form-check mb-2">
        <input class="form-check-input" type="checkbox" id="none" name="none">
        <label class="form-check-label" for="autoSizingCheck">
            None
        </label>
      </div>
    </div>
</div>

<div class="row">
<div class="col-sm-12">
<b>Do you have talent in any of the following activities?</b>
</div>
</div>
<div class="row">
<div class="col-sm-2">
      Select:
    </div>
    <div class="col-sm-2">
       <div class="form-check mb-2">
        <input class="form-check-input" type="checkbox" name="choir" id="choir">
        <label class="form-check-label" for="autoSizingCheck">
          Choir
        </label>
      </div>
    </div>
    <div class="col-sm-2">
     <div class="form-check mb-2">
        <input class="form-check-input" type="checkbox" id="piano" name="piano">
        <label class="form-check-label" for="autoSizingCheck">
         Play Piano
        </label>
      </div>
    </div>
    <div class="col-sm-2">
      <div class="form-check mb-2">
        <input class="form-check-input" type="checkbox" id="guitar" name="guitar">
        <label class="form-check-label" for="autoSizingCheck">
            Play Guitar
        </label>
      </div>
    </div>

     <div class="col-sm-2">
       <div class="form-check mb-2">
        <input class="form-check-input" type="checkbox" id="drum" name="drum">
        <label class="form-check-label" for="autoSizingCheck">
          Play Drum
        </label>
      </div>
    </div>
    <div class="col-sm-2">
      <div class="form-check mb-2">
        <input class="form-check-input" type="checkbox" id="none1" name="none1">
        <label class="form-check-label" for="autoSizingCheck">
            None
        </label>
      </div>
    </div>
</div>

<!-- <div class="row">
<div class="col-sm-12">
<b>Do you participate in any other activity? Specify</b>
</div>
</div> -->
<div class="row">
<div class="col-sm-12">
 <div class="form-group">
    
     <!--  <input type="text" class="form-control" id="other_activities" placeholder="e.g Praise and Worship"> -->
      <br><br>
       <button class="btn btn-info" ><span class="fa fa-send-o"></span> Submit</button>
  </div>
  </div>
</div>
 
<!-- .....................................................row ends -->
</form>

<script>
   $(document).ready(function(){
      $('#acadamic-data-form').submit(function(e){
        e.preventDefault();
        academicData();
      });
     });

     function academicData(){
      var primary = $("#primary-name").val();
      var seco = $("#seco-name").val();
      var secoAddress = $("#seco-address").val();
      var primaryMarks = $("#primary-marks").val();
      var secoMa = $("#seco-grade").val();
       var secondaryYear = $("#secondaryYear").val();
      var tertialyEdu = $("#tertialyEdu").val();
      var terGrade = $("#terGrade").val();
      var priYear = $("#primary-year").val();
      var gradYear = $("#postYear").val();
      var postLevel = $("#postLevel").val();
     // var other_activities = $("#other_activities").val();
      var athletics = "";
      var volleyball = "";
      var handball = "";
      var none = "";
      var basketball = "";
      $('input[name="athletics"]:checked').each(function() {
         athletics = ",Athletics";
       });
       $('input[name="volleyball"]:checked').each(function() {
         volleyball = ",Volleyball";
       });
        $('input[name="handball"]:checked').each(function() {
         handball = ",handball";
       });
         $('input[name="none"]:checked').each(function() {
        none = ",None";
       });
       $('input[name="basketball"]:checked').each(function() {
         basketball = ",basketball";
       });

       var sports ="[Games"+athletics+volleyball+handball+none+basketball+"]";
       //var instrument = $("input[name='fav_language']:checked").val();

       var json = JSON.stringify([primary,seco,secoAddress,primaryMarks,secoMa,secondaryYear,tertialyEdu,terGrade,priYear,gradYear,postLevel,sports,'None','None']);

       $('#acadamic-data-form button').html('<i class="fa fa-pulse fa-refresh"></i> Submitting...');
          $.post('includes/academic-data.php',
          {
            data:json
          },function(data,status){
            
             if(data ==='success'){
              $('#acadamic-data-form button').html('<i class="fa fa-pulse fa-refresh"></i> Redirecting... ');
             
              document.location.href='./';
             }
             if (data === 'error')
             {
                alert("Ooops! Unable to submit data.\ncheck your network connection and try again");
                 $('#acadamic-data-form button').html('<i class="fa fa-send-o"></i> Submit');
             }
            
          }
          );
     }
</script>
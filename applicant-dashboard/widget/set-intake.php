<?php include '../includes/student-data.php'; ?>
<div class="card">
  <h6 class="card-header">Kindly set Intake you wish to apply for and type of residence (Boarding or Day Schoolar)</h6>
  <div class="card-body">
    <form id="itake-data">
  <div class="form-group">
    Select Intake
    <div class="input-group">
     <select class="form-control" id="itake-filed">
     	<option value="0" required="">----Select----</option>
     	<?php
         $sq="SELECT * FROM current_intake INNER JOIN intakes ON current_intake.intake_id=intakes.id";
         $res=mysqli_query($con,$sq) or die(mysql_error());
         while($row=mysqli_fetch_array($res))
               {  
                echo "<option value='".$row['intake_id']."'>".$row['month']." ".$row['year']."</option>";
               }
     	?>
     </select>
   
    </div>
   
  </div>
  <div id="err" style="color:red"></div>

   <div class="form-group">
   Select Residence
    <div class="input-group">
     <select class="form-control select_control" id="residence">
      <option value="0" required="">----Select----</option>
      <option value="Boarding" required="">Boarding</option>
      <option value="Day Schoolar" required="">Day Schoolar</option>
  
     </select>
   
    </div>
   
  </div>

  <div class="form-group" style="display:none" id="other-deno">
   <label>Kindly give reason why you wish to be a day schoolar</label>
  <div class="input-group">
  <textarea name="other_faiths" class="form-control" placeholder="Reason for day schooling" id="day_reason"></textarea>

  </div>
  </div>
  
  <br><br>
  <button type="submit" id="sub-intake" class="btn btn-primary">Submit</button>
</form>
  </div>
</div>
<script>
 $(function(){
      $('#itake-data').submit(function(e){
        e.preventDefault();
        submitIntake();
      });

       $(".select_control").change(function() {
        var selectedValue = this.value;
        var others = document.getElementById("other-deno");
        if (selectedValue === 'Day Schoolar') {
          others.style.display = 'block';
        } else {
         others.style.display = 'none';
        }
     });
     });

   function submitIntake()
   {
   	  
   	   var intake = $('#itake-filed').val();
       var residence = $('#residence').val();
       var reason = $('#day_reason').val();
   	   if(intake === '0')
   	   {
            document.getElementById('itake-filed').style.border='1px solid red';
   	        document.getElementById('err').innerHTML="Kindly select intake you wish to apply for"
   	   } else {

        if(residence === '0')
        {
          document.getElementById('residence').style.border='1px solid red';

        } else {

   	   	var json = JSON.stringify([intake,residence,reason]);
        $('#itake-data button').html('<i class="fa fa-pulse fa-refresh"></i> Setting Intake...');
        $.post('includes/submit-intake.php',
          {
            data:json
          },function(data,status){
            
             if(data.replace(/\s/g, '') ==='success'){
            document.location.href='./';
             }
            else
             {
                alert("Ooops! Unable to set you intake.\ncheck your network connection and try again");
                 $('#personal-data-form button').html('<i class="fa fa-send-o"></i> Submit');
             }
            
          }
          );
      }
   	   }
   }
</script>

<?php include '../includes/student-data.php';
date_default_timezone_set('Africa/Nairobi');
    $now = new DateTime();
    $hrs = $now->format('H');
    $mt = $now->format('i');
    $date = $now->format('Y-m-d');
    $time=$now->format('H:i');
if ($gender=='') {
   $gender="---Select---";
 } 
if ($country=='') {
   $country="---Select---";
 } 

?>
<form action="" method="POST" id="personal-data-form">
<div class="row">
<div class="col-sm-12">
<div >
<h4 class="btn btn-info" style="width:100%">SECTION A: Personal Data</h4>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-4">
<div class="form-group">
   <label>First Name </label>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-user"></i></div>
  </span>
  <input type="text" minlength="3"  name="firstName" id="first" class="form-control" placeholder="Your First Name...." required="" value="<?php echo $first_name;?>" >
  
  </div>
  </div>
</div>
<div class="col-sm-4">
<div class="form-group">
   <label>Middle Name </label>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-user"></i></div>
  </span>
  <input type="text"  name="middleName" class="form-control" placeholder="Your Middle Name...." value="<?php echo $second_name;?>" id="middle" >

  </div>
  </div>

</div>
<div class="col-sm-4">
<div class="form-group">
   <label>Surname *</label>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-user"></i></div>
  </span>
  <input type="text" minlength="3" name="sirname" id="surname" class="form-control" placeholder="Your Username..." required="" value="<?php echo $last_name;?>" >

  </div>
  </div>

</div>
</div>
<!-- .........................................................................................end row -->
<div class="row">
<div class="col-sm-4">
<div class="form-group">
   <label>Gender </label>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-intersex"></i></div>
  </span>
  <select class="form-control" name="gender" id="gender">
    <option><?php echo $gender; ?></option>
    <option>Male</option>
    <option>Female</option>
  </select>
  </div>
  </div>

</div>
<div class="col-sm-4">
<div class="form-group">
   <label>ID/Birth Cert No./Waiting Card No. * </label>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-id-card"></i></div>
  </span>
  <input type="number"  name="nationalID" class="form-control" placeholder="Your National Id..." required="" value="<?php echo $national_id;?>" id="nationalID">

  </div>
  </div>

</div>
<div class="col-sm-4">
 <div class="form-group">
   <label>Email Address * </label>
  <div class="input-group ">
 <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-envelope-open-o"></i></div>
  </span>
  <input type="text"  name="emailaddress" class="form-control" value="<?php echo $email; ?>" id="email" disabled>

  </div>
  </div>

</div>
</div>
<!-- .........................................................................................end row -->
<div class="row">
<div class="col-sm-4">
<div class="form-group">
   <label>Postal Address * </label>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-envelope-open"></i></div>
  </span>
  <input type="text"  name="address" class="form-control" placeholder="P.O BOX 0000-Town Code" required="" value="<?php echo $post_address;?>" id="postal">

  </div>
  </div>

</div>
<div class="col-sm-4">
 <div class="form-group">
   <label>Phone Number </label>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-phone"></i></div>
  </span>
 <input type="text"  name="phone" class="form-control" placeholder="Your Phone Number...." required="" value="<?php echo $phone;?>" id="phone" >

  </div>
  </div>


</div>
<div class="col-sm-4">
<div class="form-group">
   <label>Date of Birth </label>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-calendar"></i></div>
  </span>
 <input type="date"  name="dob" class="form-control"  required="" value="<?php echo $dob;?>" max="<?php echo $date;?>" id="dob">

  </div>
  </div>

</div>
</div>
<!-- .........................................................................................end row -->
<div class="row">
<div class="col-sm-4">
<div class="form-group">
   <label>Country </label>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-flag"></i></div>
  </span>
  <select class="form-control" name="country" id="country">
    <option><?php echo $country; ?></option>
    <?php echo include 'countries.php';?>
  </select>

  </div>
  </div>

</div>
<div class="col-sm-4">
<div class="form-group">
   <label>County </label>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-home"></i></div>
  </span>
  <select class="form-control" name="county" id="county">
    <option><?php echo $county; ?></option>
<option value="baringo">Baringo</option>
<option value="bomet">Bomet</option>
<option value="bungoma">Bungoma</option>
<option value="busia">Busia</option>
<option value="elgeyo marakwet">Elgeyo Marakwet</option>
<option value="embu">Embu</option>
<option value="garissa">Garissa</option>
<option value="homa bay">Homa Bay</option>
<option value="isiolo">Isiolo</option>
<option value="kajiado">Kajiado</option>
<option value="kakamega">Kakamega</option>
<option value="kericho">Kericho</option>
<option value="kiambu">Kiambu</option>
    <option value="kilifi">Kilifi</option>
    <option value="kirinyaga">Kirinyaga</option>
    <option value="kisii">Kisii</option>
    <option value="kisumu">Kisumu</option>
    <option value="kitui">Kitui</option>
    <option value="kwale">Kwale</option>
    <option value="laikipia">Laikipia</option>
    <option value="lamu">Lamu</option>
    <option value="machakos">Machakos</option>
    <option value="makueni">Makueni</option>
    <option value="mandera">Mandera</option>
    <option value="meru">Meru</option>
    <option value="migori">Migori</option>
    <option value="marsabit">Marsabit</option>
    <option value="mombasa">Mombasa</option>
    <option value="muranga">Muranga</option>
    <option value="nairobi">Nairobi</option>
    <option value="nakuru">Nakuru</option>
    <option value="nandi">Nandi</option>
    <option value="narok">Narok</option>
    <option value="nyamira">Nyamira</option>
    <option value="nyandarua">Nyandarua</option>
    <option value="nyeri">Nyeri</option>
    <option value="samburu">Samburu</option>
    <option value="siaya">Siaya</option>
    <option value="taita taveta">Taita Taveta</option>
    <option value="tana river">Tana River</option>
    <option value="tharaka nithi">Tharaka Nithi</option>
    <option value="trans nzoia">Trans Nzoia</option>
    <option value="turkana">Turkana</option>
    <option value="uasin gishu">Uasin Gishu</option>
    <option value="vihiga">Vihiga</option>
    <option value="wajir">Wajir</option>
    <option value="pokot">West Pokot</option>
  </select>

  </div>
  </div>

</div>
<div class="col-sm-4">
<div class="form-group">
   <label>District/Sub County </label>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-home"></i></div>
  </span>
 <input type="text"  name="district" class="form-control" value="<?php echo $district;?>" placeholder="Your Sub County...." required="" id="district">

  </div>
  </div>

</div>
</div>
<!-- .........................................................................................end row -->
<div class="row">
<div class="col-sm-4">
 <div class="form-group">
   <label>Gurdian/Sponsor Name </label>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-user"></i></div>
  </span>
  <input type="text"  name="gurdian_name" id="gurdian_name" class="form-control" placeholder="Your Gurdian/Sponsor Name...." required="" value="<?php echo $sponsor_name;?>" >
   
  </div>
  </div>

</div>
<div class="col-sm-4">
 <div class="form-group">
   <label>Relationship </label>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-user"></i></div>
  </span>
  <input type="text"  name="relationship" class="form-control" placeholder="Your relationship with gurdian...." required=""  id="relationship" value="<?php echo $sponsor_relationship;?>" >

  </div>
  </div>

</div>
<div class="col-sm-4">
 <div class="form-group">
   <label>Gurdian Contact </label>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-user"></i></div>
  </span>
  <input type="text"  name="g_phone" class="form-control" placeholder="Your gurdian phone number...." required=""  id="g_phone" value="<?php echo $sponsor_phone;?>" >

  </div>
  </div>

</div>
</div>
<!-- .........................................................................................end row -->
<div class="row">
<div class="col-sm-4">
<div class="form-group">
   <label>Denomination </label>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-plus-circle"></i></div>
  </span>
  <select class="form-control select_control" name="deno" id="deno">
  <option><?php echo $denomination; ?></option>
    <option>Catholic</option>
    <option>Protestant</option>
    <option>Others</option>
  </select>

  </div>
  </div>
  

</div>
<div class="col-sm-4">
<div class="form-group" style="display:none" id="other-deno">
   <label>Kindly Specify your Denomination </label>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-th"></i></div>
  </span>
 <input type="text"  name="other_faiths" class="form-control" value="<?php echo $other_faith;?>" placeholder="Other denomination...." id="other_faiths">

  </div>
  </div>

</div>
<div class="col-sm-4">

</div>
</div>

<!-- .........................................................................................end row -->
<div class="row">
<div class="col-sm-4">
<div class="form-group">
   <label>Do you have any disability? </label>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-wheelchair-alt" aria-hidden="true"></i></div>
  </span>
  <select class="form-control select_control2" name="deno" id="disability" required="">
    <option value="No">No</option>
    <option value="Yes">Yes</option>
  </select>

  </div>
  </div>
  

</div>
<div class="col-sm-4">
<div class="form-group" id="type-class" style="display:none">
   <label>Type/Class </label>
  <div class="input-group ">
  <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Physical" checked>
  <label class="form-check-label" for="inlineRadio1">Physical</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Mental">
  <label class="form-check-label" for="inlineRadio2">Mental</label>
</div>

  </div>
  </div>

</div>
<div class="col-sm-4">
<div class="form-group" style="display:none" id="disability-description">
   <label>Give details of the nature of Disability </label>
  <div class="input-group ">
  <span class="input-group-prepend">
  <div class="input-group-text bg-transparent border-right-0"><i class="fa fa-wheelchair-alt" aria-hidden="true"></i></div>
  </span>
  <textarea class="form-control" id="desc-disability" rows="3"></textarea>

  </div>
  </div>

</div>
</div>
<!-- .........................................................................................end row -->
<div class="row">
<div class="col-md-12">
<h1><button class="btn" style="background:#428bca;color:white;width:100px;" ><span class="fa fa-send-o"></span> Submit</button></h1>
  
</div>
  
</div>


</form>
<script>
  $(function(){
      $('#personal-data-form').submit(function(e){
        e.preventDefault();
        attemptLogin();
      });

      $(".select_control").change(function() {
        var selectedValue = this.value;
        var others = document.getElementById("other-deno");
        if (selectedValue === 'Others') {
          others.style.display = 'block';
        } else {
         others.style.display = 'none';
        }
     });

       $(".select_control2").change(function() {
        var selectedValue = this.value;
        var type = document.getElementById("type-class");
        var desc = document.getElementById("disability-description");
        if (selectedValue === 'Yes') {
          type.style.display = 'block';
          desc.style.display = 'block';
        } else {
         type.style.display = 'none';
         desc.style.display = 'none';
        }
     });
     });
     function attemptLogin(){
          var surname = $('#surname').val();
          var first = $('#first').val();
          var gender = $('#gender').val();
          var email = $('#email').val();
          var nationalID = $('#nationalID').val();
          var middle = $('#middle').val();
          var postal = $('#postal').val();
          var phone = $('#phone').val();
          var dob = $('#dob').val();
          var country = $('#country').val();
          var other_faiths = $('#other_faiths').val();
          var county = $('#county').val();
          var district = $('#district').val();
          var deno = $('#deno').val();
          var gurdian_name = $('#gurdian_name').val();
          var relationship = $('#relationship').val();
          var g_phone = $('#g_phone').val();
          var disability = $('#disability').val();
          if(disability === 'No')
          {
          var d_type = 'No';
          var d_desc = 'No';
          } else {
          var d_type = $("input[name='inlineRadioOptions']:checked").val();
          var d_desc = $('#desc-disability').val();
        }

          var year = Number(dob.substr(0, 4));
          var month = Number(dob.substr(4, 2)) - 1;
          var day = Number(dob.substr(6, 2));
          var today = new Date();
          var age = today.getFullYear() - year;
          if (today.getMonth() < month || (today.getMonth() == month && today.getDate() < day)) {
             age--;
           }
           
           if (age < 16) {
            document.getElementById('dob').style.border='1px solid red';
            document.getElementById('dob').autofocus;
            Toastify({ 
                    text: "Error!\n Select a valid date. Date selected seems to be of a younger person",
                    duration: 6000,
                    className: "primary",
                   style: {
                       background: "linear-gradient(to right, #E64134, #96c93d)",
                     }
                }).showToast();
           } else {
            if (deno === "Others") {
            deno = other_faiths;
          }
          var json = JSON.stringify([surname,first,gender,email,nationalID,middle,postal,phone,dob,country,county,district,deno,gurdian_name,relationship,g_phone,disability,d_type,d_desc]);
          $('#personal-data-form button').html('<i class="fa fa-pulse fa-refresh"></i> Submitting...');
          $.post('includes/personal-data.php',
          {
            data:json
          },function(data,status){
            
             if(data ==='success'){
              $('#personal-data-form button').html('<i class="fa fa-pulse fa-refresh"></i> Redirecting... ');
             
                document.location.href='./';
             }
             if (data === 'error')
             {
                alert("Ooops! Unable to submit data.\ncheck your network connection and try again");
                 $('#personal-data-form button').html('<i class="fa fa-send-o"></i> Submit');
             }
            
          }
          );
           }

         

        }
</script>
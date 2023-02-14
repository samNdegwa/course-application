<?php
<?php
if ($_POST['submit-documents-data']) {
  $category=$_POST['doc-category'];
  date_default_timezone_set('Africa/Nairobi');
    $now = new DateTime();
    $hrs = $now->format('H');
    $mt = $now->format('i');
    $date = $now->format('Y-m-d');
    $time=$now->format('H:i');
    $mytime=$date.' At '.$time;
    $countTime=$now->format('YmdHi');
    $code=rand(111111,999999);

  $target_dir = "images/docs/";
  
  $imageName=$countTime.'_'.$code.'_' . basename($_FILES["fileToUpload2"]["name"]);
    $target_file = $target_dir . $imageName;
    $uploadOk = 1;
   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["fileToUpload2"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        
        
        $uploadOk = 0;
    }
    
    
if ($_FILES["fileToUpload2"]["size"] > 50000000000000000000000000000000) {
    echo "Sorry, Image too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
                                            ?>
                                         <h4 class="btn-warning"><span class="glyphicon glyphicon-info-sign"></span>  Image was not uploaded because only JPG, JPEG, PNG & GIF files are allowed for the image</h4>
                                          <?php
                                      
    
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
   echo "Try Again Later ";
    
} else {
    if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file)) {
    $sql = "UPDATE students SET $category='$imageName' WHERE email='$email'";

if ($con->query($sql) === TRUE) {
   // echo "Record updated successfully";
} else {
    echo "Error updating record: " . $con->error;
} 
     
    }
    else
    {

    }

}
}
?>
?>
<script>
	else
         {
        if (id.length === 0) {
          document.getElementById("academics-details").disabled=true;
          document.getElementById("family-details").disabled=true;
          document.getElementById("secondary-grades").disabled=true;
          document.getElementById("documents-attach").disabled=true;
          personal.style.color="blue";
          family.style.color="red";
          academic.style.color="red";
          grades.style.color="red";
          documents.style.color="red";
         
          a1.innerHTML="<span class='glyphicon glyphicon-option-horizontal'></span>";
          b2.innerHTML="<span class='fa fa-close'></span>";
          c3.innerHTML="<span class='fa fa-close'></span>";
          d4.innerHTML="<span class='fa fa-close'></span>";
          e5.innerHTML="<span class='fa fa-close'></span>";
          $("#home-panel").load("widget/personal-data.php");

        }
        else
        {
          if (marital.length === 0) {
          document.getElementById("academics-details").disabled=true;
          document.getElementById("secondary-grades").disabled=true;
          document.getElementById("documents-attach").disabled=true;
          personal.style.color="green";
          family.style.color="blue";
          academic.style.color="red";
          grades.style.color="red";
          documents.style.color="red";
        
          a1.innerHTML="<span class='fa fa-check'></span>";
          b2.innerHTML="<span class='glyphicon glyphicon-option-horizontal'></span>";
          c3.innerHTML="<span class='fa fa-close'></span>";
          d4.innerHTML="<span class='fa fa-close'></span>";
          e5.innerHTML="<span class='fa fa-close'></span>";
          $("#home-panel").load("widget/family-data.php");

        } 
        else
        {
          if (secondary.length === 0) {
          document.getElementById("secondary-grades").disabled=true;
          document.getElementById("documents-attach").disabled=true;
          personal.style.color="green";
          family.style.color="green";
          academic.style.color="blue";
          grades.style.color="red";
          documents.style.color="red";
          a1.innerHTML="<span class='fa fa-check'></span>";
          b2.innerHTML="<span class='fa fa-check'></span>";
          c3.innerHTML="<span class='glyphicon glyphicon-option-horizontal'></span>";
          d4.innerHTML="<span class='fa fa-close'></span>";
          e5.innerHTML="<span class='fa fa-close'></span>";
          $("#home-panel").load("widget/academic-data.php");

        } 
        else
        {
           if (eng.length === 0) {
          document.getElementById("documents-attach").disabled=true;
          personal.style.color="green";
          family.style.color="green";
          academic.style.color="green";
          grades.style.color="blue";
          documents.style.color="red";
          a1.innerHTML="<span class='fa fa-check'></span>";
          b2.innerHTML="<span class='fa fa-check'></span>";
          c3.innerHTML="<span class='fa fa-check'></span>";
          d4.innerHTML="<span class='glyphicon glyphicon-option-horizontal'></span>";
          e5.innerHTML="<span class='fa fa-close'></span>";
          $("#home-panel").load("widget/secondary-grades.php");

        }
        else
        {
          if (front.length === 0 || back.length === 0 || slip.length === 0) {
          personal.style.color="green";
          family.style.color="green";
          academic.style.color="green";
          grades.style.color="green";
          documents.style.color="blue";
          a1.innerHTML="<span class='fa fa-check'></span>";
          b2.innerHTML="<span class='fa fa-check'></span>";
          c3.innerHTML="<span class='fa fa-check'></span>";
          d4.innerHTML="<span class='fa fa-check'></span>";
          e5.innerHTML="<span class='glyphicon glyphicon-option-horizontal'></span>";
          $("#home-panel").load("widget/documents-attachments.php");

        } 
        else
        {

          personal.style.color="green";
          family.style.color="green";
          academic.style.color="green";
          grades.style.color="green";
          documents.style.color="green";
          a1.innerHTML="<span class='fa fa-check'></span>";
          b2.innerHTML="<span class='fa fa-check'></span>";
          c3.innerHTML="<span class='fa fa-check'></span>";
          d4.innerHTML="<span class='fa fa-check'></span>";
          e5.innerHTML="<span class='fa fa-check'></span>";
          $("#home-panel").load("widget/course-application-panel.php");
        }

        } 

        }

        }

        } 
        }



         if (app != 0) {
         $('#home-panel').html('<h2><i class="fa fa-pulse fa-refresh"></i> Loading Please wait...</h2>');
         $("#home-panel").load("widget/my-applications.php"); 

          }
          else
         {
</script>
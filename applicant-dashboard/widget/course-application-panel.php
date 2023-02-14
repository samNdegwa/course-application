<?php
include '../includes/student-data.php';
if (empty($any_course) === true) {
          if (empty($intake) === true) {
                 ?>
          <script>
            $("#home-panel").load("widget/set-intake.php");
          </script>
         <?php
              } else {     
$sql="SELECT * FROM courses WHERE status='1'";
$result=mysqli_query($con,$sql) or die(mysql_error());
                  ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Welcome!</strong> Select course(s) of your choice in order of priority for <strong><?php echo $intake;?> Intake</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<h6 style="color:red;text-align:right;display:none;" id="application-status">
You have <b>NOT</b> submitted your application
  <button class="btn btn-danger" onclick="submitApplication()">Submit Application</button>
  </h6>
                
                
                  <div id="table-wrapper">
                  <div id="table-scroll">
                 <table  id="table_uni" class="table table-bordered table-striped table-hover table-responsive">
             <thead>    
       <tr style="background-color:#72c7f8; color:white;">
       <th>Serial</th>
       <th>Course Title</th>
       <th>Minimum Requirements</th>
       <th>Action </th>
       
       </tr>
       </thead>
                  <?php
                  while($row=mysqli_fetch_array($result))
                   {   
                  $serial=$row['course_id'];
                  $title=$row['course_title'];
                  $min_grade=$row['min_grade'];
                  $other=$row['other_qualities'];
                  
                    ?>
                    <tbody>
            <tr id="tr">
         <td style="background-color:lightyellow;"><?php echo $serial;?></td> 
         <td style="background-color:lightgrey;"><?php echo $title;?></td>
         <td style="background-color:white;"><?php echo 'KCSE '.$min_grade.'  '.$other;?></td>
         <td style="background-color:lightyellow;" ><button class='btn btn-primary btn-sm' id="apply" onclick='course_application($(this))'><span class='glyphicon glyphicon-pencil'></span> Apply?</button></td>
         
         
         
         </tr>
         </tbody>
         
    <?php 

     
            
      }
      ?>
           </table>
           </div>
           </div>
      
      <?php 
    } 
  } else {
    ?>
   You have alredy submitted your application <button class='btn btn-info btn-sm' id='view-applications-box'><i class="fa fa-eye-slash" aria-hidden="true"></i> View application</button>
    <?php
  }

      ?>
    <script>
    $(document).ready(function(){

      $('#apply').submit(function(e){
        e.preventDefault();
        course_application();
      });

      $('#view-applications-box').click(function(){
        $("#home-panel").load("widget/my-applications.php");
      });

      // $('#').click(function(){

      // })
     });

      function submitApplication(){
        $('#home-panel').html('<h2><i class="fa fa-pulse fa-refresh"></i> Loading Please wait...</h2>');
        $("#home-panel").load("widget/my-basket.php");
      }
         
           function course_application(btn)
            {
              document.getElementById("application-status").style.display='block';
              var names = [];
              var tr = $(btn).parent().parent();
              var id = $(tr).children('td:eq(0)').html();
              var title = $(tr).children('td:eq(1)').html(); 

              //----------------------------get numbers of courses applied
              var storedNames = JSON.parse(localStorage.getItem("names"));
             if(storedNames === null)
             {
              var leng = 0;
             } else {
              var leng = storedNames.length;
             }  

              

              if(leng>=2)
              {
                   Toastify({ 
                    text: "Error!\n You have reached the maximum number of cousrses you can apply.\n Kindly review your courses application at 'My Basket' and submit your apllication if satisfy",
                    duration: 6000,
                    className: "primary",
                   style: {
                       background: "linear-gradient(to right, #E64134, #96c93d)",
                     }
                }).showToast();
              } else {
                
                  if(leng === 0)
                  {
                    names[0]=id+'-'+title;
                    localStorage.setItem("names", JSON.stringify(names));
                     document.getElementById("cart-numbers").innerHTML=parseInt(leng)+1;
                 $(tr).children('td:eq(3)').html('<span class="badge badge-success"><i class="fa fa-check" aria-hidden="true"></i> Picked</span>');
                 document.getElementById("application-status").style.display='block';
                  } else {
                    storedNames = JSON.parse(localStorage.getItem("names"))[0];
                    if(storedNames === id+'-'+title)
                    {

                      Toastify({ 
                    text: "Error!\n You have already apply for this course.\n Check your courses application at 'My Basket' and submit your apllication if satisfy",
                    duration: 6000,
                    className: "primary",
                   style: {
                       background: "linear-gradient(to right, #E64134, #96c93d)",
                     }
                }).showToast();

                    } else {
                    names[0] = storedNames;
                    names[1] = id+'-'+title;
                    localStorage.setItem("names", JSON.stringify(names));

                  document.getElementById("cart-numbers").innerHTML=parseInt(leng)+1;
                 $(tr).children('td:eq(3)').html('<span class="badge badge-success"><i class="fa fa-check" aria-hidden="true"></i> Picked</span>');
                  }

                  }

              }
               
          
            }
        
        function uniFunction() {
        // Declare variables
        var input, filter, table, tr, td, i;
        input = document.getElementById("uniInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("table_uni");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[1];
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
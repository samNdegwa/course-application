<?php
include '../core/init.php';
        $sql="SELECT * FROM courses";
        $result=mysqli_query($con,$sql) or die(mysql_error());
                  ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Courses offered at SLCMC</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
                  <form action="" method="POST" >
       <div class="form-group">
       <div class="input-group ">
    <span class="input-group-addon ">
    	<span class="glyphicon glyphicon-search"></span>
    </span>
        <input type="text" onkeyup="uniFunction()" id="uniInput" class="form-control" placeholder="Enter course name to search" style="color:green;font-style: italic;">
      </div>
      </div>
       </form>
                  <div id="table-wrapper">
                  <div id="table-scroll">
                 <table  id="table_uni" class="table table-bordered table-striped table-hover table-responsive">
             <thead>    
       <tr style="background-color:#72c7f8; color:white;">
       <th>Serial</th>
       <th>Course Title</th>
       <th>Minimum Requirements</th>
       
       </tr>
       </thead>
                  <?php
                  while($row=mysqli_fetch_array($result))
                   {   
                  $serial=$row['course_code'];
                  $title=$row['course_title'];
                  $min_grade=$row['min_grade'];
                  $other=$row['other_qualities'];
                  
                    ?>
                    <tbody>
            <tr id="tr">
         <td style="background-color:white;"><?php echo $serial;?></td> 
         <td style="background-color:lightgrey;"><?php echo $title;?></td>
         <td style="background-color:white;"><?php echo 'KCSE '.$min_grade.' or '.$other;?></td>
         
         
         
         </tr>
         </tbody>
         
    <?php 


            
      }
      ?>
           </table>
           </div>
           </div>
      
           <script>
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
<?php
include '../core/init.php';
include '../functions/sms-counter.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h6><i class="nav-icon fas fa-envelope"></i> All Sms (<?php echo $msgs;?>) Success (<?php echo $succ;?>) Failed (<?php echo $nomsgs;?>)
                     <form method="post" id="search-form" name="login">
                      <i style="float:right"><input type="text" class="form-control" name="search_vehicle" placeholder="Enter Name... Press Enter" id="search_vehicle" style="min-width:300px;"></i>
                      </form>
                    </h6>

                </div>
                <?php  $page=1;
              
                $results_per_page=15;
                $start_from = ($page-1) * $results_per_page;
                $total=ceil($msgs/$results_per_page);
                ?>
                <div class="card-body" id="table-here">
                <div id="simcards-table-wrapper">

                  <table  id="table_messeges" class="table table-bordered table-responsive-lg table-hover">
                      <thead>    
                        <tr>
                        <th>#</th>
                        <th> Name</th>
                       <th> Phone</th>
                       <th> Message</th>
                       <th> Date</th>
                       <th> Status</th>
                       <th> Cost</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php
$sql="SELECT * FROM tb_messages ORDER BY id DESC LIMIT  $start_from,$results_per_page";
$result=mysqli_query($con,$sql) or die(mysql_error());
$no=1;
while($row=mysqli_fetch_array($result))
    {
       $name=$row['name'];
       $phone=$row['phone'];
       $message=$row['message'];
       $date_sent=$row['date_sent'];
       $time_sent=$row['time_sent'];
       $status=$row['status'];
       $cost=$row['cost'];
       ?>
       <tr>
         <td><?php echo $no;?></td>
        <td style="background-color:white;"><?php echo $name;?></td>
        <td ><?php echo $phone;?></td>
        <td style="background-color:white;"><?php echo $message;?></td>
        <td ><?php echo $date_sent.' '.$time_sent;?></td>
        <?php
        if ($status=="Success") {
          ?>
          <td style="background-color:lightyellow;"><span  class="badge badge-success"><?php echo $status;?></span></td>
          <?php
        }
        else
        {
          ?>
          <td style="background-color:lightyellow;"><span class="badge badge-danger"><?php echo $status;?></span></td>
          <?php
        }

        ?>
        
        <td style="background-color:white;"><?php echo $cost[4].$cost[5].$cost[6];?></td>
        
        </tr>
        <?php
        $no++;
     }
       ?>
                        
                      </tbody>
                      </table>
                </div>
                 Page <i id="sim-page"><?php echo $page.'</i> of <i id="all-pages">'.$total;?>  </i>
                  <i style="float:right;">
                  <button id="sim-first-page"><i class="fa fa-angle-double-left" aria-hidden="true"></i></button>
                  <button id="sim-previous-page"><i class="fa fa-angle-left" aria-hidden="true"></i></button> 
                  <button id="sim-current-page"><?php echo $page;?></button>
                  <button id="next_page"> <i class="fa fa-angle-right" aria-hidden="true"></i></button>
                  <button id="sim-last-page"><i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                      </i>

            </div>
            </div>

        </div>

    </div>

</div>
<script>
$(function(){
  $('#search-form').submit(function(e){
        e.preventDefault();
        attemptSearch();
      });
   $('#next_page').click(function(){
            var page = localStorage.getItem('sim_page');
            var p = parseInt(page)+1;
            var json = JSON.stringify([p]);
            $.post('widgets/all-sms-view-page-load.php',
                {
                    data:json
                },function(data,status){
                   $('#simcards-table-wrapper').html(data)
                   localStorage.setItem('sim_page', p)
                   $('#sim-page').html(p);
                   $('#sim-current-page').html(p);
                   

                }
            );
        });
        $('#sim-previous-page').click(function(){
            var page = localStorage.getItem('sim_page');
            var p = parseInt(page)-1;
            var json = JSON.stringify([p]);
            $.post('widgets/all-sms-view-page-load.php',
                {
                    data:json
                },function(data,status){
                   $('#simcards-table-wrapper').html(data)
                   localStorage.setItem('sim_page', p)
                   $('#sim-page').html(p);
                   $('#sim-current-page').html(p)
                   

                }
            );

        });

       $('#sim-first-page').click(function(){
        var page = localStorage.getItem('sim_page');
            var p = 1;
            var json = JSON.stringify([p]);
            $.post('widgets/all-sms-view-page-load.php',
                {
                    data:json
                },function(data,status){
                   $('#simcards-table-wrapper').html(data)
                   localStorage.setItem('sim_page', p)
                   $('#sim-page').html(p);
                   $('#sim-current-page').html(p);
                   

                }
            );

       }); 
       $('#sim-last-page').click(function(){
            var p = $('#all-pages').html();
            var json = JSON.stringify([p]);
            $.post('widgets/all-sms-view-page-load.php',
                {
                    data:json
                },function(data,status){
                   $('#simcards-table-wrapper').html(data)
                   localStorage.setItem('sim_page', p)
                   $('#sim-page').html(p);
                   $('#sim-current-page').html(p);
                   

                }
            );

       }); 
});

     function attemptSearch(){
          var name = $('#search_vehicle').val();

          var json = JSON.stringify([name]);
            $.post('widgets/all-sms-view-search.php',
                {
                    data:json
                },function(data,status){
                   $('#table-here').html(data)
                   
                }
            );
        }

</script>



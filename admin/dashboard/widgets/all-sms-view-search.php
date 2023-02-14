<?php
include '../core/init.php';
include '../functions/sms-counter.php';
$json = $_POST['data'];
$data = json_decode($json);
$name = $data[0];

                ?>
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
$sql="SELECT * FROM tb_messages WHERE name LIKE '%$name%' ORDER BY id DESC";
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

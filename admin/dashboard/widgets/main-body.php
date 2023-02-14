 <?php
 date_default_timezone_set('Africa/Nairobi');
 $now = new DateTime();
 $monthStamp=$now->format('mY');
 $expectedMonth=$now->format('m-Y');
 ?>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
                <h3><?php echo $unpaid;?></h3>

              <p>Unpaid Applications</p>
            </div>
            <div class="icon">
              <i class="ion ion-close-circled"></i>
            </div>
            <a id="unpaid_applications" class="small-box-footer">Open <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
         <div class="col-lg-3 col-6">
          <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3><?php echo $paid_unapproved;?></h3>

                    <p>Paid Unprocessed Applicatios</p>
                </div>
                <div class="icon">
                    <i class="ion ion-cash"></i>
                </div>
                <a  id="paid-unprocessed"  class="small-box-footer">Open <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php echo $aproved;?></h3>
              <p>Notified for Booking</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-notifications"></i>
            </div>
            <a id="approved_application" class="small-box-footer" id="sent-sms">Open <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?php echo $booked;?></h3>

              <p>Booked Applications</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-done-all"></i>
            </div>
            <a id="booked_application" class="small-box-footer" id="open-failed-sms">Open <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid" >
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
          <div class="card-header">
          <div class="d-flex justify-content-between">
            <h4 class="card-title">Graphical Analysis Coming...</h4>
            <a href="#">View Report</a>
            </div>
          </div>
            
              <div class="card-body">
                  <div id="pieChart" class="img-thumbnail" style="width: 100%; height:370px;"></div>
              </div>
          </div>
          <!-- /.card -->

          <div class="card">
            <div class="card-header border-0" style="background: #00b44e;color: whitesmoke;">
              <h3 class="card-title">More Analysis Here</h3>
              <div class="card-tools">
                <a href="#" class="btn btn-tool btn-sm">
                  <i class="fas fa-download"></i>
                </a>
                <a href="#" class="btn btn-tool btn-sm">
                  <i class="fas fa-bars"></i>
                </a>
              </div>
            </div>
            <div class="card-body table-responsive p-0">
              Coming Soon...
            </div>
          </div>
          <!-- /.card -->
        </div>
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header border-0">
              <div class="d-flex justify-content-between">
                <h3 class="card-title">Intakes statistics</h3>
                <a href="javascript:void(0);">View Report</a>
              </div>
            </div>
            <div class="card-body" style="min-height:410px;">
             
             <table class="table table-bordered">
    <?php
    $sql="SELECT * FROM intakes ORDER BY id DESC";
    $result=mysqli_query($con,$sql) or die(mysql_error());
    ?>
    <thead>
      <th style="display:none;">id</th>
      <th>#</th>
      <th>Intake</th>
      <th>Applications</th>
      <th>Approved</th>
      <th>Status</th>
    </thead>
    <tbody>
     <?php 
      $no=1;
      while($row=mysqli_fetch_array($result))
      { 
        $id=$row['id'];
        $year=$row['year'];
        $month=$row['month'];
        $cstatus="<span class='badge badge-danger'>Closed</span>";

        $sql1="SELECT * FROM application_batches WHERE intake_id='$id'";
        $result1=mysqli_query($con,$sql1) or die(mysql_error());
         $apps=0;
        while($row1=mysqli_fetch_array($result1))
         { 
            $inta=$row1['intake_id'];
            $apps++;
         }

        $sql2="SELECT * FROM application_batches WHERE intake_id='$id' AND status='1'";
        $result2=mysqli_query($con,$sql2) or die(mysql_error());
         $approved=0;
        while($row2=mysqli_fetch_array($result2))
         { 
            $inta=$row2['intake_id'];
            $approved++;
         }

        $sql3="SELECT * FROM current_intake WHERE intake_id='$id'";
        $result3=mysqli_query($con,$sql3) or die(mysql_error());
        while($row3=mysqli_fetch_array($result3))
         { 
            $checkStatus=$row3['intake_id'];
         }

         if($id === $checkStatus) {
          $cstatus='<span class="badge badge-info">Runing</span>';
         }
       ?> 
          <tr>
            <td style="display:none;"><?php echo $id;?></td>
            <td><?php echo $no;?></td>
            <td><?php echo $month.' '.$year;?></td>
            <td><?php echo $apps;?></td>
            <td><?php echo $approved;?></td>
            <td><?php echo $cstatus;?></td>
           
          </tr> 
      <?php
       $no++;
      }
      ?>
    </tbody>
      
    </table>
              
            </div>
          </div>
          <!-- /.card -->

          <div class="card">
            <div class="card-header border-0" style="background: #7d1038;color: whitesmoke">
              <h3 class="card-title">Further Analysis</h3>
              <div class="card-tools">
                <a href="#" class="btn btn-tool btn-sm">
                  <i class="fas fa-download"></i>
                </a>
                <a href="#" class="btn btn-tool btn-sm">
                  <i class="fas fa-bars"></i>
                </a>
              </div>
            </div>
            <div class="card-body table-responsive p-0">

            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col-md-6 -->
        <!-- /.col (RIGHT) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  

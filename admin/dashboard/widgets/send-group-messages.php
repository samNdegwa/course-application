<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><i class="nav-icon fas fa-envelope"></i> Send Group SMS</h4>

                </div>
                <div class="card-body">
                <form action="" method="POST" id="personal-data-form" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                 
                    <label>Group Name</label>
                    <input type="text" class="form-control" name="group_name" placeholder="e.g AGM 2022" required="">
                  </div>
                  
                  <div class="form-group">
                  <br>
                    <label>Upload <b>CSV</b> file <b style="color:maroon">(This sheet MUST have TWO(2) columns ONLY. 1st Column Person Name ,2nd Column phone number)</b></label>
                    <input type="file" name="csvfilerenew" id="excel-sheet" class="form-control" required="">
                  </div>
                    </div>
                <div class="card-footer">
                   <input type="submit" name="upload_csv_cert_renewal_group" value="Upload" class="btn btn-primary" style="float:right;">
  
                </div>
                   </form>
                
              
                  
                </div>

            </div>

        </div>

    </div>

</div>



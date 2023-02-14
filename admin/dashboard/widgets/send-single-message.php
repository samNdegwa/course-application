<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><i class="nav-icon fas fa-envelope"></i><?php echo 'Send <br>Sms To Single Person';?></h4>

                </div>
                <div class="card-body">
                <form method="POST" id="form-send-single-message">
                <div class="card-body">
                  <div class="form-group">
                    <label>Receiver Name</label>
                    <input type="text" class="form-control" id="receiver-name" placeholder="This name will be attached at the begining of message">
                  </div>
                  <div class="form-group">
                    <label>Receiver Phone number</label>
                    <input type="text" class="form-control" id="receiverphone" placeholder="07******** ">
                  </div>
                  <div class="form-group">
                    <label>Message</label>
                    <textarea class="form-control" id="receiver-message" rows="5"></textarea>
                  </div>
                    </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" style="float:right;" id="btn-send"><i class="fa fa-paper-plane" aria-hidden="true"></i> Send</button>
                </div>
              </form>
                  
                </div>

            </div>

        </div>

    </div>

</div>
<script>
 $(document).ready(function(){
      $('#form-send-single-message').submit(function(e){
        e.preventDefault();
        sendSingleSms();
        validateNumber();
      });
     });
 function sendSingleSms() {
          var name = $('#receiver-name').val();
          var phone = $('#receiverphone').val();
          var txt = $('#receiver-message').val();

          var json = JSON.stringify([name,phone,txt]);

          $('#form-send-single-message button').html('<i class="fa fa-pulse fa-refresh"></i> Loading...');
          $.post('functions/sending-message-single.php',
          {
            data:json
          },function(data,status){
             $('#form-send-single-message button').html('<i class="fa fa-pulse fa-refresh"></i> Sending... ');
             document.getElementById("btn-send").disabled = true;
             if(data ==='success'){
              $("#all-main-contents").load("functions/sent-status.php");
             }
        
          }
          );

        }
   function validateNumber() {
     
   }     
</script>



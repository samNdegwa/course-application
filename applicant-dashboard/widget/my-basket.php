<?php include '../includes/student-data.php'; ?>
<div class="card">
  <h5 class="card-header"><i class="fa fa-shopping-basket" aria-hidden="true"></i> My Basket</h5>
  <div class="card-body">
    <div id="my-basket-table"></div>
   
  </div>
</div>
<script>
 $(document).ready(function(){
     getLocalStorage();
      $('#remove-application').submit(function(e){
        e.preventDefault();
        application_remove();
      });

      $("#submit-applied-courses").click(function(){
       submit_applications();
      });

      $("#go-to-application").click(function(){
      $('#home-panel').html('<h2><i class="fa fa-pulse fa-refresh"></i> Loading Please wait...</h2>');
      $("#home-panel").load("widget/course-application-panel.php");

      });
     });

 function application_remove(btn){
      var tr = $(btn).parent().parent();
      var course = $(tr).children('td:eq(2)').html();
      var id = $(tr).children('td:eq(0)').html();

      var value = id+'-'+course;
      var storedNames = JSON.parse(localStorage.getItem("names"));
      storedNames = storedNames.filter(item => item !== value);
      
      if (confirm("Are you sure you want to remove "+course+"?") == true) {
        localStorage.setItem("names", JSON.stringify(storedNames));
        $("#home-panel").load("widget/my-basket.php");
        document.getElementById("cart-numbers").innerHTML=parseInt(storedNames.length);
     } else {
         
      }
        
     } 
function getLocalStorage(){

var storedNames = JSON.parse(localStorage.getItem("names"));
if(storedNames === null)
             {
              var leng = 0;
             } else {
              var leng = storedNames.length;
             }  

var array_courses=[];

if(leng==0)
{
  document.getElementById("my-basket-table").innerHTML="You have no application <button class='btn btn-info btn-sm' id='go-to-application'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Apply</button>";
} else {

  var json = JSON.stringify(storedNames);
  $.post('widget/execute-localStorage.php',
                {
                   data:json
                },function(data,status){
                   document.getElementById("my-basket-table").innerHTML=data;

                  });

  }
}

function submit_applications(){

    var table_length = document.getElementById('table_application').rows.length;

   const array_id = [];
   const array_cos = [];

   for(var i=0;i<table_length;i++){
   var id = document.getElementById('table_application').rows[i].cells.item(0).innerHTML
   var cos = document.getElementById('table_application').rows[i].cells.item(2).innerHTML

   array_id[i]=id;
   array_cos[i]=cos;
 }

    
       var json = JSON.stringify([table_length,array_id,array_cos]);
        $('#submit-applied-courses').html('<i class="fa fa-pulse fa-refresh"></i> Loading...');
        $.post('includes/submit-all-applications.php',
          {
            data:json
          },function(data,status){
             if(data.replace(/\s/g, "") ==='success'){
           
                 Toastify({ 
                    text: "Success!\n Your aplplication has been received successifully.\n Proceed to payment of application fees",
                    duration: 6000,
                    className: "primary",
                   style: {
                       background: "linear-gradient(to right, #00b09b, #96c93d)",
                     }
                }).showToast();
                localStorage.clear();
                  $('#exampleModal').modal('toggle');
                  window.location.href="./"

             }
          }
          );
        
}
</script>

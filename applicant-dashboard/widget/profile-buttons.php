<section id="profile-button">
<div class="row">
<div class="col-sm-6">
<div class="sect" id="bio-data">
<span class="fa fa-stack">
       
           <i class="fa fa-square-o fa-stack-2x"></i>
            <i class="fa fa-user-circle fa-stack-1x"></i>
        </span>
        <h5>Bio Data</h5>
       
  </div>
	
</div>
<div class="col-sm-6">
<div class="sect" id="my-academics">
<span class="fa fa-stack">
       
           <i class="fa fa-square-o fa-stack-2x"></i>
            <i class="fa fa-graduation-cap fa-stack-1x"></i>
        </span>
        <h5>Academic Details</h5>
       
  </div>
	
</div>

</div>
<br>
<div class="row">
<div class="col-sm-6">
<div class="sect" id="my-grades">
<span class="fa fa-stack">
       
           <i class="fa fa-square-o fa-stack-2x"></i>
            <i class="fa fa-adn"></i>
        </span>
        <h5>My Grades</h5>
       
  </div>
	
</div>

<div class="col-sm-6">
<div class="sect" id="my-documents">
<span class="fa fa-stack">
       
           <i class="fa fa-square-o fa-stack-2x"></i>
            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
        </span>
        <h5>My Documents</h5>
       
  </div>
	
</div>
</div>
</section>
<section><br><br><br></section>
<script>
	$(function() {
		$("#bio-data").click(function(){
			 $('#home-panel').html('<h2><i class="fa fa-pulse fa-refresh"></i> Loading personal data...</h2>');
			$("#home-panel").load("widget/personal-data.php");
		});
		$("#my-family").click(function(){
			 $('#home-panel').html('<h2><i class="fa fa-pulse fa-refresh"></i> Loading family data...</h2>');
			$("#home-panel").load("widget/family-data.php");
		});
		$("#my-academics").click(function(){
			 $('#home-panel').html('<h2><i class="fa fa-pulse fa-refresh"></i> Loading academic data...</h2>');
			$("#home-panel").load("widget/academic-data.php");
		});
		$("#my-grades").click(function(){
			 $('#home-panel').html('<h2><i class="fa fa-pulse fa-refresh"></i> Loading secondary school grades...</h2>');
			$("#home-panel").load("widget/secondary-grades.php");
		});
		$("#my-documents").click(function(){
			 $('#home-panel').html('<h2><i class="fa fa-pulse fa-refresh"></i> Loading uploaded documents...</h2>');
			$("#home-panel").load("widget/uploaded-documents.php");
		});
	});
</script>
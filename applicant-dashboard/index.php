<?php
include 'core/init.php';
include 'includes/student-data.php';
date_default_timezone_set('Africa/Nairobi');
    $now = new DateTime();
    $hrs = $now->format('H');
    $mt = $now->format('i');
    $date = $now->format('Y-m-d');
    $time=$now->format('Hi');
    $our='Hi';
    if ($time>1 && $time<1200) {
      $our="Goodmorning";
    }
    if ($time>1200 && $time<1600) {
      $our="Good Afternoon";
    }
    if ($time>1600 && $time<2400) {
      $our="Good Evening";
    }

$email=$_SESSION['myemail'];
$password=$_SESSION['mypassword'];
include 'includes/menu-adjust.php';
if (empty($email) === true) {
  ?>
  <script>document.location.href='./';</script>";
  <?php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
<link rel="stylesheet" href="bs4/css/bootstrap.min.css">
<link rel="stylesheet" href="fa/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="stylesheet" type="text/css" href="css/menu.css" />
  <link rel="stylesheet" type="text/css" href="css/side-menu.css" />
  <script src="bs4/js/jquery-3.3.1.js"></script>
  <script src="jquery/cdnjs/jquery.min.js"></script>
  <script src="bs4/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="bs4/css/bootstrap-theme.min.css">
  <script src="bs4/js/bootstrapValidator.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  
	<title>Dashboard | SISTER LEONELLA CONSOLATA MEDICAL COLLEGE</title>
	<link rel="icon" href="images/logo1.png">
</head>
<body style="background:#f0f0f0;">
<div class="container-fluid">
<div class="row">
<div class="col-sm-12"> 
	<img src="images/slcmc-head-logo.png" class="img-responsive" style="width:100%;max-height:100px;">
</div>

</div>
	
</div>
<div class="container-fluid">
<div class="row">
<div class="col-sm-12">
<div class="alert alert-info" role="alert">
Welcome to SLCMC Courses Applications Site. Ensure your details are complete to qualify. <a href="#" data-toggle="collapse" data-target="#manual" style="color:yellow;">Read Application Manual</a>
</div>
</div>
	
</div>
<div id="manual" class="collapse">
  <?php 
  include 'widget/manual.php';
  ?>
  <br>
  
</div>
</div>
<div class="container-fluid">
<div class="row">
<div class="col-sm-12">
<div style="background:white;min-height:40px;padding-top:5px;padding-bottom:5px;margin-top:-10px;">
<?php
if ($front<1 || $back<1 || $kcse<1 || $higher<1 || $pass<1) {
  ?>
<nav class="nav nav-tabs navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link"><button class="btn btn-light btn-sm" id="personal-details"> <span class="fa fa-user-circle"></span> A. Personal Details <b id="a1"><span class="fa fa-spinner fa-spin"></span></b> <i><br>---------------<span class="fa fa-circle"></span>--------------</i></button><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item" style="display:none">
        <a class="nav-link"><button class="btn btn-light btn-sm" id="family-details"> <span class="fa fa-users"></span> B. Family Details <b id="b2"><span class="fa fa-spinner fa fa-spinner fa-spin"></span></b><i><br>------------<span class="fa fa-circle"></span>------------</i></button></a>
      </li>
      <li class="nav-item">
        <a class="nav-link"><button class="btn btn-light btn-sm" id="academics-details"> <span class="fa fa-graduation-cap"></span> B. Academic Details <b id="c3"><span class="fa fa-spinner fa fa-spinner fa-spin"></span></b><i><br>---------------<span class="fa fa-circle"></span>---------------</i></button></a>
      </li>

      <li class="nav-item">
        <a class="nav-link"> <button class="btn btn-light btn-sm" id="secondary-grades"> <span class="fa fa-bar-chart-o"></span> C. Secondary Sch Grades <b id="d4"><span class="fa fa-spinner fa fa-spinner fa-spin"></span></b><i><br>------------------<span class="fa fa-circle"></span>------------------</i></button>
          </a>
      </li>

      <li class="nav-item" id="docs">
        <a class="nav-link"><button class="btn btn-light btn-sm" id="documents-attach"><span class="fa fa-file-pdf-o"></span> D. Documents Uploads <b id="e5"><span class="fa fa-spinner fa fa-spinner fa-spin"></span></b><i><br>----------------<span class="fa fa-circle"></span>----------------</i></button></a>
      </li>

    <a href="logout.php" class="nav-link">
        <button class="btn btn-light btn-sm"><i class="fa fa-power-off"></i> Logout<br>---------  </button>
    </a>
  
      
    </ul>
  </div>
</nav>
<?php 
  
}
else
{
} 

if ($front<1 || $back<1 || $kcse<1 || $pass<1) {
  
}
else
{
?>
<button class="btn btn-dark mb-1" id="menu-btn">
    <span class="fa fa-reorder"></span>
  </button> 
  <button class="btn btn-outline-info btn-sm" style="float:right;padding-right:20px;" id="btn-cart-numbers"><i class="fa fa-shopping-basket" aria-hidden="true"></i> My Basket<span class="badge badge-danger" id="cart-numbers">0</span></button>
  <?php } ?>
 <br>
 </div>
</div>
	
</div>
	
</div>
</div>

<div class="container-fluid">
<div class="row" style="margin-left:0px;">
<div class="col-sm-3 col-md-2  menu menu-1" id="menu" style="min-height: 610px;">
<?php
if ($front<1 || $back<1 || $kcse<1  || $pass<1) {
  ?>
  <br>
  <div class="alert alert-secondary" role="alert">
  Please fill all your details as shown, to access application panel<br> Where no information available fill NA
  </div>

  <?php
}
else
{
?>
    <span class="menu-option-title"> <span class="fa fa-tachometer"></span> <?php echo' Hi '.$first_name.' '.'?'; ?></span>
    <a class="menu-option-active" id="programmes">
        <i class="fa fa-book"></i> Programmes  <span class="badge-pill badge-success pull-right mr-3"></span> 
    </a>
    <a class="menu-option" id="my-application">
        <i class="fa fa-pencil-square-o"></i> My Applications  
    </a>
    <a class="menu-option" id="my-payments">
        <i class="fa fa-money" ></i> My Payments  
    </a> 
    <a class="menu-option" id="my-profile">
        <i class="fa fa-user-o"></i> My Profile 
    </a>
    <a class="menu-option" id="my-messages">
        <i class="fa fa-envelope-open"></i> Messages 
    </a>
    <a class="menu-option" id="faq">
        <i class="fa fa-question-circle"></i> FAQs
    </a>
    <a class="menu-option" id="contact-us">
        <i class="fa fa-volume-control-phone"></i> Contact Us 
    </a>
    <a href="logout.php" class="menu-option">
        <i class="fa fa-power-off"></i> Logout  
    </a>
    <?php } ?>
</div>
<div class="col-sm-9 col-md-10  main-div ml-auto" >
<div>
<?php
include 'includes/documents-upload.php';
?>
<br>
</div>
<section>
<div id="home-panel">


<h2>
</h2>     
</div>
</section>
</div>
</div>
</div>

<div class="container-fluid">
<br><br>
</div>
<div class="container-fluid">
<div class="row" id="footer-content">
<br>
 &copy; Sister Leonella Consolata Medical College 2022. All rights reserved

</div>
	
</div>


</body>
</html>
<script>
//document.getElementById("cart-numbers").innerHTML=localStorage.length;
$(function(){
  $('#menu-btn').click(function () {
        toggleMenu();
    });
   $('#test-idd').click(function () {
        alert("asdfghjkl")
    });
  function toggleMenu() {
    if ($('#menu').css('left') === '0px') {
        $('#menu').css('left', '-70%');
    } else {
        $('#menu').css('left', '0px');
    }
}

function togglerMenu() {
    if ($(window).width() < 768) {
        $('#menu').css('left', '-70%');
    }
}
$("#programmes").click(function(){
  $('#home-panel').html('<h2><i class="fa fa-pulse fa-refresh"></i> Loading Please wait...</h2>');
  $("#home-panel").load("widget/programmes.php");
  togglerMenu();
});
$("#my-application").click(function(){
  $('#home-panel').html('<h2><i class="fa fa-pulse fa-refresh"></i> Loading Please wait...</h2>');
  $("#home-panel").load("widget/my-applications.php");
  togglerMenu();

});
$("#my-payments").click(function(){
 $('#home-panel').html('<h2><i class="fa fa-pulse fa-refresh"></i> Loading Please wait...</h2>');
  $("#home-panel").load("widget/my-payments.php");
  togglerMenu();

});
$("#btn-cart-numbers").click(function(){
 $('#home-panel').html('<h2><i class="fa fa-pulse fa-refresh"></i> Loading Please wait...</h2>');
  $("#home-panel").load("widget/my-basket.php");

});
$("#my-messages").click(function(){

  alert("Coming soon....");
  togglerMenu();
});
$("#contact-us").click(function(){

  alert("Coming soon....");
  togglerMenu();
});
$("#faq").click(function(){

  alert("Coming soon....");
  togglerMenu();
});
$("#my-profile").click(function(){
  $('#home-panel').html('<h2><i class="fa fa-pulse fa-refresh"></i> Loading Please wait...</h2>');
  $("#home-panel").load("widget/profile.php");
  togglerMenu();
});

  $('#home-panel h2').html('<i class="fa fa-pulse fa-refresh"></i> Loading Please waitsss...');
      $.get("core/default.php", function(data, status){
        var myObj=JSON.parse(data);
        var id = myObj[0];
        var marital = myObj[1];
        var secondary = myObj[2];
        var eng = myObj[3];
        var front = myObj[4];
        var back = myObj[5];
        var slip = myObj[6];
        var app = myObj[8];
        var higher = myObj[7];
        var pass = myObj[9];

        var personal = document.getElementById("personal-details");
        var family = document.getElementById("family-details");
        var academic = document.getElementById("academics-details");
        var grades = document.getElementById("secondary-grades");
        var documents = document.getElementById("documents-attach");
        var a1 = document.getElementById("a1");
        var b2 = document.getElementById("b2");
        var c3 = document.getElementById("c3");
        var d4 = document.getElementById("d4");
        var e5 = document.getElementById("e5");
         var docs = document.getElementById("docs");
        var menu = document.getElementById("menu");

         if (app != 0 && pass.length != 0) {
         $('#home-panel').html('<h2><i class="fa fa-pulse fa-refresh"></i> Loading Please wait...</h2>');
         $("#home-panel").load("widget/my-applications.php"); 

          }
          else
         {

        if (id.length === 0) {
          document.getElementById("academics-details").disabled=true;
          document.getElementById("family-details").disabled=true;
          document.getElementById("secondary-grades").disabled=true;
          document.getElementById("documents-attach").disabled=true;
          personal.style.color="#17A2B8";
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
          if (secondary.length === 0) {
          document.getElementById("secondary-grades").disabled=true;
          document.getElementById("documents-attach").disabled=true;
          personal.style.color="green";
          family.style.color="green";
          academic.style.color="#17A2B8";
          grades.style.color="red";
          documents.style.color="red";
          a1.innerHTML="<span class='fa fa-check'></span>";
          b2.innerHTML="<span class='fa fa-check'></span>";
          c3.innerHTML="<span class='glyphicon glyphicon-option-horizontal'></span>";
          d4.innerHTML="<span class='fa fa-close'></span>";
          e5.innerHTML="<span class='fa fa-close'></span>";
            Toastify({ 
                    text: "Success!\n You have successifully filled personal details.\nKindly fill Academics details here",
                    duration: 6000,
                    className: "primary",
                   style: {
                       background: "linear-gradient(to right, #00b09b, #96c93d)",
                     }
                }).showToast();

          $("#home-panel").load("widget/academic-data.php");

        } 
        else
        {
           if (eng.length === 0) {
          document.getElementById("documents-attach").disabled=true;
          personal.style.color="green";
          family.style.color="green";
          academic.style.color="green";
          grades.style.color="#17A2B8";
          documents.style.color="red";
          a1.innerHTML="<span class='fa fa-check'></span>";
          b2.innerHTML="<span class='fa fa-check'></span>";
          c3.innerHTML="<span class='fa fa-check'></span>";
          d4.innerHTML="<span class='glyphicon glyphicon-option-horizontal'></span>";
          e5.innerHTML="<span class='fa fa-close'></span>";
           Toastify({ 
                    text: "Success!\n You have successifully filled your academics details.\nKindly your secondary school grades here",
                    duration: 6000,
                    className: "primary",
                   style: {
                       background: "linear-gradient(to right, #00b09b, #96c93d)",
                     }
                }).showToast();

          $("#home-panel").load("widget/secondary-grades.php");

        }
        else
        {
          if (front.length === 0 || back.length === 0 || slip.length === 0 || higher.length === 0 || pass.length === 0) {

          personal.style.color="green";
          family.style.color="green";
          academic.style.color="green";
          grades.style.color="green";
          documents.style.color="#17A2B8";
          a1.innerHTML="<span class='fa fa-check'></span>";
          b2.innerHTML="<span class='fa fa-check'></span>";
          c3.innerHTML="<span class='fa fa-check'></span>";
          d4.innerHTML="<span class='fa fa-check'></span>";
          e5.innerHTML="<span class='glyphicon glyphicon-option-horizontal'></span>";
          
          $("#home-panel").load("widget/documents-attachments.php");

        } 
        else
        {
             var storedNames = JSON.parse(localStorage.getItem("names"));

             if(storedNames === null)
             {

             } else {
              document.getElementById("cart-numbers").innerHTML=storedNames.length;
              //document.getElementById("application-status").style.display='block';
             }

            
            $("#home-panel").load("widget/course-application-panel.php");
        
        }

        } 

        }

        } 
        }  
      });
  $("#personal-details").click(function(){
    $("#home-panel").load("widget/personal-data.php");
  }),
  $("#family-details").click(function(){
    $("#home-panel").load("widget/family-data.php");
  }),
  $("#academics-details").click(function(){
    $("#home-panel").load("widget/academic-data.php");
  }),
  $("#secondary-grades").click(function(){
    $("#home-panel").load("widget/secondary-grades.php");
  }),
  $("#documents-attach").click(function(){
    $("#home-panel").load("widget/documents-attachments.php");
  });
  $("#logoff").click(function(){
    document.location.href='logout.php';
  });
  
});
  
</script>
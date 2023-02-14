<?php
include '../includes/student-data.php';
$json = $_POST['data'];
$data = json_decode($json);
$course_id=$data[0];
$_SESSESION['course']=$course_id;
$course_id=$_SESSESION['course'];
$sql="SELECT * FROM  courses WHERE course_id='$course_id'";
  $result=mysqli_query($con,$sql) or die(mysql_error());
  while($row=mysqli_fetch_array($result))
       { 
       	$title = $row['course_title'];
       	$grade = $row['min_grade'];
       	$other = $row['other_qualities'];
       }
       echo "You are about to apply for ".$title;

?>
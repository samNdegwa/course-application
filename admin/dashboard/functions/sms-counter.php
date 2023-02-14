<?php
$sql="SELECT * FROM tb_messages";
$result=mysqli_query($con,$sql) or die(mysql_error());
$msgs=0;
while($row=mysqli_fetch_array($result))
    {
      $msgs++;
    } 

$sql="SELECT * FROM tb_messages WHERE NOT status='Success'";
$result=mysqli_query($con,$sql) or die(mysql_error());
$nomsgs=0;
while($row=mysqli_fetch_array($result))
    {
      $nomsgs++;
    } 


$sql="SELECT * FROM tb_messages WHERE status='Success'";
$result=mysqli_query($con,$sql) or die(mysql_error());
$succ=0;
while($row=mysqli_fetch_array($result))
    {
      $succ++;
    }             
?>
<?php
    include '../core/init.php';
    $stamp=$_SESSION['stamp'];
    $sql = "DELETE FROM tb_messages WHERE stamp='$stamp'";
    if (mysqli_query($con, $sql)) {
         ?>
           <script>
             document.location.href='./';
           </script>
         <?php
    } else {
       ?>
           <script>
             document.location.href='./';
           </script>
         <?php
    }
    
	mysqli_close($con);
?>
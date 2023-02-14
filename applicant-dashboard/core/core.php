<?php
require 'connection/database.php';
session_start();
	$json = $_POST['data'];
	$data = json_decode($json);

	$username = $data[0];
	$password = $data[1];
	$sql = "select * from students where email = '$username' and password='$password'";

	$result = $con->query($sql);

	$rows = $result->num_rows;

	if($rows !== 0){
		 $sqls="SELECT auth_status FROM students WHERE email='$username'";
          $results=mysqli_query($con,$sqls) or die(mysql_error());
          while($rows=mysqli_fetch_array($results))
              {
               $auth_status=$rows['auth_status'];
              }
              if($auth_status === '0')
              {
              	echo "inactive";
              } else {
		echo "success";
		$_SESSION['mypassword'] = $password;
		$_SESSION['myemail']= $username;
	}
	}
	else {
		$name = '';
		$sql1 = "select * from students where email = '$username'";

	    $result1 = $con->query($sql1);

	     $rows1 = $result1->num_rows;

		  for($a = 0 ; $a < $rows1; $a++){
			$result1->data_seek($a); 
			$name = $result1->fetch_assoc()['email'];

		}
        
		if (empty($name)===true) {
			echo "empty";
		}
		else
		{
            echo "wrong";
		
	    }
	}

?>
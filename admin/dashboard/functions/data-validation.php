<?php
$length=strlen($phone);
 $i=0;
 $newNumber;
 while ( $i<= $length) {
 	$chr= $phone[$i];
 	if(is_numeric($chr) || preg_match('/[a-zA-Z]/', $chr))
       {
          $newNumber=$newNumber.$chr;
       }else{
 	      
        }
 	       $i++;
        }

      $newLength=strlen($newNumber);
      if ($newLength<10 && is_numeric($newNumber[0])) {
      	$newNumber='0'.$newNumber;
      } else {

      }
?>
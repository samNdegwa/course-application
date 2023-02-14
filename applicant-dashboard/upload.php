<?php

session_start();
//upload.php
if ($_FILES["file"]["name"] != '') {
    if (isset($_SESSION['registree_id'])) {
        $test = explode('.', $_FILES["file"]["name"]);
        $ext = end($test);

        $date = date_create();
        $n1 = date_timestamp_get($date);

        $id = $_SESSION['registree_id'];

        $n3 = rand(100000, 999999); // '.' . $ext;
        $name = $id . '_' . $n1 . '.' . $ext;
        $location = 'images/docs' . $name;
        move_uploaded_file($_FILES["file"]["tmp_name"], $location);
//        echo '<img src="' . $location . '" height="150" width="225" class="img-thumbnail" /><br><p>' . $location . '</p>';
    echo $name;
        
    }
}
?>
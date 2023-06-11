<?php

session_start();
require_once "config/config.php";

    //$random_id = rand(111111, 999999);
    //$pic1 = $random_id; 
    //$target_dir = "uploads/" .$pic1;
    //$target_file1 = $target_dir . basename($_FILES["file1"]["name"]);
    //move_uploaded_file($_FILES["file1"]["tmp_name"], $target_file1);

if (isset($_POST["btnreplace1"])) {
    $file_id=$_POST["file-id"];
    $random_id = rand(111111, 999999);
    $pic1 = $random_id; 
    $target_dir = "uploads/" .$pic1;
    $target_file1 = $target_dir . basename($_FILES["filename1"]["name"]);
    move_uploaded_file($_FILES["filename1"]["tmp_name"], $target_file1);

    $sql = "UPDATE `application_image` 
            SET `filename`= '$target_file1' WHERE id = '$file_id'";
    $query = $con->query($sql);
    if ($query) {
        $_SESSION["notify"] = "replace";
        header("location: docs");
    } else {
        echo "error";
    }
    
}


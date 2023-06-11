<?php
session_start();
require_once "config/config.php";
if (isset($_POST["btnreplace2"])) {
    $file_id2=$_POST["file-id2"];
    $random_id = rand(111111, 999999);
    $pic1 = $random_id; 
    $target_dir = "uploads/" .$pic1;
    $target_file2 = $target_dir . basename($_FILES["filename2"]["name"]);
    move_uploaded_file($_FILES["filename2"]["tmp_name"], $target_file2);

    $sql = "UPDATE `application_documents` 
            SET `filename`= '$target_file2' WHERE id = '$file_id2'";
    $query = $con->query($sql);
    if ($query) {
        $_SESSION["notify"] = "replace";
        header("location: docs");
    } else {
        echo "error";
    }
    
}
<?php

if (isset($_POST["mybtn"])) {

    $target_dir = "uploads/";
    $target_file1 = $target_dir . basename($_FILES["file1"]["name"]);
    $target_file2 = $target_dir . basename($_FILES["file2"]["name"]);
    $target_file3 = $target_dir . basename($_FILES["file3"]["name"]);

    if (move_uploaded_file($_FILES["file1"]["tmp_name"], $target_file1)) {
        echo "success1";
    }
    if (move_uploaded_file($_FILES["file2"]["tmp_name"], $target_file2)) {
        echo "success2";
    }
    if (move_uploaded_file($_FILES["file3"]["tmp_name"], $target_file3)) {
        echo "success3";
    }
    else {
        echo "error";
    }
}
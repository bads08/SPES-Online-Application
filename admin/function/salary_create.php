<?php

require_once "../../config/config.php";

if (!empty($_POST["name"])) {
    $name = $_POST["name"];
    $date = date("Y,m,d");
    
    $sql2 = "SELECT * FROM salary WHERE salary_name = '$name'";
    $query2 = $con->query($sql2);
    if ($query2->num_rows > 0) {
        echo "Already Exist";
        return;
    }

    $sql = "INSERT INTO `salary`(`salary_name`, `date_created`) VALUES('$name', '$date')";
    $query = $con->query($sql);
    if ($query) {
        echo "Created Successfully";
    }else {
        echo "Failed to create";
    }
}else {
    echo "empty";
}
<?php
require_once "../../config/config.php";
if (!empty($_POST["beneficiary-name"]) && !empty($_POST["beneficiary-control"]) && !empty($_POST["beneficiary-amount"])) {
    $x = $_POST["beneficiary-name"];
    $y = $_POST["beneficiary-control"];
    $z = $_POST["beneficiary-amount"];
    $s = $_POST["salary-id"];
    
    $sql2 = "SELECT * FROM salary_beneficiary WHERE `name` = '$x' AND salary_id = '$s'";
    $query2 = $con->query($sql2);
    if ($query2->num_rows > 0) {
        echo "Beneficiary Already Exist";
        return;
    }

    $sql = "INSERT INTO `salary_beneficiary`(`control_no`, `name`, `amount`, `salary_id`) 
            VALUES ('$y','$x','$z','$s')";
    $query = $con->query($sql);
    if ($query) {
        echo "Added Successfully";
    } else {
        echo "Failed to add";
    }
    
    
}else {
    echo "Empty Field";
}
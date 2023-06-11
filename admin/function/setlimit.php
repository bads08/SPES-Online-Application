<?php
require_once "../../config/config.php";

if (!empty($_POST["data"])) {
    $getdate = date("Y-m-d");
    $getdata = $_POST["data"];

    $sql = "UPDATE `application_limit` 
            SET 
            `limit_no`='$getdata',
            `limit_date`='$getdate',
            `limit_status` = 'open'
            WHERE limit_id = 1";
            
    $query = $con->query($sql);
    if ($query === true) {
        echo "Submitted";
    }
}else{
    echo "empty";
}


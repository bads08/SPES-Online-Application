<?php
require_once "../../config/config.php";

if (isset($_POST["data_reset"])) {
    $getdatareset = $_POST["data_reset"];

    $sql = "UPDATE `application_limit` 
            SET 
            `limit_no`='$getdatareset',
            `limit_status` = 'closed'
            WHERE limit_id = 1";
            
    $query = $con->query($sql);
    if ($query === true) {
        echo "Resetted";
    }
}else{
    echo "empty";
}
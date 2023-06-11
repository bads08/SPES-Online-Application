<?php

require_once "../../config/config.php";

if (!empty($_POST["val_id"])) {
    $val_id = $_POST["val_id"];

    $sql = "DELETE FROM salary WHERE salary_id = '$val_id'";
    $query = $con->query($sql);
    if ($query) {
       echo "Deleted";
    }else {
        echo "failed to delete";
    }
}else {
    echo "empty";
}
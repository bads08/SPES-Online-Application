<?php

session_start();
require_once "../../config/config.php";

if (!empty($_POST["data"])) {
    $date = date("Y-m-d");
    $on    = $_POST["data"];


    $sql   = "UPDATE announcement SET ann_status = '2' WHERE ann_id = 1";
    $query = $con->query($sql);

    if (!$query) {
        echo "failed";
        return;
    }
    if ($query) {
        echo "Unposted!";
        return;
    }

}else {
    echo "Empty fields!";
}
?>
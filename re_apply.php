<?php
session_start();
require_once "config/config.php";

if (isset($_GET["stud_id"])) {
    $get = $_GET["stud_id"];
    $date = date("Y,m,d");
    $sql = "UPDATE `application` SET `application_status`='Approved',
           `date_approved` = '$date' 
           WHERE student_id = '$get'";
    $query = $con->query($sql);
    if ($query) {
        $_SESSION["notify"] = "re-app";
        header("location: profile");
    }
}


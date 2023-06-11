<?php

session_start();
require_once "../../config/config.php";

if (!empty($_POST["title"]) && !empty($_POST["announce"])) {
    $date = date("Y-m-d");
    $title    = $_POST["title"];
    $announce = $_POST["announce"];

    $sql   = "UPDATE announcement SET title = '$title', announce = '$announce', date_created = '$date' WHERE ann_id = 1";
    $query = $con->query($sql);

    if (!$query) {
        echo "faild to insert";
        return;
    }
    if ($query) {
        echo "Upddate success!";
        return;
    }

}else {
    echo "Empty fields!";
}
?>
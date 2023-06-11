<?php
session_start();
$mypass = $_SESSION["student_id"];
require_once "../../config/config.php";

if (!empty($_POST["old"])) {
    
    $old = $_POST["old"];

    $sql = "SELECT * FROM `student`
            WHERE `password` = '$mypass'";

    $query = $con->query($sql);
    $fetch = $query->fetch_assoc();
    $oldpass = $fetch["password"];
    if ($old == $oldpass) {
        echo "ok";
    }else {
        echo "invalid";
    }
    


}else {
    echo "empty";
}


      if ($query === true) {
          echo "Password changed.";
      }
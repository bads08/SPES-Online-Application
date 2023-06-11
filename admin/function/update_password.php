<?php
 session_start();
 require_once "../../config/config.php";


if (!empty($_POST["newPass"] && !empty($_POST["newOld"]))) {
    $cn = $_SESSION["control_no"];

    $sql = "SELECT * FROM `student`
         WHERE `control_no` = '$cn'";
   
       $query = $con->query($sql);
       $fetch = $query->fetch_assoc();
       $oldpass = $fetch["password"];

     $newpass = $_POST["newPass"];
     $oldpass2 = $_POST["newOld"];
     if ($oldpass2 == $oldpass) {
        $sql="UPDATE
        `student`
    SET
        `password` = '$newpass'
    WHERE
         control_no = '$cn'";
         $query = $con->query($sql);
         echo "change password success";
     } else {
        echo "Wrong old password";
     }
}else{
    echo "empty";
}

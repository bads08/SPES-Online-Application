<?php
 
 require_once "../../config/config.php";

 if (!empty($_POST["control_no"])) {
     $control_no = $_POST["control_no"];
     $fname = $_POST["fname"];
     $mname = $_POST["mname"];
     $lname = $_POST["lname"];
     $sex = $_POST["sex"];
     $email = $_POST["email"];
     $contact_no = $_POST["contact_no"];

     $sql = "UPDATE `student` 
     SET `fname`='$fname',`mname`='$mname',`lname`='$lname',`sex`='$sex',`email`='$email',`contact_no`='$contact_no'
 WHERE
     `control_no` = '$control_no'";
     
     $query = $con->query($sql);
     if ($query === true) {
         echo "Updated";
     }
 }
?>
<?php
 require_once "../../config/config.php";

 if (!empty($_POST["user_id"])) {
     $userid   = $_POST["user_id"];
     $fname    = $_POST["fname"];
     $lname    = $_POST["lname"];
     $username = $_POST["username"];
     $password = $_POST["password"];
     $usertype = $_POST["user_type"];

     $sql = "UPDATE
     `users`
 SET
     `fname` = '$fname',
     `lname` = '$lname',
     `username` = '$username',
     `password` = '$password',
     `user_type` = '$usertype'
 WHERE user_id = '$userid'";
     $query = $con->query($sql);
     if ($query === true) {
       echo "Edit successfully.";
     }
 }
?>
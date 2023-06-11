<?php
 require_once "../../config/config.php";

 if (!empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST["username"]) && !empty($_POST["password"])) {
     $fname    = $_POST["fname"];
     $lname    = $_POST["lname"];
     $username = $_POST["username"];
     $password = $_POST["password"];
     $usertype = $_POST["user_type"];

     $sqlstudent = "SELECT * FROM student WHERE username = '$username'";
     $querystudent = $con->query($sqlstudent);
     $sqlusers = "SELECT * FROM users WHERE username = '$username'";
     $queryusers = $con->query($sqlusers);

     if ($querystudent->num_rows > 0) {
       echo "Username is taken, try another Username";
       return;
     }
     if ($queryusers->num_rows > 0) {
      echo "Username is taken, try another Username";
      return;
    }
     

     $sql = "INSERT INTO `users`(`fname`, `lname`, `username`, `password`, `user_type`) 
             VALUES ('$fname','$lname','$username','$password','$usertype')";

     $query = $con->query($sql);
     if ($query === true) {
       echo "Create Successfully.";
     }
 }else{
     echo "Empty inputs!";
 }
?>
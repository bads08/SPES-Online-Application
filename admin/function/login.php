<?php
 session_start();
 require_once "../../config/spesClass.php";
 $spes = new spes();
 $check = true;
 $get_username = true;
 if(isset($_POST["loginBtn"])){
     $username = $_POST["username"];
     $password = $_POST["password"];
     $_SESSION["username"] = $_POST["username"];
     $_SESSION["password"] = $_POST["password"];
     
     $sql = "SELECT
     users.user_id,
     users.fname,
     users.lname,
     users.username,
     users.`password`,
     users.user_type,
     user_type.type_id,
     user_type.type_name
     FROM
     users
     INNER JOIN user_type ON users.user_type = user_type.type_id
     WHERE username = '$username'";
 $query = $spes->con()->query($sql);
 if ($query->num_rows > 0) {
     while ($row = $query->fetch_assoc()) {
         $get_fname    = $row["fname"]; 
         $get_type     = $row["user_type"];
         $get_type_name     = $row["type_name"]; 
         $get_username = $row["username"];
         $get_password = $row["password"];
     }
 }if ($username === $get_username) {
     $check = true;
 }else{
    $get_username = true;
     $_SESSION["notFound"] = "Account not found.";
     header("location: ../login");
     return;
 }
 if ($check === true) {
     if ($password === $get_password) {
        $_SESSION["user"] = $get_fname;
        $_SESSION["type"] = $get_type;
        $_SESSION["type_name"] = $get_type_name;
        $_SESSION["success"] = "success";
        header("location: ../dashboard");
     }else{
        $_SESSION["invalidPass"] = "Invalid password.";
        header("location: ../login");
     }

 }
 }
 

?>
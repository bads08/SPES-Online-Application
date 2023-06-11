<?php
 require_once "../../config/config.php";

 if (isset($_POST["userid"])) {
     $userid = $_POST["userid"];

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
     INNER JOIN user_type ON users.user_type = user_type.type_id WHERE user_id = '$userid'";
     $query = $con->query($sql);
     if ($query->num_rows > 0) {
         while ($row = $query->fetch_assoc()) {
             echo json_encode($row);
         }
     }
 }
?>
<?php
 require_once "../../config/config.php";

 if (isset($_POST["delete_id"])) {
     $id = $_POST["delete_id"];
     
     $sql = "DELETE FROM `users` WHERE user_id = '$id'";
     $query = $con->query($sql);
     if ($query === true) {
         echo "Deleted Successfully.";
     }
 }

?>
<?php
 require_once "../../config/config.php";

 if (isset($_POST["delete_id"])) {
     $id = $_POST["delete_id"];
     
     $sql = "DELETE FROM `student` WHERE student_id = '$id'";
     $sql2 = "DELETE FROM `application` WHERE student_id = '$id'";
     $query = $con->query($sql);
     $query2 = $con->query($sql2);
     if ($query === true && $query2 === true) {
         echo "Deleted Successfully.";
     }
 }

?>
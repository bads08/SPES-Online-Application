<?php
 require_once "../../config/config.php";

 if (isset($_POST["delete_id"])) {
     $id = $_POST["delete_id"];
     echo $id;
 }

?>
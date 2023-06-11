<?php
 require_once "../../config/config.php";

 if (isset($_POST["u_id"])) {
     $id = $_POST["u_id"];
     echo $id;
 }

?>
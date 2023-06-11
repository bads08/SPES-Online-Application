<?php
 session_start();
 unset($_SESSION["uname"]);
 unset($_SESSION["control_no"]);
 unset($_SESSION["email"]);
 unset($_SESSION["status"]);
 unset($_SESSION["student_id"]);
 session_destroy();
 header("location: ../../home");
?>
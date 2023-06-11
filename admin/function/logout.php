<?php
 session_start();
 unset($_SESSION["user"]);
 unset($_SESSION["type"]);
 header("location: ../login");
?>
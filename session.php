<?php
if (!isset($_SESSION["student_id"])) {
    header("location: home");
}
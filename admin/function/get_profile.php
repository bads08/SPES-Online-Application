<?php
 require_once "../../config/config.php";
 if (isset($_POST["control_no"])) {
     $control_no = $_POST["control_no"];

     $sql = "SELECT
     student.student_id,
     student.control_no,
     student.username,
     student.`password`,
     student.fname,
     student.mname,
     student.lname,
     student.sex,
     student.email,
     student.contact_no,
     student.`status`
     FROM
     student     
     WHERE control_no = '$control_no'";
     $query = $con->query($sql);
     if ($query->num_rows > 0) {
         while ($row = $query->fetch_assoc()) {
             echo json_encode($row);
         }
     }
 }
?>
<?php
 session_start();
 require_once "../../config/config.php";

 $username = $_POST["username"];
 $password  = $_POST["password"];
 //$_SESSION["email"] = $email;

 if (isset($_POST["login"])) {
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
     WHERE username = '$username'";
     $query = $con->query($sql);
     if ($query->num_rows > 0) {
         while ($row = $query->fetch_assoc()) {
             $uname = $row["username"];
             $ps = $row["password"];
             $email = $row["email"];
             $control_no = $row["control_no"];
             $status = $row["status"];
         }
         if ($password == $ps) {
             $_SESSION["status"] = $status;
             $_SESSION["control_no"] = $control_no;
             $_SESSION["email"] = $email;
             $_SESSION["uname"] = $uname;
             header("location: ../../application");
         }else{
            $_SESSION["wrong-pass"] = "<span class='text-danger'>wrong password</span>";
            header("location: ../../login");
         }
     }else{
        $_SESSION["not-found"] = "<span class='text-danger'>username not exist</span>";
        header("location: ../../login");
     }
 }
?>
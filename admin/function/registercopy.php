<?php
 session_start();
 require_once "../../config/config.php";

 $control_no = rand(111111, 999999);
 $uname = $_POST["username"];
 $pass = $_POST["password"];
 $uname = $_POST["username"];
 $email = $_POST["email"];
 $contact_no = $_POST["contact_no"];


 //generate sessions
 $_SESSION["firstname"]  = $fname;
 $_SESSION["middlename"] = $mname;
 $_SESSION["lastname"]   = $lname;
 if (isset($_POST["register"])) {
     $check = "SELECT
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
     WHERE username = '$uname'";
     $checkQuery = $con->query($check);
     if ($checkQuery->num_rows > 0) {
        $_SESSION["exist"] = "<p class='text-red'>The username you've entered is already taken, Try another username</p>";
        header("location: ../../register");
     }else{
        $sql = "INSERT INTO `student`(`control_no`, `username`, `password`, `email`, `contact_no`) 
        VALUES ('$control_no','$uname','$pass','$email','$contact_no')";

        $query = $con->query($sql);
        if ($query === true) {
        $sql2 = "UPDATE `application_limit` 
                 SET `limit_no` = `limit_no` - 1 
                 WHERE `limit_id` = 1";
        $query2 = $con->query($sql2);
        header("location: ../../registered");
        }
     }
 }
?>




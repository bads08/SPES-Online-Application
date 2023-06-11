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
             $stud_id = $row["student_id"];
             $uname = $row["username"];
             $ps = $row["password"];
             $email = $row["email"];
             $control_no = $row["control_no"];
             $contact = $row["contact_no"];
             $status = $row["status"];
             $f = $row["fname"];
             $m = $row["mname"];
             $l = $row["lname"];
         }

     ///////////////////////////////REDIRECT TO APPLICATION FORM///////////////////////////////////////
         if ($password == $ps) {
             $_SESSION["student_id"] = $stud_id;
             $_SESSION["status"] = $status;
             $_SESSION["control_no"] = $control_no;
             $_SESSION["contact_no"] = $contact;
             $_SESSION["email"] = $email;
             $_SESSION["uname"] = $uname;
             $_SESSION["f"] = $f;
             $_SESSION["m"] = $m;
             $_SESSION["l"] = $l;
             header("location: ../../application");
         }else{
            $_SESSION["wrong-pass"] = "<span class='text-danger'>wrong password</span>";
            header("location: ../../login");
         }
     }else if($query->num_rows <= 0){
        $sql = "SELECT
        users.user_id,
        users.fname,
        users.lname,
        users.username,
        users.`password`,
        users.user_type,
        user_type.type_id,
        user_type.type_name
        FROM
        users
        INNER JOIN user_type ON users.user_type = user_type.type_id
        WHERE username = '$username'";
    $query = $con->query($sql);
    if ($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
            $get_fname    = $row["username"]; 
            $get_type     = $row["user_type"];
            $get_type_name     = $row["type_name"]; 
            $get_username = $row["username"];
            $get_password = $row["password"];
        }
    }if ($username === $get_username) {
        $check = true;
    }else{
       $get_username = true;
       $_SESSION["not-found"] = "<span class='text-danger'>user not found</span>";
        header("location: ../../login");
        return;
    }
    ///////////////////////////////////REDIRECT TO DASHBOARD ADMIN
    if ($check === true) {
        if ($password === $get_password) {
           $_SESSION["user"] = $get_fname;
           $_SESSION["type"] = $get_type;
           $_SESSION["type_name"] = $get_type_name;
           $_SESSION["success"] = "success";
           header("location: ../dashboard");
        }else{
            $_SESSION["wrong-pass"] = "<span class='text-danger'>wrong password</span>";
           header("location: ../../login");
        }
   
    }
        
     }else {

        $_SESSION["not-found"] = "<span class='text-danger'>username not exist</span>";
        header("location: ../../login");
        
     }
 }
?>
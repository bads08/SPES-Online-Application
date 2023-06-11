<?php
session_start();
require_once "config/config.php";

if (isset($_POST["appBtn"])) {
    $random_id = rand(111111, 999999);
    $date = date("Y-m-d");

    $session_stud_id  = $_SESSION["student_id"];
    $email            = $_SESSION["email"];

    $surname = $_POST["surname"];
    $fname = $_POST["fname"];
    $mname = $_POST["mname"];
    $gsis = $_POST["gsis_benefitiary"];
    $gsis_relationship = $_POST["relationship"];
    $birthday = $_POST["birthday"];
    $place_birth = $_POST["place_birth"];
    $citizenship = $_POST["citizenship"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];
    $social = $_POST["social"];
    $status = $_POST["status"];
    $sex = $_POST["sex"];
    $type = $_POST["type"];
    $parent_status = $_POST["parent_status"];
    $present_add = $_POST["present_add"];
    $permanent_add = $_POST["permanent_add"];
    $fathers_name = $_POST["fathers_name"];
    $fathers_occ = $_POST["fathers_occupation"];
    $mothers_name = $_POST["mothers_name"];
    $mothers_occ = $_POST["mothers_occupation"];

    $elementary = $_POST["elementary_school"];
    $elem_earned = $_POST["elementary_course"];
    $elem_level = $_POST["elementary_level"];
    $elem_attend = $_POST["elementary_date_attendance"];

    $secondary = $_POST["secondary_school"];
    $second_earned = $_POST["secondary_course"];
    $second_level = $_POST["secondary_level"];
    $second_attend = $_POST["secondary_date_attendance"];

    $tertiary = $_POST["tertiary_school"];
    $tertiary_earned = $_POST["tertiary_course"];
    $tertiary_level = $_POST["tertiary_level"];
    $tertiary_attend = $_POST["tertiary_date_attendance"];

    $tec_voc = $_POST["tech_school"];
    $tec_voc_earned = $_POST["tech_course"];
    $tec_voc_level = $_POST["tech_level"];
    $tec_voc_attend = $_POST["tech_date_attendance"];

    //new

    $skills = $_POST["skills"]; 

    $a = $_POST["1st"]; 
    $b = $_POST["1history"]; 
    $c = $_POST["1year"]; 
    $d = $_POST["1spesid"]; 

    $e = $_POST["2nd"]; 
    $f = $_POST["2history"]; 
    $g = $_POST["2year"]; 
    $h = $_POST["2spesid"]; 

    $i = $_POST["3rd"]; 
    $j = $_POST["3history"]; 
    $k = $_POST["3year"]; 
    $l = $_POST["3spesid"]; 

    $m = $_POST["4th"]; 
    $n = $_POST["4history"]; 
    $o = $_POST["4year"]; 
    $p = $_POST["4spesid"]; 
    

    
    
    $pic1 = $random_id; 
    $target_dir = "uploads/" .$pic1;
    $target_file1 = $target_dir . basename($_FILES["file1"]["name"]);
    $target_file2 = $target_dir . basename($_FILES["file2"]["name"]);
    $target_file3 = $target_dir . basename($_FILES["file3"]["name"]);
    $target_file4 = $target_dir . basename($_FILES["file4"]["name"]);



    $sql = "INSERT INTO `application`(
        `application_id`,
        `surname`,
        `firstname`,
        `middlename`,
        `gsis`,
        `gsis_relationship`,
        `birthday`,
        `place_of_birth`,
        `citizenship`,
        `contact`,
        `email`,
        `social_account`,
        `status`,
        `sex`,
        `applicant_type`,
        `status_parents`,
        `present_add`,
        `permanent_add`,
        `fathers_name`,
        `fathers_occupation`,
        `mothers_name`,
        `mothers_occupation`,
        `elementary`,
        `elementary_earned`,
        `elementary_level`,
        `elementary_attend`,
        `secondary`,
        `secondary_earned`,
        `secondary_level`,
        `secondary_attend`,
        `tertiary`,
        `tertiary_earned`,
        `tertiary_level`,
        `tertiary_attend`,
        `tech_voc`,
        `tech_voc_earned`,
        `tech_voc_level`,
        `tech_voc_ettend`,
    `skills`,
    `1avail`,
    `1history`,
    `1year`,
    `1spes_id`,
    `2avail`,
    `2history`,
    `2year`,
    `2spes_id`,
    `3avail`,
    `3history`,
    `3year`,
    `3spes_id`,
    `4avail`,
    `4history`,
    `4year`,
    `4spes_id`,
        `date_created`,
        `student_id`,
        `application_status`,
        `date_approved`
    )
    VALUES(
        '$random_id',
        '$surname',
        '$fname',
        '$mname',
        '$gsis',
        '$gsis_relationship',
        '$birthday',
        '$place_birth',
        '$citizenship',
        '$contact',
        '$email',
        '$social',
        '$status',
        '$sex',
        '$type',
        '$parent_status',
        '$present_add',
        '$permanent_add',
        '$fathers_name',
        '$fathers_occ',
        '$mothers_name',
        '$mothers_occ',
        '$elementary',
        '$elem_earned',
        '$elem_level',
        '$elem_attend',
        '$secondary',
        '$second_earned',
        '$second_level',
        '$second_attend',
        '$tertiary',
        '$tertiary_earned',
        '$tertiary_level',
        '$tertiary_attend',
        '$tec_voc',
        '$tec_voc_earned',
        '$tec_voc_level',
        '$tec_voc_attend',
        '$skills',
         '$a',
         '$b',
         '$c',
         '$d,
         '$e',
         '$f',
         '$g',
         '$h',
         '$i',
         '$j',
         '$k',
         '$l',
         '$m',
         '$n',
         '$o',
         '$p',
         '$date',
         '$session_stud_id',
         'Pending',
         '$date')";

    $query = $con->query($sql);
    if ($query === true) {
        $last_id = $con->insert_id;
        if (move_uploaded_file($_FILES["file1"]["tmp_name"], $target_file1)) {
            $sql1 = "INSERT INTO `application_image`(
                `application_id`,
                `student_id`,
                `name`,
                `filename`
            )
            VALUES('$random_id','$session_stud_id','2x2 ID Picture','$target_file1')";
            $query1 = $con->query($sql1);
        }
        if (move_uploaded_file($_FILES["file2"]["tmp_name"], $target_file2)) {
            $sql2 = "INSERT INTO `application_documents`(`application_id`, `student_id`,`name`, `filename`, `type`, `status`) 
                     VALUES ('$random_id','$session_stud_id','Birth Certificate','$target_file2','birth','verifying')";
            $query2 = $con->query($sql2);
        }
        if (move_uploaded_file($_FILES["file3"]["tmp_name"], $target_file3)) {
            $sql3 = "INSERT INTO `application_documents`(`application_id`, `student_id`,`name`, `filename`, `type`, `status`) 
                     VALUES ('$random_id','$session_stud_id','Cert. of Indigence','$target_file3','itr','verifying')";
            $query3 = $con->query($sql3);
        }
        if (move_uploaded_file($_FILES["file4"]["tmp_name"], $target_file4)) {
            $sql4 = "INSERT INTO `application_documents`(`application_id`, `student_id`,`name`, `filename`, `type`, `status`) 
                     VALUES ('$random_id','$session_stud_id','Grades/Cert. of OSY','$target_file4','grade','verifying')";
            $query4 = $con->query($sql4);
        }


        $sqlUpStatus = "UPDATE `student` 
                        SET `status`= 'Applied'
                        WHERE `student_id` = '$session_stud_id'";
        $queryUpStatus = $con->query($sqlUpStatus);
        header("location: success");
    } else {
        echo "failed to insert";
    }
    
     
}

?>
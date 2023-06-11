<?php
session_start();
require_once "../../config/config.php";




if (isset($_POST["appBtn"])) {
    $random_id = rand(111111, 999999);
    $date = date("Y-m-d");

    $session_stud_id  = $_SESSION["student_id"];
    $email            = $_SESSION["email"];

    $surname = $_POST["surname"];
    $fname = $_POST["fname"];
    $mname = $_POST["mname"];
    $gsis = $_POST["gsis_benefitiary"].$_POST["relationship"];
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
    
    
    $pic1 = $random_id . $_FILES['ext']; 
    $target_dir = "../../uploads/";
    $target_file1 = $target_dir . basename($_FILES["file1"]["name"]);
    $target_file2 = $target_dir . basename($_FILES["file2"]["name"]);
    $target_file3 = $target_dir . basename($_FILES["file3"]["name"]);



    $sql = "INSERT INTO `application`(

        `application_id`,
        `surname`,
        `firstname`,
        `middlename`,
        `gsis`,
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
        `date_created`,
        `student_id`)
    VALUES(
        '$random_id',
        '$surname',
        '$fname',
        '$mname',
        '$gsis',
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
        '$date',
        '$session_stud_id')";
    $query = $con->query($sql);
    if ($query === true) {
        $last_id = $con->insert_id;
        if (move_uploaded_file($_FILES["file1"]["tmp_name"], $target_file1)) {
            $file1 = basename( $_FILES["file1"]["name"]);
            $sql1 = "INSERT INTO `application_image`(
                `application_id`,
                `student_id`,
                `filename`
            )
            VALUES('$random_id','$last_id','$random_id$file1')";
            $query1 = $con->query($sql1);
        }
        if (move_uploaded_file($_FILES["file2"]["tmp_name"], $target_file2)) {
            $file2 = basename( $_FILES["file2"]["name"]);
            $sql2 = "INSERT INTO `application_documents`(
                `application_id`,
                `student_id`,
                `filename`
            )
            VALUES('$random_id','$last_id','$file2')";
            $query2 = $con->query($sql2);
        }
        if (move_uploaded_file($_FILES["file3"]["tmp_name"], $target_file3)) {
            $file3 = basename( $_FILES["file3"]["name"]);
            $sql3 = "INSERT INTO `application_student_grade`(
                `application_id`,
                `student_id`,
                `filename`
            )
            VALUES('$random_id','$last_id','$file3')";
            $query3 = $con->query($sql3);
        }
        $sqlUpStatus = "UPDATE `student` 
                        SET `status`= 'Applied'
                        WHERE control_no = '$session_stud_id'";
        $queryUpStatus = $con->query($sqlUpStatus);
        header("location: ../../success");
    } else {
        echo "failed to insert";
    }
    
     
}

?>
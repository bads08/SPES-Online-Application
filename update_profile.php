<?php
session_start();
require_once "config/config.php";
if (isset($_POST["updateAppBtn"])) {
    $random_id = rand(111111, 999999);
    $date = date("Y-m-d");

    $session_stud_id  = $_SESSION["student_id"];
    $email            = $_SESSION["email"];

    $surname = $_POST["surname"];
    $fname = $_POST["fname"];
    $mname = $_POST["mname"];
    $gsis = $_POST["gsis_benefitiary"];
    $gsis_relationship = "gsisrelationship";
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
    

    $sql = "UPDATE
    `application`
SET
    `surname` = '$surname',
    `firstname` = '$fname',
    `middlename` = '$mname',
    `gsis` = '$gsis',
    `gsis_relationship` = '$gsis_relationship',
    `birthday` = '$birthday',
    `place_of_birth` = '$place_birth',
    `citizenship` = '$citizenship',
    `contact` = '$contact',
    `email` = '$email',
    `social_account` = '$social',
    `status` = '$status',
    `sex` = '$sex',
    `applicant_type` = '$type',
    `status_parents` = '$parent_status',
    `present_add` = '$present_add',
    `permanent_add` = '$permanent_add',
    `fathers_name` = '$fathers_name',
    `fathers_occupation` = '$fathers_occ',
    `mothers_name` = '$mothers_name',
    `mothers_occupation` = '$mothers_occ',
    `elementary` = '$elementary',
    `elementary_earned` = '$elem_earned',
    `elementary_level` = '$elem_level',
    `elementary_attend` = '$elem_attend',
    `secondary` = '$secondary',
    `secondary_earned` = '$second_earned',
    `secondary_level` = '$second_level',
    `secondary_attend` = '$second_attend',
    `tertiary` = '$tertiary',
    `tertiary_earned` = '$tertiary_earned',
    `tertiary_level` = '$tertiary_level',
    `tertiary_attend` = '$tertiary_attend',
    `tech_voc` = '$tec_voc',
    `tech_voc_earned` = '$tec_voc_earned',
    `tech_voc_level` = '$tec_voc_level',
    `tech_voc_ettend` = '$tec_voc_attend',
    `date_created` = '$date'
WHERE student_id = '$session_stud_id'";

$query = $con->query($sql);
if ($query === true) {
    $_SESSION["notify"] = "profile-update";
    header("location: profile.php");
} else {
    echo "failed to update";
}

    
}
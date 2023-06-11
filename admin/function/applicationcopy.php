<?php
session_start();
require_once "../../config/config.php";


$date = date("Y-m-d");
$control_no = $_SESSION["control_no"];
$email      = $_SESSION["email"];

$fname            = $_POST["fname"];
$mname            = $_POST["mname"];
$lname            = $_POST["lname"];
$birthday         = $_POST["birthday"];
$birth_place      = $_POST["birth_place"];
$address          = $_POST["address"];
$age              = $_POST["age"];
$sex              = $_POST["sex"];
$religion         = $_POST["religion"];
$barangay         = $_POST["barangay"];
$street           = $_POST["street"];
$sitio            = $_POST["sitio"];
$fathers_name     = $_POST["fathers_name"];
$fathers_occupation      = $_POST["fathers_occupation"];
$mothers_name            = $_POST["mothers_name"];
$mothers_occupation      = $_POST["mothers_occupation"];



if (isset($_POST["appBtn"])) {
    //sessions
    $_SESSION["app_code"] = $applicant_code;
    $_SESSION["email"]    = $email;
    $_SESSION["lname"]    = $lname;

    $sql = "INSERT INTO `application`(`control_no`, `fname`, `mname`, `lname`, `birthday`, `birth_place`, `address`, `age`, `sex`, `religion`, `barangay`, `street`, `sitio`, `fathers_name`, `fathers_occupation`, `mothers_name`, `mothers_occupation`, `status`,`date`) 

    VALUES ('$control_no','$fname','$mname','$lname','$birthday','$birth_place','$address','$age','$sex','$religion','$barangay','$street','$sitio','$fathers_name','$fathers_occupation','$mothers_name','$mothers_occupation','Pending','$date')";
    $query = $con->query($sql);
    $last_id = $con->insert_id;

    //file upload config.
    $targetDir   = "../../uploads/";
    $allowTypes  = array("pdf");

    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = "";
    $fileNames   = array_filter($_FILES["requirements"]["name"]);
    if (!empty($fileNames)) {
        foreach ($_FILES["requirements"]["name"] as $key => $val) {
            //file upload path
            $fileName        = basename($_FILES["requirements"]["name"][$key]);
            $targetFilePath  = $targetDir . $fileName;
            //check wether file type is valid
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            if (in_array($fileType, $allowTypes)) {
                //upload file to server
                if (move_uploaded_file($_FILES["requirements"]["tmp_name"][$key], $targetFilePath)) {
                    $insertValuesSQL = $fileName;
                }else {
                    $errorUpload .= $_FILES['requirements']['name'][$key].' | ';
                }
                
            }else {
                $errorUploadType .=$_FILES['requirements']['name'][$key]. ' | ';
            }

            //error message
            $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):'';
            $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):'';
            $errorMsg   = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType;

            if (!empty($insertValuesSQL)) {
                
                //insert pdf file name into database
                $insert = $con->query("INSERT INTO `requirements`(`applicant_id`,`file_name`,`uploaded_on`,`status`) VALUES ('$control_no','$insertValuesSQL','$date','ok')");
                
                
                if ($query === true) {

                    $sqlUpStatus = "UPDATE `student` 
                                    SET `status`= 'Applied'
                                    WHERE control_no = '$control_no'";

                    $queryUpStatus = $con->query($sqlUpStatus);
                    $_SESSION["status"] = "Applied";

                    //session die
                    unset($_SESSION["firstname"]);
                    unset($_SESSION["lastname"]);
                    unset($_SESSION["middlename"]);
                    header("Location: mail_send.php");

                    //echo "files are uploaded succesfully".$errorMsg;
                    
                }else {
                    //echo "error uploading";
                    header("Location: ../../invalid");
                }
                
            }else {
                //echo "upload failed".$errorMsg;
                header("Location: ../../invalid");
            }
        }
    }else {
        echo "please select a file";
    }














    
}

?>
<?php
require_once "../../config/config.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '..\..\plugins\PHPMailer-master\src\Exception.php';
require '..\..\plugins\PHPMailer-master\src\PHPMailer.php';
require '..\..\plugins\PHPMailer-master\src\SMTP.php';

 $get_id = $_POST["id"];

 $retsql = "SELECT
 application.application_id,
 application.surname,
 student.student_id,
 student.email 
 FROM
 application
 INNER JOIN student ON application.student_id = student.student_id
 WHERE student.student_id = '$get_id'";
$retquery = $con->query($retsql);
if ($retquery->num_rows > 0) {
    while ($row = $retquery->fetch_assoc()) {
        $email          = $row["email"];
        $last_name = $row["surname"];
        $application_id = $row["application_id"];
    }
}
 
 if (isset($_POST["id"])) {
     $date_approved = date("Y,m,d");
     $sql = "UPDATE
     `application`
             SET
            `application_status` = 'Approved',
            `date_approved` = '$date_approved'
             WHERE `student_id` = '$get_id'";
     $query = $con->query($sql);


         $sql2 = "UPDATE `application_limit` 
         SET `limit_no` = `limit_no` - 1 
         WHERE `limit_id` = 1";
         $query2 = $con->query($sql2);
     //email notification

// passing true in constructor enables exceptions in PHPMailer
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


//Server settings
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
$mail->isSMTP();                                            //Send using SMTP
$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = 'idkmingga@gmail.com';                     //SMTP username
$mail->Password   = 'mandangen@081996';                               //SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//Recipients
$mail->setFrom('idkmingga@gmail.com', 'SPES');
$mail->addAddress($email, $lname);     //Add a recipient
$mail->addAddress($email);               //Name is optional
$mail->addReplyTo('idkmingga@gmail.com', 'Information');
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');

//Attachments
//$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

//Content
$mail->isHTML(true);                                  //Set email format to HTML
$mail->Subject = 'Status of your SPES Application';
$mail->Body    = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        body{
            box-sizing: border-box;
            padding: 0px;
            margin: 0px;
        }
        @media screen and (max-width: 500px) {
          div{
              width: 100%;
              margin: 0;
          }
        }
    </style>
</head>
<body>
    <div style="width: 100%;display: flex;justify-content: center; padding: 10px;">
        <table style="font-family:Arial, Helvetica, sans-serif; border-collapse: collapse;width: 50%;">
            <tr>
                <td style=""><center><img src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcRIL1v4Rn-kg-yiDOJQP4TXZpOTdbhssAWdJlGGqAsMgZWIBh2R" alt="logo" width="140px"></center></td>
            </tr>
            <tr>
                <td style="padding: 10px;font-size: 20px; font-weight: bold;color: rgb(10, 130, 209);background-color: rgb(243, 241, 241);"><center><span>Congratulations '.ucfirst($last_name).'! Youre application was approved.</span></center></td>
            </tr>
            <tr>
                <td style="height: 2%; padding-top:5px;color: rgb(97, 93, 93);background-color: rgb(243, 241, 241);"><center><span>Application Number: <strong>'.$application_id.'</strong></span></center></td>
            </tr>
            <tr>
                <td style="padding-top: 5px;color: rgb(97, 93, 93);padding-bottom: 10px;background-color: rgb(243, 241, 241);"><center><span></span></center></td>
            </tr>
        </table>
    </div>
</body>
</html>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

$mail->send();
     
     if ($query === true) {
         echo "Approved Successfully.";
     }else{
         echo "Error";
     }
 }
?>
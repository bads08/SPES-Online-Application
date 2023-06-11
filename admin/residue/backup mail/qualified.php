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
 `applicant_id`,
 `applicant_code`,
 `fname`,
 `lname`,
 `gender`,
 `brgy`,
 `st`,
 `email`,
 `contact_no`,
 `status`
FROM
 `applicant`
WHERE `applicant_id` = '$get_id'";
$retquery = $con->query($retsql);
if ($retquery->num_rows > 0) {
    while ($row = $retquery->fetch_assoc()) {
        $email          = $row["email"];
        $applicant_code = $row["applicant_code"];
        $lname          = $row["lname"];
    }
}
 
 if (isset($_POST["id"])) {
     $sql = "UPDATE
     `applicant`
             SET
            `status` = 'Approved' WHERE `applicant_id` = '$get_id'";
     $query = $con->query($sql);
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
<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="en">

<head>
	<title></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
	<style>
		* {
			box-sizing: border-box;
		}

		body {
			margin: 0;
			padding: 0;
		}

		a[x-apple-data-detectors] {
			color: inherit !important;
			text-decoration: inherit !important;
		}

		#MessageViewBody a {
			color: inherit;
			text-decoration: none;
		}

		p {
			line-height: inherit
		}

		@media (max-width:100px) {
			.row-content {
				width: 100% !important;
			}

			.mobile_hide {
				display: none;
			}

			.stack .column {
				width: 100%;
				display: block;
			}

			.mobile_hide {
				min-height: 0;
				max-height: 0;
				max-width: 0;
				overflow: hidden;
				font-size: 0px;
			}
		}
	</style>
</head>

<body style="background-color: #FFFFFF; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
	<table class="nl-container" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF;">
		<tbody>
			<tr>
				<td>
					<table class="row row-1 mobile_hide" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff;">
						<tbody>
							<tr>
								<td>
									<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; color: #000000; width: 500px;">
										<tbody>
											<tr>
												<td class="column" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
													<table class="image_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
														<tr>
															<td style="width:100%;padding-right:0px;padding-left:0px;">
																<div align="center" style="line-height:10px"><img src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcRIL1v4Rn-kg-yiDOJQP4TXZpOTdbhssAWdJlGGqAsMgZWIBh2R" alt="" width="150px"></div>
															</td>
														</tr>
													</table>
													<table class="heading_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
														<tr>
															<td style="text-align:center;width:100%;">
																<h1 style="margin: 0; color: #333131; direction: ltr; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 24px; font-weight: normal; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0;"><strong>Congratulations'.$lname.'! your qualified to our SPES Program.</strong></h1>
															</td>
														</tr>
													</table>
													<table class="text_block" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
														<tr>
															<td>
																<div style="font-family: sans-serif">
																	<div style="font-size: 14px; mso-line-height-alt: 16.8px; color: #555555; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
																		<p style="margin: 0; font-size: 14px; text-align: center;">Please stay tuned, we will contact you anytime.</p>
																	</div>
																</div>
															</td>
														</tr>
													</table>
													<table class="text_block" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
														<tr>
															<td>
																<div style="font-family: sans-serif">
																	<div style="font-size: 14px; mso-line-height-alt: 16.8px; color: #555555; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
																		<p style="margin: 0; font-size: 14px; text-align: center;">Application No.</p>
																		<p style="margin: 0; font-size: 14px; text-align: center;"><strong>'.$applicant_code.'</strong></p>
																	</div>
																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table><!-- End -->
</body>

</html>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

$mail->send();
     
     if ($query === true) {
         echo "Approved Successfully.";
     }
 }
?>
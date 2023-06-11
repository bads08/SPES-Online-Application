<?php
session_start();
require('../../plugins/fpdf/fpdf.php');
include "../../config/config.php";
$all = $_POST["option"];
$datetod = date("M d, Y");
$from = $_POST["from"];
$to = $_POST["to"];
$from2 = date("M d, Y", strtotime($from));
$to2 = date("M d, Y", strtotime($to));
if (isset($_POST["submit"])) {
    $status = $_POST["status"];

	if ($status == "Approved") {
		$st = "QUALIFIED";
	}
	if ($status == "Pending") {
		$st = "PENDING";
	}
	if ($status == "Dis-approved") {
		$st = "NOT-QUALIFIED";
	}


$fill = true;


$pdf = new FPDF('L','mm','LETTER');
//$pdf = new FPDF();

//set left margin
$pdf->SetTitle('Report',true);
$pdf->AddPage();

$pdf->Image('../../dist/img/left.png', 10, 9, 23, 23, 'PNG', '');
$pdf->Image('../../dist/img/r.jpg', 240.5, 9, 23, 23, 'JPG', '');
//title header
$pdf->SetFont('Arial','',10);
$pdf->SetX(90);
$pdf->Cell(90,5,'Republlic of the Philippines','','0','C');$pdf->Ln();
$pdf->SetX(90);
$pdf->Cell(90,5,'Region XII','','0','C');$pdf->Ln();
$pdf->SetX(90);
$pdf->Cell(90,5,'Province of Cotabato','','0','C');$pdf->Ln();
$pdf->SetX(90);
$pdf->Cell(90,5,'Municipality of Pikit','','0','C');
$pdf->SetFont('Arial','B',14);
$pdf->SetX(90);
$pdf->Cell(90,16,'Office of the Mayor','','0','C');
$pdf->SetFont('Arial','',10);
$pdf->SetX(90);
$pdf->Cell(90,28,'lgupikitoficial@gmail.com','','0','C');
$pdf->SetX(90);
$pdf->Cell(90,58,'LIST OF '.$st.' SPESS APPLICANTS ('.$from2.' - '.$to2.')','','0','C');

$pdf->Ln();
$pdf->SetFont('Arial','',9);

$pdf->SetY(60);
//set margin left
$pdf->SetLeftMargin(10);

// Colors, line width and bold font
$pdf->SetFillColor(217, 217, 217);
$pdf->SetDrawColor(0);
$pdf->SetLineWidth(0);




$pdf->SetFont('Arial','B',10);
$pdf->Cell(25,5,'Application ID','1','0','L',$fill);
$pdf->Cell(50,5,'Name','1','0','L',$fill);
$pdf->Cell(40,5,'Address','1','0','l',$fill);
$pdf->Cell(25,5,'Contact no','1','0','l',$fill);
$pdf->Cell(60,5,'Email','1','0','l',$fill);
$pdf->Cell(30,5,'Date Approved','1','0','l',$fill);
$pdf->Cell(25,5,'Status','1','0','l',$fill);
$pdf->Ln();


if ($all == "all") {
	$sql = "SELECT * FROM `application` WHERE application_status = '$status' AND date_approved BETWEEN 2000-01-01 AND '$to' ORDER BY surname,firstname";

	$query = $con->query($sql);
	if ($query->num_rows > 0) {
		while ($row = $query->fetch_assoc()) {
			
		$fullname = ucfirst($row["surname"]).", ".ucfirst($row["firstname"])." ".ucfirst($row["middlename"]);
		$code     = $row["application_id"];
		$address  = $row["present_add"];
		$email    = $row["email"];
		$contact  = $row["contact"];
		$stat     = $row["application_status"];
		$approved     = $row["date_approved"];
		

		//table row
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(25,5,$code,'1','0','L');
		$pdf->Cell(50,5,$fullname,'1','0','L');
		$pdf->Cell(40,5,ucwords($address),'1','0','l');
		$pdf->Cell(25,5,$contact,'1','0','l');
		$pdf->Cell(60,5,$email,'1','0','l');
		$pdf->Cell(30,5,date("M d, Y", strtotime($row["date_approved"])),'1','0','l');
		$pdf->Cell(25,5,$stat,'1','0','l');
		$pdf->Ln();

		}
		
	}elseif($query->num_rows <= 0){
		//table row
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(25,5,'','0','0','L');
		$pdf->Cell(35,5,'','0','0','L');
		$pdf->Cell(40,5,'','0','0','l');
		$pdf->Cell(23,5,'No Data','0','0','l');
		$pdf->Cell(58,5,'','0','0','l');
		$pdf->Cell(18,5,'','0','0','l');
		$pdf->Ln();
	}
	

	
		$pdf->SetFont('Arial','',10);
		$pdf->SetX(200);
		$pdf->Write(30, 'Generate By:'.' '.ucfirst($_SESSION['user']));
		$pdf->SetFont('Arial','',10);
		$pdf->SetX(200);
		$pdf->Write(40, 'Date Generate:'.' '.$datetod);


$pdf->Output();
} elseif($all == "current") {
	$sql = "SELECT * FROM `application` WHERE application_status = '$status' AND date_approved BETWEEN '$from' AND '$to'";

		$query = $con->query($sql);
		if ($query->num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
                
		    $fullname = ucfirst($row["surname"]).", ".ucfirst($row["firstname"])." ".ucfirst($row["middlename"]);
            $code     = $row["application_id"];
            $address  = $row["present_add"];
            $email    = $row["email"];
            $contact  = $row["contact"];
            $stat     = $row["application_status"];
			$approved     = $row["date_approved"];
			
	
			//table row
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(25,5,$code,'1','0','L');
			$pdf->Cell(50,5,$fullname,'1','0','L');
			$pdf->Cell(40,5,ucwords($address),'1','0','l');
			$pdf->Cell(25,5,$contact,'1','0','l');
            $pdf->Cell(60,5,$email,'1','0','l');
			$pdf->Cell(30,5,date("M d, Y", strtotime($row["date_approved"])),'1','0','l');
			$pdf->Cell(25,5,$stat,'1','0','l');
			$pdf->Ln();

			}
            
		}elseif($query->num_rows <= 0){
            //table row
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(25,5,'','0','0','L');
			$pdf->Cell(35,5,'','0','0','L');
			$pdf->Cell(40,5,'','0','0','l');
			$pdf->Cell(23,5,'No Data','0','0','l');
            $pdf->Cell(58,5,'','0','0','l');
			$pdf->Cell(18,5,'','0','0','l');
			$pdf->Ln();
        }
		
	
		
			$pdf->SetFont('Arial','',10);
			$pdf->SetX(200);
			$pdf->Write(30, 'Generate By:'.' '.ucfirst($_SESSION['user']));
			$pdf->SetFont('Arial','',10);
			$pdf->SetX(200);
			$pdf->Write(40, 'Date Generate:'.' '.$datetod);
   

$pdf->Output();
}

        
		

}
?>
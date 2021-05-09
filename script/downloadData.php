<?php
//include connection file 
include "conn_init.php";
include_once('..\..\Elaborato\fpdf\fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    //$this->Image('logo.png',10,-1,70);
    $this->SetFont('Arial','',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,'Resconto Lavoro',1,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
$display_heading = array('id'=>'ID', 'employee_name'=> 'Name', 'employee_age'=> 'Age','employee_salary'=> 'Salary',);

$result = mysqli_query($con, "SELECT * FROM Utente WHERE email='aldomob00@gmail.com'");
$result2=mysqli_query($con, "SELECT Data FROM SvolgeOperazione WHERE email='aldomob00@gmail.com' ORDER BY Email GROUP BY email");
//$header = mysqli_query($conn, "SHOW columns FROM employee");

$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',12);
$pdf->Ln();
$pdf->Write(10,"Ditta: Cantiere Buzi");
while($row = $result->fetch_row()) {
$pdf->Ln();
$pdf->Write(5,$row[3]." ".$row[4]." nato a: ".$row[6]." nel ".$row[5]);
$pdf->Ln();
$pdf->Write(5,"Dichiara");
while($row = $result2->fetch_row()) {
    $pdf->Ln();
$pdf->Write(0,$row[0]);
}
}
$pdf->Ln();

foreach($display_heading as $header) {
    $pdf->Cell(40,12,$header,1);
    }
$pdf->Output();
?>

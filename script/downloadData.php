<?php
//include connection file 
include "conn_init.php";
include_once('..\..\Elaborato\fpdf\fpdf.php');
include "MailSender.php";
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    //$this->Image('logo.png',10,-1,70);
    $this->SetFont('Arial','',13);
    // Move to the right
    $this->Cell(60);
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
$display_heading = array('id'=>'Indice', 'employee_name'=> 'Nome DPI', 'employee_age'=> 'Operazione');
$mmail= $_GET["memail"];
$session=$_GET["y"];
$autolog=$_GET["x"];
$sql="SELECT email, pass FROM Utente ";
$eemail="";
$result = mysqli_query($con,$sql);
while($row = $result->fetch_row()) {
    if(($session==md5($row[1].$row[0].$row[1]."aaa")||$autolog==md5($row[0].$row[1]))){
        $eemail=$row[0];
    }
   }
$GetName = mysqli_query($con, "SELECT * FROM Utente WHERE email='$eemail'");
$GetTime=mysqli_query($con, "SELECT MIN(Data), MAX(Data), SUM(Durata) FROM SvolgeOperazione WHERE email='$eemail'  GROUP BY email ORDER BY Data");
$GetType=mysqli_query($con, "SELECT DISTINCT NomeOperazione FROM SvolgeOperazione WHERE email='$eemail'");
$GetDPI=mysqli_query($con, "SELECT DISTINCT Nome FROM assegnazione WHERE NomeOperazione IN (SELECT DISTINCT NomeOperazione FROM SvolgeOperazione WHERE email='$eemail')");
//$header = mysqli_query($conn, "SHOW columns FROM employee");
$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',12);
$pdf->Ln();
$pdf->Write(8,"Ditta: Cantiere Buzi");
while($row = $GetName->fetch_row()) {
$pdf->Ln();
$pdf->Write(8,$row[3]." ".$row[4]." nato a: ".$row[6]." nel ".$row[5]);
$pdf->Ln();
$pdf->Write(8,"Si dichiara che il soggetto ha lavorato per la ditta dal ");
}
while($row = $GetTime->fetch_row()) {
    $date2 = date_create($row[1]); 
    $date= date_create($row[0]);
    $s=date_diff($date, $date2)->format('%a days');
$pdf->Write(8,$row[0]." al ".$row[1]." con un totale di ore lavorate corrispondente a: ".$row[2]." ore, con una media giornaliera di ".round((intval($row[2])/intval($s)),2). " ore.");
}
$pdf->Ln();
$pdf->Write(8,"Sotto riportiamo alcuni dati utili in formato tabellare sull'utilizzo dei DPI e delle operazione svolte dal soggetto:");
$pdf->Ln();
$index=1;
foreach($display_heading as $header) {
    $s=$index==1?20:83;
    $pdf->Cell($s,12,$header,1,0,"C");
    $index++;
    }
$data=  array();
$data2=  array();
while($row = $GetType->fetch_row()) {
    $data[]=$row[0];
}
while($row1= $GetDPI->fetch_row()) {
    $data2[]=$row1[0];
}
$index=1;
for($i=0;$i<max(count($data),count($data2));$i++){
    $pdf->Ln();
    $pdf->Cell(20,12,$index,1,0,"C");
    $index++;    !empty($data2[$i])? $pdf->Cell(83,12,$data2[$i],1,0,"C"):$pdf->Cell(83,12,"",1,0,"C") ;
    !empty($data[$i])?$pdf->Cell(83,12,$data[$i],1,0,"C"):$pdf->Cell(83,12,"",1,0,"C");
}
$mail->AddAddress($mmail, "Ciao ");
$pdfdoc = $pdf->Output('', 'S');
$mail->addStringAttachment($pdfdoc, 'RiepilogoDati.pdf');
$mail->AddCC("buziofficial00001@gmail.com", "Riepilogo Dati");
    $mail->Subject = "Richiesta Riepilogo Dati";
    $content = "Salve, in allegato trover&#224 il pdf con il riepilogo dei dati richiesti da lei. <br> Grazie! <br> Cantiere Buzi Customers Service.";  
$mail->MsgHTML($content); 
$mail->SMTPDebug = 0;
if(!$mail->Send()){
    echo "errore";
}
else{
    echo "email inviata";
}
?>

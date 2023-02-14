<?php
include '../../core/init.php';
require('../../assets/fpdf181/fpdf.php');
$techNumbers=$_SESSION['new_numbers'];
$techName=$_SESSION['tech_name'];
$techId=$_SESSION['tech_id'];
$cards=$_SESSION['new_totals'];
$amount=$_SESSION['amount'];
date_default_timezone_set('Africa/Nairobi');
$now = new DateTime();
$monthStamp=$now->format('mY');
$year=$now->format('Y');
$mn=$now->format('m');
if ($mn==='1'){ $mn='January'; }if ($mn==='2'){ $mn='Februry'; }if ($mn==='3'){ $mn='March'; }if ($mn==='4'){ $mn='April'; }
if ($mn==='5'){ $mn='May'; }if ($mn==='6'){ $mn='June'; }if ($mn==='7'){ $mn='July'; }if ($mn==='8'){ $mn='August'; }
if ($mn==='9'){ $mn='September'; }if ($mn==='10'){ $mn='October'; }if ($mn==='11'){ $mn='November'; }if ($mn==='12'){ $mn='December'; }

class PDF extends FPDF {
    function Header(){}
    function Footer()
    {
        date_default_timezone_set('Africa/Nairobi');
        $now = new DateTime();
        $dt=$now->format('d-m-Y  H:i:s');
        $this->SetY(-15);

        $this->SetFont('Arial','',7);

        $this->Cell(0,10,'Page'.$this->PageNo()."/{pages}",0,1,'C');
        $this->Cell(0,5,'This is a system generated document.  Printed on '.$dt,0,0,'R');
    }

}
$pdf = new PDF('P','mm','A4');

$pdf->AliasNbPages('{pages}');

$pdf->AddPage();
$pdf->SetFont('Arial', '',12);
$pdf->Image('../../assets/dist/img/ekas-log.PNG',10,12,35);
$pdf->Ln(6);
$pdf->SetFont('Arial', 'B',22);
$pdf->Cell(45,5,'',0,0);
$pdf->Cell(55,5,'EKAS TECHNOLOGIES LTD ',0,0);
$pdf->Cell(70,5,'',0,1);

$pdf->SetFont('Arial', '',13);
$pdf->Cell(45,7,'',0,0);
$pdf->Cell(71,7,'P.O. BOX 3100 -10140 NYERI, Off Wangombe Waihura Rd',0,0);
$pdf->Cell(0,7,'',0,1);

$pdf->Cell(45,7,'',0,0);
$pdf->Cell(50,7,'TEL: 0724315581. Email: info@ekastech.com',0,0);
$pdf->Cell(0,7,'',0,1);

$pdf->Cell(45,7,'',0,0);
$pdf->Cell(50,7,'Website: -www.ekastech.com',0,0);
$pdf->Cell(0,7,'',0,1);
$pdf->Ln(4);

$pdf->Cell(190,1,'',1,1);

$pdf->Ln(1);

$pdf->SetFont('Arial', 'B',13);
$pdf->Cell(100,10,$mn.','.$year.' Simcards Topup',0,0);
$pdf->Cell(50,10,'',0,0);
$pdf->Cell(0,10,'',0,1);

$pdf->SetFillColor(180,180,255);
$pdf->SetDrawColor(50,50,100);

$pdf->SetFont('Arial', 'B',11);
$pdf->Cell(10,5,'#',1,0,'',true);
$pdf->Cell(60,5,'Number',1,0,'',true);
$pdf->Cell(50,5,'Amount',1,0,'',true);
$pdf->Cell(70,5,'Comment',1,1,'',true);

$pdf->SetFont('Arial', '',8);
for ($a=0;$a<$cards;$a++){
    $pdf->Cell(10,3,$a+1,1,0);
    $pdf->Cell(60,3,$techNumbers[$a],1,0);
    $pdf->Cell(50,3,'',1,0);
    $pdf->Cell(70,3,'',1,1);
}

$pdf->Ln(5);

$pdf->SetFont('Arial', '',11);
$pdf->Cell(16,5,'Creditor:',0,0);
$pdf->Cell(40,5,$techName,0,0);
$pdf->Cell(23,5,'Total Cards:',0,0);
$pdf->Cell(10,5,$cards,0,0);
$pdf->Cell(42,5,'Amount Per Card(KES):',0,0);
$pdf->Cell(10,5,$amount,0,0);
$pdf->Cell(30,5,'Total Cost(KES):',0,0);
$pdf->Cell(10,5,$amount*$cards,0,1);

$pdf->Cell(25,10,'Creditor Sign:',0,0);
$pdf->Cell(30,10,'------------------',0,0);
$pdf->Cell(10,10,'Date',0,0);
$pdf->Cell(40,10,'------------------',0,0);
$pdf->Cell(25,10,'Officer Name:',0,0);
$pdf->Cell(30,10,'------------------',0,0);
$pdf->Cell(10,10,'Sign',0,0);
$pdf->Cell(30,10,'------------------',0,0);


$pdf->Output();

?>
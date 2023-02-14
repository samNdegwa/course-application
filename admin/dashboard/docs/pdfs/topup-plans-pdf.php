<?php
require('../../assets/fpdf181/fpdf.php');
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
$pdf->Cell(100,10,'October 2021 Simcards Topup Plan',0,0);
$pdf->Cell(50,10,'',0,0);
$pdf->Cell(0,10,'',0,1);

$pdf->SetFillColor(180,180,255);
$pdf->SetDrawColor(50,50,100);

$pdf->SetFont('Arial', 'B',11);


$pdf->Ln(5);

$pdf->SetFont('Arial', '',11);
$pdf->Cell(35,5,'Total Cards In Use :',0,0);
$pdf->SetFont('Arial', 'B',11);
$pdf->Cell(20,5,'3,962',0,0);
$pdf->SetFont('Arial', '',11);
$pdf->Cell(35,5,'Total Idle Cards:',0,0);
$pdf->SetFont('Arial', 'B',11);
$pdf->Cell(20,5,'683',0,0);
$pdf->SetFont('Arial', '',11);
$pdf->Cell(20,5,'All Cards:',0,0);
$pdf->SetFont('Arial', 'B',11);
$pdf->Cell(10,5,'4,645',0,1);

$pdf->Ln(5);
$pdf->SetFillColor(180,180,255);
$pdf->SetDrawColor(50,50,100);

$pdf->SetFont('Arial', 'B',11);
$pdf->Cell(5,8,'#',1,0,'',true);
$pdf->Cell(20,8,'Batch',1,0,'',true);
$pdf->Cell(15,8,'Status',1,0,'',true);
$pdf->Cell(30,8,'Top Date',1,0,'',true);
$pdf->Cell(25,8,'Total Cards',1,0,'',true);
$pdf->Cell(25,8,'@Mbs(KES)',1,0,'',true);
$pdf->Cell(30,8,'@Credit(KES)',1,0,'',true);
$pdf->Cell(35,8,'Total Cost(KES)',1,1,'',true);

$pdf->SetFont('Arial', '',12);
$pdf->Cell(5,8,'1',1,0);
$pdf->Cell(20,8,'Batch 1',1,0);
$pdf->Cell(15,8,'Active',1,0);
$pdf->Cell(30,8,'21-10-2021',1,0);
$pdf->Cell(25,8,'1,358',1,0);
$pdf->Cell(25,8,'30.00',1,0);
$pdf->Cell(30,8,'0.00',1,0);
$pdf->Cell(35,8,'40,740.00',1,1);

$pdf->Cell(5,8,'2',1,0);
$pdf->Cell(20,8,'Batch 2',1,0);
$pdf->Cell(15,8,'Active',1,0);
$pdf->Cell(30,8,'23-10-2021',1,0);
$pdf->Cell(25,8,'1,336',1,0);
$pdf->Cell(25,8,'30.00',1,0);
$pdf->Cell(30,8,'0.00',1,0);
$pdf->Cell(35,8,'40,080.00',1,1);

$pdf->Cell(5,8,'3',1,0);
$pdf->Cell(20,8,'Batch 3',1,0);
$pdf->Cell(15,8,'Active',1,0);
$pdf->Cell(30,8,'25-10-2021',1,0);
$pdf->Cell(25,8,'918',1,0);
$pdf->Cell(25,8,'30.00',1,0);
$pdf->Cell(30,8,'0.00',1,0);
$pdf->Cell(35,8,'27,540.00',1,1);

$pdf->Cell(5,8,'4',1,0);
$pdf->Cell(20,8,'Batch 4',1,0);
$pdf->Cell(15,8,'Idle',1,0);
$pdf->Cell(30,8,'15-12-2021',1,0);
$pdf->Cell(25,8,'683',1,0);
$pdf->Cell(25,8,'0.00',1,0);
$pdf->Cell(30,8,'0.00',1,0);
$pdf->Cell(35,8,'0.00',1,1);

$pdf->Ln(10);
$pdf->SetFont('Arial', 'B',12);
$pdf->Cell(130,8,'',0,0);
$pdf->Cell(30,8,'Total Cost: KES 108,360.00',0,1);

$pdf->Ln(70);
date_default_timezone_set('Africa/Nairobi');
        $now = new DateTime();
        $dt=$now->format('d-m-Y  H:i:s');
        $pdf->SetFont('Arial', '',5);
$pdf->Cell(0,5,'This is a system generated document.  Printed on '.$dt,0,0,'R');







$pdf->Output();

?>
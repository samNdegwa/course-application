<?php
include '../../core/init.php';
require('../../assets/fpdf181/fpdf.php');
date_default_timezone_set('Africa/Nairobi');
$now = new DateTime();
$monthStamp=$now->format('mY');
$year=$now->format('Y');
$mn=$now->format('m');

$date=$now->format('d-m-Y H:i');

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
$batchName=$_SESSION['batchName'];
$pdf->Cell(100,10,$batchName.' To be Toup on 15/12/2020',0,0);
$pdf->Cell(50,10,'',0,0);
$pdf->Cell(0,10,'',0,1);

$pdf->SetFillColor(180,180,255);
$pdf->SetDrawColor(50,50,100);

$pdf->SetFont('Arial', 'B',11);
$pdf->Cell(10,5,'#',1,0,'',true);
$pdf->Cell(60,5,'Number',1,0,'',true);
$pdf->Cell(50,5,'Network',1,0,'',true);
$pdf->Cell(50,5,'Sim Type',1,0,'',true);
$pdf->Cell(25,5,'Status',1,1,'',true);

$pdf->SetFont('Arial', '',8);
$batchId=$_SESSION['batchId'];
$sql="SELECT * FROM tb_sim_cards WHERE batch_id='$batchId' ORDER BY sim_id ASC";
$result=mysqli_query($con, $sql) or die(mysql_error());
$no=1;
while($row=mysqli_fetch_array($result))
{
    $identifier=$row['identifier'];
     $sim_type=$row['sim_type'];
     $network=$row['network'];
     $addeddate=$row['date_added'];
     $status=$row['status'];
     if ($status==='1') {
         $sta='Active';
     } else {
        $sta='Idle';
     }
    $pdf->Cell(10,3,$no,1,0);
    $pdf->Cell(60,3,$identifier,1,0);
    $pdf->Cell(50,3,$network,1,0);
    $pdf->Cell(50,3,$sim_type,1,0);
    $pdf->Cell(25,3,$sta,1,1);
    
    $no++;
}

$pdf->Ln(5);



$pdf->Output();

?>
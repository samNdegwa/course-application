<?php
require('WriteTag.php');

$pdf=new PDF_WriteTag();
//$pdf->SetMargins(30,15,25);
$pdf->SetFont('courier','',12);
$pdf->AddPage();

// Stylesheet
$pdf->SetStyle("p","times","N",12,15);
$pdf->SetStyle("h1","times","N",18,"102,0,102",0);
$pdf->SetStyle("a","times","BU",9,"0,0,255");
$pdf->SetStyle("pers","times","I",0,"255,0,0");
$pdf->SetStyle("place","arial","U",0,"0,0,0");
$pdf->SetStyle("vb","times","B",0,"0,0,0");

// Title
$pdf->Image('letter.jpg',10,12,192);

$pdf->Ln(40);
$pdf->SetFont('Arial', 'B',13);
$pdf->Cell(140,10,'Our Ref: SLCMC/ADM/MAR/2023  ',0,0);
$pdf->Cell(50,10,'Date: 22nd May 2022',0,1);

$pdf->Cell(140,10,'Dear: Alfred  ',0,0);
$pdf->Cell(50,10,'',0,1);

// Text
$txt=" 
<h1>RE: <vb><place>PROVISIONAL LETTER OF ADMISSION</place></vb></h1> 
<p>Following your application and fulfilment of course requirements, I am pleased to congratulate you on your selection for <vb>Higher Diploma in Kenya Registered Nephrology Nursing (KRNN)</vb>.  The course shall run for one (1) year on a full time basis. The reporting date shall be in <vb>March 2023, a date to be communicated to you later.</vb> </p>
";
//$pdf->WriteTag(0,10,$txt,0,1);
$pdf->WriteTag(0,10,$txt,1,"C",1,5);

$txt=" 
<p>Il <vb>était</vb> une fois <pers>une petite fille</pers> de <place>village</place>, 
la plus jolie qu'on <vb>eût su voir</vb>: <pers>sa mère</pers> en <vb>était</vb> 
folle, et <pers>sa mère grand</pers> plus folle encore. Cette <pers>bonne femme</pers> 
lui <vb>fit faire</vb> un petit chaperon rouge, qui lui <vb>seyait</vb> si bien 
que par tout on <vb>l'appelait</vb> <pers>le petit Chaperon rouge</pers>.</p> 

<p>Un jour <pers>sa mère</pers> <vb>ayant cuit</vb> et <vb>fait</vb> des galettes, 
<vb>lui dit</vb>: « <vb>Va voir</vb> comment <vb>se porte</vb> <pers>la mère-grand</pers>; 
car on <vb>m'a dit</vb> qu'elle <vb>était</vb> malade: <vb>porte-lui</vb> une 
galette et ce petit pot de beurre. »</p>
 
<p><pers>Le petit Chaperon rouge</pers> <vb>partit</vb> aussitôt pour <vb>aller</vb> 
chez <pers>sa mère-grand</pers>, qui <vb>demeurait</vb> dans <place>un autre village</place>. 
En passant dans <place>un bois</place>, elle <vb>rencontra</vb> compère <pers>le 
Loup</pers>, qui <vb>eut bien envie</vb> de <vb>la manger</vb>; mais il <vb>n'osa</vb> 
à cause de quelques <pers>bûcherons</pers> qui <vb>étaient</vb> dans 
<place>la forêt</place>.</p>
";

$pdf->SetLineWidth(0.1);
$pdf->SetFillColor(255,255,204);
$pdf->SetDrawColor(102,0,102);
$pdf->WriteTag(0,10,$txt,1,"J",0,7);

// Text paragraph
$pdf->Ln(5);

// Signature
$txt="<a href='http://www.pascal-morin.net'>Done by Pascal MORIN</a>";
$pdf->WriteTag(0,10,$txt,0,"R");

$pdf->Output();
?>

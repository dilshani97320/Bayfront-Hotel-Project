<?php

require('fpdf182/fpdf.php');
$db = new PDO('mysql:host=localhost;dbname=bayfront_hotel','root','');


//require('fpdf182/font/helvetica8.php');
//A4 width :219 mm
//default margin : 10mm each side
//writable horizontal :219. (10*2)=189mm
/**
 * 
 */
class mypdf extends FPDF
{
	
	function header()
	{
		$this->Image('logo.png',5,5,-300);
		
		$this->setfont('arial', 'B', 20);
		$this->cell(276,5,'Bay Front',0,0,'C');
		$this->Ln();
		$this->setfont('Times', '', 14);
		$this->cell(276,10,'Waligama,Srilanka',0,0,'C');
		$this->Ln();
		$this->cell(276,10,'bayfront@gmail.com',0,0,'R');
		$this->Ln();
		$this->cell(276,10,'+47 7723456',0,0,'R');
		$this->Ln();
		$this->cell(276,10,'2020-12-4',0,0,'R');
		$this->Ln();
		$this->Ln(30);
		$this->setfont('arial', 'B', 20);
		$this->cell(276,10,'BAYFRONT-DETAILS',0,0,'L');
		$this->Ln(20);


	}
	function footer()
	{
		$this-> setY(-15);
		$this->setfont('arial', '', 8);
		$this->cell(0,10,'page' .$this->PageNo().'/{nb}',0,0,'c');
	}
	
	
	
}


$pdf = new mypdf();
//$pdf->AliasNoPages();
$pdf->AddPage('L','A4',0);
$pdf->setfont('arial', '', 12);
$pdf->Ln(30);
$pdf->cell(55,5,'Refference code',0,0);
$pdf->cell(58,5,'867v5',0,0);
$pdf->cell(58,5,'Date',0,0);
$pdf->cell(58,5,'2020-40 23:22.00',0,0);
$pdf->Ln();
$pdf->cell(55,5,'Amount',0,0);
$pdf->cell(58,5,':342',0,0);
$pdf->Ln();
$pdf->cell(58,5,'channel',0,0);
$pdf->cell(58,5,':EWS',0,0);

$pdf->Ln();
$pdf->Line(5,6,7,8);
$pdf->cell(55,5,'Annual Income',0,0);
$pdf->cell(58,5,':EWS',0,0);

//$pdf->Line(10,30,200,30);
$pdf->Ln(10);
$pdf->cell(55,5,'channel',0,0);
$pdf->cell(58,5,':EWS',0,0);
$pdf->output();

//set font to arial,bold,14pt



?>

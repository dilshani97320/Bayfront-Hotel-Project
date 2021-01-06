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
		$this->cell(170,5,'Bay Front',0,0,'C');
		$this->Ln();
		$this->setfont('Times', '', 14);
		$this->cell(200,8,'Waligama,Srilanka',0,0,'R');
		$this->Ln();
		$this->cell(200,8,'bayfront@gmail.com',0,0,'R');
		$this->Ln();
		$this->cell(200,8,'+47 7723456',0,0,'R');
		$this->Ln();
		$this->cell(200,8,'2020-12-4',0,0,'R');
		$this->Ln();
		$this->Ln(20);
		$this->setfont('arial', 'B', 20);
		$this->cell(276,10,'BAYFRONT-RESERVATION',0,0,'L');
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
$pdf->AddPage('P','A4',0,1);


$pdf->setfont('Arial','',12);
//make dummy empty cell as a vertical spacer
$pdf->cell(189,10,'',0,1);

//billing address
$pdf->cell(100,5,'Bill to',0,1);

//add dummy cell at begining of each line for indentation
$pdf->cell(10,5,'',0,0);
$pdf->cell(90,10,'[Name]',0,1);

$pdf->cell(10,5,'',0,0);
$pdf->cell(90,10,'[Company Name]',0,1);

$pdf->cell(10,5,'',0,0);
$pdf->cell(90,10,'[Address]',0,1);

$pdf->cell(10,5,'',0,0);
$pdf->cell(90,10,'[Phone]',0,1);

//make dummy empty cell as a vertical spacer
$pdf->cell(189,10,'',0,1);

//invoice content
$pdf->setfont('Arial','B',12);

$pdf->cell(130,5,'Description',1,0);
$pdf->cell(25,5,'Taxable',1,0);
$pdf->cell(34,5,'Amount',1,1);

$pdf->setfont('Arial','',12);

//Numbers are right aligne so we give 'R'after new line parameter

$pdf->cell(130,5,'Description',1,0);
$pdf->cell(25,5,'-',1,0);
$pdf->cell(34,5,'1,200',1,1,'R');

$pdf->cell(130,5,'Description',1,0);
$pdf->cell(25,5,'-',1,0);
$pdf->cell(34,5,'6000',1,1,'R');

$pdf->cell(130,5,'Description',1,0);
$pdf->cell(25,5,'-',1,0);
$pdf->cell(34,5,'5000',1,1,'R');

//summary

$pdf->cell(130,5,'',0,0);
$pdf->cell(25,5,'-\Sub total',0,0);
$pdf->cell(4,5,'$',1,0);
$pdf->cell(30,5,'4.500',1,1,'R');




$pdf->Ln();


$pdf->output();

//set font to arial,bold,14pt



?>

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
		$this->cell(400,5,'Bay Front',0,0,'C');
		$this->Ln();
		$this->setfont('Times', '', 14);
		$this->cell(400,10,'Waligama,Srilanka',0,0,'C');
		$this->Ln();
		$this->cell(400,10,'bayfront@gmail.com',0,0,'R');
		$this->Ln();
		$this->cell(400,10,'+47 7723456',0,0,'R');
		$this->Ln();
		$this->cell(400,10,'2020-12-4',0,0,'R');
		$this->Ln();
		$this->Ln(30);
		$this->setfont('arial', 'B', 20);
		$this->cell(276,10,'BAYFRONT-PAYMENTS',0,0,'L');
		$this->Ln(20);
	}
	function footer()
	{
		$this-> setY(-15);
		$this->setfont('arial', '', 8);
		$this->cell(0,10,'page' .$this->PageNo().'/{nb}',0,0,'c');
	}
	function headerTable(){
         $this->setfont('Times', 'B', 14);
         $this->cell(40,10,'First Name',1,0,'C');
         $this->cell(40,10,'Last Name',1,0,'C');
         $this->cell(40,10,'contact No',1,0,'C');
         
         $this->cell(70,10,'E mail',1,0,'C');
         $this->cell(50,10,'Credit Card No',1,0,'C');
         $this->cell(50,10,'Expire month',1,0,'C');
         $this->cell(45,10,'expire year',1,0,'C');
          $this->cell(45,10,'CVV',1,0,'C');
         $this->Ln();

	}
	function viewTable($db)
	{
       $this->setfont('Times','',12);
       $stmt=$db->query('SELECT first_name,last_name,contact_number,email,credit_card_number,expire_month,expire_year,cvv FROM customer INNER JOIN payment ON customer.customer_id = payment.customer_id');
       while ($data =$stmt->fetch(PDO :: FETCH_OBJ)) {

       	   $this->setfont('Times', '', 14);
       	   $this->cell(40,10,$data->first_name,1,0,'C');
         $this->cell(40,10,$data->last_name,1,0,'C');
         $this->cell(40,10,$data->contact_number,1,0,'C');
         
         $this->cell(70,10,$data->email,1,0,'C');
         $this->cell(50,10,$data->credit_card_number,1,0,'C');
         $this->cell(50,10,$data->expire_month,1,0,'C');
         $this->cell(45,10,$data->expire_year,1,0,'C');
         $this->cell(45,10,$data->cvv,1,0,'C');
         //$this->cell(50,10,'Salary',1,0,'C');
         $this->Ln();
       }
	}
	/*function viewOther($db)
	{
		$this->setfont('Times','',12);
         $stmt=$db->query('SELECT SUM(salary) FROM employee');
         $this->cell(66,10,'total salary=',1,0,'C');
        // while ($data =$stmt->fetch(PDO :: FETCH_OBJ)) {
             $this->cell(30,10,$stmt,1,0,'C');
       	 
         $this->Ln();
       //}
	}*/


       /* function viewOther($db){
	         $query = mysqli_query($db,"SELECT SUM(salary) FROM employee") ;
	         $result=mysqli_fetch_array($query);
            //$result = $db->mysqli_query($db,$select);
//$pdf = new FPDF();
//$pdf->AddPage();
             $this->setfont('Times','',12);
            
  
            $this->Cell(40,10,'result','',1);
               $this->Ln();
          
        }*/
	
}


$pdf = new mypdf();
//$pdf->AliasNoPages();
$pdf->AddPage('L','A3',0);
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Ln();

/*$query = mysqli_query($db,"SELECT COUNT(salary) FROM employee") ;
$result=mysqli_fetch_array($query);
$pdf->cell(100,20,'No of employees Registered In',1,0,'C');
$pdf->cell(100,20,$query,1,0,'C');
$pdf->Ln();

/*$query2 = mysqli_query($db,"SELECT SUM(salary) FROM employee") ;
$result2=mysqli_fetch_array($query2);*/
//$pdf->cell(100,20,'Total salary paid for employees',1,0,'C');
//$pdf->cell(100,20,'2300000',1,0,'C');
//$pdf->viewOther($db);

$pdf->output();

//set font to arial,bold,14pt



?>

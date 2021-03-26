<?php

require_once (LIBS.'fpdf182/fpdf.php');
$db = new PDO('mysql:host=localhost;dbname=bayfront_hotel','root','');


//require('fpdf182/font/helvetica8.php');
//A4 width :219 mm
//default margin : 10mm each side
//writable horizontal :219. (10*2)=189mm
/**
 * 
 */
class MyPaymentpdfController extends FPDF
{
	
	function header()
	{
		$this->Image(BURL.'assets/img/basic/logo.png',5,5,-300);
		
		$this->setfont('arial', 'B', 25);
		$this->cell(400,5,'Bay Front',0,0,'C');
		$this->Ln();
		
		$this->setfont('Times', '', 15);
		$this->cell(400,10,'Weligama,Srilanka',0,0,'C');
		$this->Ln();
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
        
        $this->cell(80,10,'Room Description',1,0,'C');
        
        $this->cell(40,10,'Amount',1,0,'C');
        $this->cell(20,10,'Currency',1,0,'C');
		 $this->cell(50,10,'Created Date and Time',1,0,'C');
		 
		 $this->cell(45,10,'check in date',1,0,'C');
		 $this->cell(45,10,'check out date',1,0,'C');
        $this->Ln();

   }

	function viewTable($pdfDate, $id=2)
	{
      /* $this->setfont('Times','',12);
       //$stmt=$db->query('select * from employee');


      // while ($data =$stmt->fetch(PDO :: FETCH_OBJ)) {
          foreach($payment as $data) {

			  $this->setfont('Times', '', 14);*/
			  if ($id ==2) {
				$this->setfont('Times','',12);
				   //$stmt=$db->query('select * from employee');
	
				// while ($data =$stmt->fetch(PDO :: FETCH_OBJ)) {
					foreach($pdfDate as $data) {
	
						$this->setfont('Times', '', 14);



						
       	   
       	   $this->cell(40,10,$data['first_name'],1,0,'C');
         $this->cell(40,10,$data['last_name'],1,0,'C');
         $this->cell(40,10,$data['contact_number'],1,0,'C');
         $this->cell(80,10,$data['roomdesc'],1,0,'C');
         $this->cell(40,10,$data['amount'],1,0,'C');
         $this->cell(20,10,$data['currency'],1,0,'C');
		 $this->cell(50,10,$data['created_at'],1,0,'C');
		 
		 $this->cell(45,10,$data['check_in_date'],1,0,'C');
		 $this->cell(45,10,$data['check_out_date'],1,0,'C');
         //$this->cell(50,10,'Salary',1,0,'C');
         $this->Ln();
       }
	}
	
	
}

}


?>

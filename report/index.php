<?php 
include_once('connection.php');
require('fpdf182/fpdf.php');


$start_date_error='';
$end_date_error=''; 

if(isset($_POST['submit']))
{
	if(empty($_POST['start_date']))
	{
		$start_date_error='<label class="error">Start date is required</label>';
	}
	else if(empty($_POST['end_date'])) {
		$end_date_error='<label class="error">End date is required</label>';
	}
	else
	{


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
		$this->cell(276,10,'BAYFRONT-EMPLOYEES',0,0,'L');
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
         $this->cell(40,10,'reservation No',1,0,'C');
         $this->cell(40,10,'Customer No',1,0,'C');
         $this->cell(40,10,'Receptionist No',1,0,'C');
         $this->cell(40,10,'Room Id',1,0,'C');
         $this->cell(30,10,'No Of Guests',1,0,'C');
         $this->cell(36,10,'Date',1,0,'C');
         
         $this->Ln();

	}
	function viewTable($db)
	{
       $this->setfont('Times','',12);
       $stmt=$db->query('select * from reservation order by check_in_date DESC' );
       while ($data =$stmt->fetch(PDO :: FETCH_OBJ)) {

       	   $this->cell(40,10,$data->reservation_id ,1,0,'C');
         $this->cell(40,10,$data->customer_id ,1,0,'C');
         $this->cell(40,10,$data->reception_user_id ,1,0,'C');
         $this->cell(40,10,$data->room_id,1,0,'C');
         $this->cell(30,10,$data->no_of_guest,1,0,'C');
         $this->cell(36,10,$data->check_in_date,1,0,'C');
         
         $this->Ln();
       }
	}
	

}


$pdf =new mypdf();
//$pdf->AliasNoPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->output();

//set font to arial,bold,14pt










	}
}
?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Report Generator</title>
 	<link rel="stylesheet" type="text/css" href="style.css">
 </head>
 <body>
 	<div class="wrapper">
 <section class="header">
 	<h1>WELCOME BAY FRONT</h1>

 	
 </section>
 <section class="repo-btn">
 	<a href="invoice.php">Employees</a>
 	<a href="rooms-report.php">Rooms</a>
    <a href="#">Customers</a>
    <a href="reservation.php">Reservation</a>
    <a href="payment.php">Payment</a>
    <a href="#">Surf-Packages</a>

 </section>



 <section class="repo-main">

<h3>Enter the date to get Report</h2>
 	<form method="get" action="daily.php">
 		<select name='check_in_date'>
 			<?php
             $query=mysqli_query($connection,"select * from reservation");
             while ($date =mysqli_fetch_array($query)) {
             	echo "<option value='".$date['check_in_date']."'>".$date['check_in_date']."</option>";
             }
 			?>
 		</select>
<input type="submit" name="submit1" class="sub-btn" value="Generate">

 	<!--<h3>Enter Time Duration to get Report</h2>
 	<form method="get">
 		<label>Start date</label>
 		<input type="date" name="start_date" >
 		<?php echo $start_date_error; ?>
 		<label>End date</label>
 	<input type="date" name="end_date" >
 	<?php echo $end_date_error; ?>

 	<input type="submit" name="submit" class="sub-btn">-->
 	</form>
 	
 </section>
 </div>
 </body>
 </html>

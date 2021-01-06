<?php 
session_start();
//initialize variables
$discount_id=0;
$discount_rate="";
$start_date="";
$end_date="";
$edit_state=false;
//connect to database
$db=mysqli_connect('localhost','root','','roomdb');

//if save btn is clicked
if(isset($_POST['create'])){
	//$id=$_POST['id'];
	$discount_rate=$_POST['discount_rate']; 
	$start_date=$_POST['start_date'];
	$end_date=$_POST['end_date'];
	
	

$query="INSERT INTO room_discount(discount_rate,start_date,end_date) VALUES('$discount_rate','$start_date','$end_date')";
mysqli_query($db,$query);
$_SESSION['msg']="Address saved"; 
header('location:room-discount.php');
}


//update records
if(isset($_POST['update'])){
   $discount_rate = mysqli_real_escape_string($_POST['discount_rate']);
	$start_date = mysqli_real_escape_string($_POST['start_date']);
	$end_date = mysqli_real_escape_string($_POST['end_date']);
	
	$discount_id = mysqli_real_escape_string($_POST['discount_id']);

mysqli_query($db,"UPDATE room_discount SET discount_rate='$discount_rate',start_date='$start_date',end_date='$end_date' WHERE discount_id=$discount_id");
$_SESSION['msg']="Address updated";
header('location:room-discount.php');
}

//delete records
if(isset($_GET['delete'])){
   $type_id=$_GET['delete']
;
mysqli_query($db,"DELETE FROM room_discount WHERE discount_id=$discount_id");

$_SESSION['msg']="Address deleted";
header('location:room-discount.php');
}

//retrive records
$result=mysqli_query($db,"SELECT * FROM room_discount");
 ?>

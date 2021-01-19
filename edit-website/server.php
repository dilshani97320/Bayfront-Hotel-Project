<?php 
session_start();
//initialize variables
$type_id=0;
$type_name="";
$floor_no="";
$room_price="";
$max_guest="";
$facilities="";
$description="";
$edit_state=false;
//connect to database
$db=mysqli_connect('localhost','root','','roomdb');

//if save btn is clicked
if(isset($_POST['create'])){
	//$id=$_POST['id'];
	$type_name=$_POST['type_name']; 
	$floor_no=$_POST['floor_no'];
	$room_price=$_POST['room_price'];
	$max_guest=$_POST['max_guest'];
	$facilities=$_POST['facilities'];
	$description=$_POST['description'];
	

$query="INSERT INTO room_type(type_name,floor_no,room_price,max_guest,facilities,description) VALUES('$type_name','$floor_no','$room_price','$max_guest','$facilities','$description')";
mysqli_query($db,$query);
$_SESSION['msg']="Address saved"; 
header('location:room-type.php');
}


//update records
//var_dump($_post)
//echo 'hello';
if(isset($_POST['update'])){
   $type_name = mysqli_real_escape_string($db,$_POST['type_name']);
	$floor_no = mysqli_real_escape_string($db,$_POST['floor_no']);
	$room_price = mysqli_real_escape_string($db,$_POST['room_price']);
	$max_guest = mysqli_real_escape_string($db,$_POST['max_guest']);
	$facilities = mysqli_real_escape_string($db,$_POST['facilities']);
	$description = mysqli_real_escape_string($db,$_POST['description']);
	$type_id = mysqli_real_escape_string($db,$_POST['type_id']);

mysqli_query($db,"UPDATE room_type SET type_name='$type_name',floor_no='$floor_no',room_price='$room_price',max_guest='$max_guest',facilities='$facilities',description='$description' WHERE type_id=$type_id");
$_SESSION['msg']="Address updated";
header('location:room-type.php');
}

//delete records
if(isset($_GET['delete'])){
   $type_id=$_GET['delete']
;
mysqli_query($db,"DELETE FROM room_type WHERE type_id=$type_id");

$_SESSION['msg']="Address deleted";
header('location:room-type.php');
}

//retrive records
$result=mysqli_query($db,"SELECT * FROM room_type");
 ?>

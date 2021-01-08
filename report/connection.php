<?php
$dbhost='localhost';
$dbuser='root';
$dbpass='';
$dbname='bayfront_hotel';

$connection=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
//chevck connection
if(mysqli_connect_errno())
{
 die('database connection faild'.mysqli_connect_errno());
}




?>
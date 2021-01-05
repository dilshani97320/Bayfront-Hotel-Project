<?php 
  
// trait Geeks 
trait Geeks { 
  public function sayhello() { 
     echo "Hello"; 
   } 
 } 
  
// trait forGeeks 
class forGeeks { 
  public function sayfor() { 
     echo " Geeks"; 
   } 
 } 
  
class Sample extends forGeeks { 
  use Geeks; 
  
  public function geeksforgeeks() { 
      echo "\nGeeksforGeeks"; 
   }  
} 
  
$test = new Sample(); 
$test->sayhello(); 
$test->sayfor(); 
$test->geeksforgeeks(); 
?>

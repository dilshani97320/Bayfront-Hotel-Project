<?php 

class Report {

    private $table1 = "customer";
    private $table2 = "room_details";
    private $table3 = "reservation";
    private $table4 = "payment";
    private $table5 = "reception";
    private $table6 = "room_type";
    private $connection;

    public function __construct() {
        
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'bayfront_hotel';

        $this->connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    }


   

    public function getreportt()
    {
     
     // echo $d1;
     // exit;
 

     $query="SELECT DISTINCT first_name,last_name,contact_number,room_number,room_name,room_view,no_of_guest,payment_method,check_in_date,check_out_date

      FROM reservation INNER JOIN customer on reservation.customer_id=customer.customer_id
      INNER JOIN room_details on room_details.room_id=reservation.room_id order BY check_in_date";
     // echo $query;
     // exit;
     $users = mysqli_query($this->connection, $query);
         if($users) {
             $users=mysqli_fetch_all($users,MYSQLI_ASSOC);
         }
         else {
             echo "Database Query Failed";
         }    
 //var_dump($users);
 //exit;
     return $users; 
    }


   public function reportt($d1, $d2)
   {
    
    // echo $d1;
    // exit;


    $query="SELECT DISTINCT first_name,last_name,contact_number,room_number,room_name,room_view,no_of_guest,payment_method,check_in_date,check_out_date

     FROM reservation INNER JOIN customer on reservation.customer_id=customer.customer_id
     INNER JOIN room_details on room_details.room_id=reservation.room_id WHERE check_in_date BETWEEN '{$d1}' and '{$d2}' order BY check_in_date";
    
    
    
    
    // echo $query;
    // exit;
    $users = mysqli_query($this->connection, $query);
        if($users) {
            $users=mysqli_fetch_all($users,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }    
//var_dump($users);
//exit;
    return $users; 
   }


   public function getpaymentreport()
    {
     
     // echo $d1;
     // exit;
 

     $query="SELECT DISTINCT first_name,last_name,contact_number,roomdesc,amount,currency,created_at,check_in_date,check_out_date

     FROM reservation INNER JOIN customer on reservation.customer_id=customer.customer_id INNER JOIN payment on reservation.reservation_id=payment.reservation_id 
     order BY check_in_date";
     // echo $query;
     // exit;
     $users = mysqli_query($this->connection, $query);
         if($users) {
             $users=mysqli_fetch_all($users,MYSQLI_ASSOC);
         }
         else {
             echo "Database Query Failed";
         }    
 //var_dump($users);
 //exit;
     return $users; 
    }


   public function preport($d1, $d2)
   {
    
    // echo $d1;
    // exit;


     $query="SELECT DISTINCT first_name,last_name,contact_number,roomdesc,amount,currency,created_at,check_in_date,check_out_date

      FROM reservation INNER JOIN customer on reservation.customer_id=customer.customer_id INNER JOIN payment on reservation.reservation_id=payment.reservation_id 
     WHERE check_in_date BETWEEN '{$d1}' and '{$d2}' order BY check_in_date";
    // echo $query;
    // exit;
    $users = mysqli_query($this->connection, $query);
        if($users) {
            $users=mysqli_fetch_all($users,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }    
//var_dump($users);
//exit;
    return $users; 
   }


   public function getemployeereport()
   {
    
    // echo $d1;
    // exit;


    $query="SELECT DISTINCT emp_id,first_name,last_name,email,salary,location,contact_num,post from employee";

    // echo $query;
    // exit;
    $users = mysqli_query($this->connection, $query);
        if($users) {
            $users=mysqli_fetch_all($users,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }    
//var_dump($users);
//exit;
    return $users; 
   }



   public function ereport($d1, $d2)
   {
    
    // echo $d1;
    // exit;


     $query="SELECT DISTINCT emp_id,first_name,last_name,email,salary,location,contact_num,post from employee

     WHERE registered_date BETWEEN '{$d1}' and '{$d2}' order BY registered_date";
    // echo $query;
    // exit;
    $users = mysqli_query($this->connection, $query);
        if($users) {
            $users=mysqli_fetch_all($users,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }    
//var_dump($users);
//exit;
    return $users; 
   }

   

   public function getcustomerreport()
   {
    
    // echo $d1;
    // exit;

    $query="SELECT DISTINCT first_name,last_name,location,contact_number,age,email,check_in_date,check_out_date 
    FROM customer INNER JOIN reservation ON customer.customer_id=reservation.customer_id";
    // echo $query;
    // exit;
    $users = mysqli_query($this->connection, $query);
        if($users) {
            $users=mysqli_fetch_all($users,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }    
//var_dump($users);
//exit;
    return $users; 
   }


  public function creport($d1, $d2)
  {
   
   // echo $d1;
   // exit;

   $query="SELECT DISTINCT first_name,last_name,location,contact_number,age,email,check_in_date,check_out_date 
   FROM customer INNER JOIN reservation ON customer.customer_id=reservation.customer_id
    WHERE check_in_date BETWEEN '{$d1}' and '{$d2}' order BY check_in_date";
   
   
   
   
   // echo $query;
   // exit;
   $users = mysqli_query($this->connection, $query);
       if($users) {
           $users=mysqli_fetch_all($users,MYSQLI_ASSOC);
       }
       else {
           echo "Database Query Failed";
       }    
//var_dump($users);
//exit;
   return $users; 
  }


  public function getAllRoomPdf() {

    $query = "SELECT room_number,room_name,floor_type,price,room_size,air_condition,room_view,breakfast_included,hot_water,free_canselaration,room_desc
     FROM room_details ORDER by room_number";
              
    $users = mysqli_query($this->connection, $query);
    if($users) {
        $users=mysqli_fetch_all($users,MYSQLI_ASSOC);
    }
    else {
        echo "Database Query Failed";
    }    
//var_dump($users);
//exit;
return $users;    
}



 
}
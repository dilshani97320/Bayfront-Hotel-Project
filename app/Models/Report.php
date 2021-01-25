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


   public function reportt($d1, $d2)
   {
    
    // echo $d1;
    // exit;

    $query="SELECT first_name,last_name,contact_number,age,email,location,no_of_guest,payment_method,check_in_date,check_out_date FROM reservation INNER JOIN customer on reservation.customer_id=customer.customer_id WHERE check_in_date BETWEEN '{$d1}' and '{$d2}' order BY check_in_date";
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
}
<?php 

class Dashboard {

    private $table1 = "room_details";
    private $table2 = "reservation";
    private $table3 = "employee";
    private $connection;

    public function __construct() {
        
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'bayfront_hotel';

        $this->connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    }


    public function getRoomCount() {

        // echo $this->table1;
        $query = "SELECT COUNT(room_number) as total FROM $this->table1";

        // echo "Success1";

        $rooms = mysqli_query($this->connection, $query);
        // echo "Success2";
        if($rooms){
            if(mysqli_num_rows($rooms) == 1) {
                $room_numbers = mysqli_fetch_assoc($rooms);
                // echo $room_numbers;
                return $room_numbers;
            }
        }
        else {
            echo "Query Error1";
        }

        
    }

    public function getReservationCount() {
        

        $query = "SELECT COUNT(reservation_id) as total FROM $this->table2 WHERE is_valid = 1";

        $reservations = mysqli_query($this->connection, $query);
        if($reservations){
            if(mysqli_num_rows($reservations) == 1) {
                $count = mysqli_fetch_assoc($reservations);
                return $count;
            }
        }
        else {
            echo "Query Error";
        }

        

    }

    public function getReservationIncome() {
        
       date_default_timezone_set("Asia/Colombo");
       $current_date = date('Y-m-d');

       $query = "SELECT SUM($this->table1.price) as total
                FROM $this->table1
                INNER JOIN $this->table2
                ON $this->table1.room_id = $this->table2.room_id  
                WHERE $this->table2.check_in_date = '{$current_date}' AND $this->table2.is_valid = 1";

        $reservation_price = mysqli_query($this->connection, $query);

        if($reservation_price){
            if(mysqli_num_rows($reservation_price) == 1) {
                $price = mysqli_fetch_assoc($reservation_price);
                return $price;
            }
        }
        else {
            echo "Query Error2";
        }

        
    }

    public function getEmployeeCount() {

        $query = "SELECT COUNT(email) as total FROM $this->table3 WHERE is_deleted = 0";

        $employees = mysqli_query($this->connection, $query);
        if($employees){
            if(mysqli_num_rows($employees) == 1) {
                $count = mysqli_fetch_assoc($employees);
                // echo "count=>".$count['total'];
                return $count;
            }
        }
        else {
            echo "Query Error";
        }

        
    }


    

    
}
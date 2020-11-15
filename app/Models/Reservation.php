<?php 

class Reservation {

    private $table1 = "customer";
    private $table2 = "room_details";
    private $table3 = "reservation";
    private $table4 = "payment";
    private $connection;

    public function __construct() {
        
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'bayfront_hotel';

        $this->connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    }


    public function getAvalabilityhRoom($room_number, $check_in_date, $check_out_date) {

        date_default_timezone_set("Asia/Colombo");
        $current_date = date('Y-m-d');

        $room_number    = mysqli_real_escape_string($this->connection, $room_number);
        $check_in_date  = mysqli_real_escape_string($this->connection, $check_in_date);
        $check_out_date = mysqli_real_escape_string($this->connection, $check_out_date);


        $query ="SELECT  $this->table2.room_id, $this->table2.room_number,
                 $this->table3.check_in_date, $this->table3.check_out_date
                 FROM $this->table2 LEFT OUTER JOIN $this->table3  ON $this->table2.room_id = $this->table3.room_id
                 WHERE $this->table2.room_number = '{$room_number}' AND 
                 (($this->table3.check_in_date >= '{$current_date}' AND $this->table3.check_in_date <= '{$check_in_date}'  AND  $this->table3.check_out_date > '{$check_in_date}') OR 
                 ($this->table3.check_in_date <= '{$check_in_date}'  AND  $this->table3.check_out_date >= '{$check_in_date}'))
                 ORDER BY $this->table2.room_id";

        $result = mysqli_query($this->connection, $query);
        $value = 0;
        if($result) {
            if(mysqli_num_rows($result) == 1) {
                $value = 1;
                //echo "4\n";
            }
        }
        else {
            echo "Database Query Failed";
        }        
    
    return $value;  
    }

    public function getEmail($email) {

        $email = mysqli_real_escape_string($this->connection, $email);
        $query = "SELECT * FROM $this->table1 
                  WHERE email = '{$email}'
                  LIMIT 1";
        $result = 0;
        $result_set = mysqli_query($this->connection, $query);
        if($result_set){
            if(mysqli_num_rows($result_set) == 1) {
                $result = 1;
            }
        }
        else {
            echo "Query Error";
        }
        return $result;
    }

    public function getCreditCardNumber($credit_card_number) {

        $credit_card_number = mysqli_real_escape_string($this->connection, $credit_card_number);
        $query = "SELECT * FROM $this->table4 
                  WHERE credit_card_number = '{$credit_card_number}'
                  LIMIT 1";

        $result = 0;
        $result_set = mysqli_query($this->connection, $query);
        if($result_set){
            if(mysqli_num_rows($result_set) == 1) {
                $result = 1;
            }
        }
        else {
            echo "Query Error";
        }
        return $result;
    }


    public function getCreateCustomer($data) {
        $value = 0;
        $first_name = mysqli_real_escape_string($this->connection, $data[0]);
        $last_name = mysqli_real_escape_string($this->connection, $data[1]);
        $location = mysqli_real_escape_string($this->connection, $data[2]);
        $contact_num = mysqli_real_escape_string($this->connection, $data[3]);
        $date_of_birth = mysqli_real_escape_string($this->connection, $data[4]);
        $age = mysqli_real_escape_string($this->connection, $data[5]);
        $email = mysqli_real_escape_string($this->connection, $data[6]);

        $query = "INSERT INTO $this->table1 (
                  first_name, last_name, location, contact_number, date_of_birth, age, email) 
                  VALUES (
                 '{$first_name}', '{$last_name}', '{$location}', '{$contact_num}', '{$date_of_birth}', '{$age}', '{$email}'
                  )";
        
        $result = mysqli_query($this->connection, $query);
        if($result) {
            // query successful.. redirecting to users page
            $value = 1;
        }
        return $value;
    }

    public function getCreateReservation($data) {
        $value = 0;
        $customer_id = mysqli_real_escape_string($this->connection, $data[0]);
        $reception_user_id = mysqli_real_escape_string($this->connection, $data[1]);
        $room_id = mysqli_real_escape_string($this->connection, $data[2]);
        $check_in_date = mysqli_real_escape_string($this->connection, $data[3]);
        $check_out_date = mysqli_real_escape_string($this->connection, $data[4]);
        $no_of_guest = mysqli_real_escape_string($this->connection, $data[5]);
        $payment_method = mysqli_real_escape_string($this->connection, $data[6]);
        

        $query = "INSERT INTO $this->table3 (
                 customer_id, reception_user_id, room_id, check_in_date, check_out_date, no_of_guest, payment_method, is_valid) 
                 VALUES (
                 '{$customer_id}', '{$reception_user_id}', '{$room_id}', '{$check_in_date}', '{$check_out_date}', '{$no_of_guest}', '{$payment_method}', 1
                 )";
        
        $result = mysqli_query($this->connection, $query);
        // echo "Query Level2";
        if($result) {
            // query successful..
            // echo "Query Successfull";
            $value = 1;
        }
        return $value;
    }


    public function getCustomerID($email) {

        $email = mysqli_real_escape_string($this->connection, $email);

        $query = "SELECT * FROM $this->table1
                  WHERE email = '{$email}'
                  LIMIT 1";
        $customers = mysqli_query($this->connection, $query);
        if($customers){
            if(mysqli_num_rows($customers) == 1) {
                $customer = mysqli_fetch_assoc($customers);
            }
        }
        else {
            echo "Query Error";
        }

        return $customer;
    }

    public function getRoomID($room_number) {

        $room_number = mysqli_real_escape_string($this->connection, $room_number);

        $query = "SELECT * FROM $this->table2
                  WHERE room_number = '{$room_number}'
                  LIMIT 1";

        $rooms = mysqli_query($this->connection, $query);
        if($rooms){
            if(mysqli_num_rows($rooms) == 1) {
                $room = mysqli_fetch_assoc($rooms);
            }
        }
        else {
            echo "Query Error";
        }

        return $room;
    }

    public function getReservationID($room_id) {

        $room_id = mysqli_real_escape_string($this->connection, $room_id);

        $query = "SELECT * FROM $this->table3
                  WHERE room_id = '{$room_id}'
                  LIMIT 1";

        $reservations = mysqli_query($this->connection, $query);
        if($reservations){
            if(mysqli_num_rows($reservations) == 1) {
                $reservation = mysqli_fetch_assoc($reservations);
            }
        }
        else {
            echo "Query Error";
        }

        return $reservation;
    }

    
}
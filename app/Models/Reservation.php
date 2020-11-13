<?php 

class Employee {

    private $table1 = "customer";
    private $table2 = "room";
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

    // public function getAllEmployee() {

    //     $query = "SELECT * FROM  $this->table
    //               WHERE is_deleted=0 ORDER BY emp_id";
    //     $users = mysqli_query($this->connection, $query);
    //     if($users) {
    //         mysqli_fetch_all($users,MYSQLI_ASSOC);
    //     }
    //     else {
    //         echo "Database Query Failed";
    //     }    

    // return $users;    
    // }

    public function getSearchEmployee($room_number, $check_in_date, $check_out_date) {

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

    // public function getOwner($owner_user_id) {
    //     $user = array();
    //     $owner_user_id = mysqli_real_escape_string($this->connection, $owner_user_id);
    //     $query = "SELECT * FROM $this->table 
    //               WHERE owner_user_id = '{$owner_user_id}'
    //               LIMIT 1";
    //     $result = 0;
    //     $result_set = mysqli_query($this->connection, $query);
    //     if($result_set){
    //         if(mysqli_num_rows($result_set) == 1) {
    //             $result = 1;
    //         }
    //     }
    //     else {
    //         echo "Query Error";
    //     }
    //     return $result;
    // }

    public function getCreateCustomer($data) {
        $value = 0;
        $first_name = mysqli_real_escape_string($this->connection, $data[0]);
        $last_name = mysqli_real_escape_string($this->connection, $data[1]);
        $location = mysqli_real_escape_string($this->connection, $data[2]);
        $contact_num = mysqli_real_escape_string($this->connection, $data[3]);
        $date_of_birth = mysqli_real_escape_string($this->connection, $data[4]);
        $age = mysqli_real_escape_string($this->connection, $data[5]);
        $email = mysqli_real_escape_string($this->connection, $data[6]);

        $query = "INSERT INTO $this->table (
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
        

        $query = "INSERT INTO $this->table3 (
                 customer_id, reception_user_id, room_id, check_in_date, check_out_date, no_of_guest, is_valid) 
                 VALUES (
                 '{$customer_id}', '{$reception_user_id}', '{$room_id}', '{$check_in_date}', '{$check_out_date}', '{$no_of_guest}', 1
                 )";
        
        $result = mysqli_query($this->connection, $query);
        if($result) {
            // query successful..
            $value = 1;
        }
        return $value;
    }

    public function getCreatePayment($data) {
        $value = 0;
        $reservation_id = mysqli_real_escape_string($this->connection, $data[0]);
        $customer_id = mysqli_real_escape_string($this->connection, $data[1]);
        $name_of_card = mysqli_real_escape_string($this->connection, $data[2]);
        $expire_month = mysqli_real_escape_string($this->connection, $data[3]);
        $expire_year = mysqli_real_escape_string($this->connection, $data[4]);
        $cvv = mysqli_real_escape_string($this->connection, $data[5]);
        

        $query = "INSERT INTO $this->table4 (
                 reservation_id, customer_id, name_of_card, expire_month, expire_year, cvv) 
                 VALUES (
                 '{$reservation_id}', '{$customer_id}', '{$name_of_card}', '{$expire_month}', '{$expire_year}', '{$cvv}'
                 )";
        
        $result = mysqli_query($this->connection, $query);
        if($result) {
            // query successful..
            $value = 1;
        }
        return $value;
    }

    // public function getUpdate($data) {
    //     $value = 0;
    //     $emp_id = mysqli_real_escape_string($this->connection, $data[0]);
    //     $owner_user_id = mysqli_real_escape_string($this->connection, $data[1]);
    //     $first_name = mysqli_real_escape_string($this->connection, $data[2]);
    //     $last_name = mysqli_real_escape_string($this->connection, $data[3]);
    //     $email = mysqli_real_escape_string($this->connection, $data[4]);
    //     $salary = mysqli_real_escape_string($this->connection, $data[5]);
    //     $location = mysqli_real_escape_string($this->connection, $data[6]);
    //     $contact_num = mysqli_real_escape_string($this->connection, $data[7]);

    //     $query = "UPDATE $this->table SET
    //             owner_user_id = '{$owner_user_id}',
    //             first_name = '{$first_name}',
    //             last_name = '{$last_name}',
    //             email = '{$email}',
    //             salary = '{$salary}',
    //             location = '{$location}',
    //             contact_num = '{$contact_num}'
    //             WHERE emp_id = {$emp_id} LIMIT 1";
        
    //     $result = mysqli_query($this->connection, $query);
    //     if($result) {
    //         // query successful.. redirecting to users page
    //         $value = 1;
    //     }
    //     return $value;
    // }

    // public function remove($emp_id) {
    //     $emp_id = mysqli_real_escape_string($this->connection, $emp_id);

    //     $query = "UPDATE $this->table SET is_deleted =1 WHERE emp_id = {$emp_id} LIMIT 1";

    //     $result = mysqli_query($this->connection, $query);
    //     if($result) {
    //         $value = 1;
    //     }
        
    //     return $value;
    // }

    public function getCustomerID($email) {

        $email = mysqli_real_escape_string($this->connection, $email);

        $query = "SELECT * FROM $this->table
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

    // public function getEmailOther($email, $emp_id) {
    //     $user = array();
    //     $email = mysqli_real_escape_string($this->connection, $email);
    //     $query = "SELECT * FROM $this->table 
    //               WHERE email = '{$email}'
    //               AND emp_id != '{$emp_id}'
    //               LIMIT 1";
    //     $result = 0;
    //     $result_set = mysqli_query($this->connection, $query);
    //     if($result_set){
    //         if(mysqli_num_rows($result_set) == 1) {
    //             $result = 1;
    //         }
    //     }
    //     else {
    //         echo "Query Error";
    //     }
    //     return $result;
    // }
}
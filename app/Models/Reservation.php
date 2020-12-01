<?php 

class Reservation {

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


    public function getAvalabilityhRoom($room_number, $check_in_date, $check_out_date) {

        date_default_timezone_set("Asia/Colombo");
        $current_date = date('Y-m-d');

        $room_number    = mysqli_real_escape_string($this->connection, $room_number);
        $check_in_date  = mysqli_real_escape_string($this->connection, $check_in_date);
        $check_out_date = mysqli_real_escape_string($this->connection, $check_out_date);


        $query ="SELECT  $this->table2.room_id, $this->table2.room_number,
                 $this->table3.check_in_date, $this->table3.check_out_date
                 FROM $this->table2 LEFT OUTER JOIN $this->table3  ON $this->table2.room_id = $this->table3.room_id
                 WHERE $this->table2.room_number = '{$room_number}' AND $this->table3.is_valid = 1 AND
                 (($this->table3.check_in_date >= '{$current_date}' AND $this->table3.check_in_date <= '{$check_in_date}'  AND  $this->table3.check_out_date > '{$check_in_date}') OR 
                 ($this->table3.check_in_date <= '{$check_in_date}'  AND  $this->table3.check_out_date >= '{$check_in_date}') OR 
                 ($this->table3.check_in_date <= '{$check_out_date}'  AND  $this->table3.check_out_date >= '{$check_out_date}'))
                 ORDER BY $this->table2.room_id";

        $result = mysqli_query($this->connection, $query);
        $value = 0;
        if($result) {
            if(mysqli_num_rows($result) == 1) {
                $value = 1;
                // echo "4\n";
            }
        }
        else {
            echo "Database Query Failed1";
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
        $age = mysqli_real_escape_string($this->connection, $data[4]);
        $email = mysqli_real_escape_string($this->connection, $data[5]);

        $query = "INSERT INTO $this->table1 (
                  first_name, last_name, location, contact_number, age, email) 
                  VALUES (
                 '{$first_name}', '{$last_name}', '{$location}', '{$contact_num}', '{$age}', '{$email}'
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
        
        // var_dump($data);
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
            return $value;
        }
        else {
            echo "Query failed";
        }
        
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
        $room = array();
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

    public function getReservationDetails($room_id, $check_in_date, $check_out_date) {

        $room_id = mysqli_real_escape_string($this->connection, $room_id);
        $check_in_date = mysqli_real_escape_string($this->connection, $check_in_date);
        $check_out_date = mysqli_real_escape_string($this->connection, $check_out_date);

        $query = "SELECT * FROM $this->table3
                  WHERE room_id = '{$room_id}' AND
                        check_in_date = '{$check_in_date}' AND
                        check_out_date = '{$check_out_date}'
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

    public function getCustomer($customer_id) {
        $customer_id = mysqli_real_escape_string($this->connection, $customer_id);

        $query = "SELECT * FROM $this->table1
                  WHERE customer_id = '{$customer_id}'
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

    public function getReception($reception_user_id) {
        $reception_user_id = mysqli_real_escape_string($this->connection, $reception_user_id);

        $query = "SELECT * FROM $this->table5
                  WHERE reception_user_id = '{$reception_user_id}'
                  LIMIT 1";
        $receptions = mysqli_query($this->connection, $query);
        if($receptions){
            if(mysqli_num_rows($receptions) == 1) {
                $reception = mysqli_fetch_assoc($receptions);
                // echo "Sucess";
            }
        }
        else {
            echo "Query Error";
        }

        return $reception;
    }

    public function getRoomType($room_type_id) {
        $room_type_id = mysqli_real_escape_string($this->connection, $room_type_id);

        $query = "SELECT * FROM $this->table6
                  WHERE room_type_id = '{$room_type_id}'
                  LIMIT 1";
        $types = mysqli_query($this->connection, $query);
        if($types){
            if(mysqli_num_rows($types) == 1) {
                $type = mysqli_fetch_assoc($types);
            }
        }
        else {
            echo "Query Error";
        }

        return $type;
    }
    
    public function reservationDetails($reservation_id) {
        $reservation_id = mysqli_real_escape_string($this->connection, $reservation_id);

        $query = "SELECT * FROM $this->table3
                  WHERE reservation_id = '{$reservation_id}' AND $this->table3.is_valid = 1
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

    public function reservationDateToZero($reservation_id) {

        $reservation_id = mysqli_real_escape_string($this->connection, $reservation_id);

        $query = "UPDATE $this->table3 SET $this->table3.check_in_date = '2020-11-11', $this->table3.check_out_date = '2020-11-11' 
                  WHERE $this->table3.reservation_id = '{$reservation_id}' AND $this->table3.is_valid = 1  LIMIT 1";

        $result = mysqli_query($this->connection, $query);
        
        $value =0;
        if($result) {
            $value = 1;
        }
        // echo $value;
        return $value;
    }

    public function resetReservationDates($reservation_id, $check_in_date, $check_out_date) {

        $reservation_id = mysqli_real_escape_string($this->connection, $reservation_id);
        $check_in_date = mysqli_real_escape_string($this->connection, $check_in_date);
        $check_out_date = mysqli_real_escape_string($this->connection, $check_out_date);
        

        $query = "UPDATE $this->table3 SET $this->table3.check_in_date = '{$check_in_date}', $this->table3.check_out_date = '{$check_out_date}' 
                  WHERE $this->table3.reservation_id = {$reservation_id} AND $this->table3.is_valid = 1 LIMIT 1";

        $result = mysqli_query($this->connection, $query);
        
        $value =0;
        if($result) {
            $value = 1;
        }
        
        return $value;

    }

    public function getUpdateReservation($reservation_id, $check_in_date, $check_out_date) {
        $reservation_id = mysqli_real_escape_string($this->connection, $reservation_id);
        $check_in_date = mysqli_real_escape_string($this->connection, $check_in_date);
        $check_out_date = mysqli_real_escape_string($this->connection, $check_out_date);
        // echo $check_in_date;

        $query = "UPDATE $this->table3 SET $this->table3.check_in_date = '{$check_in_date}', $this->table3.check_out_date = '{$check_out_date}' 
                  WHERE $this->table3.reservation_id = {$reservation_id} AND $this->table3.is_valid = 1  LIMIT 1";

        $result = mysqli_query($this->connection, $query);
        
        $value =0;

        if($result) {
            $value = 1;
        }
        
        return $value;
    }

    public function getReservationDelete($room_id, $check_in_date, $check_out_date) {

        $room_id = mysqli_real_escape_string($this->connection, $room_id);
        $check_in_date = mysqli_real_escape_string($this->connection, $check_in_date);
        $check_out_date = mysqli_real_escape_string($this->connection, $check_out_date);

        $query = "UPDATE $this->table3 SET $this->table3.is_valid = 0
                  WHERE $this->table3.room_id = '{$room_id}' AND $this->table3.check_in_date = '{$check_in_date}' AND $this->table3.check_out_date = '{$check_out_date}' LIMIT 1";

        $result = mysqli_query($this->connection, $query);
                
        $value =0;

        if($result) {
            $value = 1;
        }

        return $value;
    }

    public function getSearchRoomAll($search) {

        $search = mysqli_real_escape_string($this->connection, $search);

        $query = "SELECT $this->table2.room_number,  $this->table2.room_name, $this->table2.price, $this->table6.max_guest,
                  $this->table3.check_in_date, $this->table3.check_out_date
                  FROM $this->table2
                  INNER JOIN $this->table6
                  ON  $this->table2.type_id = $this->table6.room_type_id
                  LEFT OUTER JOIN $this->table3
                  ON $this->table2.room_id = $this->table3.room_id
                  WHERE $this->table2.room_number LIKE '%{$search}%' AND $this->table3.is_valid = 1
                  ORDER BY $this->table2.room_id";

        $rooms = mysqli_query($this->connection, $query);

        if($rooms) {
            mysqli_fetch_all($rooms,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }        
    
    return $rooms;  
    }

    public function getAllRoomAll() {

        $query = "SELECT $this->table2.room_number,  $this->table2.room_name, $this->table2.price, $this->table6.max_guest,
                  $this->table3.check_in_date, $this->table3.check_out_date
                  FROM $this->table2
                  INNER JOIN $this->table6
                  ON  $this->table2.type_id = $this->table6.room_type_id
                  LEFT OUTER JOIN $this->table3
                  ON $this->table2.room_id = $this->table3.room_id
                  WHERE $this->table3.is_valid = 1 
                  ORDER BY $this->table2.room_id";

        $rooms = mysqli_query($this->connection, $query);
        if($rooms) {
            mysqli_fetch_all($rooms,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }    

    return $rooms;    
    }

    
}
<?php 

class Reservation extends Connection {

    // private $table1 = "customer";  // can use trait method
    // private $table2 = "room_details";
    // private $table3 = "reservation";
    // private $table4 = "payment"; Reservation extends payments
    // private $table5 = "reception";
    // private $table6 = "room_type";

    public $reservation_id;
    // private $customer_id;
    private $reservation_reception_user_id;
    // private $room_id; Foreign Key
    public $reservation_check_in_date;
    public $reservation_check_out_date;
    private $reservation_no_of_guest;
    private $reservation_payment_method;
    private $reservation_is_valid;
    private $reservation_request;
    private $reservation_check_in_status;
    private $reservation_check_out_status;
    public $reservation_table = "reservation";

    // private $connection;
    public function __construct() {        
        Connection::__construct();
    }

    
    public function setCheckInOutDate($check_in_date, $check_out_date) {
        $this->reservation_check_in_date = mysqli_real_escape_string($this->connection, $check_in_date);
        $this->reservation_check_out_date = mysqli_real_escape_string($this->connection, $check_out_date);
    }

    public function getAvalabilityhRoom($room_number, $check_in_date, $check_out_date) {

        date_default_timezone_set("Asia/Colombo");
        $current_date = date('Y-m-d');

        $room = new RoomDetails();
        $room->room_number = mysqli_real_escape_string($this->connection, $room_number);

        // $room_number    = mysqli_real_escape_string($this->connection, $room_number);
        $this->check_in_date  = mysqli_real_escape_string($this->connection, $check_in_date);
        $this->check_out_date = mysqli_real_escape_string($this->connection, $check_out_date);

        $room->room_table;  //table2


        $query ="SELECT  $room->room_table.room_id, $room->room_table.room_number,
                 $this->reservation_table.check_in_date, $this->reservation_table.check_out_date
                 FROM $room->room_table LEFT OUTER JOIN $this->reservation_table  ON $room->room_table.room_id = $this->reservation_table.room_id
                 WHERE $room->room_table.room_number = '{$room->room_number}' AND $this->reservation_table.is_valid = 1 AND $this->reservation_table.request = 0 AND
                 (($this->reservation_table.check_in_date >= '{$current_date}' AND $this->reservation_table.check_in_date <= '{$this->check_in_date}'  AND  $this->reservation_table.check_out_date > '{$this->check_in_date}') OR 
                 ($this->reservation_table.check_in_date <= '{$this->check_in_date}'  AND  $this->reservation_table.check_out_date >= '{$this->check_in_date}') OR 
                 ($this->reservation_table.check_in_date <= '{$this->check_out_date}'  AND  $this->reservation_table.check_out_date >= '{$this->check_out_date}'))
                 ORDER BY $room->room_table.room_id";

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



 

    public function getCreateReservation($data) {
        $value = 0;
        $customer = new Customer();
        $reception = new Reception();
        $room = new RoomDetails();

        $customer->customer_id = mysqli_real_escape_string($this->connection, $data[0]);
        $reception->reception_user_id = mysqli_real_escape_string($this->connection, $data[1]);
        $room->room_id = mysqli_real_escape_string($this->connection, $data[2]);
        $this->reservation_check_in_date = mysqli_real_escape_string($this->connection, $data[3]);
        $this->reservation_check_out_date = mysqli_real_escape_string($this->connection, $data[4]);
        $this->reservation_no_of_guest = mysqli_real_escape_string($this->connection, $data[5]);
        $this->reservation_payment_method = mysqli_real_escape_string($this->connection, $data[6]);
        $this->reservation_request = mysqli_real_escape_string($this->connection, $data[7]);
        $this->reservation_request = (int)$this->reservation_request;
        // echo $customer->customer_id;
        // die();
        
        // var_dump($data);exit;
        $query = "INSERT INTO $this->reservation_table (
                 customer_id, reception_user_id, room_id, check_in_date, check_out_date, no_of_guest, payment_method, request, is_valid) 
                 VALUES (
                 '{$customer->customer_id}', '{$reception->reception_user_id}', '{$room->room_id}', '{$this->reservation_check_in_date}', '{$this->reservation_check_out_date}', '{$this->reservation_no_of_guest}', '{$this->reservation_payment_method}', '{$this->reservation_request}', 1
                 )";
        // print_r($query);
        // die();
        $result = mysqli_query($this->connection, $query);
        // echo "Query Level2";
        if($result) {
            // query successful..
            // echo "Query Successfull";
            $value = 1;
            return $value;
        }
        else {
            echo "Query failedXXX";
        }
        
    }


  



    public function getReservationDetails($room_id, $check_in_date, $check_out_date) {

        $room = new RoomDetails();
        $room->room_id = mysqli_real_escape_string($this->connection, $room_id);
        $this->check_in_date = mysqli_real_escape_string($this->connection, $check_in_date);
        $this->check_out_date = mysqli_real_escape_string($this->connection, $check_out_date);

        $query = "SELECT * FROM $this->reservation_table
                  WHERE room_id = '{$room->room_id}' AND
                        check_in_date = '{$this->check_in_date}' AND
                        check_out_date = '{$this->check_out_date}'
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

 

  

    
    public function reservationDetails($reservation_id) {

        $this->reservation_id = mysqli_real_escape_string($this->connection, $reservation_id);

        $query = "SELECT * FROM $this->reservation_table
                  WHERE reservation_id = '{$this->reservation_id}' AND $this->reservation_table.is_valid = 1
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

        $this->reservation_id = mysqli_real_escape_string($this->connection, $reservation_id);

        $query = "UPDATE $this->reservation_table SET $this->reservation_table.check_in_date = '2020-11-11', $this->reservation_table.check_out_date = '2020-11-11' 
                  WHERE $this->reservation_table.reservation_id = '{$this->reservation_id}' AND $this->reservation_table.is_valid = 1  LIMIT 1";

        $result = mysqli_query($this->connection, $query);
        
        $value =0;
        if($result) {
            $value = 1;
        }
        // echo $value;
        return $value;
    }

    public function resetReservationDates($reservation_id, $check_in_date, $check_out_date) {

        $this->reservation_id = mysqli_real_escape_string($this->connection, $reservation_id);
        $this->reservation_check_in_date = mysqli_real_escape_string($this->connection, $check_in_date);
        $this->reservation_check_out_date = mysqli_real_escape_string($this->connection, $check_out_date);
        

        $query = "UPDATE $this->reservation_table SET $this->reservation_table.check_in_date = '{$this->reservation_check_in_date}', $this->reservation_table.check_out_date = '{$this->reservation_check_out_date}' 
                  WHERE $this->reservation_table.reservation_id = {$this->reservation_id} AND $this->reservation_table.is_valid = 1 LIMIT 1";

        $result = mysqli_query($this->connection, $query);
        
        $value =0;
        if($result) {
            $value = 1;
        }
        
        return $value;

    }

    public function getUpdateReservation($reservation_id, $check_in_date, $check_out_date) {
        $this->reservation_id = mysqli_real_escape_string($this->connection, $reservation_id);
        $this->reservation_check_in_date = mysqli_real_escape_string($this->connection, $check_in_date);
        $this->reservation_check_out_date = mysqli_real_escape_string($this->connection, $check_out_date);
        // echo $check_in_date;

        $query = "UPDATE $this->reservation_table SET $this->reservation_table.check_in_date = '{$this->reservation_check_in_date}', $this->reservation_table.check_out_date = '{$this->reservation_check_out_date}' 
                  WHERE $this->reservation_table.reservation_id = {$this->reservation_id} AND $this->reservation_table.is_valid = 1  LIMIT 1";

        $result = mysqli_query($this->connection, $query);
        
        $value =0;

        if($result) {
            $value = 1;
        }
        
        return $value;
    }

    public function getReservationDelete($room_id, $check_in_date, $check_out_date) {

        $room = new RoomDetails();
        $room->room_id = mysqli_real_escape_string($this->connection, $room_id);
        $this->reservation_check_in_date = mysqli_real_escape_string($this->connection, $check_in_date);
        $this->reservation_check_out_date = mysqli_real_escape_string($this->connection, $check_out_date);

        $query = "UPDATE $this->reservation_table SET $this->reservation_table.is_valid = 0
                  WHERE $this->reservation_table.room_id = '{$room->room_id}' AND $this->reservation_table.check_in_date = '{$this->reservation_check_in_date}' AND $this->reservation_table.check_out_date = '{$this->reservation_check_out_date}' LIMIT 1";

        $result = mysqli_query($this->connection, $query);
                
        $value =0;

        if($result) {
            $value = 1;
        }

        return $value;
    }

    //Done
    public function getSearchRoomAll($search) {

        $search = mysqli_real_escape_string($this->connection, $search);
        $room = new RoomDetails();
        $room_type = new RoomType();
        $room->room_table; //table2
        $room_type->room_type_table; //table6

        $query = "SELECT $room->room_table.room_number,  $room->room_table.room_name, $room->room_table.price, $room_type->room_type_table.max_guest,
                  $this->reservation_table.check_in_date, $this->reservation_table.check_out_date
                  FROM $room->room_table
                  INNER JOIN $room_type->room_type_table
                  ON  $room->room_table.type_id = $room_type->room_type_table.room_type_id
                  LEFT OUTER JOIN $this->reservation_table
                  ON $room->room_table.room_id = $this->reservation_table.room_id
                  WHERE $room->room_table.room_number LIKE '%{$search}%' AND $this->reservation_table.is_valid = 1
                  ORDER BY $room->room_table.room_id";

        $rooms = mysqli_query($this->connection, $query);

        if($rooms) {
            mysqli_fetch_all($rooms,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }        
    
    return $rooms;  
    }

    //Done
    public function getAllRoomAll() {

        $room = new RoomDetails();
        $room_type = new RoomType();
        $room->room_table; //table2
        $room_type->room_type_table; //table6
        

        $query = "SELECT $room->room_table.room_number,  $room->room_table.room_name, $room->room_table.price, $room_type->room_type_table.max_guest,
                  $this->reservation_table.check_in_date, $this->reservation_table.check_out_date
                  FROM $room->room_table
                  INNER JOIN $room_type->room_type_table
                  ON  $room->room_table.type_id = $room_type->room_type_table.room_type_id
                  LEFT OUTER JOIN $this->reservation_table
                  ON $room->room_table.room_id = $this->reservation_table.room_id
                  WHERE $this->reservation_table.is_valid = 1 AND $this->reservation_table.request = 0
                  ORDER BY $this->reservation_table.check_in_date DESC";

        $rooms = mysqli_query($this->connection, $query);
        if($rooms) {
            mysqli_fetch_all($rooms,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }    

    return $rooms;    
    }

    public function getReservationID($customer_id, $check_in_date, $check_out_date) {

        $customer = new Customer();
        $customer->customer_id = mysqli_real_escape_string($this->connection, $customer_id);
        $this->reservation_check_in_date = mysqli_real_escape_string($this->connection, $check_in_date);
        $this->reservation_check_out_date = mysqli_real_escape_string($this->connection, $check_out_date);

        $query = "SELECT * FROM $this->reservation_table
                  WHERE customer_id = '{$customer->customer_id}' AND check_in_date = '{$this->reservation_check_in_date}' AND check_out_date = '{$this->reservation_check_out_date}'
                  LIMIT 1";

        $reservations = mysqli_query($this->connection, $query);
        if($reservations){
            if(mysqli_num_rows($reservations) == 1) {
                $reservation = mysqli_fetch_assoc($reservations);
                // echo "Sucess";
            }
        }
        else {
            echo "Query Error";
        }
    
        return $reservation;


    }

    public function requestNotification() {

        date_default_timezone_set("Asia/Colombo");
        $current_date = date('Y-m-d');

        $room = new RoomDetails();
        $room_type = new RoomType();
        $room->room_table; //table2
        $room_type->room_type_table;

        $query = "SELECT $room->room_table.room_number,  $room->room_table.room_name, $room->room_table.price, $room_type->room_type_table.max_guest,
                  $this->reservation_table.check_in_date, $this->reservation_table.check_out_date, $this->reservation_table.reservation_id
                  FROM $room->room_table
                  INNER JOIN $room_type->room_type_table
                  ON  $room->room_table.type_id = $room_type->room_type_table.room_type_id
                  LEFT OUTER JOIN $this->reservation_table
                  ON $room->room_table.room_id = $this->reservation_table.room_id
                  WHERE $this->reservation_table.is_valid = 1 AND $this->reservation_table.request = 1 AND $this->reservation_table.check_in_date >= '{$current_date}'
                  ORDER BY $this->reservation_table.check_in_date";

        $rooms = mysqli_query($this->connection, $query);
        if($rooms) {
            mysqli_fetch_all($rooms,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }    

    return $rooms;
    }

    public function checkInNotification(){

        date_default_timezone_set("Asia/Colombo");
        $current_date = date('Y-m-d');

        $room = new RoomDetails();
        $customer = new Customer();
        $room->room_table; //table2
        $customer->customer_table;


        $query = "SELECT $room->room_table.room_number,  $room->room_table.room_name, $room->room_table.price,
                  $customer->customer_table.first_name,  $customer->customer_table.contact_number,
                  $this->reservation_table.check_in_date, $this->reservation_table.check_out_date, $this->reservation_table.reservation_id, $this->reservation_table.check_in_status
                  FROM $this->reservation_table
                  LEFT OUTER JOIN $room->room_table
                  ON $room->room_table.room_id = $this->reservation_table.room_id
                  INNER JOIN $customer->customer_table
                  ON $this->reservation_table.customer_id = $customer->customer_table.customer_id
                  WHERE $this->reservation_table.is_valid = 1 AND $this->reservation_table.request = 0 AND $this->reservation_table.check_in_date = '{$current_date}'
                  ORDER BY $this->reservation_table.check_in_status";
        // var_dump($query);
        // die();
        $rooms = mysqli_query($this->connection, $query);
        if($rooms) {
            mysqli_fetch_all($rooms,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }    

        // var_dump($rooms);
        // die();

    return $rooms;
    }

    public function checkOutNotification(){

        date_default_timezone_set("Asia/Colombo");
        $current_date = date('Y-m-d');

        $room = new RoomDetails();
        $customer = new Customer();
        $room->room_table; //table2
        $customer->customer_table;


        $query = "SELECT $room->room_table.room_number,  $room->room_table.room_name, $room->room_table.price,
                  $customer->customer_table.first_name,  $customer->customer_table.contact_number, $customer->customer_table.customer_id,
                  $this->reservation_table.check_in_date, $this->reservation_table.check_out_date, $this->reservation_table.reservation_id, $this->reservation_table.check_out_status
                  FROM $this->reservation_table
                  LEFT OUTER JOIN $room->room_table
                  ON $room->room_table.room_id = $this->reservation_table.room_id
                  INNER JOIN $customer->customer_table
                  ON $this->reservation_table.customer_id = $customer->customer_table.customer_id
                  WHERE $this->reservation_table.is_valid = 1 AND $this->reservation_table.request = 0 AND $this->reservation_table.check_out_date = '{$current_date}'
                  ORDER BY $this->reservation_table.check_out_status";
        // var_dump($query);
        // die();
        $rooms = mysqli_query($this->connection, $query);
        if($rooms) {
            mysqli_fetch_all($rooms,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }    

        // var_dump($rooms);
        // die();

    return $rooms;
    }

    public function checkInSearchNotification($search){

        date_default_timezone_set("Asia/Colombo");
        $current_date = date('Y-m-d');

        $room = new RoomDetails();
        $customer = new Customer();
        $room->room_table; //table2
        $customer->customer_table;
        $room->room_number = mysqli_real_escape_string($this->connection, $search);
        $customer->customer_contact_number = mysqli_real_escape_string($this->connection, $search);

        $query ="SELECT $room->room_table.room_number,  $room->room_table.room_name, $room->room_table.price,
                $customer->customer_table.first_name,  $customer->customer_table.contact_number,
                $this->reservation_table.check_in_date, $this->reservation_table.check_out_date, $this->reservation_table.reservation_id, $this->reservation_table.check_in_status
                FROM $this->reservation_table
                LEFT OUTER JOIN $room->room_table
                ON $room->room_table.room_id = $this->reservation_table.room_id
                INNER JOIN $customer->customer_table
                ON $this->reservation_table.customer_id = $customer->customer_table.customer_id
                WHERE $this->reservation_table.is_valid = 1 AND $this->reservation_table.request = 0 AND $this->reservation_table.check_in_date = '{$current_date}' AND $room->room_table.room_number = '{$room->room_number}' OR $customer->customer_table.contact_number = '{$customer->customer_contact_number}'
                ORDER BY $this->reservation_table.check_in_status";

        $rooms = mysqli_query($this->connection, $query);
        if($rooms) {
            mysqli_fetch_all($rooms,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }    

    return $rooms;
    }

    public function checkOutSearchNotification($search){

        date_default_timezone_set("Asia/Colombo");
        $current_date = date('Y-m-d');

        $room = new RoomDetails();
        $customer = new Customer();
        $room->room_table; //table2
        $customer->customer_table;
        $room->room_number = mysqli_real_escape_string($this->connection, $search);
        $customer->customer_contact_number = mysqli_real_escape_string($this->connection, $search);

        $query ="SELECT $room->room_table.room_number,  $room->room_table.room_name, $room->room_table.price,
                $customer->customer_table.first_name,  $customer->customer_table.contact_number, $customer->customer_table.customer_id,
                $this->reservation_table.check_in_date, $this->reservation_table.check_out_date, $this->reservation_table.reservation_id, $this->reservation_table.check_out_status
                FROM $this->reservation_table
                LEFT OUTER JOIN $room->room_table
                ON $room->room_table.room_id = $this->reservation_table.room_id
                INNER JOIN $customer->customer_table
                ON $this->reservation_table.customer_id = $customer->customer_table.customer_id
                WHERE $this->reservation_table.is_valid = 1 AND $this->reservation_table.request = 0 AND $this->reservation_table.check_out_date = '{$current_date}' AND $room->room_table.room_number = '{$room->room_number}' OR $customer->customer_table.contact_number = '{$customer->customer_contact_number}'
                ORDER BY $this->reservation_table.check_out_status";

        $rooms = mysqli_query($this->connection, $query);
        if($rooms) {
            mysqli_fetch_all($rooms,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }    

    return $rooms;
    }

    

    public function checkedInUpdate($reservation_id) {
            $this->reservation_id = mysqli_real_escape_string($this->connection, $reservation_id);
            $this->reservation_check_in_status = "CHECKEDIN";
            $query = "UPDATE $this->reservation_table SET $this->reservation_table.check_in_status = '{$this->reservation_check_in_status}' 
                      WHERE $this->reservation_table.reservation_id = {$this->reservation_id} AND $this->reservation_table.is_valid = 1 LIMIT 1";
    
            $result = mysqli_query($this->connection, $query);
            $value =0;
            if($result) {
                $value = 1;
            }
            
            return $value;
    }

    public function checkedOutUpdate($reservation_id) {
        $this->reservation_id = mysqli_real_escape_string($this->connection, $reservation_id);
        $this->reservation_check_out_status = "CHECKEDOUT";
        $query = "UPDATE $this->reservation_table SET $this->reservation_table.check_out_status = '{$this->reservation_check_out_status}' 
                  WHERE $this->reservation_table.reservation_id = {$this->reservation_id} AND $this->reservation_table.is_valid = 1 LIMIT 1";

        $result = mysqli_query($this->connection, $query);
        $value =0;
        if($result) {
            $value = 1;
        }
        
        return $value;
}

    public function requestNotificationSearch($room_number) {
        date_default_timezone_set("Asia/Colombo");
        $current_date = date('Y-m-d');

        $room = new RoomDetails();
        $room_type = new RoomType();
        $room->room_table; //table2
        $room_type->room_type_table;

        $room->room_number = mysqli_real_escape_string($this->connection, $room_number);

        $query = "SELECT $room->room_table.room_number,  $room->room_table.room_name, $room->room_table.price, $room_type->room_type_table.max_guest,
                  $this->reservation_table.check_in_date, $this->reservation_table.check_out_date, $this->reservation_table.reservation_id
                  FROM $room->room_table
                  INNER JOIN $room_type->room_type_table
                  ON  $room->room_table.type_id = $room_type->room_type_table.room_type_id
                  LEFT OUTER JOIN $this->reservation_table
                  ON $room->room_table.room_id = $this->reservation_table.room_id
                  WHERE $this->reservation_table.is_valid = 1 AND $this->reservation_table.request = 1 AND $this->reservation_table.check_in_date >= '{$current_date}' AND $room->room_table.room_number = '{$room->room_number}'
                  ORDER BY $this->reservation_table.check_in_date";
        // var_dump($query);
        // die();
        $rooms = mysqli_query($this->connection, $query);
        if($rooms) {
            mysqli_fetch_all($rooms,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }    
    // var_dump($rooms);
    // die();
    return $rooms;
    }

    public function resetReservationRequest($reservation_id, $check_in_date, $check_out_date) {

        $this->reservation_id = mysqli_real_escape_string($this->connection, $reservation_id);
        $this->reservation_check_in_date = mysqli_real_escape_string($this->connection, $check_in_date);
        $this->reservation_check_out_date = mysqli_real_escape_string($this->connection, $check_out_date);
        

        $query = "UPDATE $this->reservation_table SET $this->reservation_table.check_in_date = '{$this->reservation_check_in_date}', $this->reservation_table.check_out_date = '{$this->reservation_check_out_date}', $this->reservation_table.request = 0 
                  WHERE $this->reservation_table.reservation_id = {$this->reservation_id} AND $this->reservation_table.is_valid = 1 LIMIT 1";

        $result = mysqli_query($this->connection, $query);
        
        $value =0;
        if($result) {
            $value = 1;
        }
        
        return $value;
    }
    
    public function getDeclineReservation($reservation_id) {
        
        $this->reservation_id = mysqli_real_escape_string($this->connection, $reservation_id);
        

        $query = "UPDATE $this->reservation_table SET $this->reservation_table.is_valid = 0
                  WHERE $this->reservation_table.reservation_id = '{$this->reservation_id}' LIMIT 1";

        $result = mysqli_query($this->connection, $query);
                
        $value =0;

        if($result) {
            $value = 1;
        }

        return $value;
    }


    public function getCountReservation() {
        date_default_timezone_set("Asia/Colombo");
        $current_date = date('Y-m-d');
        
        $query = "SELECT COUNT($this->reservation_table.reservation_id) AS count, $this->reservation_table.check_in_date 
                FROM $this->reservation_table 
                WHERE check_in_date <= '{$current_date}' AND $this->reservation_table.is_valid = 1 AND $this->reservation_table.request = 0
                GROUP BY check_in_date DESC LIMIT 14";
        // var_dump($query);
        // die();
        $reservationsCount = mysqli_query($this->connection, $query);
        if($reservationsCount) {
            mysqli_fetch_all($reservationsCount,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        } 

        return $reservationsCount;
    }

    public function getDayCountReservation() {

        $query = "SELECT COUNT($this->reservation_table.reservation_id) AS count, $this->reservation_table.check_in_date 
                FROM $this->reservation_table 
                WHERE $this->reservation_table.is_valid = 1 AND $this->reservation_table.request = 0
                GROUP BY check_in_date";

        $reservationsCount = mysqli_query($this->connection, $query);
        if($reservationsCount) {
            mysqli_fetch_all($reservationsCount,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        } 

        return $reservationsCount;
    }

    public function getBookingDays($room_id) {

        date_default_timezone_set("Asia/Colombo");
        $current_date = date('Y-m-d');

        $room = new RoomDetails();
        $room->room_id = mysqli_real_escape_string($this->connection, $room_id);

        $query = "SELECT check_in_date, check_out_date  
                FROM $this->reservation_table 
                WHERE $this->reservation_table.room_id = '{$room->room_id}' AND $this->reservation_table.is_valid = 1 AND $this->reservation_table.request = 0
                ORDER BY check_in_date";

        $reservationsDays = mysqli_query($this->connection, $query);

        if($reservationsDays) {
            mysqli_fetch_all($reservationsDays,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        } 

        return $reservationsDays;

    }

    public function getReservationsCheckOutDays($customer_id) {

        $room = new RoomDetails();
        $room_type = new RoomType();
        $room_discount = new RoomDiscount();

        $room->room_table; //table2
        // $room_type->room_type_table;
        $room_discount->room_discount_table;
        $customer = new Customer();
        $customer->customer_id = mysqli_real_escape_string($this->connection, $customer_id);

        date_default_timezone_set("Asia/Colombo");
        $current_date = date('Y-m-d');

        
        $query = "SELECT $room->room_table.room_name, $room->room_table.price,
                  $room_discount->room_discount_table.discount_rate, $room_discount->room_discount_table.start_date, $room_discount->room_discount_table.end_date,               
                  $this->reservation_table.check_in_date, $this->reservation_table.check_out_date, $this->reservation_table.reservation_id, $this->reservation_table.payment_method
                  FROM $room->room_table
                  INNER JOIN $room_discount->room_discount_table
                  ON  $room->room_table.type_id = $room_discount->room_discount_table.room_type_id
                  INNER JOIN $this->reservation_table
                  ON $room->room_table.room_id = $this->reservation_table.room_id
                  WHERE $this->reservation_table.is_valid = 1 AND $this->reservation_table.request = 0 AND $this->reservation_table.check_out_date = '{$current_date}' AND  $this->reservation_table.customer_id = '{$customer->customer_id}'
                  ORDER BY $this->reservation_table.check_in_date";

        // Have to do query
        // print_r($query);
        // die();
        $reservations = mysqli_query($this->connection, $query);
        if($reservations) {
            mysqli_fetch_all($reservations,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }    
        return $reservations;


    }

    // report Queries

    public function getCountCustomers($start_date, $end_date) {
        $start_date = mysqli_real_escape_string($this->connection, $start_date);
        $end_date = mysqli_real_escape_string($this->connection, $end_date);

        $query = "SELECT COUNT(DISTINCT $this->reservation_table.customer_id) as count
                FROM $this->reservation_table
                WHERE $this->reservation_table.check_in_date >= '{$start_date}' AND $this->reservation_table.check_in_date <= '{$end_date}' AND
                $this->reservation_table.is_valid = 1 AND $this->reservation_table.request = 0 LIMIT 1";
        
        // var_dump($query);
        $result = mysqli_query($this->connection, $query);
        
        if($result){
            if(mysqli_num_rows($result) == 1) {
                $result = mysqli_fetch_assoc($result);
            }
        }
        else {
            echo "Query Error";
        }

        return $result;

    }


    public function getCountCheckedInCustomers($start_date, $end_date) {

        $start_date = mysqli_real_escape_string($this->connection, $start_date);
        $end_date = mysqli_real_escape_string($this->connection, $end_date);

        $query = "SELECT COUNT(DISTINCT $this->reservation_table.customer_id) as count FROM $this->reservation_table
                WHERE  $this->reservation_table.check_in_date >= '{$start_date}' AND $this->reservation_table.check_in_date <= '{$end_date}' AND $this->reservation_table.check_in_status IS NOT NULL AND 
                $this->reservation_table.is_valid = 1 AND $this->reservation_table.request = 0 LIMIT 1";
        
        $result = mysqli_query($this->connection, $query);
        
        if($result){
            if(mysqli_num_rows($result) == 1) {
                $result = mysqli_fetch_assoc($result);
            }
        }
        else {
            echo "Query Error";
        }

        return $result;
    }

    public function getCountCheckedInNotCustomers($start_date, $end_date) {

        $start_date = mysqli_real_escape_string($this->connection, $start_date);
        $end_date = mysqli_real_escape_string($this->connection, $end_date);

        $query = "SELECT COUNT(DISTINCT $this->reservation_table.customer_id) as count FROM $this->reservation_table
                WHERE  $this->reservation_table.check_in_date >= '{$start_date}' AND $this->reservation_table.check_in_date <= '{$end_date}' AND $this->reservation_table.check_in_status IS NULL AND 
                $this->reservation_table.is_valid = 1 AND $this->reservation_table.request = 0 LIMIT 1";
        
        $result = mysqli_query($this->connection, $query);
        
        if($result){
            if(mysqli_num_rows($result) == 1) {
                $result = mysqli_fetch_assoc($result);
            }
        }
        else {
            echo "Query Error";
        }

        return $result;
    }

    public function getMostReservationCustomers($start_date, $end_date) {

        $start_date = mysqli_real_escape_string($this->connection, $start_date);
        $end_date = mysqli_real_escape_string($this->connection, $end_date);

        $customer = new Customer();
        $customer->customer_table;

        $query = "SELECT $customer->customer_table.first_name, $customer->customer_table.last_name , 
                $this->reservation_table.customer_id , COUNT($this->reservation_table.reservation_id) as count 
                FROM $this->reservation_table 
                INNER JOIN $customer->customer_table ON $customer->customer_table.customer_id = $this->reservation_table.customer_id 
                WHERE $this->reservation_table.check_in_date >= '{$start_date}' AND $this->reservation_table.check_in_date <= '{$end_date}' AND $this->reservation_table.is_valid = 1 AND $this->reservation_table.request = 0 AND
                $this->reservation_table.check_in_status IS NOT NULL GROUP BY customer_id";

        $result = mysqli_query($this->connection, $query);
        if($result) {
            mysqli_fetch_all($result,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }    

        return $result;
    }

    public function getMostReservationReception($start_date, $end_date) {

        $start_date = mysqli_real_escape_string($this->connection, $start_date);
        $end_date = mysqli_real_escape_string($this->connection, $end_date);

        $reception = new Reception();
        $employee = new Employee();
        $reception->reception_table;
        $employee->employee_table;

        $query = "SELECT $employee->employee_table.first_name, $employee->employee_table.last_name , 
                $this->reservation_table.reception_user_id , COUNT($this->reservation_table.reservation_id) as count 
                FROM $reception->reception_table 
                INNER JOIN $this->reservation_table ON $reception->reception_table.reception_user_id = $this->reservation_table.reception_user_id 
                INNER JOIN $employee->employee_table ON $reception->reception_table.emp_id = $employee->employee_table.emp_id 
                WHERE $this->reservation_table.check_in_date >= '{$start_date}' AND $this->reservation_table.check_in_date <= '{$end_date}' AND $this->reservation_table.is_valid = 1 AND $this->reservation_table.request = 0 AND
                $this->reservation_table.check_in_status IS NOT NULL AND $employee->employee_table.is_deleted=0 AND $reception->reception_table.is_deleted= 0 GROUP BY $this->reservation_table.reception_user_id";

        // var_dump($query);
        $result = mysqli_query($this->connection, $query);
        if($result) {
            mysqli_fetch_all($result,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }    

        return $result;
    }

    public function getCountAllReservations($start_date, $end_date) {

        $start_date = mysqli_real_escape_string($this->connection, $start_date);
        $end_date = mysqli_real_escape_string($this->connection, $end_date);

        $query = "SELECT COUNT(DISTINCT $this->reservation_table.reservation_id) as count
                FROM $this->reservation_table
                WHERE $this->reservation_table.check_in_date >= '{$start_date}' AND $this->reservation_table.check_in_date <= '{$end_date}' AND
                $this->reservation_table.is_valid = 1 LIMIT 1";
        
        // var_dump($query);
        $result = mysqli_query($this->connection, $query);
        
        if($result){
            if(mysqli_num_rows($result) == 1) {
                $result = mysqli_fetch_assoc($result);
            }
        }
        else {
            echo "Query Error";
        }

        return $result;
    }

    public function getCountAllAcceptReservations($start_date, $end_date) {

        $start_date = mysqli_real_escape_string($this->connection, $start_date);
        $end_date = mysqli_real_escape_string($this->connection, $end_date);

        $query = "SELECT COUNT(DISTINCT $this->reservation_table.reservation_id) as count
                FROM $this->reservation_table
                WHERE $this->reservation_table.check_in_date >= '{$start_date}' AND $this->reservation_table.check_in_date <= '{$end_date}' AND
                $this->reservation_table.is_valid = 1 AND $this->reservation_table.request = 0 LIMIT 1";
        
        // var_dump($query);
        $result = mysqli_query($this->connection, $query);
        
        if($result){
            if(mysqli_num_rows($result) == 1) {
                $result = mysqli_fetch_assoc($result);
            }
        }
        else {
            echo "Query Error";
        }

        return $result;
    }

    public function getCountAllCheckedInReservations($start_date, $end_date) {

        $start_date = mysqli_real_escape_string($this->connection, $start_date);
        $end_date = mysqli_real_escape_string($this->connection, $end_date);

        $query = "SELECT COUNT(DISTINCT $this->reservation_table.reservation_id) as count
                FROM $this->reservation_table
                WHERE $this->reservation_table.check_in_date >= '{$start_date}' AND $this->reservation_table.check_in_date <= '{$end_date}' AND
                $this->reservation_table.is_valid = 1 AND $this->reservation_table.request = 0 AND $this->reservation_table.check_in_status IS NOT NULL LIMIT 1";
        
        // var_dump($query);
        $result = mysqli_query($this->connection, $query);
        
        if($result){
            if(mysqli_num_rows($result) == 1) {
                $result = mysqli_fetch_assoc($result);
            }
        }
        else {
            echo "Query Error";
        }

        return $result;
    }

    public function getCountAllWalkingGuestReservations($start_date, $end_date) {

        //  count walking guest and for get online reservations
        $start_date = mysqli_real_escape_string($this->connection, $start_date);
        $end_date = mysqli_real_escape_string($this->connection, $end_date);
        $this->reservation_payment_method = "CASH";

        $query = "SELECT COUNT(DISTINCT $this->reservation_table.reservation_id) as count
                FROM $this->reservation_table
                WHERE $this->reservation_table.check_in_date >= '{$start_date}' AND $this->reservation_table.check_in_date <= '{$end_date}' AND
                $this->reservation_table.is_valid = 1 AND $this->reservation_table.request = 0 AND $this->reservation_table.payment_method = '{$this->reservation_payment_method}' LIMIT 1";
        
        // var_dump($query);
        $result = mysqli_query($this->connection, $query);
        
        if($result){
            if(mysqli_num_rows($result) == 1) {
                $result = mysqli_fetch_assoc($result);
            }
        }
        else {
            echo "Query Error";
        }

        return $result;
    }

    public function getCountAllOnlinePaymentReservations($start_date, $end_date) {

        //  count walking guest and for get online reservations
        $start_date = mysqli_real_escape_string($this->connection, $start_date);
        $end_date = mysqli_real_escape_string($this->connection, $end_date);
        $this->reservation_payment_method = "ONLINEONLINE";

        $query = "SELECT COUNT(DISTINCT $this->reservation_table.reservation_id) as count
                FROM $this->reservation_table
                WHERE $this->reservation_table.check_in_date >= '{$start_date}' AND $this->reservation_table.check_in_date <= '{$end_date}' AND
                $this->reservation_table.is_valid = 1 AND $this->reservation_table.request = 0 AND $this->reservation_table.payment_method = '{$this->reservation_payment_method}' LIMIT 1";
        
        // var_dump($query);
        $result = mysqli_query($this->connection, $query);
        
        if($result){
            if(mysqli_num_rows($result) == 1) {
                $result = mysqli_fetch_assoc($result);
            }
        }
        else {
            echo "Query Error";
        }

        return $result;
    }

    public function getMostReservationIncomeRoom($start_date, $end_date) {

        $start_date = mysqli_real_escape_string($this->connection, $start_date);
        $end_date = mysqli_real_escape_string($this->connection, $end_date);

        $room = new RoomDetails();
        $room->room_table;

        $query = "SELECT $room->room_table.room_name, COUNT($this->reservation_table.reservation_id) as count 
                FROM $this->reservation_table 
                INNER JOIN $room->room_table ON $room->room_table.room_id = $this->reservation_table.room_id 
                WHERE $this->reservation_table.check_in_date >= '{$start_date}' AND $this->reservation_table.check_in_date <= '{$end_date}' AND $this->reservation_table.is_valid = 1 AND $this->reservation_table.request = 0 AND
                $this->reservation_table.check_in_status IS NOT NULL AND $room->room_table.is_delete= 0 GROUP BY $this->reservation_table.room_id";

        // var_dump($query);
        $result = mysqli_query($this->connection, $query);
        if($result) {
            mysqli_fetch_all($result,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }    

        return $result;
    }

    public function getExpectReservationIncome($start_date, $end_date) {

        $start_date = mysqli_real_escape_string($this->connection, $start_date);
        $end_date = mysqli_real_escape_string($this->connection, $end_date);

        $room = new RoomDetails();
        $room_type = new RoomType();
        $room_discount = new RoomDiscount();

        $room->room_table; //table2
        // $room_type->room_type_table;
        $room_discount->room_discount_table;
      

        date_default_timezone_set("Asia/Colombo");
        $current_date = date('Y-m-d');

        
        $query = "SELECT $room->room_table.price,
                  $room_discount->room_discount_table.discount_rate, $room_discount->room_discount_table.start_date, $room_discount->room_discount_table.end_date,
                  $this->reservation_table.check_in_date, $this->reservation_table.check_out_date, $this->reservation_table.reservation_id,  $this->reservation_table.customer_id
                  FROM $room->room_table
                  INNER JOIN $room_discount->room_discount_table
                  ON  $room->room_table.type_id = $room_discount->room_discount_table.room_type_id
                  INNER JOIN $this->reservation_table
                  ON $room->room_table.room_id = $this->reservation_table.room_id
                  WHERE $this->reservation_table.check_in_date >= '{$start_date}' AND $this->reservation_table.check_in_date <= '{$end_date}' AND 
                  $this->reservation_table.is_valid = 1 AND $this->reservation_table.request = 0 AND $room->room_table.is_delete = 0
                  ORDER BY $this->reservation_table.check_in_date";

        // var_dump($query);
        $result = mysqli_query($this->connection, $query);
        if($result) {
            mysqli_fetch_all($result,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }    
        return $result;


    }
    

    



    

}
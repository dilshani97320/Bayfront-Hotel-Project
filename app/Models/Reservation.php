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

    // public function __construct() {
        
    //     $dbhost = 'localhost';
    //     $dbuser = 'root';
    //     $dbpass = '';
    //     $dbname = 'bayfront_hotel';

    //     $this->connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    // }
    
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
                 WHERE $room->room_table.room_number = '{$room->room_number}' AND $this->reservation_table.is_valid = 1 AND
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

    // public function getEmail($email) {

    //     $email = mysqli_real_escape_string($this->connection, $email);
    //     $query = "SELECT * FROM $this->table1
    //               WHERE email = '{$email}'
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


    // public function getCreateCustomer($data) {
    //     $value = 0;
    //     $first_name = mysqli_real_escape_string($this->connection, $data[0]);
    //     $last_name = mysqli_real_escape_string($this->connection, $data[1]);
    //     $location = mysqli_real_escape_string($this->connection, $data[2]);
    //     $contact_num = mysqli_real_escape_string($this->connection, $data[3]);
    //     $age = mysqli_real_escape_string($this->connection, $data[4]);
    //     $email = mysqli_real_escape_string($this->connection, $data[5]);

    //     $query = "INSERT INTO $this->table1 (
    //               first_name, last_name, location, contact_number, age, email) 
    //               VALUES (
    //              '{$first_name}', '{$last_name}', '{$location}', '{$contact_num}', '{$age}', '{$email}'
    //               )";
        
    //     $result = mysqli_query($this->connection, $query);
    //     if($result) {
    //         // query successful.. redirecting to users page
    //         $value = 1;
    //     }
    //     return $value;
    // }

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


    public function getAllCustomerPdf() {

        $query = "SELECT first_name,last_name,location,contact_number,age,email FROM $this->table1";




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




    public function getAllReservationPdf() {

        $query = "SELECT first_name,last_name,contact_number,age,email,check_in_date,check_out_date,no_of_guest,payment_method
        FROM $this->table1
        INNER JOIN $this->table3
        ON $this->table1.customer_id = $this->table3.customer_id";




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



    public function getAllPaymentPdf() {

        $query = "SELECT first_name,last_name,contact_number,email,credit_card_number,expire_month,expire_year,cvv 
        FROM $this->table1 
        INNER JOIN $this->table4 ON $this->table1.customer_id = $this->table4.customer_id";


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




    // public function getCustomerID($email) {


    //     $email = mysqli_real_escape_string($this->connection, $email);

    //     $query = "SELECT * FROM $this->table1
    //               WHERE email = '{$email}'
    //               LIMIT 1";
    //     $customers = mysqli_query($this->connection, $query);
    //     if($customers){
    //         if(mysqli_num_rows($customers) == 1) {
    //             $customer = mysqli_fetch_assoc($customers);
    //         }
    //     }
    //     else {
    //         echo "Query Error";
    //     }

    //     return $customer;
    // }

    // public function getRoomID($room_number) {

    //     $room_number = mysqli_real_escape_string($this->connection, $room_number);
    //     $room = array();
    //     $query = "SELECT * FROM $this->table2
    //               WHERE room_number = '{$room_number}'
    //               LIMIT 1";

    //     $rooms = mysqli_query($this->connection, $query);
    //     if($rooms){
    //         if(mysqli_num_rows($rooms) == 1) {
    //             $room = mysqli_fetch_assoc($rooms);
    //         }
    //     }
    //     else {
    //         echo "Query Error";
    //     }

    //     return $room;
    // }

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

    // public function getCustomer($customer_id) {
    //     $customer_id = mysqli_real_escape_string($this->connection, $customer_id);

    //     $query = "SELECT * FROM $this->table1
    //               WHERE customer_id = '{$customer_id}'
    //               LIMIT 1";
    //     $customers = mysqli_query($this->connection, $query);
    //     if($customers){
    //         if(mysqli_num_rows($customers) == 1) {
    //             $customer = mysqli_fetch_assoc($customers);
    //         }
    //     }
    //     else {
    //         echo "Query Error";
    //     }

    //     return $customer;
    // }

    // public function getReception($reception_user_id) {
    //     $reception_user_id = mysqli_real_escape_string($this->connection, $reception_user_id);

    //     $query = "SELECT * FROM $this->table5
    //               WHERE reception_user_id = '{$reception_user_id}'
    //               LIMIT 1";
    //     $receptions = mysqli_query($this->connection, $query);
    //     if($receptions){
    //         if(mysqli_num_rows($receptions) == 1) {
    //             $reception = mysqli_fetch_assoc($receptions);
    //             // echo "Sucess";
    //         }
    //     }
    //     else {
    //         echo "Query Error";
    //     }

    //     return $reception;
    // }

    // public function getRoomType($room_type_id) {
    //     $room_type_id = mysqli_real_escape_string($this->connection, $room_type_id);

    //     $query = "SELECT * FROM $this->table6
    //               WHERE room_type_id = '{$room_type_id}'getCreateReservation
    //               LIMIT 1";
    //     $types = mysqli_query($this->connection, $query);
    //     if($types){
    //         if(mysqli_num_rows($types) == 1) {
    //             $type = mysqli_fetch_assoc($types);
    //         }
    //     }
    //     else {
    //         echo "Query Error";
    //     }

    //     return $type;
    // }
    
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
                  $customer->customer_table.first_name,  $customer->customer_table.contact_number,
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
                $customer->customer_table.first_name,  $customer->customer_table.contact_number,
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



    public function getreportt()
    {
     
     // echo $d1;
     // exit;
 
     $query="SELECT first_name,last_name,contact_number,age,email,location,no_of_guest,payment_method,check_in_date,check_out_date
      FROM reservation INNER JOIN customer on reservation.customer_id=customer.customer_id
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

}
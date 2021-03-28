<?php 

class Reception extends Employee{

    public $reception_user_id;
    // private $emp_id ==> Foreign Key
    private $reception_user_level;
    private $reception_username;
    private $reception_password;
    private $reception_is_deleted;
    public $reception_table = "reception";
    // private $table1 = "reception";
    // private $table2 = "employee";
    // private $connection;

    public function __construct() {
        Employee::__construct();
    }

    public function setReception($reception_user_id) {
        $this->reception_user_id = mysqli_real_escape_string($this->connection, $reception_user_id);
    }

    public function setSearchReception($search) {
        $this->reception_username = mysqli_real_escape_string($this->connection, $search);
    }

    public function setDataUpdate($user_level, $username, $password) {
        $this->reception_user_level = mysqli_real_escape_string($this->connection, $user_level);
        $this->reception_username = mysqli_real_escape_string($this->connection, $username);
        $password = sha1($password);
        $this->reception_password = mysqli_real_escape_string($this->connection, $password);
    }

    public function getAllReception() {

        $query = "SELECT $this->reception_table.reception_user_id, $this->reception_table.username, $this->employee_table.email, $this->employee_table.contact_num, $this->employee_table.first_name, $this->employee_table.last_name , $this->employee_table.location
                  FROM  $this->reception_table
                  INNER JOIN $this->employee_table
                  ON $this->reception_table.emp_id = $this->employee_table.emp_id
                  WHERE $this->employee_table.is_deleted=0 AND $this->reception_table.is_deleted=0 ORDER BY $this->reception_table.reception_user_id";

        $users = mysqli_query($this->connection, $query);
        if($users) {
            mysqli_fetch_all($users, MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }

        return $users;
    }

    public function getSearchReception() {

        $query = "SELECT $this->reception_table.reception_user_id, $this->reception_table.username, $this->employee_table.email, $this->employee_table.contact_num, $this->employee_table.first_name, $this->employee_table.last_name  , $this->employee_table.location
                  FROM  $this->reception_table
                  INNER JOIN $this->employee_table
                  ON $this->reception_table.emp_id = $this->employee_table.emp_id
                  WHERE $this->employee_table.is_deleted=0 AND $this->reception_table.is_deleted=0 AND $this->reception_table.username = '{$this->reception_username}' 
                  ORDER BY $this->reception_table.reception_user_id";
        
        $users = mysqli_query($this->connection, $query);

        if($users) {
            mysqli_fetch_all($users, MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }

    return $users;

    }

    public function getDataReception() {
       
        $query = "SELECT $this->reception_table.reception_user_id, $this->reception_table.username, $this->employee_table.email, $this->employee_table.contact_num, $this->employee_table.first_name, $this->employee_table.last_name  , $this->employee_table.location
                  FROM  $this->reception_table
                  INNER JOIN $this->employee_table
                  ON $this->reception_table.emp_id = $this->employee_table.emp_id
                  WHERE $this->employee_table.is_deleted=0 AND $this->reception_table.is_deleted=0 AND $this->reception_table.reception_user_id = '{$this->reception_user_id}' 
                  LIMIT 1";
        
        $reception = mysqli_query($this->connection, $query);

        if($reception) {
            if(mysqli_num_rows($reception) == 1) {
                $reception = mysqli_fetch_assoc($reception);
            }
        }
        else {
            echo "Query Error";
        }
        return $reception;

    }

    public function getReception() {
        $reception = array();
        
        $query = "SELECT * FROM $this->reception_table 
                  WHERE reception_user_id = '{$this->reception_user_id}' AND is_deleted=0
                  LIMIT 1";

        $result = 0;

        $result_set = mysqli_query($this->connection, $query);
        if($result_set){
            if(mysqli_num_rows($result_set) == 1) {
                $reception = mysqli_fetch_assoc($result_set);
            }
        }
        else {
            echo "Query Error";
        }
        return $reception;


    }

    public function getCreateReception() {

        $this->reception_username = "Reception";
        $this->reception_user_level = 2;
        $password = 1234;
        $this->reception_password = sha1($password);

        $query = "INSERT INTO $this->reception_table (
            emp_id,username, user_level, password, is_deleted) 
            VALUES (
           '{$this->emp_id}', '{$this->reception_username}', '{$this->reception_user_level}', '{$this->reception_password}', 0
            )";
  
        $result = mysqli_query($this->connection, $query);
        if($result) {
            // query successful.. redirecting to users page
            $value = 1;
        }

        return $value;
    }

    public function getUpdate() {
              
        $value = 0;
        $query = "UPDATE $this->reception_table SET
                reception_user_id = '{$this->reception_user_id}',
                emp_id = '{$this->emp_id}',
                user_level = '{$this->reception_user_level}',
                username = '{$this->reception_username}',
                password = '{$this->reception_password}'
                WHERE reception_user_id = {$this->reception_user_id} LIMIT 1";
        
        $result = mysqli_query($this->connection, $query);
        if($result) {
            // query successful.. redirecting to users page
            $value = 1;
        }
        else {
            echo "Query Unsuccesful";
        }
        return $value;

    }

    

    public function checkReception() {
        

        $query = "SELECT * FROM $this->reception_table 
                  WHERE emp_id = '{$this->emp_id}' AND is_deleted=0
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

    public function removeReception() {

        $query = "UPDATE $this->reception_table SET is_deleted =1 WHERE emp_id = {$this->emp_id} LIMIT 1";
        $value  = 0;
        $result = mysqli_query($this->connection, $query);
        if($result) {
            $value = 1;
        }
        
        return $value;
    }

    public function getCheckDeleteReception() {

        $query = "SELECT * FROM $this->reception_table 
                 WHERE emp_id = '{$this->emp_id}' AND is_deleted=1
                 LIMIT 1";
        $value = 0;
        $result = mysqli_query($this->connection, $query);
        if($result) {
            if(mysqli_num_rows($result) == 1) {
                $value = 1;
            }
        }
        return $value;
    }

    public function getUpdateReception() {

        $query = "UPDATE $this->reception_table SET is_deleted =0 WHERE emp_id = {$this->emp_id} LIMIT 1";

        $result = mysqli_query($this->connection, $query);
        if($result) {
            $value = 1;
        }
        
        return $value;
    }

    public function getReceptionDetail($reception_user_id) {

        $this->reception_user_id = mysqli_real_escape_string($this->connection, $reception_user_id);

        $query = "SELECT * FROM $this->reception_table
                  WHERE reception_user_id = '{$this->reception_user_id}'
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

    public function getReservationsReception($reception_user_id) {

        $this->reception_user_id = mysqli_real_escape_string($this->connection, $reception_user_id);

        $reservationReservation = new Reservation();
        $room = new RoomDetails();
        $customer = new Customer();

        // $receptionReservation->reception_table; //Table6
        $room->room_table; //Table5
        $reservationReservation->reservation_table; //Table4
        $customer->customer_table;

        $query = "SELECT  $room->room_table.room_number,$room->room_table.price, $customer->customer_table.first_name, $room->room_table.room_name,
                $reservationReservation->reservation_table.check_in_date, $reservationReservation->reservation_table.check_out_date, $reservationReservation->reservation_table.payment_method, $reservationReservation->reservation_table.reservation_id,
                $reservationReservation->reservation_table.check_out_status
                FROM reservation INNER JOIN $room->room_table  ON  $reservationReservation->reservation_table.room_id = $room->room_table.room_id
                                 INNER JOIN $customer->customer_table  ON  $reservationReservation->reservation_table.customer_id = $customer->customer_table.customer_id
                WHERE  $reservationReservation->reservation_table.reception_user_id = '{$this->reception_user_id}' AND $reservationReservation->reservation_table.is_valid = 1 AND $reservationReservation->reservation_table.request = 0
                ORDER BY $reservationReservation->reservation_table.check_in_date";

        $result = 0;

        $reservations= mysqli_query($this->connection, $query);

        if($reservations) {
            mysqli_fetch_all($reservations,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed1";
        }
        return $reservations;

        
    }

    public function getCountReceptionEmployees() {

        $query = "SELECT COUNT(DISTINCT $this->reception_table.reception_user_id) as count
                FROM  $this->reception_table
                INNER JOIN $this->employee_table
                ON $this->reception_table.emp_id = $this->employee_table.emp_id
                WHERE $this->employee_table.is_deleted=0 AND $this->reception_table.is_deleted=0 LIMIT 1";

        
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
}

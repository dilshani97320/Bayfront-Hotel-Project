<?php 

class Customer extends Connection {

    public $customer_id;  
    // private $room_type_id;   Foriegn key
    //have to create
    private $customer_first_name;
    private $customer_last_name;
    private $customer_location;
    private $customer_contact_number;
    private $customer_age;
    private $customer_email;
    public $customer_table = "customer";

    public function __construct() {        
        Connection::__construct();
    }

    public function getAllCustomer() {

        $query = "SELECT * FROM  $this->customer_table
                  WHERE is_deleted=0 ORDER BY customer_id";

        $users = mysqli_query($this->connection, $query);
        if($users) {
           mysqli_fetch_all($users,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }    

    return $users;    
    }

    public function getSearchCustomer($search) {

        $search = mysqli_real_escape_string($this->connection, $search);
        $this->customer_first_name = $search;
        $this->customer_last_name =$search;
        $this->customer_email = $search;

        $query = "SELECT * FROM $this->customer_table WHERE 
                (first_name LIKE '%{$this->customer_first_name}%' OR last_name LIKE '%{$this->customer_last_name}%' OR email LIKE '%{$this->customer_email}%')
                AND is_deleted=0 ORDER BY first_name";

        $users = mysqli_query($this->connection, $query);
        if($users) {
            mysqli_fetch_all($users,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }        
    
    return $users;  
    }

    public function getCustomer($customer_id) {
        $this->customer_id = mysqli_real_escape_string($this->connection, $customer_id);

        $query = "SELECT * FROM $this->customer_table
                  WHERE customer_id = '{$this->customer_id}' and is_deleted = 0
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

    public function getReservations($customer_id) {

        $this->customer_id = mysqli_real_escape_string($this->connection, $customer_id);
        $reservationReservation = new Reservation();
        $room = new RoomDetails();

        // $receptionReservation->reception_table; //Table6
        $room->room_table; //Table5
        $reservationReservation->reservation_table; //Table4



        $query = "SELECT  $room->room_table.room_number,$room->room_table.price, $this->customer_table.first_name,
                $reservationReservation->reservation_table.check_in_date, $reservationReservation->reservation_table.check_out_date, $reservationReservation->reservation_table.payment_method
                FROM reservation INNER JOIN $room->room_table  ON  $reservationReservation->reservation_table.room_id = $room->room_table.room_id
                                 INNER JOIN $this->customer_table  ON  $reservationReservation->reservation_table.customer_id = $this->customer_table.customer_id
                WHERE  $reservationReservation->reservation_table.customer_id = '{$this->customer_id}' AND $reservationReservation->reservation_table.is_valid = 1 AND $reservationReservation->reservation_table.request = 0
                ORDER BY $reservationReservation->reservation_table.room_id";

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

    public function getEmail($email) {

        $this->customer_email = mysqli_real_escape_string($this->connection, $email);

        $query = "SELECT * FROM $this->customer_table
                  WHERE email = '{$this->customer_email}' and is_deleted = 0
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

    public function getEmailData($email) {
        $customer = array();
        $this->customer_email = mysqli_real_escape_string($this->connection, $email);

        $query = "SELECT * FROM $this->customer_table
                  WHERE email = '{$this->customer_email}' and is_deleted = 0
                  LIMIT 1";

        $result = 0;
        $result_set = mysqli_query($this->connection, $query);
        if($result_set){
            if(mysqli_num_rows($result_set) == 1) {
                $customer = mysqli_fetch_assoc($result_set);
            }
        }
        else {
            echo "Query Error";
        }
        return $customer;
    }

    public function getCreateCustomer($data) {

        $value = 0;
        $this->customer_first_name = mysqli_real_escape_string($this->connection, $data[0]);
        $this->customer_last_name = mysqli_real_escape_string($this->connection, $data[1]);
        $this->customer_location = mysqli_real_escape_string($this->connection, $data[2]);
        $this->customer_contact_num = mysqli_real_escape_string($this->connection, $data[3]);
        $this->customer_age = mysqli_real_escape_string($this->connection, $data[4]);
        $this->customer_email = mysqli_real_escape_string($this->connection, $data[5]);

        $query = "INSERT INTO $this->customer_table (
                  first_name, last_name, location, contact_number, age, email, is_deleted)
                  VALUES (
                 '{$this->customer_first_name}', '{$this->customer_last_name}', '{$this->customer_location}', '{$this->customer_contact_num}', '{$this->customer_age}', '{$this->customer_email}', 0
                  )";
        
        $result = mysqli_query($this->connection, $query);
        if($result) {
            // query successful.. redirecting to users page
            $value = 1;
        }
        return $value;
    }

    public function getCustomerID($email) {

        $this->customer_email = mysqli_real_escape_string($this->connection, $email);

        $query = "SELECT * FROM $this->customer_table
                  WHERE email = '{$this->customer_email}' and is_deleted = 0
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

}
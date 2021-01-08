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

    public function getCustomer($customer_id) {
        $this->customer_id = mysqli_real_escape_string($this->connection, $customer_id);

        $query = "SELECT * FROM $this->customer_table
                  WHERE customer_id = '{$this->customer_id}'
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

    public function getEmail($email) {

        $this->customer_email = mysqli_real_escape_string($this->connection, $email);

        $query = "SELECT * FROM $this->customer_table
                  WHERE email = '{$this->customer_email}'
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
        $this->customer_first_name = mysqli_real_escape_string($this->connection, $data[0]);
        $this->customer_last_name = mysqli_real_escape_string($this->connection, $data[1]);
        $this->customer_location = mysqli_real_escape_string($this->connection, $data[2]);
        $this->customer_contact_num = mysqli_real_escape_string($this->connection, $data[3]);
        $this->customer_age = mysqli_real_escape_string($this->connection, $data[4]);
        $this->customer_email = mysqli_real_escape_string($this->connection, $data[5]);

        $query = "INSERT INTO $this->customer_table (
                  first_name, last_name, location, contact_number, age, email) 
                  VALUES (
                 '{$this->customer_first_name}', '{$this->customer_last_name}', '{$this->customer_location}', '{$this->customer_contact_num}', '{$this->customer_age}', '{$this->customer_email}'
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
                  WHERE email = '{$this->customer_email}'
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
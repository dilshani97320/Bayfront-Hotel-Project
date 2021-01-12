<?php 

class Payment extends Connection {

    public $payment_id;  
    // private $room_type_id;   Foriegn key
    //have to create
    private $payment_name_of_card;
    private $payment_credit_card_number;
    private $payment_expire_month;
    private $payment_expire_year;
    private $payment_cvv;
    public $payment_table = "payment";

    public function __construct() {        
        Connection::__construct();
    }

    public function checkCustomerPayment($customer_id) {

        $customer = new Customer();
        $customer->customer_id = mysqli_real_escape_string($this->connection, $customer_id); 

        $query = "SELECT * FROM $this->payment_table
                  WHERE customer_id = '{$customer->customer_id}'
                  LIMIT 1";

        $customers = mysqli_query($this->connection, $query);

        if($customers){
            if(mysqli_num_rows($customers) == 1) {
                $customer = mysqli_fetch_assoc($customers);
            }
            else {
                $customer = array();
            }
        }
        else {
            echo "Query Error";
        }

        return $customer;
    }

    

    

    

}
<?php 

class Payment extends Connection {

    public $payment_id;  
    // private $room_type_id;   Foriegn key
    //have to create
    private $payment_stripe_id;
    // private $payment_customer_id;
    private $payment_roomdesc;
    private $payment_amount;
    private $payment_currency;
    private $payment_status;
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

    public function addTransaction($data) {

        $customer = new Customer();
        $reservation = new Reservation();
        $reservation->reservation_id = mysqli_real_escape_string($this->connection, $data['reservation_id']);
        $this->payment_stripe_id = mysqli_real_escape_string($this->connection, $data['stripe_id']);
        $this->payment_customerstripe_id = mysqli_real_escape_string($this->connection, $data['customerstripe_id']);
        $customer->customer_id = mysqli_real_escape_string($this->connection, $data['customer_id']);
        $this->payment_roomdesc = mysqli_real_escape_string($this->connection, $data['roomdesc']);
        $this->payment_amount = mysqli_real_escape_string($this->connection, $data['amount']);
        $this->payment_currency = mysqli_real_escape_string($this->connection, $data['currency']);
        $this->payment_status = mysqli_real_escape_string($this->connection, $data['status']);

        $query = "INSERT INTO $this->payment_table (
                reservation_id, stripe_id, customerstripe_id, customer_id, roomdesc, amount, currency, status) 
                VALUES (
                '{$reservation->reservation_id}', '{$this->payment_stripe_id}', '{$this->payment_customerstripe_id}', '{$customer->customer_id}', '{$this->payment_roomdesc}', '{$this->payment_amount}', '{$this->payment_currency}', '{$this->payment_status}'
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
            echo "Query failedXXX";
        }
    }

    public function paymentDetails($reservation_id, $customer_id) {

        $customer = new Customer();
        $customer->customer_id = mysqli_real_escape_string($this->connection, $customer_id); 
        $reservation = new Reservation();
        $reservation->reservation_id = mysqli_real_escape_string($this->connection, $reservation_id);

        $query = "SELECT * FROM $this->payment_table
                  WHERE customer_id = '{$customer->customer_id}' AND reservation_id = '{$reservation->reservation_id}'
                  LIMIT 1";

        $payments = mysqli_query($this->connection, $query);

        if($payments){
            if(mysqli_num_rows($payments) == 1) {
                $payment = mysqli_fetch_assoc($payments);
            }
            else {
                $payment = array();
            }
        }
        else {
            echo "Query Error";
        }

        return $payment;
    }
    

    

    

}
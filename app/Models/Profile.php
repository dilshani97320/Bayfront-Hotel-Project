<?php 

class Profile extends Connection {

    
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
    public $reservation_table = "reservation";
    public $customer_table = "customer";

    // private $connection;
    public function __construct() {        
        Connection::__construct();
    }

    
    public function reservationDetails($email) {

        $query1 = "  SELECT * FROM $this->customer_table
                    WHERE email = '{$email}' 
                    LIMIT 1";
        $customer = mysqli_query($this->connection, $query1);
        $row = mysqli_fetch_assoc($customer);
        $customer_id = $row['customer_id'];
        
        $query = "SELECT * FROM $this->reservation_table
                  WHERE customer_id = '{$customer_id}' AND is_valid =1";
// echo $query;exit;
        $reservations = mysqli_query($this->connection, $query);
        if($reservations) {
            $reservations= mysqli_fetch_all($reservations,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }    

// var_dump($reservations); exit;
        return $reservations;

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

    public function addReview($reservation_id, $star, $review) {
        
        $query = "UPDATE $this->reservation_table SET $this->reservation_table.is_feedback = '1', $this->reservation_table.	guest_review = '{$review}', $this->reservation_table.rating ='{$star}'
                  WHERE $this->reservation_table.reservation_id = {$reservation_id} AND $this->reservation_table.is_checkout = 1 LIMIT 1";
        // echo $query; exit;
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
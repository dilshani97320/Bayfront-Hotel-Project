<?php 

class RoomDetails extends RoomType {


    // private $table1 = "room_details";
    // private $table2 = "room_type";
    // private $table3 = "room_discount";
    // private $table4 = "reservation";
    // private $table5 = "customer";
    // private $table6 = "reception";

    public $room_id;
    public $room_number;
    private $room_name;
    private $room_floor_type;
    private $room_price;
    private $room_air_condition;
    private $room_view;
    private $room_breakfast_included;
    private $room_hot_water;
    private $room_free_cancelaration;
    private $room_description;
    private $room_today_booked;
    private $room_is_delete;
    public $room_table = "room_details";
    public $reservation_table = "reservation";

    public function __construct() {        
        RoomType::__construct();
    }

    public function getRoomView()
    {
         $query = "SELECT * FROM $this->room_table
                  INNER JOIN $this->room_type_table ON $this->room_table.type_id = $this->room_type_table.room_type_id";
        // echo $query;  
        // exit();  
        $result= mysqli_query($this->connection, $query);
        // var_dump($rooms);
        // exit();
        if($result) {
            $rooms = mysqli_fetch_all($result,MYSQLI_ASSOC);
        
            // var_dump($rooms);
            // exit();
            return $rooms;
        }
        else {
            echo "Database Query Failed";
        }    

    }

    public function getOneRoomView($room_number)
    {   
        $rooms[] = array();
         $query = "SELECT * FROM $this->room_table
                  INNER JOIN $this->room_type_table ON $this->room_table.type_id = $this->room_type_table.room_type_id WHERE $this->room_table.room_number= '$room_number' ";
        // echo $query;  
        // exit();  
        $result= mysqli_query($this->connection, $query);
        // var_dump($result);
        // exit();
        if($result) {
            $rooms = mysqli_fetch_all($result,MYSQLI_ASSOC);
        
            // var_dump($rooms);
            // echo $rooms[0]['room_number'];
            // exit();
            return $rooms;
        }
        else {
            echo "Database Query Failed";
        }  
    }

    public function getReview($room_id)
    {   
        // WTGihan DB must update
         $query = "SELECT customer_id, 	guest_review, 	rating,reply FROM $this->reservation_table
                   WHERE $this->reservation_table.room_id= '$room_id' AND  $this->reservation_table.is_feedback= 1";
        // echo $query;  
        // exit();  
        $result= mysqli_query($this->connection, $query);
        // var_dump($result);
        // exit();
        if($result) {
            $rooms = mysqli_fetch_all($result,MYSQLI_ASSOC);
        
            // var_dump($rooms);
            // echo $rooms[0]['room_number'];
            // exit();
            return $rooms;
        }
        else {
            echo "Database Query Failed";
        }  
    }


//get room tetails pdf
    public function getAllRoomPdf() {

        $query = "SELECT * FROM  $this->table1";
                  
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





    // public function getRoomTypes() {
    //     $user = array();
    //     $query = "SELECT type_name FROM $this->room_type_table";


    //     $result = 0;

    //     $room_types = mysqli_query($this->connection, $query);

    //     if($room_types) {
    //         mysqli_fetch_all($room_types,MYSQLI_ASSOC);
    //         return $room_types;
    //     }
    //     else {
    //         echo "Database Query Failed";
    //     }
        
    // }

    // public function getTypeID($type_name) {

    // }    


    // public function getTypeID($type_name) {
    //     // private $table2 = "room_type";
    //     $type_name = mysqli_real_escape_string($this->connection, $type_name);

    //     $query = "SELECT * FROM $this->room_type_table
    //               WHERE type_name = '{$type_name}'
    //               LIMIT 1";

    //     $types_id = mysqli_query($this->connection, $query);
    //     if($types_id){
    //         if(mysqli_num_rows($types_id) == 1) {
    //             $type_id = mysqli_fetch_assoc($types_id);
    //         }
    //     }
    //     else {
    //         echo "Query Error";
    //     }

    //     return $type_id;
    // }

    public function getRoomsUpdate() {

        $query = "UPDATE $this->room_table SET
                 today_booked = 0 ";
        
        $result = mysqli_query($this->connection, $query);
        $value = 0;
        if($result) {
            // query successful.. 
            $value = 1;
        }
        return $value;

        
    }

    public function roomAvalability($room_id,$check_in_date,$check_out_date) {
        
        date_default_timezone_set("Asia/Colombo");
        $current_date = date('Y-m-d');

        $this->room_id = mysqli_real_escape_string($this->connection, $room_id);
        $roomAvailableCheck = new Reservation();
        $roomAvailableCheck->setCheckInOutDate($check_in_date, $check_out_date);
        // $check_in_date = mysqli_real_escape_string($this->connection, $check_in_date);
        // $check_out_date = mysqli_real_escape_string($this->connection, $check_out_date);

        $query = "SELECT * FROM $roomAvailableCheck->reservation_table
                  WHERE room_id = '{$this->room_id}' AND $roomAvailableCheck->reservation_table.is_valid = 1 AND
                 (((check_in_date = '{$current_date}' AND check_in_date <= '{$roomAvailableCheck->reservation_check_in_date}'  AND  check_out_date > '{$roomAvailableCheck->reservation_check_in_date}') OR 
                 (check_in_date <= '{$roomAvailableCheck->reservation_check_in_date}'  AND  check_out_date >= '{$roomAvailableCheck->reservation_check_in_date}')) OR
                 ((check_in_date = '{$current_date}' AND check_in_date <= '{$roomAvailableCheck->reservation_check_out_date}'  AND  check_out_date > '{$roomAvailableCheck->reservation_check_out_date}') OR 
                 (check_in_date <= '{$roomAvailableCheck->reservation_check_out_date}'  AND  check_out_date >= '{$roomAvailableCheck->reservation_check_out_date}')))
                 ORDER BY $this->room_id";


        $result = mysqli_query($this->connection, $query);
        $value = 0;
        if($result) {
            if(mysqli_num_rows($result) != 0) {
                $value = 1;
                // echo "Has result<br>";
            }
            // echo "Works";
            return $value;
        }
        else {
            // echo $roomAvailableCheck->reservation_table;
            // echo $this->room_id;
            echo "Database Query Failed of roomAvalability<br>";
        }        

        
    }

    public function roomTodayBookedUpdate($room_id) {

        $this->room_id = mysqli_real_escape_string($this->connection, $room_id);

        $query = "UPDATE $this->room_table SET
                 today_booked = 1
                 WHERE room_id = {$this->room_id} LIMIT 1";
        
        $result = mysqli_query($this->connection, $query);
        $value = 0;
        if($result) {
            // query successful.. 
            $value = 1;
        }
        return $value;
    }

    public function getAvailableRooms($check_in_date, $check_out_date) {
        date_default_timezone_set("Asia/Colombo");
        $current_date = date('Y-m-d');
       
        // $room_type_id = mysqli_real_escape_string($this->connection, $room_type_id);
        // $check_in_date = mysqli_real_escape_string($this->connection, $check_in_date);
        // $check_out_date = mysqli_real_escape_string($this->connection, $check_out_date);

        $roomAvailableGet = new Reservation();
        $roomAvailableGet->setCheckInOutDate($check_in_date, $check_out_date);
        


        $query = "SELECT $this->room_table.room_number,  $this->room_table.room_name, $this->room_table.price, 
                    $this->room_type_table.max_guest,
                    $roomAvailableGet->reservation_table.check_in_date, $roomAvailableGet->reservation_table.check_out_date
                    FROM $this->room_table
                    INNER JOIN $this->room_type_table
                    ON  $this->room_table.type_id = $this->room_type_table.room_type_id
                    LEFT OUTER JOIN $roomAvailableGet->reservation_table
                    ON  $this->room_table.room_id = $roomAvailableGet->reservation_table.room_id 
                    WHERE $this->room_table.today_booked = 0 AND $this->room_table.type_id = '{$this->room_type_id}' AND $this->room_table.is_delete =0 AND
                    ((($roomAvailableGet->reservation_table.check_in_date != '{$current_date}' AND $roomAvailableGet->reservation_table.check_in_date > '{$check_in_date}' AND $roomAvailableGet->reservation_table.check_in_date > '{$check_out_date}' AND $roomAvailableGet->reservation_table.is_valid = 1) OR
                    $roomAvailableGet->reservation_table.check_in_date IS NULL) OR 
                    (($roomAvailableGet->reservation_table.check_in_date != '{$current_date}' AND $roomAvailableGet->reservation_table.check_out_date < '{$check_in_date}' AND $roomAvailableGet->reservation_table.check_out_date < '{$check_out_date}' AND $roomAvailableGet->reservation_table.is_valid = 1) OR
                    $roomAvailableGet->reservation_table.check_out_date IS NULL))
                    ORDER BY  room_details.room_id";
            
        
        $rooms= mysqli_query($this->connection, $query);
        // var_dump($rooms);
        // echo "<br>";
        if($rooms) {
            if(mysqli_num_rows($rooms) != 0) {
                mysqli_fetch_all($rooms,MYSQLI_ASSOC);
                // $value = 1;
                // echo "have a data";
                return $rooms;
            }
            else {
                $rooms = array();
                $value = 0;
                return $rooms;
            }
        }
        else {
            echo "Database Query Failed getAvailableRooms";
        }
    }

    // public function getAvailableRoomsID($room_id,$check_in_date, $check_out_date) {
    //         date_default_timezone_set("Asia/Colombo");
    //         $current_date = date('Y-m-d');
    //         $this->room_id = mysqli_real_escape_string($this->connection, $room_id);
    //         // $check_in_date = mysqli_real_escape_string($this->connection, $check_in_date);
    //         // $check_out_date = mysqli_real_escape_string($this->connection, $check_out_date);

    //         $roomAvailableGet = new Reservation();
    //         $roomAvailableGet->setCheckInOutDate($check_in_date, $check_out_date);
    


    //         $query = "SELECT $this->room_table.room_number,  $this->room_table.room_name, $this->room_table.price, 
    //                     $this->room_type_table.max_guest,
    //                     $roomAvailableGet->reservation_table.check_in_date, $roomAvailableGet->reservation_table.check_out_date
    //                     FROM $this->room_table
    //                     INNER JOIN $this->room_type_table
    //                     ON  $this->room_table.type_id = $this->room_type_table.room_type_id
    //                     LEFT OUTER JOIN $roomAvailableGet->reservation_table
    //                     ON  $this->room_table.room_id = $roomAvailableGet->reservation_table.room_id 
    //                     WHERE $this->room_table.today_booked = 0 AND $this->room_table.room_id = '{$this->room_id}' AND $this->room_table.is_delete =0 AND
    //                     ((($roomAvailableGet->reservation_table.check_in_date != '{$current_date}' AND $roomAvailableGet->reservation_table.check_in_date > '{$check_in_date}' AND $roomAvailableGet->reservation_table.check_in_date > '{$check_out_date}' AND $roomAvailableGet->reservation_table.is_valid = 1) OR
    //                     $roomAvailableGet->reservation_table.check_in_date IS NULL) OR 
    //                     (($roomAvailableGet->reservation_table.check_in_date != '{$current_date}' AND $roomAvailableGet->reservation_table.check_out_date < '{$check_in_date}' AND $roomAvailableGet->reservation_table.check_out_date < '{$check_out_date}' AND $roomAvailableGet->reservation_table.is_valid = 1) OR
    //                     $roomAvailableGet->reservation_table.check_out_date IS NULL))
    //                     ORDER BY  room_details.room_id";
        
    
    //         $rooms= mysqli_query($this->connection, $query);
    //         // var_dump($rooms);
    //         // echo "<br>";
    //         if($rooms) {
    //             if(mysqli_num_rows($rooms) != 0) {
    //                 mysqli_fetch_all($rooms,MYSQLI_ASSOC);
    //                 // $value = 1;
    //                 // echo "have a data";
    //                 return $rooms;
    //             }
    //             else {
    //                 $rooms = array();
    //                 $value = 0;
    //                 return $rooms;
    //             }
    //         }
    //         else {
    //             echo "Database Query Failed getAvailableRooms";
    //             }
    // }
    public function getRoomAllID() {

        // $room_type_id = mysqli_real_escape_string($this->connection, $room_type_id);

        
        $query = "SELECT * FROM $this->room_table
                  WHERE type_id = '{$this->room_type_id}'
                  ORDER BY room_id";
        // var_dump($query);
        $result = 0;

        $rooms= mysqli_query($this->connection, $query);
        
        if($rooms) {
            mysqli_fetch_all($rooms,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }
        return $rooms;
    }



    public function getRoom($room_number) {

        $this->room_number = mysqli_real_escape_string($this->connection, $room_number);

        $query = "SELECT  * FROM $this->room_table
                WHERE $this->room_table.room_number =  '{$room_number}'
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

    // public function getRoomType($room_type_id) {

    //     $room_type_id = mysqli_real_escape_string($this->connection, $room_type_id);

    //     $query = "SELECT  * FROM $this->table2
    //             WHERE $this->table2.room_type_id =  '{$room_type_id}'
    //             LIMIT 1";

    //     $types = mysqli_query($this->connection, $query);

    //     if($types){
    //         if(mysqli_num_rows($types) == 1) {
    //             $type = mysqli_fetch_assoc($types);
    //         }
    //     }
    //     else {
    //         echo "Query Error";
    //     }        
    
    // return $type;  
    // }

    public function getReservations($room_id) {

        $this->room_id = mysqli_real_escape_string($this->connection, $room_id);
        $customerReservation = new Customer();
        $reservationReservation = new Reservation();
        $receptionReservation = new Reception();

        $receptionReservation->reception_table; //Table6
        $customerReservation->customer_table; //Table5
        $reservationReservation->reservation_table; //Table4



        $query = "SELECT  $this->room_table.room_number, $customerReservation->customer_table.first_name, $customerReservation->customer_table.email, $receptionReservation->reception_table.username,
                $reservationReservation->reservation_table.check_in_date, $reservationReservation->reservation_table.check_out_date, $reservationReservation->reservation_table.payment_method
                FROM reservation INNER JOIN $this->room_table  ON  $reservationReservation->reservation_table.room_id = $this->room_table.room_id
                                 INNER JOIN $customerReservation->customer_table  ON  $reservationReservation->reservation_table.customer_id = $customerReservation->customer_table.customer_id
                                 INNER JOIN $receptionReservation->reception_table  ON  $reservationReservation->reservation_table.reception_user_id = $receptionReservation->reception_table.reception_user_id
                WHERE  $reservationReservation->reservation_table.room_id = '{$this->room_id}' AND $reservationReservation->reservation_table.is_valid = 1
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
    
    

    // public function getRoomDiscount($room_type_id) {

    //     $room_type_id = mysqli_real_escape_string($this->connection, $room_type_id);
    //     $room_discount = array();
    //     $query = "SELECT * FROM $this->table3
    //               WHERE room_type_id = '{$room_type_id}'
    //               LIMIT 1";

    //     $room_discounts = mysqli_query($this->connection, $query);

    //     if($room_discounts){
    //         if(mysqli_num_rows($room_discounts) == 1) {
    //             $room_discount = mysqli_fetch_assoc($room_discounts);
    //         }
    //         return $room_discount;
    //     }
    //     else {
    //         echo "Query Error";
    //     }

        
    // }

    public function getRoomID($room_number) {

        $this->room_number = mysqli_real_escape_string($this->connection, $room_number);
        $room = array();
        $query = "SELECT * FROM $this->room_table
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

    public function getRoomDetails($room_id) {

        $this->room_id = mysqli_real_escape_string($this->connection, $room_id);
        $room = array();
        
        $query = "SELECT * FROM $this->room_table
                  WHERE room_id = '{$room_id}'
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

    public function getRoomAll() {

        $room = array();
        $query = "SELECT * FROM $this->room_table
                WHERE is_delete = 0 ";

        $rooms = mysqli_query($this->connection, $query);
        if($rooms){
            $room = mysqli_fetch_all($rooms,MYSQLI_ASSOC);

        }
        else {
            echo "Query Error";
        }

        return $room;
    }

   

}
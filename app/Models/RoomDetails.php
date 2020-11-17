<?php 

class RoomDetails {


    private $table1 = "room_details";
    private $table2 = "room_type";
    private $table3 = "room_discount";
    private $table4 = "reservation";
    private $table5 = "customer";
    private $table6 = "reception";

    private $connection;

    public function __construct() {
        
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'bayfront_hotel';

        $this->connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    }
    public function getRoomView()
    {
         $query = "SELECT * FROM $this->table1
                  INNER JOIN $this->table2 ON $this->table1.type_id = $this->table2.room_type_id";
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
         $query = "SELECT * FROM $this->table1
                  INNER JOIN $this->table2 ON $this->table1.type_id = $this->table2.room_type_id WHERE $this->table1.room_number= '$room_number' ";
        // echo $query;  
        // exit();  
        $result= mysqli_query($this->connection, $query);
        // var_dump($result);
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

    public function getRoomTypes() {
        $user = array();
        $query = "SELECT type_name FROM $this->table2";


        $result = 0;

        $room_types = mysqli_query($this->connection, $query);

        if($room_types) {
            mysqli_fetch_all($room_types,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }
        return $room_types;
    }

    public function getTypeID($type_name) {

        $type_name = mysqli_real_escape_string($this->connection, $type_name);

        $query = "SELECT * FROM $this->table2
                  WHERE type_name = '{$type_name}'
                  LIMIT 1";

        $types_id = mysqli_query($this->connection, $query);
        if($types_id){
            if(mysqli_num_rows($types_id) == 1) {
                $type_id = mysqli_fetch_assoc($types_id);
            }
        }
        else {
            echo "Query Error";
        }

        return $type_id;
    }

    public function getRoomsUpdate() {

        $query = "UPDATE $this->table1 SET
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

        $room_id = mysqli_real_escape_string($this->connection, $room_id);
        $check_in_date = mysqli_real_escape_string($this->connection, $check_in_date);
        $check_out_date = mysqli_real_escape_string($this->connection, $check_out_date);

        $query = "SELECT * FROM $this->table4
                  WHERE room_id = '{$room_id}' AND $this->table4.is_valid = 1 AND
                 (((check_in_date = '{$current_date}' AND check_in_date <= '{$check_in_date}'  AND  check_out_date > '{$check_in_date}') OR 
                 (check_in_date <= '{$check_in_date}'  AND  check_out_date >= '{$check_in_date}')) OR
                 ((check_in_date = '{$current_date}' AND check_in_date <= '{$check_out_date}'  AND  check_out_date > '{$check_out_date}') OR 
                 (check_in_date <= '{$check_out_date}'  AND  check_out_date >= '{$check_out_date}')))
                 ORDER BY room_id";


        $result = mysqli_query($this->connection, $query);
        $value = 0;
        if($result) {
            if(mysqli_num_rows($result) != 0) {
                $value = 1;
                // echo "Has result<br>";
            }
            // echo "Works";
        }
        else {
            echo "Database Query Failed";
        }        

        return $value;
    }

    public function roomTodayBookedUpdate($room_id) {
        $room_id = mysqli_real_escape_string($this->connection, $room_id);

        $query = "UPDATE $this->table1 SET
                 today_booked = 1
                 WHERE room_id = {$room_id} LIMIT 1";
        
        $result = mysqli_query($this->connection, $query);
        $value = 0;
        if($result) {
            // query successful.. 
            $value = 1;
        }
        return $value;
    }

    public function getAvailableRooms($room_type_id,$check_in_date, $check_out_date) {
        date_default_timezone_set("Asia/Colombo");
        $current_date = date('Y-m-d');
       
        $room_type_id = mysqli_real_escape_string($this->connection, $room_type_id);
        $check_in_date = mysqli_real_escape_string($this->connection, $check_in_date);
        $check_out_date = mysqli_real_escape_string($this->connection, $check_out_date);


        $query =   "SELECT $this->table1.room_number,  $this->table1.room_name, $this->table1.price, $this->table2.max_guest,
                   $this->table4.check_in_date, $this->table4.check_out_date
                   FROM  $this->table1
                   INNER JOIN $this->table2
                   ON  $this->table1.type_id = $this->table2.room_type_id
                   LEFT OUTER JOIN $this->table4 
                   ON  $this->table1.room_id = $this->table4.room_id
                   WHERE ($this->table1.today_booked = 0 AND $this->table1.type_id = '{$room_type_id}') AND $this->table4.is_valid = 1 AND
                   ((($this->table4.check_in_date != '{$current_date}' AND $this->table4.check_in_date > '{$check_in_date}' AND $this->table4.check_in_date > '{$check_out_date}') OR  $this->table4.check_in_date IS NULL ) OR 
                   (($this->table4.check_in_date != '{$current_date}' AND $this->table4.check_in_date < '{$check_in_date}' AND $this->table4.check_in_date < '{$check_out_date}') OR  $this->table4.check_in_date IS NULL ))
                   ORDER BY  $this->table1.room_id";
            
        
        $rooms= mysqli_query($this->connection, $query);
        
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
            echo "Database Query Failed1";
        }

        



    }

    public function getRoomAllID($room_type_id) {

        $room_type_id = mysqli_real_escape_string($this->connection, $room_type_id);

        $query = "SELECT * FROM $this->table1
                  WHERE type_id = '{$room_type_id}'
                  ORDER BY room_id";

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




    

    // public function getAllRoomAll() {

    //     $query = "SELECT $this->table1.room_number,  $this->table1.room_name, $this->table1.price, $this->table2.max_guest,
    //               $this->table4.check_in_date, $this->table4.check_out_date
    //               FROM $this->table1
    //               INNER JOIN $this->table2
    //               ON  $this->table1.type_id = $this->table2.room_type_id
    //               LEFT OUTER JOIN $this->table4
    //               ON $this->table1.room_id = $this->table4.room_id
    //               WHERE $this->table4.is_valid = 1 
    //               ORDER BY $this->table1.room_id";

    //     $rooms = mysqli_query($this->connection, $query);
    //     if($rooms) {
    //         mysqli_fetch_all($rooms,MYSQLI_ASSOC);
    //     }
    //     else {
    //         echo "Database Query Failed";
    //     }    

    // return $rooms;    
    // }

    public function getRoom($room_number) {
        $room_number = mysqli_real_escape_string($this->connection, $room_number);

        $query = "SELECT  * FROM $this->table1
                WHERE $this->table1.room_number =  '{$room_number}'
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

    public function getRoomType($room_type_id) {

        $room_type_id = mysqli_real_escape_string($this->connection, $room_type_id);

        $query = "SELECT  * FROM $this->table2
                WHERE $this->table2.room_type_id =  '{$room_type_id}'
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

    public function getReservations($room_id) {
        $room_id = mysqli_real_escape_string($this->connection, $room_id);

        $query = "SELECT  $this->table1.room_number, $this->table5.first_name, $this->table5.email, $this->table6.username,
                $this->table4.check_in_date, $this->table4.check_out_date, $this->table4.payment_method
                FROM reservation INNER JOIN $this->table1  ON  $this->table4.room_id = $this->table1.room_id
                                 INNER JOIN $this->table5  ON  $this->table4.customer_id = $this->table5.customer_id
                                 INNER JOIN $this->table6  ON  $this->table4.reception_user_id = $this->table6.reception_user_id
                WHERE  $this->table4.room_id = '{$room_id}' AND $this->table4.is_valid = 1
                ORDER BY $this->table4.room_id";

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
    

    // 
    // public function getSearchRoomAll($search) {

    //     $search = mysqli_real_escape_string($this->connection, $search);

    //     $query = "SELECT $this->table1.room_number,  $this->table1.room_name, $this->table1.price, $this->table2.max_guest,
    //               $this->table4.check_in_date, $this->table4.check_out_date
    //               FROM $this->table1
    //               INNER JOIN $this->table2
    //               ON  $this->table1.type_id = $this->table2.room_type_id
    //               LEFT OUTER JOIN $this->table4
    //               ON $this->table1.room_id = $this->table4.room_id
    //               WHERE $this->table1.room_number LIKE '%{$search}%' AND $this->table4.is_valid = 1
    //               ORDER BY $this->table1.room_id";

    //     $rooms = mysqli_query($this->connection, $query);

    //     if($rooms) {
    //         mysqli_fetch_all($rooms,MYSQLI_ASSOC);
    //     }
    //     else {
    //         echo "Database Query Failed";
    //     }        
    
    // return $rooms;  
    // }

    

    


    // public function getDataEmployee($room_id) {

    //     $emp_id = mysqli_real_escape_string($this->connection, $room_id);

    //     $query = "SELECT * FROM $this->table1
    //               WHERE room_id = '{$room_id}'


    // public function getOwner($owner_user_id) {
    //     $user = array();
    //     $owner_user_id = mysqli_real_escape_string($this->connection, $owner_user_id);
    //     $query = "SELECT * FROM $this->table 
    //               WHERE owner_user_id = '{$owner_user_id}'

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

    //     return $employee;
    // }



    // public function getDataEmployee($room_id) {

    //     $emp_id = mysqli_real_escape_string($this->connection, $room_id);

    //     $query = "SELECT * FROM $this->table1
    //               WHERE room_id = '{$room_id}'
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

    //     return $employee;
    // }

    public function getRoomDiscount($room_type_id) {

        $room_type_id = mysqli_real_escape_string($this->connection, $room_type_id);

        $query = "SELECT * FROM $this->table3
                  WHERE room_type_id = '{$room_type_id}'
                  LIMIT 1";

        $room_discounts = mysqli_query($this->connection, $query);

        if($room_discounts){
            if(mysqli_num_rows($room_discounts) == 1) {
                $room_discount = mysqli_fetch_assoc($room_discounts);
            }
        }
        else {
            echo "Query Error";
        }

        return $room_discount;
    }


}
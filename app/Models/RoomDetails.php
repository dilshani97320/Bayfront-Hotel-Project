<?php 

class RoomDetails {

    private $table1 = "room_details";
    private $table2 = "room_type";
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
    public function getAllRoom($current_date) {

        $query =  "SELECT  $this->table1.room_id, $this->table1.room_type_id, $this->table1.room_number,
                  reservation.check_in_date, reservation.check_out_date
                  FROM $this->table1
                  LEFT OUTER JOIN $this->table4 
                  ON $this->table1.room_id = $this->table4.room_id
                  WHERE $this->table4.check_in_date != '{$current_date}'AND
                  $this->table4.check_in_date > '{$current_date}'
                  OR  $this->table4.check_in_date IS NULL 
                  ORDER BY $this->table1.room_id";

        //  "SELECT $this->table1.room_id, $this->table1.room_type_id, $this->table1.room_number,
        //           $this->table4.check_in_date, $this->table4.check_out_date
        //           FROM $this->table4
        //           RIGHT OUTER JOIN $this->table1
        //           ON $this->table1.room_id = $this->table4.room_id
        //           WHERE $this->table4.check_in_date != '{$current_date}' AND
        //           $this->table4.check_in_date > '{$current_date}' OR $this->table4.check_out_date < '{$current_date}'
        //           OR  $this->table4.check_in_date IS NULL ORDER BY $this->table1.room_id";

        $rooms = mysqli_query($this->connection, $query);
        if($rooms) {
            mysqli_fetch_all($rooms,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }    

    return $rooms;    
    }

    public function getAllRoomOwner() {

        $query = "SELECT $this->table1.room_id, $this->table1.room_type_id, $this->table1.room_number,
                  $this->table4.check_in_date, $this->table4.check_out_date
                  FROM $this->table4
                  RIGHT OUTER JOIN $this->table1
                  ON $this->table1.room_id = $this->table4.room_id
                  ORDER BY $this->table1.room_id";

        $rooms = mysqli_query($this->connection, $query);
        if($rooms) {
            mysqli_fetch_all($rooms,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }    

    return $rooms;    
    }

    public function getSearchRoom($search, $current_date) {
        $search = mysqli_real_escape_string($this->connection, $search);

        $query = "SELECT  $this->table1.room_id, $this->table1.room_type_id, $this->table1.room_number,
                reservation.check_in_date, reservation.check_out_date
                FROM $this->table1
                LEFT OUTER JOIN $this->table4 
                ON $this->table1.room_id = $this->table4.room_id
                WHERE $this->table1.room_number LIKE '%{$search}%' AND 
                ($this->table4.check_in_date != '{$current_date}'AND
                $this->table4.check_in_date > '{$current_date}'
                OR  $this->table4.check_in_date IS NULL)
                ORDER BY $this->table1.room_id";

        // "SELECT $this->table1.room_id, $this->table1.room_type_id, $this->table1.room_number,
        //           $this->table4.check_in_date, $this->table4.check_out_date
        //           FROM $this->table4
        //           RIGHT OUTER JOIN $this->table1
        //           ON $this->table1.room_id = $this->table4.room_id
        //           WHERE $this->table1.room_number LIKE '%{$search}%' AND 
        //           ($this->table4.check_in_date != '{$current_date}' AND
        //           $this->table4.check_in_date > '{$current_date}' OR $this->table4.check_out_date < '{$current_date}'
        //           OR  $this->table4.check_in_date IS NULL)
        //           ORDER BY $this->table1.room_id";

        $rooms = mysqli_query($this->connection, $query);

        if($rooms) {
            mysqli_fetch_all($rooms,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }        
    
    return $rooms;  
    }

    public function getSearchRoomOwner($search) {

        $search = mysqli_real_escape_string($this->connection, $search);

        $query = "SELECT $this->table1.room_id, $this->table1.room_type_id, $this->table1.room_number,
                  $this->table4.check_in_date, $this->table4.check_out_date
                  FROM $this->table4
                  RIGHT OUTER JOIN $this->table1
                  ON $this->table1.room_id = $this->table4.room_id
                  WHERE $this->table1.room_number LIKE '%{$search}%' 
                  ORDER BY $this->table1.room_id";

        $rooms = mysqli_query($this->connection, $query);

        if($rooms) {
            mysqli_fetch_all($rooms,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }        
    
    return $rooms;  
    }

    
    public function getDataEmployee($room_id) {

        $emp_id = mysqli_real_escape_string($this->connection, $room_id);

        $query = "SELECT * FROM $this->table1
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

        return $employee;
    }

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

    // public function getEmailOther($email, $emp_id) {
    //     $user = array();
    //     $email = mysqli_real_escape_string($this->connection, $email);
    //     $query = "SELECT * FROM $this->table 
    //               WHERE email = '{$email}'
    //               AND emp_id != '{$emp_id}'
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
}
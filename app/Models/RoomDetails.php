<?php 

class RoomDetails {

    private $table = "room";
    private $table1 = "room_details";
    private $table2 = "room_type";
    private $table3 = "room_discount";
    private $table4 = "reservation";
    private $connection;

    public function __construct() {
        
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'bayfront_hotel';

        $this->connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
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
                  WHERE room_id = '{$room_id}' AND 
                 ((check_in_date = '{$current_date}' AND check_in_date <= '{$check_in_date}'  AND  check_out_date > '{$check_in_date}') OR 
                 (check_in_date <= '{$check_in_date}'  AND  check_out_date >= '{$check_in_date}'))
                 ORDER BY room_id";


            //                X1          Check_in_date         X2    X3           Check_out_date
            //                X1          Check_in_date         X2    X3           Check_out_date


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

        // echo $room_type_id;
        // echo "</br>";
        // echo $check_in_date;
        // echo "</br>";
        // echo $check_out_date;
        // echo "</br>";




        $query =   "SELECT $this->table1.room_number,  $this->table1.room_name, $this->table1.price, $this->table2.max_guest,
                   $this->table4.check_in_date, $this->table4.check_out_date
                   FROM  $this->table1
                   INNER JOIN $this->table2
                   ON  $this->table1.type_id = $this->table2.room_type_id
                   LEFT OUTER JOIN $this->table4 
                   ON  $this->table1.room_id = $this->table4.room_id
                   WHERE ($this->table1.today_booked = 0 AND $this->table1.type_id = '{$room_type_id}') AND
                   ((($this->table4.check_in_date != '{$current_date}' AND $this->table4.check_in_date > '{$check_in_date}' AND $this->table4.check_in_date > '{$check_out_date}') OR  $this->table4.check_in_date IS NULL ) OR 
                   (($this->table4.check_in_date != '{$current_date}' AND $this->table4.check_in_date < '{$check_in_date}' AND $this->table4.check_in_date < '{$check_out_date}') OR  $this->table4.check_in_date IS NULL ))
                   ORDER BY  $this->table1.room_id";


            //                X1          Check_in_date                            Check_out_date
            
        
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

        // if($rooms) {

        //     mysqli_fetch_all($rooms,MYSQLI_ASSOC);
        // }
        // else {
        //     echo "Database Query Failed";
        // }



    }

    ##############################################################################################
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




    // public function getAllRoom($current_date) {

    //     $query =  "SELECT  $this->table1.room_id, $this->table1.room_type_id, $this->table1.room_number,
    //               reservation.check_in_date, reservation.check_out_date
    //               FROM $this->table1
    //               LEFT OUTER JOIN $this->table4 
    //               ON $this->table1.room_id = $this->table4.room_id
    //               WHERE $this->table4.check_in_date != '{$current_date}'AND
    //               $this->table4.check_in_date > '{$current_date}'
    //               OR  $this->table4.check_in_date IS NULL 
    //               ORDER BY $this->table1.room_id";

    //     //  "SELECT $this->table1.room_id, $this->table1.room_type_id, $this->table1.room_number,
    //     //           $this->table4.check_in_date, $this->table4.check_out_date
    //     //           FROM $this->table4
    //     //           RIGHT OUTER JOIN $this->table1
    //     //           ON $this->table1.room_id = $this->table4.room_id
    //     //           WHERE $this->table4.check_in_date != '{$current_date}' AND
    //     //           $this->table4.check_in_date > '{$current_date}' OR $this->table4.check_out_date < '{$current_date}'
    //     //           OR  $this->table4.check_in_date IS NULL ORDER BY $this->table1.room_id";

    //     $rooms = mysqli_query($this->connection, $query);
    //     if($rooms) {
    //         mysqli_fetch_all($rooms,MYSQLI_ASSOC);
    //     }
    //     else {
    //         echo "Database Query Failed";
    //     }    

    // return $rooms;    
    // }

    public function getAllRoomAll() {

        $query = "SELECT $this->table1.room_number,  $this->table1.room_name, $this->table1.price, $this->table2.max_guest,
                  $this->table4.check_in_date, $this->table4.check_out_date
                  FROM $this->table1
                  INNER JOIN $this->table2
                  ON  $this->table1.type_id = $this->table2.room_type_id
                  LEFT OUTER JOIN $this->table4
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

    // public function getSearchRoom($search, $current_date) {
    //     $search = mysqli_real_escape_string($this->connection, $search);

    //     $query = "SELECT  $this->table1.room_id, $this->table1.room_type_id, $this->table1.room_number,
    //             reservation.check_in_date, reservation.check_out_date
    //             FROM $this->table1
    //             LEFT OUTER JOIN $this->table4 
    //             ON $this->table1.room_id = $this->table4.room_id
    //             WHERE $this->table1.room_number LIKE '%{$search}%' AND 
    //             ($this->table4.check_in_date != '{$current_date}'AND
    //             $this->table4.check_in_date > '{$current_date}'
    //             OR  $this->table4.check_in_date IS NULL)
    //             ORDER BY $this->table1.room_id";

    //     $rooms = mysqli_query($this->connection, $query);

    //     if($rooms) {
    //         mysqli_fetch_all($rooms,MYSQLI_ASSOC);
    //     }
    //     else {
    //         echo "Database Query Failed";
    //     }        
    
    // return $rooms;  
    // }

    public function getSearchRoomAll($search) {

        $search = mysqli_real_escape_string($this->connection, $search);

        $query = "SELECT $this->table1.room_number,  $this->table1.room_name, $this->table1.price, $this->table2.max_guest,
                  $this->table4.check_in_date, $this->table4.check_out_date
                  FROM $this->table1
                  INNER JOIN $this->table2
                  ON  $this->table1.type_id = $this->table2.room_type_id
                  LEFT OUTER JOIN $this->table4
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

    

    // public function getOwner($owner_user_id) {
    //     $user = array();
    //     $owner_user_id = mysqli_real_escape_string($this->connection, $owner_user_id);
    //     $query = "SELECT * FROM $this->table 
    //               WHERE owner_user_id = '{$owner_user_id}'
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

    // public function getCreate($data) {
    //     $value = 0;
    //     $owner_user_id = mysqli_real_escape_string($this->connection, $data[0]);
    //     $first_name = mysqli_real_escape_string($this->connection, $data[1]);
    //     $last_name = mysqli_real_escape_string($this->connection, $data[2]);
    //     $email = mysqli_real_escape_string($this->connection, $data[3]);
    //     $salary = mysqli_real_escape_string($this->connection, $data[4]);
    //     $location = mysqli_real_escape_string($this->connection, $data[5]);
    //     $contact_num = mysqli_real_escape_string($this->connection, $data[6]);

    //     $query = "INSERT INTO $this->table (
    //               owner_user_id,first_name, last_name, email, salary, location, contact_num, is_deleted) 
    //               VALUES (
    //              '{$owner_user_id}', '{$first_name}', '{$last_name}', '{$email}', '{$salary}', '{$location}', '{$contact_num}', 0
    //               )";
        
    //     $result = mysqli_query($this->connection, $query);
    //     if($result) {
    //         // query successful.. redirecting to users page
    //         $value = 1;
    //     }
    //     return $value;
    // }

    // public function getUpdate($data) {
    //     $value = 0;
    //     $emp_id = mysqli_real_escape_string($this->connection, $data[0]);
    //     $owner_user_id = mysqli_real_escape_string($this->connection, $data[1]);
    //     $first_name = mysqli_real_escape_string($this->connection, $data[2]);
    //     $last_name = mysqli_real_escape_string($this->connection, $data[3]);
    //     $email = mysqli_real_escape_string($this->connection, $data[4]);
    //     $salary = mysqli_real_escape_string($this->connection, $data[5]);
    //     $location = mysqli_real_escape_string($this->connection, $data[6]);
    //     $contact_num = mysqli_real_escape_string($this->connection, $data[7]);

    //     $query = "UPDATE $this->table SET
    //             owner_user_id = '{$owner_user_id}',
    //             first_name = '{$first_name}',
    //             last_name = '{$last_name}',
    //             email = '{$email}',
    //             salary = '{$salary}',
    //             location = '{$location}',
    //             contact_num = '{$contact_num}'
    //             WHERE emp_id = {$emp_id} LIMIT 1";
        
    //     $result = mysqli_query($this->connection, $query);
    //     if($result) {
    //         // query successful.. redirecting to users page
    //         $value = 1;
    //     }
    //     return $value;
    // }

    // public function remove($emp_id) {
    //     $emp_id = mysqli_real_escape_string($this->connection, $emp_id);

    //     $query = "UPDATE $this->table SET is_deleted =1 WHERE emp_id = {$emp_id} LIMIT 1";

    //     $result = mysqli_query($this->connection, $query);
    //     if($result) {
    //         $value = 1;
    //     }
        
    //     return $value;
    // }

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
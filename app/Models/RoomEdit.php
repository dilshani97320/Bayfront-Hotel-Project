<?php 

class RoomEdit{

    private $table1 = "room_details";
    private $table2 = "room_type";
    private $table3 = "room_discount";
    private $conn;

    public function __construct() {
        
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'bayfront_hotel';

        $this->connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    }

    public function getAllDiscount() {


        $query = "SELECT * FROM  $this->table3";

        // echo $query;  
        // exit();  
        $room_discount = mysqli_query($this->connection, $query);
        // var_dump($rooms);
        if($room_discount) {
            $room_discount =mysqli_fetch_all($room_discount,MYSQLI_ASSOC);
        
            // var_dump($rooms);
            // exit();
            return $room_discount;
        }
        else {
            echo "Database Query Failed";
        }    

        
    }



    public function getAllRoom() {


        $query = "SELECT $this->table1.room_number, $this->table1.room_id, $this->table1.room_name, $this->table1.room_view, $this->table1.price, $this->table1.free_canselaration,
                  $this->table2.type_name 
                  FROM $this->table1
                  INNER JOIN $this->table2 ON $this->table1.type_id = $this->table2.room_type_id AND $this->table1.is_delete = 0";

        // echo $query;  
        // exit();  
        $rooms = mysqli_query($this->connection, $query);
        // var_dump($rooms);
        if($rooms) {
            mysqli_fetch_all($rooms,MYSQLI_ASSOC);
        
            // var_dump($rooms);
            // exit();
            return $rooms;
        }
        else {
            echo "Database Query Failed";
        }    

        
    }

    public function getSearchRoom($search) {

        $search = mysqli_real_escape_string($this->connection, $search);

        $query = "SELECT $this->table1.room_number, $this->table1.room_id, $this->table1.room_name, $this->table1.room_view, $this->table1.price,
                  $this->table2.type_name 
                  FROM $this->table1
                  INNER JOIN $this->table2 ON $this->table1.type_id = $this->table2.room_type_id
                  WHERE $this->table1.room_number LIKE '%{$search}%'
                  ORDER BY $this->table1.room_id";

        $rooms = mysqli_query($this->connection, $query);
        
        if($rooms) {
            mysqli_fetch_all($rooms,MYSQLI_ASSOC);
            return $rooms;
        }
        else {
            echo "Database Query Failed";
        } 
    }

    

    public function createRoom( $room_number, $type_name, $room_name,  $room_desc,  $floor_type, $room_size, $price, $room_view,  $air_condition, $free_canseleration, $hot_water ,$breakfast_included, $discount, $start_date, $end_date) {

      $sql = "INSERT INTO `room_details` (room_id, room_number, type_id , room_name, floor_type, price, room_size, air_condition, room_view,breakfast_included, hot_water, free_canselaration, room_desc, is_delete) 
            VALUES (NULL, '{$room_number}', '{$type_name}', '{$room_name}', '{$floor_type}', '{$price}', '{$room_size}', '{$air_condition}', '{$room_view}', '{$breakfast_included}', '{$hot_water}', '{$free_canseleration}', '{$room_desc}', '0')";
    // echo $sql;  
    //     exit(); 


        $result = mysqli_query($this->connection, $sql);

        if($result) {
            
            return 1;
        }else{
            return 0;
        }

   }

   public function deleteRoom($room_id) {

    $sql =  $sql = "UPDATE $this->table1 SET
                is_delete ='1'
                WHERE $this->table1.room_id = {$room_id} LIMIT 1";
    
    $result = mysqli_query($this->connection, $sql);
        if($result) {
            // query successful.. redirecting to users page
            return 1;
        }else{
            return 0;
        }
    }

    public function serchRoom($room_number) {

        $sql =  "SELECT * FROM $this->table1 WHERE room_number = '$room_number' LIMIT 1";
        $result = mysqli_query($this->connection, $sql);

        if($result) {
            if(mysqli_num_rows($result) >= 1) {
                return 1;
            }    
            // query successful.. redirecting to users page
            else {
                return 0;
            }
            
        }else{
            return 0;
        }
    }

    public function updateRoom($room_id, $room_number, $type_name, $room_name, $room_desc, $floor_type, $room_size, $price,  $air_condition, $free_canseleration, $hot_water)
    {

        $sql = "UPDATE $this->table1 SET 
                room_name='{$room_name}', 
                type_id='{$type_name}', 
                room_desc='{$room_desc}', 
                floor_type='{$floor_type}', 
                room_size='{$room_size}',
                price='{$price}',  
                air_condition='{$air_condition}', 
                free_canselaration='{$free_canseleration}', 
                hot_water='{$hot_water}' 
                WHERE $this->table1.room_id = {$room_id} LIMIT 1";
        
        // echo  var_dump($sql);
        // exit();
        
        $result = mysqli_query($this->connection, $sql);
        if($result) {
            // echo "success";
            // query successful.. redirecting to users page
            return 1;
        }else{
            echo "fail";

            return 0;
        }
    }
}

?>
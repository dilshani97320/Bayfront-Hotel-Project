<?php 

class RoomEdit{

    private $table1 = "room_details";
    private $table2 = "room_type";
    private $table3 = "hotel_room";
    private $connection;

    public function __construct() {
        
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'bayfront_hotel';

        $this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    }

    public function getAllRoom() {

        $query = "SELECT $this->table1.room_number, $this->table1.room_id, $this->table1.room_name, $this->table2.type_name FROM $this->table1
                  INNER JOIN $this->table2 ON $this->table1.type_id = $this->table2.room_type_id";
        // echo $query;    
        $rooms = mysqli_query($this->conn, $query);
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
}

?>
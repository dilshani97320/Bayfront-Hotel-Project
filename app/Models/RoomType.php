<?php 

class RoomType extends Connection{

    protected $room_type_id;  
    protected $room_type_max_guest;
    protected $room_type_type_name;
    protected $room_type_bed_type;
    public $room_type_table = "room_type";

    public function __construct() {        
        Connection::__construct();
    }

    public function setRoomTypeId($room_type_id) {
        $this->room_type_id =  mysqli_real_escape_string($this->connection, $room_type_id);
    }

    public function getRoomTypes() {
        $user = array();
        $query = "SELECT type_name FROM $this->room_type_table";
        $result = 0;

        $room_types = mysqli_query($this->connection, $query);

        if($room_types) {
            mysqli_fetch_all($room_types,MYSQLI_ASSOC);
            return $room_types;
        }
        else {
            echo "Database Query Failed";
        }
        
    }

    public function getTypeID($type_name) {
        // private $table2 = "room_type";
        $this->room_type_type_name = mysqli_real_escape_string($this->connection, $type_name);

        $query = "SELECT * FROM $this->room_type_table
                  WHERE type_name = '{$this->room_type_type_name}'
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

    public function getRoomType() {

        // $room_type_id = mysqli_real_escape_string($this->connection, $room_type_id);

        $query = "SELECT  * FROM $this->room_type_table
                WHERE $this->room_type_table.room_type_id =  '{$this->room_type_id}'
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

    public function getRoomTypeDetail($room_type_id) {

        $this->room_type_id = mysqli_real_escape_string($this->connection, $room_type_id);

        $query = "SELECT * FROM $this->room_type_table
                  WHERE room_type_id = '{$this->room_type_id}'
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

}
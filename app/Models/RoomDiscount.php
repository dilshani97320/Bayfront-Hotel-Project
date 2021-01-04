<?php 

class RoomDiscount extends RoomType{

    private $room_discount_id;  
    // private $room_type_id;   Foriegn key
    private $room_discount_discount_rate;
    private $room_discount_start_date;
    private $room_discount_end_date;
    private $room_discount_table = "room_discount";

    public function __construct() {        
        RoomType::__construct();
    }

    public function getRoomDiscount() {

        // $room_type_id = mysqli_real_escape_string($this->connection, $room_type_id);
        $room_discount = array();
        $query = "SELECT * FROM $this->room_discount_table
                  WHERE room_type_id = '{$this->room_type_id}'
                  LIMIT 1";

        $room_discounts = mysqli_query($this->connection, $query);

        if($room_discounts){
            if(mysqli_num_rows($room_discounts) == 1) {
                $room_discount = mysqli_fetch_assoc($room_discounts);
            }
            return $room_discount;
        }
        else {
            echo "Query Error";
        }

        
    }

}
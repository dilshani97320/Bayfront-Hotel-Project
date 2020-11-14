<?php 
session_start();



class RoomController {


    public function index() {
        date_default_timezone_set("Asia/Colombo");
        $current_date = date('Y-m-d');
        //Checking if a user is logged in
        if(!isset($_SESSION['user_id'])) {
            view::load('dashboard/dashboard');    
        }
        else {
            $db = new RoomDetails();
            $typename = $db->getRoomTypes();
            $data['typename'] = $typename;
            
            // foreach($typename as $type) {
            //     echo $type['type_name'];
            //     echo "<br>";

            // }
            view::load('dashboard/room/index', $data);

        }
           
    }


    public function view() {
        if(!isset($_SESSION['user_id'])) {
            view::load('dashboard/dashboard');    
        }
        else {
                $data = array();
                $db = new RoomDetails;
                if(isset($_POST['search'])) {
                    $search = $_POST['search'];
                    //echo $search;                   
                        $data['rooms'] = $db->getSearchRoomAll($search);
                        view::load('dashboard/room/show', $data);
                }
                else {
                    $data['rooms'] = $db->getAllRoomAll();
                    view::load('dashboard/room/show', $data);
                }
        }
        // if($_SESSION['user_level'] == "Owner") {
            
            // }
            // else {
            //     $data = array();
            //     $db = new RoomDetails;
            //     if(isset($_POST['search'])) {
            //         $search = $_POST['search'];
            //         $data['rooms'] = $db->getSearchRoom($search, $current_date);
            //         // $data = $db->getSearchRoom($search, $current_date);
            //         //echo 'Error1';
            //         view::load('dashboard/room/index', $data);
            //         // view::load('dashboard/inc/test', $data);
            //     }
            //     else {
            //         $data= $db->getAllRoom($current_date);
            //         // get room type name
            //         $data['rooms'] = $result;
            //         view::load('dashboard/room/index', $data);
            //     }
            // }
    }

    public function check() {

        if(isset($_POST['submit'])) {

            $type_name = $_POST['type_name']; 
            // $no_of_guest = $_POST['no_of_guest'];
            $check_in_date = $_POST['check_in_date'];
            $check_out_date = $_POST['check_out_date'];

            // echo $type_name;
            // echo "</br>";
            // echo $no_of_guest;
            // echo "</br>";
            // echo $check_in_date;
            // echo "</br>";
            // echo $check_out_date;
            // echo "</br>";
            // get type id
            $db = new RoomDetails();
            $type_id = $db->getTypeID($type_name);
            $room_type_id = $type_id['room_type_id'];
            // echo "Type_id=".$type_id['room_type_id'];
            // echo "</br>";
            // echo "level 1</br>";

            // get all rooms where room_type_id
            $rooms = $db->getRoomAllID($room_type_id);
            // echo "level 2</br>";
            // Update today Booked to Zero
            $update = $db->getRoomsUpdate();
            // echo "level 3</br>";
            // All rooms update to zero
            if($update == 1) {
                foreach($rooms as $room) {
                    // echo "level 4</br>";
                    // echo "room_id=".$room['room_id'];
                    // echo "<br>";
                    
                    // Check check_in_date as available for room
                    $result = $db->roomAvalability($room['room_id'],$check_in_date,$check_out_date);
                    // echo "level 5</br>";
                    // echo "result=".$result."<br>";
                    if($result == 1) {
                        // Today is booked or current date booked room
                        // echo "level 5</br>";
                        $result = $db->roomTodayBookedUpdate($room['room_id']);
                        // echo "level 6</br>";
                        // if($result == 1) {
                        //     // echo "Rooms Update <br>";
                            
                        // }

                    }
    
                }
            }
            // echo "Rooms Update Process Success <br>";

            $rooms = $db->getAvailableRooms($room_type_id, $check_in_date, $check_out_date);
            // echo "level 7</br>";
            // foreach($rooms as $row) {
            //     echo $row['room_number'];
            // }
            // echo $rooms['room_number']."</br>";
            $typename = $db->getRoomTypes();
            $data['typename'] = $typename;

            if(empty($rooms)) {
                $data['details'] = array('type_name' =>$type_name, 'check_in_date '=>$check_in_date, 'check_out_date'=>$check_out_date );
                view::load("dashboard/room/index", ["errors"=>"Data Update Unsuccessfully", 'details'=>$data['details'], 'typename'=>$data['typename']]);
            }
            else {
                // $data['details'] = array('type_name' =>$type_name, 'no_of_guest' =>$no_of_guest, 'check_in_date '=>$check_in_date, 'check_out_date'=>$check_out_date );
                $data['rooms'] = $rooms;
                view::load("dashboard/room/result", $data);
                // echo "2";
            }
            // $rooms = array_filter($rooms); 
            
            // if(count( $rooms ) == 0) {
            //     echo "No rooms<br>";
            // }
            // else {
            //     echo "Rooms Have<br>";
            //     foreach($rooms as $room) {
            //         echo $room['price'];
            //     }
            // }
            // Then find all available rooms given room type

            

        }

    }

    // public function view($room_id, $room_type_id) {
    //     date_default_timezone_set("Asia/Colombo");
    //     $current_date = date('Y-m-d');

    //     if(!isset($_SESSION['user_id'])) {
    //         view::load('dashboard/dashboard');    
    //     }
    //     else {
    //         $db = new RoomDetails();
    //         $discount = $db->getRoomDiscount($room_type_id);

    //         $start_date = $discount['start_date'];
    //         $end_date = $discount['end_date'];
    //         // echo $start_date;
    //         // echo $end_date;
    //         if($start_date < $current_date && $end_date > $current_date) {
    //             $discount_rate = $discount['discount_rate'];
    //             echo $discount_rate;
    //         }
    //         else {
    //             $discount_rate = 0;
    //             echo 'level 2';
    //         }
    //         // $data['employee']= $db->getDataRoom($room_id);
    //         // view::load('dashboard/room/view');

    //         // Have to wait to room edit complete
    //     }
    // }

    
}


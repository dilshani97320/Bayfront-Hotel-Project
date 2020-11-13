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
            //view::load('room/index');
            if($_SESSION['user_level'] == "Owner") {
                $data = array();
                $db = new RoomDetails;
                if(isset($_POST['search'])) {
                    $search = $_POST['search'];
                    //echo $search;
                    if($search == "Today") {
                        $data['rooms'] = $db->getAllRoom($current_date);
                        view::load('dashboard/room/index', $data);
                    }
                    else {
                        $data['rooms'] = $db->getSearchRoomOwner($search);
                        view::load('dashboard/room/index', $data);
                    }
                }
                else {
                    $data['rooms'] = $db->getAllRoomOwner();
                    view::load('dashboard/room/index', $data);
                }
            }
            else {
                $data = array();
                $db = new RoomDetails;
                if(isset($_POST['search'])) {
                    $search = $_POST['search'];
                    $data['rooms'] = $db->getSearchRoom($search, $current_date);
                    // $data = $db->getSearchRoom($search, $current_date);
                    //echo 'Error1';
                    view::load('dashboard/room/index', $data);
                    // view::load('dashboard/inc/test', $data);
                }
                else {
                    $data['rooms'] = $db->getAllRoom($current_date);
                    // $data = $db->getAllRoom($current_date);
                    //$current_date = strtotime(time, now);
                    
                    //$current_date = date('Y-m-d');
                    //echo $current_date;
                    //echo 'Error2';
                    // view::load('dashboard/inc/test', $data);
                    view::load('dashboard/room/index', $data);
                }
            }
            
            
            
        }
           
    }

    public function view($room_id, $room_type_id) {
        date_default_timezone_set("Asia/Colombo");
        $current_date = date('Y-m-d');

        if(!isset($_SESSION['user_id'])) {
            view::load('dashboard/dashboard');    
        }
        else {
            $db = new RoomDetails();
            $discount = $db->getRoomDiscount($room_type_id);

            $start_date = $discount['start_date'];
            $end_date = $discount['end_date'];
            // echo $start_date;
            // echo $end_date;
            if($start_date < $current_date && $end_date > $current_date) {
                $discount_rate = $discount['discount_rate'];
                echo $discount_rate;
            }
            else {
                $discount_rate = 0;
                echo 'level 2';
            }
            // $data['employee']= $db->getDataRoom($room_id);
            // view::load('dashboard/room/view');

            // Have to wait to room edit complete
        }
    }

    
}


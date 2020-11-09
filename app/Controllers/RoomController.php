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
                $db = new Room;
                if(isset($_POST['search'])) {
                    $search = $_POST['search'];
                    $data['rooms'] = $db->getSearchRoom($search, $current_date);
                    //echo 'Error1';
                    view::load('dashboard/room/index', $data);
                    //view::load('inc/test', $data);
                }
                else {
                    $data['rooms'] = $db->getAllRoom($current_date);
                    //$current_date = strtotime(time, now);
                    
                    //$current_date = date('Y-m-d');
                    //echo $current_date;
                    //echo 'Error2';
                    //view::load('inc/test', $data);
                    view::load('dashboard/room/index', $data);
                }
            }
            
            
            
        }
           
    }

    
}


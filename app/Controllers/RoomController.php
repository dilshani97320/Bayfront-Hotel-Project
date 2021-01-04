<?php 
session_start();

class RoomController {

    // private $details;

    //Done
    public function index() {
        date_default_timezone_set("Asia/Colombo");
        $current_date = date('Y-m-d');
        
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();   
        }
        else {
            $db = new RoomType();
            $typename = $db->getRoomTypes();
            $data['typename'] = $typename;            
            view::load('dashboard/room/index', $data);

        }
           
    }


    public function view() {
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();   
        }
        else {
                $data = array();
                $db = new RoomDetails();
                if(isset($_POST['search'])) {
                    $search = $_POST['search'];
                                      
                        $data['rooms'] = $db->getSearchRoomAll($search);
                        view::load('dashboard/room/show', $data);
                }
                else {
                    $data['rooms'] = $db->getAllRoomAll();
                    view::load('dashboard/room/show', $data);
                }
        }
    }


    public function details($room_number) {
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();   
        }
        else {
            // Get Given Room number details
            $db = new RoomDetails();
            $room = $db->getRoom($room_number);
            
            // Get Given Room number Room type
            $room_type_id = $room['type_id']; 


            // Add discount
            date_default_timezone_set("Asia/Colombo");
            $current_date = date("Y-m-d"); 

            $db1 = new RoomDiscount();
            $db1->setRoomTypeId($room_type_id);
            $discount = $db1->getRoomDiscount();
            // var_dump($discount);
            if(!empty($discount)) {
                $start_date = $discount['start_date'];
                $end_date = $discount['end_date'];
                
                if($start_date < $current_date && $end_date > $current_date) {
                    $discount_rate = $discount['discount_rate'];
                
                }
                else {
                    $discount_rate = 0;
                    
                }
            }
            else {
                $discount_rate = 0;
            }

            


            $db->setRoomTypeId($room_type_id);
            $room_type = $db->getRoomType();
            
            $room_id = $room['room_id'];
            $reservations = $db->getReservations($room_id);

            $data['discount'] = array("discount"=>$discount_rate);
            $data['room'] = $room;
            $data['room_type'] = $room_type;
            $data['reservations'] = $reservations;

            view::load("dashboard/room/view", $data);
         
            
        }
    }

    public function details1($room_number,$check_in_date,$check_out_date, $type_name) {
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();   
        }
        else {
            // Get Given Room number details
            $db = new RoomDetails();
            $room = $db->getRoom($room_number);
            
            // Get Given Room number Room type
            $room_type_id = $room['type_id']; 


            // Add discount
            date_default_timezone_set("Asia/Colombo");
            $current_date = date("Y-m-d"); 

            $db1 = new RoomDiscount();
            $db1->setRoomTypeId($room_type_id);
            $discount = $db1->getRoomDiscount();
            // var_dump($discount);
            if(!empty($discount)) {
                $start_date = $discount['start_date'];
                $end_date = $discount['end_date'];
                
                if($start_date < $current_date && $end_date > $current_date) {
                    $discount_rate = $discount['discount_rate'];
                
                }
                else {
                    $discount_rate = 0;
                    
                }
            }
            else {
                $discount_rate = 0;
            }

            


            $db->setRoomTypeId($room_type_id);
            $room_type = $db->getRoomType();
            
            $room_id = $room['room_id'];
            $reservations = $db->getReservations($room_id);
            $value = 1;
            $data['details'] = array("check_in_date"=>$check_in_date, "check_out_date"=>$check_in_date, "type_name"=>$type_name);
            $data['discount'] = array("discount"=>$discount_rate, "value"=>$value);
            $data['room'] = $room;
            $data['room_type'] = $room_type;
            $data['reservations'] = $reservations;

            view::load("dashboard/room/view", $data);
         
            
        }
    }

    //Done
    public function preview($check_in_date, $check_out_date, $type_name) {
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();   
        }
        else {
            $db = new RoomDetails();
            
            $type_id = $db->getTypeID($type_name);
            $room_type_id = $type_id['room_type_id'];
            
            $db->setRoomTypeId($room_type_id);
            $rooms = $db->getRoomAllID();
            $update = $db->getRoomsUpdate();
                    
            if($update == 1) {
                foreach($rooms as $room) {
                    
                    $result = $db->roomAvalability($room['room_id'],$check_in_date,$check_out_date);
                    
                    if($result == 1) {
                        
                        $result = $db->roomTodayBookedUpdate($room['room_id']);
                        
                    }
    
                }
            }
                
                    $db->setRoomTypeId($room_type_id);
                    $rooms = $db->getAvailableRooms($check_in_date, $check_out_date);
                    $typename = $db->getRoomTypes();
                    $data['typename'] = $typename; 
                    $data['rooms'] = $rooms;
                    $data['details'] = array("check_in_date"=>$check_in_date, "check_out_date"=>$check_in_date, "type_name"=>$type_name);
                       
                    view::load("dashboard/room/result", $data);
        }

        
    }

    //Done
    public function check() {

        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();   
        }
        else { 
            if(isset($_POST['submit'])) {

                $type_name = $_POST['type_name']; 
                $errors[] = array();
                $check_in_date = $_POST['check_in_date'];
                $check_out_date = $_POST['check_out_date'];
                
                //check in date is valid
                if(!$this->is_date($_POST['check_in_date'])) {
                    $errors['check_in_date'] = 'Date is Invalid';
                }

                //check out date is valid
                if(!$this->is_date($_POST['check_out_date'])) {
                    $errors['check_out_date'] = 'Date is Invalid';
                }

                if($check_in_date > $check_out_date) {
                    $errors['chek_out_date'] = "Date is Invalid";
                }


                if($type_name == NULL) {
                    $errors['chek_in_date'] = "Room Type is Invalid";
                    $errors['chek_out_date'] = "Room Type is Invalid";
                }
                // echo $type_name;
                // var_dump($errors);
                $errors = array_filter( $errors ); 
                                
                if(count( $errors ) == 0) { 
                    $db = new RoomDetails();
                    $type_id = $db->getTypeID($type_name);
                    $room_type_id = $type_id['room_type_id'];
                    $db->setRoomTypeId($room_type_id);
                    
                    // $rooms = $db->getRoomAllID($room_type_id);
                    $rooms = $db->getRoomAllID($room_type_id);
                    // var_dump($rooms);
                    // echo "<br>";
                    $update = $db->getRoomsUpdate();
                    // var_dump($rooms);
                    if($update == 1) {
                        foreach($rooms as $room) {
                            // var_dump($result);
                            // echo $room['room_id'];
                            // echo "<br>";
                            $result = $db->roomAvalability($room['room_id'],$check_in_date,$check_out_date);
                            // var_dump($result);
                            // echo $result;
                            // echo "<br>";
                            if($result == 1) {
                                
                                $result = $db->roomTodayBookedUpdate($room['room_id']);
                              
                            }
            
                        }
                    }
                
                    $db->setRoomTypeId($room_type_id);
                    // $rooms = $db->getAvailableRooms($room_type_id, $check_in_date, $check_out_date);
                    $rooms = $db->getAvailableRooms($check_in_date, $check_out_date);
                    // echo "sucess1";
                    // var_dump($rooms);
                    // exit();
                    $typename = $db->getRoomTypes();
                    $data['typename'] = $typename;
    
                    if(empty($rooms)) {
                        // echo "1";
                        $data['details'] = array('type_name' =>$type_name, 'check_in_date '=>$check_in_date, 'check_out_date'=>$check_out_date );
                        view::load("dashboard/room/index", ["errors"=>"Data Update Unsuccessfully", 'details'=>$data['details'], 'typename'=>$data['typename']]);
                    }
                    else {
                        // $this->details = $rooms;
                        $data['rooms'] = $rooms;
                        $data['details'] = array("check_in_date"=>$check_in_date, "check_out_date"=>$check_out_date, "type_name"=>$type_name);
                        // var_dump($this->details);
                       
                        view::load("dashboard/room/result", $data);
                        //  echo "2";
                    }
                }
                else {
                    $db = new RoomDetails();
                    $typename = $db->getRoomTypes();
                    $data['typename'] = $typename;
                    $data['details'] = array('type_name' =>$type_name, 'check_in_date '=>$check_in_date, 'check_out_date'=>$check_out_date );
                    view::load("dashboard/room/index", ["errors"=>"Data Update Unsuccessfully", 'details'=>$data['details'], 'typename'=>$data['typename']]);
                    // echo "3";
                }
                
                
                
    
                
    
            }
        }


        

    }


    private function is_date($date) {
        return(preg_match("/\d{4}\-\d{2}-\d{2}/", $date));
    }

    

    
}


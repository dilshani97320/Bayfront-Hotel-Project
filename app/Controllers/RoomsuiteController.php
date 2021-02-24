<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    class RoomsuiteController{
        
        public function index()
        {
            $db = new RoomDetails();
            $data['room_details'] = $db->getRoomView(); 

            $db = new Image();
            $imageRoom =$db->viewRoom();
            // var_dump($imageRoom);
            $data['img_details'] = $imageRoom;
    
            View::load('room', $data);
        }

        public function ViewRoom($room_number,$checkAvailability = 0)
        {   
            if($checkAvailability != 0) {
                $data['check_availability'] = array("avilability" => $checkAvailability);
            }
            $db = new RoomDetails();
            $data['room_details'] = $db->getOneRoomView($room_number); 
            $room=$data['room_details'];

            $db = new RoomDetails();
            // #WTGihan my database was differ than him
            $data['review_details'] = $db->getReview($room[0]['room_id']); 

            $db = new Customer();
            $data['customer_details'] = $db->getAllCustomer(); 
// var_dump($data['review_details']);
// exit;
            $db = new Image();
            $imageRoom =$db->view($room_number);
            
            $data['img_details'] = $imageRoom;
            View::load('view-room', $data);
        }

        public function subPage($type_id)
        {
            $db = new RoomDetails();
            $data['room_details'] = $db->getRoomView(); 

            $db = new Image();
            $imageRoom =$db->viewRoom();
            // var_dump($imageRoom);
            $data['img_details'] = $imageRoom;
            $data['type'] = $type_id;
    
            View::load('sub/roomView', $data);
        }
    }

?>
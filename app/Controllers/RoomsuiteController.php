<?php
if(!isset($_SESSION)) 
{ 
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

        public function ViewRoom($room_number)
        {
            $db = new RoomDetails();
            $data['room_details'] = $db->getOneRoomView($room_number); 

            $db = new Image();
            $imageRoom =$db->view($room_number);
            // var_dump($imageRoom);
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
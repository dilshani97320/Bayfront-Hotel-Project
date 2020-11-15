<?php 
session_start();
class EditwebController{

    public function index()
    {
   
        $db = new RoomEdit;
        
        $data['rooms'] = $db->getAllRoom();
        
        view::load('dashboard/editweb/index', $data);

    }

    public function selectChange($roomId)
    {
        
        $data['room_id']= $roomId;
        // exit();
        view::load('dashboard/editweb/selectChange', $data);
    }

    public function changeDetails($room_number)
    {
        $db = new RoomDetails();
        $data['room_details'] = $db->getOneRoomView($room_number); 
        
        view::load('dashboard/editweb/changeDetails', $data);
    }

    public function update($room_id)
    {
        if(isset($_POST['submit'])){
            
            // echo '<pre>', print_r($_POST) ,'</pre>';
            $errors = array();

            
            if(isset($_POST['car']))
{
            echo $letter =  $_POST['car']; //get check box value
}
            exit();
        
        
        }
    }

    
}

?>
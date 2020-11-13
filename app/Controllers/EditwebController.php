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

    public function changeDetails($roomId)
    {
        $data['room_id']= $roomId;
        view::load('dashboard/editweb/changeDetails', $data);
    }

    
}

?>
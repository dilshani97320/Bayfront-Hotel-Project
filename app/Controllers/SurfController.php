<?php 

class SurfController{
    
    public function index()
    {
        View::load('surf');
    }

    public function ViewSubPage($id)
    {
        $data['id'] = $id;
        View::load('sub/surfView', $data);
    }
}

?>
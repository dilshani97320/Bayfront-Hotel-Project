<?php 

class DiningController{
    
    public function index()
    {
        View::load('dining');
    }

    public function ViewSubPage($id)
    {
        $data['id'] = $id;
        View::load('sub/diningView', $data);
    }
}

?>
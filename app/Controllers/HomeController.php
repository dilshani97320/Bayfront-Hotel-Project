<?php 

    class HomeController{
        // public function index($id, $id2){
            
        //     $data['title']= "Home Page";
        //     $data['content']= "content of home page";
        //     View::load('home', $data);
        //     // require_once(VIEWS.'home.php');
        //     // echo "this class is :".__CLASS__ . "and method is : ".__METHOD__;
        // }

        public function index()
        {
            View::load('home');
        }
        
    }

?>
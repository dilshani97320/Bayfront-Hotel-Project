<?php 
session_start();
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
            $db = new RoomDetails();
            $data['room_details'] = $db->getRoomView(); 

            $db = new Image();
            $imageRoom =$db->viewRoom();
            // var_dump($data);
            // exit;
            $data['img_details'] = $imageRoom;
            
            View::load('home', $data);
            
        }
        public function verifyHome($token)
        {
            $token =trim($token);
            $user = new AuthController;
            $user->verifyUser($token);
            $db = new RoomDetails();
					$data['room_details'] = $db->getRoomView(); 

					$db = new Image();
					$imageRoom =$db->viewRoom();
					$data['img_details'] = $imageRoom;
            // echo $_SESSION['message'];
            View::load('home', $data);
        }

        public function reset($token)
        {
            $token =trim($token);
            $user = new AuthController;
            $user->resetPassword($token);
            // echo $_SESSION['message'];
            
        }

        public function dashboard()
        {

            View::load('dashboard/dashboard');
        }
        
        public function login()
        {
            $data['errors']= [];
            View::load('login/login' , $data);
        }

        public function signup()
        {
            $data['errors']= [];
            View::load('login/signup',$data);
        }
        
        public function frogetPassword()
        {
            $data['errors']= [];
            View::load('login/frogot', $data);
        }
    }

?>
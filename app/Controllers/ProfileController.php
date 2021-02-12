<?php 
session_start();
    class ProfileController{
        
        public function index()
        {
            // exit;
            $db = new Profile();
            $data['reservation_details'] = $db->reservationDetails($_SESSION['unreg_user_email']); 

            $db = new RoomEdit();
            $data['rooms'] = $db->getAllRoom();

            $customer = new Customer();
            $data['customer_details'] = $customer->getEmailData($_SESSION['unreg_user_email']);
            // var_dump($customer_details);
            // exit;
            // $db = new Image();
            // $imageRoom =$db->viewRoom();
            // // var_dump($data);
            // // exit;
            // $data['img_details'] = $imageRoom;
            
            View::load('profileView',$data);
            
        }
        public function review()
        {
            // var_dump($_POST);
            // exit;
            if(isset($_POST['submitReview'])) {
                $star = $_POST['stars'];
                $review = $_POST['comment'];
                $r_id = $_POST['r_id'];
    
                //echo $name . "=" .$price. "=" .$description;
                $db = new Profile(); //connection established
    
                if($db->addReview($r_id, $star, $review)) {
    
                    $db = new Profile();;
                    $data['reservation_details'] = $db->reservationDetails($_SESSION['unreg_user_email']); 
        
                    $db = new RoomEdit();
                    $data['rooms'] = $db->getAllRoom();

                    $customer = new Customer();
                    $data['customer_details'] = $customer->getEmailData($_SESSION['unreg_user_email']);
                    view::load("profileView", $data);
                }
                else {
                   
                }
    
            }
            
        }
    }

?>
<?php 
session_start();
    class ProfileController{
        
        public function index($email)
        {
            // exit;
            $db = new Profile();
            $data['reservation_details'] = $db->reservationDetails($_SESSION['unreg_user_email']); 

            $db = new RoomEdit();
            $data['rooms'] = $db->getAllRoom();
            $db = new Feedback();
            $data['review']=$db->getAllFeedback();
            
            $customer = new Customer();
            $data['customer_details'] = $customer->getEmailData($_SESSION['unreg_user_email']);
            
            View::load('profileView',$data);
            
        }

        public function cancelBooking($room_id, $check_in_date, $check_out_date,$email) {
            $db = new Reservation();
            $result = $db->getReservationDelete($room_id, $check_in_date, $check_out_date);
            if($result == 1) {
                $this->index($email);
            }
        }

        public function review()
        {
            // var_dump($_POST);
            // exit;
            if(isset($_POST['submitReview'])) {
                 
                if (isset($_POST['stars'])) {
                    $star = $_POST['stars'];
                }else{
                    $star = 0;   
                }
                $review = $_POST['comment'];
                $r_id = $_POST['r_id'];
    
                //echo $name . "=" .$price. "=" .$description;
                $db = new Feedback(); //connection established
    
                if($db->addReview($r_id, $star, $review)) {
    
                    $db = new Profile();;
                    $data['reservation_details'] = $db->reservationDetails($_SESSION['unreg_user_email']); 
        
                    $db = new RoomEdit();
                    $data['rooms'] = $db->getAllRoom();

                    $db = new Feedback();
                    $data['review']=$db->getAllFeedback();
                    
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
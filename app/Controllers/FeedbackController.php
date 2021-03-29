<?php 
session_start();
    class FeedbackController{
        
        public function index() {
        

            //Checking if a user is logged in
            if(!isset($_SESSION['user_id'])) {
                $dashboard = new DashboardController();
                $dashboard->index();      
            }
            else {
                $data = array();
                // $db = new Employee;
                $db = new RoomEdit();
    
                if(isset($_POST['search'])) {
                    $search = $_POST['search'];
                    $data['rooms'] = $db->getSearchRoom($search);
                    //echo 'Error1';
                    view::load('dashboard/editweb/index', $data);
                }
                else {
                    $data['rooms'] = $db->getAllRoom();
            
                    view::load('dashboard/feedback/index', $data);
                }
            }
        }
        public function viewFeedback($room_id)
        {
                $db = new Feedback(); //connection established
                $data['review'] = $db->getReservationId($room_id);

                $db = new Customer(); //customer details
                $data['customer'] = $db->getAllCustomer();
                
                $data['room_id'] = $room_id;

                view::load("dashboard/feedback/viewReview", $data);
        }

        public function hideReview($feedback_id, $room_id)
        {
            
                $db = new Feedback(); //connection established
                if($db->hideReviewTemp($feedback_id)){
                    // echo $room_id;
                    // exit;
                    $db = new Feedback(); //connection established
                    $data['review'] = $db->getReservationId($room_id);

                    $db = new Customer(); //customer details
                    $data['customer'] = $db->getAllCustomer();

                    view::load("dashboard/feedback/viewReview", $data);
                }

                
        }

        public function showReview($feedback_id, $room_id)
        {
            
                $db = new Feedback(); //connection established
                if($db->showReviewTemp($feedback_id)){
                    // echo $room_id;
                    // exit;
                    $db = new Feedback(); //connection established
                    $data['review'] = $db->getReservationId($room_id);

                    $db = new Customer(); //customer details
                    $data['customer'] = $db->getAllCustomer();

                    view::load("dashboard/feedback/viewReview", $data);
                }

        }

        public function replyReview($feedback_id)
        {
            
                $db = new Feedback(); //connection established
                $data['review'] = $db->getOneReview($feedback_id);
                    // echo $room_id;
                    // exit;

                    view::load("dashboard/feedback/reply", $data);
                

        }

        public function reply()
        {
            // var_dump($_POST);
            // exit;
            $reply = $_POST['reply'];
            $feedback_id = $_POST['feedback_id'];

                $db = new Feedback(); //connection established
                if($db->updateReply($reply, $feedback_id)){
                    $db = new Feedback(); //connection established
                $data['review'] = $db->getOneReview($feedback_id);
                    // echo $room_id;
                    // exit;
                    unset($_POST);
                    view::load("dashboard/feedback/reply", $data);
                }
                    // echo $room_id;
                    // exit;

                    
                

        }
            
    }
    

?>
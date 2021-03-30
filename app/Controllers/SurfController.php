<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

require_once 'Libs/vendor/autoload.php';
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

    public function reservation($package_id,$id) {
        // echo $package_id;
        if(isset($_SESSION['unreg_user_id'])) {
            $user = new User();
            $new_user = $user->getUserEmail($_SESSION['unreg_user_id']);
            $user_email = $new_user['email'];
            $customer = new Customer();
            $customer_details = $customer->getEmailData($user_email);
            $customer_details = array_filter( $customer_details );
            if(!empty($customer_details)) {
                // Can get reservation ID
                $customer_id = $customer_details['customer_id'];
                $reservation = new Reservation();
                $customer_reservation = $reservation->getAllReservation($customer_id);
                $max_check_in_date = "";
                $max_reservation_id = 0;
                date_default_timezone_set("Asia/Colombo");
                $current_date = date('Y-m-d');
                foreach($customer_reservation as $row) {
                    if($current_date < $row['check_out_date']) {
                        $current_date = $row['check_out_date'];
                        $max_id = $row['reservation_id'];
                    }
                    
                }
                // Create new Surf Reservation
                $surf = new SurfPackageBooked;
                $result = $surf->createSurfReservation($package_id, $max_id, $customer_id);
                if($result == 1) {
                    // Thank you page must edit content
                    view::load('dashboard/reservation/reservationThanks');
                }
                else {
                    $data['msg2'] = "Already  Reserved Surf";
                    $data['id'] = $id;
                    // View::load('sub/surfView', $data);
                }
                
                


            }
            else {
                $data['msg2'] = "You have to Reserve the Room and Can Reserve Surf";
                $data['id'] = $id;
                View::load('sub/surfView', $data);
            }

        }
        else {
            $data['msg2'] = "Plaese login then Reserve Surf";
            $data['id'] = $id;
            View::load('sub/surfView', $data);
        }
    }

    public function reservationIndex() {
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();
        }
        else {
            $dbreservation = new SurfPackageBooked();
            
            $data = array();
            if(isset($_POST['search'])) {
                $search = $_POST['search'];
                   // search process should be implemented
                    // $data['rooms'] = $db->getSearchRoomAll($search);
                    // view::load('dashboard/reservation/index', $data);
                $data['package'] = $dbreservation->requestNotificationSearch($search);
                view::load('dashboard/surf/reservationIndex', $data);

                
            }
            else {
                $data['package'] = $dbreservation->requestNotification();
                view::load('dashboard/surf/reservationIndex', $data);
            }
            
        }

    }

    public function reserveCoach($surf_package_booked_id, $email) {
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();
        }
        else {
            if(isset($_POST['submit'])) {
                $userEmail= $email;
                $coach = $_POST['coach'];
                $dbreservation = new SurfPackageBooked();
                $result = $dbreservation->updateCoach($coach, $surf_package_booked_id);
                if($result == 1) {
                    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587,'tls'))
                    ->setUsername('bayfrontweli45@gmail.com')
                    ->setPassword('Bayfront@1998')
                    ;
            
                    // Create the Mailer using your created Transport
                    $mailer = new Swift_Mailer($transport);
                    $body = ' <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <title>Verify Email</title>
                    </head>
                    <body>
                        <div class="wrapper" style=" border-radius: 2px;
                        height: auto;
                        background-color: black;
                        color: white;
                        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2), 0 6px 6px rgba(0, 0, 0, 0.3);
                        border: 2px solid black;
                        padding: 40px;
                        margin: 10px auto;
                        text-align: center;
                        position: relative;
                        width: 800px;">
                            <h1>Hi <strong>Dear Customer Surf Package Activated</strong></h1>
                            <h3 class="top">You recently requested to reset your reservation for your BAYFRONT hotel Use the button below to get Payment it. <strong>Thank you very much for select our hotel for reservation</strong></h3> 
                            <p>If not Pay now decline it</p>
                            <h4>Welcome</h4>
                        </div> 
                    </body>
                    </html>';
                    $message = (new Swift_Message('Reservation Accepted'))
                    ->setFrom(['bayfrontweli45@gmail.com'=> 'BAYFRONT'])
                    ->setTo([$userEmail])
                    ->setBody($body, 'text/html');
                    
                        // Send the message
                    $result = $mailer->send($message);
                    $this->reservationIndex();
                }
            }
        }


    }

    public function reserveDeclineCoach($surf_package_booked_id, $email) {

        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();
        }
        else {
            $userEmail= $email;
            $dbreservation = new SurfPackageBooked();
            $result = $dbreservation->deleteReservation($surf_package_booked_id);
            
            if($result == 1) {
                $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587,'tls'))
                ->setUsername('bayfrontweli45@gmail.com')
                ->setPassword('Bayfront@1998')
                ;
        
                // Create the Mailer using your created Transport
                $mailer = new Swift_Mailer($transport);
                $body = ' <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <title>Verify Email</title>
                </head>
                <body>
                    <div class="wrapper" style=" border-radius: 2px;
                    height: auto;
                    background-color: black;
                    color: white;
                    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2), 0 6px 6px rgba(0, 0, 0, 0.3);
                    border: 2px solid black;
                    padding: 40px;
                    margin: 10px auto;
                    text-align: center;
                    position: relative;
                    width: 800px;">
                        <h1>Hi <strong>Dear Customer Surf Package Decline</strong></h1>
                        <h3 class="top">You recently requested to reset your reservation for your BAYFRONT hotel Use the button below to get Payment it. <strong>Thank you very much for select our hotel for reservation</strong></h3> 
                        <p>If not Pay now decline it</p>
                        <h4>Welcome</h4>
                    </div> 
                </body>
                </html>';
                $message = (new Swift_Message('Reservation Accepted'))
                ->setFrom(['bayfrontweli45@gmail.com'=> 'BAYFRONT'])
                ->setTo([$userEmail])
                ->setBody($body, 'text/html');
                
                    // Send the message
                $result = $mailer->send($message);
                $this->reservationIndex();
            }     
        }
    }
}

?>
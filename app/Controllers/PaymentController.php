<?php 

    session_start();
    require_once 'Libs/payment/vendor/autoload.php';
    require_once 'Libs/vendor/autoload.php';

    class PaymentController{

        public function payonline() {
            // if(!isset($_SESSION['user_id'])) {
            //     $dashboard = new DashboardController();
            //     $dashboard->index();
            // }
            // else {
            //    echo "success";
                \Stripe\Stripe::setApiKey('sk_test_51HyZrDHjjnJcmL75t5HSvCcjQyGdy3759Vn6zJNWasJ5EmUJjdUIps5rcys9U7VjqS51v02i90qRqSiKd66qFEOt00YdP2Gu4R');

                // Sanitize POST Array
                $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
            
                $first_name = $POST['first_name'];
                $email = $POST['email'];
                $room_name = $POST['room_name'];
                $room_view = $POST['room_view'];
                $room_price = $POST['room_price'];
                $payment_way = $POST['payment_way'];
                $customer_id = $POST['customer_id'];
                $reservation_id = $POST['reservation_id'];
                $token = $POST['stripeToken'];

                // echo $cardnumber;
                // echo $payment_way;
                // die();
                // echo $token;

                if($payment_way == "ONLINEHALF") {
                    $amount = $room_price*(0.5);
                }
                else {
                    $amount = $room_price;
                }
                // echo $amount;
                // echo "<br>";
                //convert to cent dollar
                //stripe only access integer only
                $amount = $amount*1000;
                // real amount should divide from 1000
                // echo $room_price;
                // echo "<br>";
                // echo $amount;
                // die();

                // echo $amount;
                // die();

                // Create Customer In Stripe
                $customer = \Stripe\Customer::create(array(
                    "email" => $email,
                    "source" => $token
                ));

                // Charge Customer
                $charge = \Stripe\Charge::create(array(
                    "amount" => $amount,
                    "currency" => "USD",
                    "description" => $room_name."Room Reservation",
                    "customer" => $customer->id
                ));

                // // Customer Data
                // $customerData = [
                //     'id'=> $charge->customer,
                //     'first_name'=> $first_name,
                //     'email'=> $email
                // ];

                // Instantiate Customer
                // $customer = new Customer();
                // $customerPay = new Payment();


                // // Add Customer to DB
                // $customerPay->addCustomer($customerData);


                // Transaction Data
                $transactionData = [
                    'reservation_id' => $reservation_id,
                    'stripe_id'=> $charge->id,
                    'customerstripe_id'=> $charge->customer,
                    'customer_id'=> $customer_id,
                    'roomdesc'=> $charge->description,
                    'amount'=> $charge->amount,
                    'currency'=> $charge->currency,
                    'status'=> $charge->status
                ];

                // Instantiate Transaction
                $transaction = new Payment();

                
                    // Add Transaction to DB
                $result = $transaction->addTransaction($transactionData);
                
                if($result == 1) {
                    // Redirect to homepage
                    // $dashboard = new DashboardController();
                    // $dashboard->index();
                    view::load('dashboard/reservation/paymentThanks');
                }
                
            // }
        }

        public function paycash() {
            $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
            $customer_id = $POST['customer_id'];
            $reservation_id = $POST['reservation_id'];
            $first_name = $POST['first_name'];
            $last_name = $POST['last_name'];
            $email = $POST['email'];
            $contact_number = $POST['contact_number'];
            
            $room_name = $POST['room_name'];
            // $room_view = $POST['room_view'];
            $room_price = $POST['room_price'];
            $total_price = $POST['total_price'];
            $amount = $POST['amount'];
            // $payment_way = $POST['payment_way'];
            
            
            //convert to cent dollar
            //stripe only access integer only
            $amount = $amount*1000;
            $transaction = new Payment();
            // check already customer have payment row in payment table
            $payment_details= $transaction->paymentDetails($reservation_id, $customer_id);
            if(!empty($payment_details)) {
                $result = $transaction->updateTransaction($reservation_id, $customer_id, $amount);
            }

            else {
                $stripe_id = "0000";
                $customerstripe_id = "XXXX";
                $room_description = $room_name."Room Reservation by".$first_name." ".$last_name.":".$email.":".$contact_number;
                $currency = "USD";
                $status = "succeeded";
                // Transaction Data
                $transactionData = [
                    'reservation_id' => $reservation_id,
                    'stripe_id'=> $stripe_id,
                    'customerstripe_id'=> $customerstripe_id,
                    'customer_id'=> $customer_id,
                    'roomdesc'=> $room_description,
                    'amount'=> $amount,
                    'currency'=> $currency,
                    'status'=> $status
                ];

                // Instantiate Transaction
                

                // Add Transaction to DB
                $result = $transaction->addTransaction($transactionData);
            }

            
            if($result == 1) {
                
                // Set default values for this
                $userEmail = $email;
                $userName = $first_name." ".$last_name;

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
                            <h1>Hi <strong> '. $userName .'</strong></h1>
                            <h3 class="top">You paid '.($amount/1000).' Payment Amount!!<strong>Thank you very much for select our hotel for reservation</strong></h3> 
                            <p>If not Pay now decline it</p>
                            <h4>Welcome</h4>
                        </div> 
                    </body>
                    </html>';
            
                $message = (new Swift_Message('Reservation Payment Notification'))
                ->setFrom(['bayfrontweli45@gmail.com'=> 'BAYFRONT'])
                ->setTo([$userEmail])
                ->setBody($body, 'text/html');
                
                    // Send the message
                $result = $mailer->send($message);
                $this->cashIndex();
            }
            
        // }
        }

        public function editPayCash() {
            $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
            $customer_id = $POST['customer_id'];
            $reservation_id = $POST['reservation_id'];
            $first_name = $POST['first_name'];
            $last_name = $POST['last_name'];
            $email = $POST['email'];
            $contact_number = $POST['contact_number'];
            
            $room_name = $POST['room_name'];
            // $room_view = $POST['room_view'];
            $room_price = $POST['room_price'];
            $total_price = $POST['total_price'];
            $new_paid_amount = $POST['new_paid_amount'];
            $paid_amount = $POST['paid_amount'];

            $dbpayment = new Payment();
            $dbcustomer = new Customer();
            $dbreservation = new Reservation();
            
            $data['customer'] = $dbcustomer->getCustomer($customer_id);
            $data['reservation'] = $dbreservation->reservationDetails($reservation_id);
            if($new_paid_amount < 0 || $new_paid_amount > 0) {
                // give error with value
                

                $payment_details= $dbpayment->paymentDetails($reservation_id, $customer_id);
                // var_dump($payment_details);
                // die();
                if(!empty($payment_details)) {
                    $data['payment'] = $payment_details;
                }
                $paid_error = 1;
                $editView = 1;
                $pay_all = 1;
                $data['paid_error'] = $paid_error;
                
            }
            if($new_paid_amount == 0) {
                // Cash payment Modify Part
                $payment_details= $dbpayment->paymentDetails($reservation_id, $customer_id);
                // var_dump($payment_details);
                // die();
                $new_paid_amount = $new_paid_amount*1000;
                if(!empty($payment_details)) {
                    $result = $dbpayment->updateTransaction($reservation_id, $customer_id, $new_paid_amount);
                }
                $success = 1;
                $editView = 1;
                $pay_all = 1;
                $data['success'] = $success;

                // Send mail to customer for notifiy the update or edit
                $userEmail = $email;
                $userName = $first_name." ".$last_name;

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
                            <h1>Hi <strong> '. $userName .'</strong></h1>
                            <h3 class="top">You new paid Value is '.($new_paid_amount/1000).' Payment Amount!!<strong>Thank you very much for select our hotel for reservation</strong></h3> 
                            <h4>Welcome</h4>
                        </div> 
                    </body>
                    </html>';
            
                $message = (new Swift_Message('Reservation Payment Notification'))
                ->setFrom(['bayfrontweli45@gmail.com'=> 'BAYFRONT'])
                ->setTo([$userEmail])
                ->setBody($body, 'text/html');
                
                    // Send the message
                $result = $mailer->send($message);

                
            }
            $data['pay_all'] = $pay_all;
            $data['edit_view'] = $editView;
            $payments = array('total_price'=>$total_price, 'room_price'=>$room_price, 'room_name'=>$room_name);
            $data['details'] = $payments;
            view::load('dashboard/payment/paymentView', $data);
        }

        public function payEmailNotification() {
            $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
            $customer_id = $POST['customer_id'];
            $reservation_id = $POST['reservation_id'];
            $first_name = $POST['first_name'];
            $last_name = $POST['last_name'];
            $email = $POST['email'];
            $contact_number = $POST['contact_number'];
            
            $room_name = $POST['room_name'];
            // $room_view = $POST['room_view'];
            $room_price = $POST['room_price'];
            $total_price = $POST['total_price'];
            $amount = $POST['amount'];
            
            // Set default values for this
            $userEmail = $email;
            $userName = $first_name." ".$last_name;

           
           
            
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
                        <h1>Hi <strong> '. $userName .'</strong></h1>
                        <h3 class="top">You Have '.$amount.' Payment Please Settle the Payment<strong>Thank you very much for select our hotel for reservation</strong></h3> 
                        <button style="background: #2EE59D; border: none; border-radius: 5px; padding: 10px; "><a style="color: #fff; text-decoration: none; font-size: 20px; " href="http://localhost/MVC/public/reservation/paymentOnline/'.$customer_id.'/'.$reservation_id.'">Payment</a></button>
                        <p>If not Pay now decline it</p>
                        <h4>Welcome</h4>
                    </div> 
                </body>
                </html>';
        
            $message = (new Swift_Message('Reservation Payment Notification'))
            ->setFrom(['bayfrontweli45@gmail.com'=> 'BAYFRONT'])
            ->setTo([$userEmail])
            ->setBody($body, 'text/html');
            
                // Send the message
            $result = $mailer->send($message);
            $this->onlineIndex();

            

            
            
        }

        public function option() {
            if(!isset($_SESSION['user_id'])) {
                $dashboard = new DashboardController();
                $dashboard->index();
            }
            else {
                view::load('dashboard/payment/selectOption');
            }
        }

        public function cashIndex() {
            if(!isset($_SESSION['user_id'])) {
                $dashboard = new DashboardController();
                $dashboard->index();
            }
            else {
                $data = array();
                // $db = new Employee;
                if(isset($_POST['search'])) {
                    $search = $_POST['search'];
                    $db = new Customer();
                    // $db->setSearchCustomer($search);
                    $data['customer'] = $db->getAllCustomerPaymentDetailsTodaySearch($search);
                    //echo 'Error1';
                    view::load('dashboard/payment/index', $data);
                }
                else {
                    $db = new Customer();
                    $data['customer'] = $db->getAllCustomerPaymentDetailsToday();
                    // var_dump($data['customer']);
                    // die();
                    //echo 'Error2';
                    view::load('dashboard/payment/index', $data);
                }
                
                
            }
        }

        public function onlineIndex() {
            if(!isset($_SESSION['user_id'])) {
                $dashboard = new DashboardController();
                $dashboard->index();
            }
            else {
                $data = array();
                // $db = new Employee;
                if(isset($_POST['search'])) {
                    $search = $_POST['search'];
                    $db = new Customer();
                    // $db->setSearchCustomer($search);
                    $pay_online = 1;
                    $data['pay_online'] = $pay_online;
                    $data['customer'] = $db->getAllCustomerPaymentDetailsTodayOnlineSearch($search);
                    //echo 'Error1';
                    view::load('dashboard/payment/index', $data);
                }
                else {
                    $db = new Customer();
                    $pay_online = 1;
                    $data['pay_online'] = $pay_online;
                    $data['customer'] = $db->getAllCustomerPaymentDetailsTodayOnline();
                    
                    view::load('dashboard/payment/index', $data);
                }
                
                
            }
        }

        public function allIndex() {
            if(!isset($_SESSION['user_id'])) {
                $dashboard = new DashboardController();
                $dashboard->index();
            }
            else {
                $data = array();
                // $db = new Employee;
                if(isset($_POST['search'])) {
                    $search = $_POST['search'];
                    $db = new Customer();
                    // $db->setSearchCustomer($search);
                    $pay_all = 1;
                    $data['pay_all'] = $pay_all;
                    $data['customer'] = $db->getAllCustomerPaymentDetailsSearch($search);
                    //echo 'Error1';
                    view::load('dashboard/payment/index', $data);
                }
                else {
                    $db = new Customer();
                    $pay_all = 1;
                    $data['pay_all'] = $pay_all;
                    $data['customer'] = $db->getAllCustomerPaymentDetails();
                    
                    view::load('dashboard/payment/index', $data);
                }
                
                
            }
        }

        public function detailsView($reservation_id, $customer_id, $total_price, $room_price, $room_name,$pay_online=0,$pay_all=0,$editView = 0) {
            if(!isset($_SESSION['user_id'])) {
                $dashboard = new DashboardController();
                $dashboard->index();
            }
            else {
                $data = array();
                // $db = new Employee;
                $dbcustomer = new Customer();
                $dbreservation = new Reservation();
                $dbpayment = new Payment();
                $data['customer'] = $dbcustomer->getCustomer($customer_id);
                $data['reservation'] = $dbreservation->reservationDetails($reservation_id);

                $payment_details= $dbpayment->paymentDetails($reservation_id, $customer_id);
                // var_dump($payment_details);
                // die();
                if(!empty($payment_details)) {
                    $data['payment'] = $payment_details;
                }

                $payments = array('total_price'=>$total_price, 'room_price'=>$room_price, 'room_name'=>$room_name);
                $data['details'] = $payments;

                
                // var_dump($data['customer']);
                // die();
                //echo 'Error2';
                if($pay_online == 1) {
                    $data['pay_online'] = $pay_online;
                    view::load('dashboard/payment/paymentView', $data);
                }

                if($pay_all == 1) {
                    // edit view
                    if($editView == 1) {
                        $data['pay_all'] = $pay_all;
                        $data['edit_view'] = $editView;
                        view::load('dashboard/payment/paymentView', $data);
                    }
                    else {
                        $data['pay_all'] = $pay_all;
                        view::load('dashboard/payment/paymentView', $data);
                    }
                    
                }
                else {
                    view::load('dashboard/payment/paymentView', $data);
                }

                                
                
            }
        }


        

        
    }

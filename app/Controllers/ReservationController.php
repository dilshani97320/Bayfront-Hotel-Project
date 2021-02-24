<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class ReservationController {

    public function index($customer_id = 0) {
        
        //Checking if a user is logged in
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();   
        }
        else {
            if($customer_id != 0) {
                $customer = new Customer();
                $customerDetails = $customer->getCustomer($customer_id);
                $data['customer'] = $customerDetails;
                view::load('dashboard/reservation/create',$data);
            }
            else {
                view::load('dashboard/reservation/create');
            }
            
            
        }
           
    }

    public function indexOnline($room_number,$max_guest,$check_in_date,$check_out_date,$rooms, $guest, $customer_id=0) {
        // echo("sucess");
        // die();
        // Checking if a user is logged in
            //only login user can only reserve
            if(isset($_SESSION['unreg_user_id'])) {
                //get data from user
                $user = new User();
                $new_user = $user->getUserEmail($_SESSION['unreg_user_id']);
                $user_email = $new_user['email'];
                // var_dump($user_email);
                // die();
                    $room = new RoomDetails();
                    $room_details = $room->getOneRoomView($room_number);
                    // var_dump($room_details);
                    $price =  $room_details[0]['price'];
                    // die();
                    
                    // $room_details = array_filter( $room_details );
                    // echo $room_details['price'];
                    // exit;
                    $customer = new Customer();
                    // echo $user_email;
                    // die();
                    $customer_details = $customer->getEmailData($user_email);
                    $customer_details = array_filter( $customer_details );
                    if(!empty($customer_details)) {
                        $reservation = array('first_name'=>$customer_details['first_name'], 'last_name'=>$customer_details['last_name'],'age'=>$customer_details['age'],'location'=>$customer_details['location'],'contact_number'=>$customer_details['contact_number'],'email'=>$customer_details['email'],'room_number'=>$room_number,'max_guest'=>$max_guest,'check_in_date'=>$check_in_date, 'check_out_date'=>$check_out_date,'price'=>$price );
                    }
                    else {
                        // above thing do again doesnot matter
                        if($customer_id != 0) {
                            $customer = new Customer();
                            $customer_details = $customer->getCustomer($customer_id);
                            $reservation = array('first_name'=>$customer_details['first_name'], 'last_name'=>$customer_details['last_name'],'age'=>$customer_details['age'],'location'=>$customer_details['location'],'contact_number'=>$customer_details['contact_number'],'email'=>$customer_details['email'],'room_number'=>$room_number,'max_guest'=>$max_guest,'check_in_date'=>$check_in_date, 'check_out_date'=>$check_out_date, 'price'=>$price );
                        }
                        else {
                            $reservation = array('email'=>$user_email,'room_number'=>$room_number,'max_guest'=>$max_guest,'check_in_date'=>$check_in_date, 'check_out_date'=>$check_out_date, 'price'=>$price );
                        }
                        
                    // }
                }
                $rooms = $rooms - 1;
                $guest = $guest- $max_guest;
                
                $inputreservationdata=array('no_of_rooms'=>$rooms, 'no_of_guest'=>$guest);
                // echo $reservation['price'];
                $data['reservation'] = $reservation;
                $data['searchdata'] = $inputreservationdata;
                // When login the customer should have details about
                // And should retrieve that
                // that should fix
                view::load('dashboard/reservation/onlineCreate',$data);
            }
            else {
                // when user is not log in redirect to signup page
                $db = new RoomDetails();
                $data['room_details'] = $db->getRoomView(); 

                $db = new Image();
                $imageRoom =$db->viewRoom();
            // var_dump($imageRoom);
                $data['img_details'] = $imageRoom;
                $data['msg2'] = "Plaese login then Reserve Room";
                View::load('room', $data);
                // if($customer_id != 0) {
                //     $customer = new Customer();
                //     $customer_details = $customer->getCustomer($customer_id);
                //     $reservation = array('first_name'=>$customer_details['first_name'], 'last_name'=>$customer_details['last_name'],'age'=>$customer_details['age'],'location'=>$customer_details['location'],'contact_number'=>$customer_details['contact_number'],'email'=>$customer_details['email'],'room_number'=>$room_number,'max_guest'=>$max_guest,'check_in_date'=>$check_in_date, 'check_out_date'=>$check_out_date);
                // }
                // else {
                //     $reservation = array('room_number'=>$room_number,'max_guest'=>$max_guest,'check_in_date'=>$check_in_date, 'check_out_date'=>$check_out_date);
                // }
                
            }
            

    }

    public function indexOnlineOneRoom($room_number,$max_guest,$check_in_date,$check_out_date) {
       
        if(isset($_SESSION['unreg_user_id'])) {
            // echo 
            if(isset($_POST['submitbooknow'])) {
                
                $no_of_rooms = $_POST['no_of_rooms'];
                $no_of_guest = $_POST['no_of_guests'];
                //get data from user
                $user = new User();
                $new_user = $user->getUserEmail($_SESSION['unreg_user_id']);
                $user_email = $new_user['email'];
            // var_dump($user_email);
            // die();
                $room = new RoomDetails();
                $room_details = $room->getOneRoomView($room_number);
                // var_dump($room_details);
                $price =  $room_details[0]['price'];
                // die();
                
                // $room_details = array_filter( $room_details );
                // echo $room_details['price'];
                // exit;
                $customer = new Customer();
                // echo $user_email;
                // die();
                $customer_details = $customer->getEmailData($user_email);
                $customer_details = array_filter( $customer_details );
                if(!empty($customer_details)) {
                    $reservation = array('first_name'=>$customer_details['first_name'], 'last_name'=>$customer_details['last_name'],'age'=>$customer_details['age'],'location'=>$customer_details['location'],'contact_number'=>$customer_details['contact_number'],'email'=>$customer_details['email'],'room_number'=>$room_number,'max_guest'=>$max_guest,'check_in_date'=>$check_in_date, 'check_out_date'=>$check_out_date,'price'=>$price );
                }
                else {
                    // above thing do again doesnot matter
                    if($customer_id != 0) {
                        $customer = new Customer();
                        $customer_details = $customer->getCustomer($customer_id);
                        $reservation = array('first_name'=>$customer_details['first_name'], 'last_name'=>$customer_details['last_name'],'age'=>$customer_details['age'],'location'=>$customer_details['location'],'contact_number'=>$customer_details['contact_number'],'email'=>$customer_details['email'],'room_number'=>$room_number,'max_guest'=>$max_guest,'check_in_date'=>$check_in_date, 'check_out_date'=>$check_out_date, 'price'=>$price );
                    }
                    else {
                        $reservation = array('email'=>$user_email,'room_number'=>$room_number,'max_guest'=>$max_guest,'check_in_date'=>$check_in_date, 'check_out_date'=>$check_out_date, 'price'=>$price );
                    }
                    
                // }
            }
                $no_of_rooms = $no_of_rooms - 1;
                $no_of_guest = $no_of_guest- $max_guest;
            
                $inputreservationdata=array('no_of_rooms'=>$no_of_rooms, 'no_of_guest'=>$no_of_guest);
                // echo $reservation['price'];
                $data['reservation'] = $reservation;
                $data['searchdata'] = $inputreservationdata;
                // When login the customer should have details about
                // And should retrieve that
                // that should fix
                view::load('dashboard/reservation/onlineCreate',$data);
            }
            
        }
        else {
            // when user is not log in redirect to signup page
            $db = new RoomDetails();
            $data['room_details'] = $db->getRoomView(); 

            $db = new Image();
            $imageRoom =$db->viewRoom();
        // var_dump($imageRoom);
            $data['img_details'] = $imageRoom;
            $data['msg2'] = "Plaese login then Reserve Room";
            View::load('room', $data);
            // if($customer_id != 0) {
            //     $customer = new Customer();
            //     $customer_details = $customer->getCustomer($customer_id);
            //     $reservation = array('first_name'=>$customer_details['first_name'], 'last_name'=>$customer_details['last_name'],'age'=>$customer_details['age'],'location'=>$customer_details['location'],'contact_number'=>$customer_details['contact_number'],'email'=>$customer_details['email'],'room_number'=>$room_number,'max_guest'=>$max_guest,'check_in_date'=>$check_in_date, 'check_out_date'=>$check_out_date);
            // }
            // else {
            //     $reservation = array('room_number'=>$room_number,'max_guest'=>$max_guest,'check_in_date'=>$check_in_date, 'check_out_date'=>$check_out_date);
            // }
            
        }
    }

    public function view($room_number,$max_guest) {
        
        //Checking if a user is logged in
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();   
        }
        else {
            
            $data['reservation'] = array('room_number' => $room_number, 'max_guest' => $max_guest);
            view::load('dashboard/reservation/create', $data);
            
        }
           
    }

    // Use for testing purpose
    public function paymentview() {
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();   
        }
        else {
            $customer_id = 1;
            $reservation_id = 1;
            $data['customer'] = array("id"=>$customer_id);
            $data['reservation'] = array("id"=>$reservation_id);
            // echo $customer['id'];
            // $data['reservation'] = array('room_number' => $room_number, 'max_guest' => $max_guest);
            view::load('dashboard/reservation/reservationThanks');
            
        }
    }

    public function view1($room_number,$max_guest, $check_in_date, $check_out_date, $type_name, $customer_id=0) {
        
        //Checking if a user is logged in
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();   
        }
        else {
            // echo $check_out_date;
            // die();
            if($customer_id != 0) {
                $customer = new Customer();
                $customerDetails = $customer->getCustomer($customer_id);
                $data['customer'] = $customerDetails;
            }
            // think room search result will be indicate here
            $value=1;
            $data['discount'] = array("value"=>$value);
            // $data['details'] = array("check_in_date"=>$check_in_date, "check_out_date"=>$check_out_date, "type_name"=>$type_name);
            // $data['reservation'] = array('room_number' => $room_number, 'max_guest' => $max_guest);
            $data['reservation'] = array("check_in_date"=>$check_in_date, "check_out_date"=>$check_out_date, "type_name"=>$type_name, 'room_number' => $room_number, 'max_guest' => $max_guest);
            view::load('dashboard/reservation/create', $data);
            
        }
           
    }

    //Done
    public function details() {
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();    
        }
        else {
                $data = array();
                $db = new Reservation();
                if(isset($_POST['search'])) {
                    $search = $_POST['search'];
                                      
                        $data['rooms'] = $db->getSearchRoomAll($search);
                        view::load('dashboard/reservation/index', $data);
                }
                else {
                    $data['rooms'] = $db->getAllRoomAll();
                    view::load('dashboard/reservation/index', $data);
                }
        }
    }
    
    public function create($discountValue = 0, $check_inSearch = '0000-00-00', $check_outSearch = '0000-00-00', $typenameSearch="None",$no_of_rooms=0,$guest=0, $price = 0) {

        // if(!isset($_SESSION['user_id'])) {
        //     $dashboard = new DashboardController();
        //     $dashboard->index();    
        // }
        // else if(!isset($_SESSION['id'])) {
        //     $home = new HomeController();
        //     $home->index();    
        // }

        // // create redirect page for homepage
        // else {
            if(isset($_POST['submit'])) {

                // Validation
                $first_name = $_POST['first_name'];
                $first_name = ucwords($first_name);
                $last_name = $_POST['last_name'];
                $last_name = ucwords($last_name);
                $location = $_POST['location'];
                // echo $location;
                // die();
                $contact_num = $_POST['contact_number'];
                // $date_of_birth = $_POST['date_of_birth'];
                $age = $_POST['age'];
                $email = $_POST['email'];
                $email = strtolower($email);
    
                $no_of_guest = $_POST['max_guest'];
                $room_number = $_POST['room_number'];
                $room_number = ucwords($room_number);
                $check_in_date = $_POST['check_in_date'];
                $check_out_date = $_POST['check_out_date'];
    
                $payment_method = $_POST['payment_method'];
                // echo $payment_method;
                $payment_method = strtoupper($payment_method);
                
                
                
    
                // Check input is empty
                $errors[] = array();
                $req_fields = array('first_name', 'last_name', 'location', 'contact_number', 'age', 'email', 'max_guest', 'room_number', 'check_in_date', 'check_out_date', 'payment_method');
                $errors = array_merge($errors, $this->check_req_fields($req_fields));
                
    
                $max_len_fields = array('first_name' => 20, 'last_name' => 20, 'location' => 30, 'contact_number' => 10, 'age' => 3, 'email' => 30, 'max_guest' => 2, 'room_number' => 4, 'check_in_date' => 10, 'check_out_date' => 10, 'payment_method' => 13);
                $errors = array_merge($errors, $this->check_max_len($max_len_fields));
    
                
                
                // Check Email is valid
                if(!$this->is_valid($_POST['first_name'])) {
                    $errors['first_name'] = 'First Name is Invalid';
                }
    
                //check Last Name is valid
                if(!$this->is_valid($_POST['last_name'])) {
                    $errors['last_name'] = 'Last Name is Invalid';
                }
    
    
                // Check Email is valid
                if(!$this->is_email($_POST['email'])) {
                    $errors['email'] = 'Email address is Invalid';
                }
    
                //check Salary is valid
                // if(!$this->is_num($_POST['salary'])) {
                //     $errors['salary'] = 'Salary is Invalid';
                // }
    
                //check Phone number is valid
                if(!$this->is_num($_POST['contact_number'])) {
                    $errors['contact_number'] = 'Contact Number is Invalid';
                }

                // Check In Date validation
                if(!$this->is_date($_POST['check_in_date'])) {
                    $errors['check_in_date'] = 'Check In Date is Invalid';
                }

                // Check In Date validation
                if(!$this->is_date($_POST['check_out_date'])) {
                    $errors['check_out_date'] = 'Check Out Date is Invalid';
                }

                // number of guest
                if(!$this->is_num($_POST['max_guest'])) {
                    $errors['max_guest'] = 'Number is Invalid';
                }

                // Number of Guest Validation
                $dbroom = new RoomDetails();
                $room = $dbroom->getRoomID($room_number);
                if(empty($room)) {
                    $errors['room_number'] = 'Room Number Invalid';
                    $errors['max_guest'] = 'Max Guest Invalid';
                }
                else {
                    $room_type = $room['type_id'];
                    $dbroom_type = new RoomType();
                    $dbroom_type->setRoomTypeId($room_type);
                    $room_type = $dbroom_type->getRoomType();
                    $room_max_guest = $room_type['max_guest'];
                    if($room_max_guest < $no_of_guest) {
                        $errors['max_guest'] = 'Max Guest '.$room_max_guest;
                    }
                }
                



                // Age 
                if(!$this->is_num($_POST['age'])) {
                    $errors['age'] = 'Age is Invalid';
                }
                
                
    
                //Check-In Date and Check-Out Date Validation
    
                $result = $this->date_validation($check_in_date, $check_out_date);
    
                if($result == 1) {
                    $errors['check_in_date'] = 'Check-In Date is Not valid';
                    $errors['check_out_date'] = 'Check-Out Date is Not valid';
                    
                }
                else {
                    // Reservation Checking Validate or not
                    $dbreservation = new Reservation();
                    $result = $dbreservation->getAvalabilityhRoom($room_number, $check_in_date, $check_out_date);
                    if($result == 1) {
                        $errors['room_number'] = 'Room already reserved Sorry';
                        
                    }
                }
                
                
                $errors = array_filter( $errors ); 
                // print_r($errors);
                // echo "Success";
                // die();
                
                if(count( $errors ) == 0) {
                   
                    
    
                    // Check customer already user
                    $dbcustomer = new Customer();
                    $result = $dbcustomer->getEmail($email);
                    
                    if($result == 0) {
                        // Customer already not user
    
                        $data = array($first_name, $last_name, $location, $contact_num, $age, $email);
                        $result = $dbcustomer->getCreateCustomer($data);
    
                        if($result == 0) {
                            $errors[] = "Data Created Unsuccessful";
                        }
                         
                    }    
                    
    
                    // Make Reservation
                    
                    // Get Customer Id
                    $customer= $dbcustomer->getCustomerID($email);
                    $customer_id = $customer['customer_id'];
    
                    
    
                    // Get Room Id
                    $dbroom = new RoomDetails();
                    $room = $dbroom->getRoomID($room_number);
                    

                    if(!empty($room)) {
                        $room_id = $room['room_id'];
                        $room_type_id = $room['type_id'];
                        $dbroom_type = new RoomType();
                        $dbroom_type->setRoomTypeId($room_type_id);
                        $type = $dbroom_type->getRoomType();

                        if($no_of_guest <= $type['max_guest'] ) {
                            // Date Strings convert to Date data types
                            
                            $time1 = strtotime($check_in_date);
                            $time2 = strtotime($check_out_date);
                            $check_in_date = date('Y-m-d',$time1);
                            $check_out_date = date('Y-m-d',$time2);
                            $customer_id = (int)$customer_id;
                            
                            $room_id = (int)$room_id;
                            $no_of_guest = (int)$no_of_guest;

                            if($payment_method == "CASHONLINE" || $payment_method == "ONLINEONLINE") {
                                $reception_user_id = 1; // Online Reception bot not visible as Reception
                            }
                            else {
                                $reception_user_id = $_SESSION['user_id'];
                                $reception_user_id = (int)$reception_user_id;
                            }
                            // echo $reception_user_id; exit;
                            // echo $payment_method;
                            //Request or not should check
                            if($payment_method == "CASHONLINE" || $payment_method == "ONLINEONLINE") {
                                // Reception should accept this process
                                
                                $request = 1;
                            }
                            else {
                                // Reception should not accept this process
                                $request = 0;
                            }
                            // echo $payment_method;
                            // echo "success";
                            // echo $payment_method;
                            // die();
                            $data = array($customer_id, $reception_user_id, $room_id, $check_in_date, $check_out_date, $no_of_guest, $payment_method, $request);
                            $dbreservation = new Reservation();
                            $result = $dbreservation->getCreateReservation($data);

                            if($result == 1) {
                                    if($discountValue == 0) {
                                        // only payment is online create payment details(idea)
                                        if($payment_method === "ONLINEONLINE" || $payment_method === "CASHONLINE") {
                                            //reservation id should find
                                            $reservation = $dbreservation->getReservationID($customer_id, $check_in_date, $check_out_date);
                                            $reservation_id = $reservation['reservation_id'];
                                            // check customer want more rooms
                                            if($no_of_rooms == 1) {
                                                // $no_of_rooms = $no_of_rooms - 1;
                                                // $guest = $guest-$no_of_guest;
                                                $room_search_again = new RoomController();
                                                $room_search_again->checkRoomCustomerFromReservation($check_in_date, $check_out_date, $no_of_rooms, $guest ,$customer_id);
                                            }
                                            else {
                                                $dbpayment = new Payment();
                                                $customer_pay_details = $dbpayment->checkCustomerPayment($customer_id);
                                                if(empty($customer_pay_details)) {     
                                                    $data['reservation'] = array("id"=>$reservation_id);
                                                    $data['customer'] = array("id"=>$customer_id);
                                                // check already have payment details in the payment details
                                                    // redirect page accoring to session id
                                                    view::load('dashboard/reservation/reservationThanks');
                                                }
                                                else {
                                                    //retrive payment details
                                                    // This has error about we can't generate values for that
                                                    // It should has to fix
                                                    $data['payment'] = $customer_pay_details;
                                                    $data['reservation'] = array("id"=>$reservation_id);
                                                    $data['customer'] = array("id"=>$customer_id);
                                                // check already have payment details in the payment details
                                                    view::load('dashboard/reservation/reservationThanks');
                                                }
                                            }
                                            
                                            
                                        }
                                        else {
                                            $val = 1; // represent main reservation not room search reservation
                                            $data['create'] = array("value"=>$val);
                                            $data['customer'] = array("id"=>$customer_id);
                                            view::load('dashboard/reservation/reservationOption', $data);
                                        }
                                        
                                    }
                                    else {
                                        // This should be more enhanced and after reservation should ask more reservations
                                        
                                        // Success the Process
                                        // Reservation Option Page
                                        // Customer Details should pass next page
                                        $data['customer'] = array("id"=>$customer_id);
                                        view::load('dashboard/reservation/reservationOption', $data);
                                    }
                            }
                            else {
                                // Process Unsuccessfull
                                // echo "Create Reservation process unsuccessfull<br>";
                                // Database error shouldn't happen
                                if($discountValue == 1) {
                                    $errors['database'] = "Database Error"; 
                                    $data['discount'] = array("value"=>$discountValue);
                                    $data['errors'] = $errors;
                                    $data['reservation'] = array('first_name' => $first_name, 'last_name' => $last_name, 'location' => $location, 'contact_number' => $contact_num,  'age' => $age, 'email' => $email, 'max_guest' => $no_of_guest, 'room_number' => $room_number, 'check_in_date' => $check_in_date, 'check_out_date' => $check_out_date, 'payment_method' => $payment_method,'type_name'=>$typenameSearch, 'price'=>$price);
                                    
                                    if($payment_method == "CASHONLINE" || $payment_method == "ONLINEONLIE" || $payment_method == "ONLINE") {
                                        view::load('dashboard/reservation/onlineCreate', $data);
                                    }
                                    else {
                                        view::load('dashboard/reservation/create', $data);
                                    }
                                    // view::load('dashboard/reservation/create', ["newerrord"=>"Data Created Unsuccessfully",'reservation'=>$data['employee'], 'errors'=>$data['errors']]);
                                    
                                }
                                else {
                                    $errors['database'] = "Database Error"; 
                                    $data['errors'] = $errors;
                                    $data['reservation'] = array('first_name' => $first_name, 'last_name' => $last_name, 'location' => $location, 'contact_number' => $contact_num,  'age' => $age, 'email' => $email, 'max_guest' => $no_of_guest, 'room_number' => $room_number, 'check_in_date' => $check_in_date, 'check_out_date' => $check_out_date, 'payment_method' => $payment_method,'type_name'=>$typenameSearch, 'price'=>$price );
                                    if($payment_method == "CASHONLINE" || $payment_method == "ONLINEONLIE" || $payment_method == "ONLINE") {
                                        view::load('dashboard/reservation/onlineCreate', $data);
                                    }
                                    else {
                                        view::load('dashboard/reservation/create', $data);
                                    }
                                    // view::load('dashboard/reservation/create', ["newerrord"=>"Data Created Unsuccessfully",'reservation'=>$data['employee'], 'errors'=>$data['errors']]);
                                    
                                }

                                       
                            }
                        }
                        else {
                            if($discountValue == 1) {
                                $errors['max_guest'] = "No Of Guest not Valid";
                                $data['discount'] = array("value"=>$discountValue);
                                $data['errors'] = $errors;
                                $data['reservation'] = array('first_name' => $first_name, 'last_name' => $last_name, 'location' => $location, 'contact_number' => $contact_num,  'age' => $age, 'email' => $email, 'max_guest' => $no_of_guest, 'room_number' => $room_number, 'check_in_date' => $check_in_date, 'check_out_date' => $check_out_date, 'payment_method' => $payment_method,'type_name'=>$typenameSearch);                               
                                if($payment_method == "CASHONLINE" || $payment_method == "ONLINEONLIE" || $payment_method == "ONLINE") {
                                    view::load('dashboard/reservation/onlineCreate', $data);
                                }
                                else {
                                    view::load('dashboard/reservation/create', $data);
                                }

                            }
                            else {
                                $errors['max_guest'] = "No Of Guest not Valid";
                                $data['errors'] = $errors;
                                $data['reservation'] = array('first_name' => $first_name, 'last_name' => $last_name, 'location' => $location, 'contact_number' => $contact_num,  'age' => $age, 'email' => $email, 'max_guest' => $no_of_guest, 'room_number' => $room_number, 'check_in_date' => $check_in_date, 'check_out_date' => $check_out_date, 'payment_method' => $payment_method);
                                
                                if($payment_method == "CASHONLINE" || $payment_method == "ONLINEONLIE" || $payment_method == "ONLINE") {
                                    view::load('dashboard/reservation/onlineCreate', $data);
                                }
                                else {
                                    view::load('dashboard/reservation/create', $data);
                                }
                            }

                            
                        }
    
                        
        
                        
                    }
                    else {
                        if($discountValue == 1) {
                            $errors['room_number'] = "Room Number not Valid";
                            $data['errors'] = $errors;
                            $data['reservation'] = array('first_name' => $first_name, 'last_name' => $last_name, 'location' => $location, 'contact_number' => $contact_num, 'age' => $age, 'email' => $email, 'max_guest' => $no_of_guest, 'room_number' => $room_number, 'check_in_date' => $check_in_date, 'check_out_date' => $check_out_date, 'payment_method' => $payment_method,'type_name'=>$typenameSearch, 'price'=>$price); 
                            $data['discount'] = array("value"=>$discountValue);
                            if($payment_method == "CASHONLINE" || $payment_method == "ONLINEONLIE" || $payment_method == "ONLINE") {
                                view::load('dashboard/reservation/onlineCreate', $data);
                            }
                            else {
                                view::load('dashboard/reservation/create', $data);
                            }
                        }
                        else {
                            $errors['room_number'] = "Room Number not Valid";
                            $data['errors'] = $errors;
                            $data['reservation'] = array('first_name' => $first_name, 'last_name' => $last_name, 'location' => $location, 'contact_number' => $contact_num,'age' => $age, 'email' => $email, 'max_guest' => $no_of_guest, 'room_number' => $room_number, 'check_in_date' => $check_in_date, 'check_out_date' => $check_out_date, 'payment_method' => $payment_method, 'price'=>$price);
                            
                            if($payment_method == "CASHONLINE" || $payment_method == "ONLINEONLIE" || $payment_method == "ONLINE") {
                                view::load('dashboard/reservation/onlineCreate', $data);
                            }
                            else {
                                view::load('dashboard/reservation/create', $data);
                            }
                        }
                    }
                    
    
                }
                else {
                    // break process
                    if($discountValue == 1) {
                        $data['errors'] = $errors;
                        $data['discount'] = array("value"=>$discountValue);
                        $data['reservation'] = array('first_name' => $first_name, 'last_name' => $last_name, 'location' => $location, 'contact_number' => $contact_num, 'age' => $age, 'email' => $email, 'max_guest' => $no_of_guest, 'room_number' => $room_number, 'check_in_date' => $check_in_date, 'check_out_date' => $check_out_date, 'payment_method' => $payment_method,'type_name'=>$typenameSearch, 'price'=>$price);
                        
                        if($payment_method == "CASHONLINE" || $payment_method == "ONLINEONLIE" || $payment_method == "ONLINE") {
                            $inputreservationdata=array('no_of_rooms'=>$no_of_rooms, 'no_of_guest'=>$no_of_guest);
                            $data['searchdata'] = $inputreservationdata;
                            view::load('dashboard/reservation/onlineCreate', $data);
                            // echo "Succes1";
                        }
                        else {
                            view::load('dashboard/reservation/create', $data);
                            // echo "Succes2";
                        }
                    }
                    else {
                        $data['errors'] = $errors;
                        $data['reservation'] = array('first_name' => $first_name, 'last_name' => $last_name, 'location' => $location, 'contact_number' => $contact_num, 'age' => $age, 'email' => $email, 'max_guest' => $no_of_guest, 'room_number' => $room_number, 'check_in_date' => $check_in_date, 'check_out_date' => $check_out_date, 'payment_method' => $payment_method, 'price'=>$price);
                        // echo $payment_method;
                        if($payment_method == "CASHONLINE" || $payment_method == "ONLINEONLIE" || $payment_method == "ONLINE") {
                            $inputreservationdata=array('no_of_rooms'=>$no_of_rooms, 'no_of_guest'=>$no_of_guest);
                            $data['searchdata'] = $inputreservationdata;
                            // echo "Succes3";
                            view::load('dashboard/reservation/onlineCreate', $data);
                        }
                        else {
                            // echo "Succes4";
                            view::load('dashboard/reservation/create', $data);
                        }
                    }
                    
                    
                    
                }
    
            }
        
        //  }
    }
    
    //Done
    public function edit($room_number, $check_in_date, $check_out_date) {
        

        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();   
        }
        else {

            // $db = new Reservation();
            
            
            $dbroom = new RoomDetails();
            $room = $dbroom->getRoomID($room_number);
            $room_id = $room['room_id'];
            
            // get that reservation
            $dbreservation = new Reservation();
            $reservation = $dbreservation->getReservationDetails($room_id, $check_in_date, $check_out_date);
            
            // get that customer details
            $customer_id = $reservation['customer_id'];
            $dbcustomer = new Customer();
            $customer = $dbcustomer->getCustomer($customer_id);

            //get that reception details
            $reception_user_id = $reservation['reception_user_id'];
            $dbreception = new Reception();
            $reception = $dbreception->getReceptionDetail($reception_user_id);
            $reception_name = $reception['emp_id'];
            // echo $reception_name;

            //get room types for room number
            $room_type_id = $room['type_id'];
            $dbroom_type = new RoomType();
            $type = $dbroom_type->getRoomTypeDetail($room_type_id);
            // echo $reservation_id;

            $data['reception'] = $reception;
            $data['room_type'] = $type;
            $data['reservation'] = $reservation;
            $data['room'] = $room;
            $data['customer'] = $customer;
            
            view::load('dashboard/reservation/edit', $data);
            // view::load('dashboard/inc/test', $data);
            
        } 
    }
    
    //Done
    public function update($old_check_in_date) {

        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();   
        }
        else {
            if(isset($_POST['submit'])) {
            
                // Validation
                $errors[] = array();
                
                
    
                // reservation Details can't change
                $reservation_id = $_POST['reservation_id'];
                $customer_id = $_POST['customer_id'];
                $reception_user_id = $_POST['reception_user_id'];
                $room_id = $_POST['room_id'];
                
    
                // customer Details can't change
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $contact_number = $_POST['contact_number'];
                $email = $_POST['email'];
                $location = $_POST['location'];
    
                
                // room details can't change
                $room_number = $_POST['room_number'];
                $room_name = $_POST['room_name'];
                $type_name = $_POST['type_name'];
                $price = $_POST['price'];
    
                // reception details can't change
                $username = $_POST['username'];
    
                // reservation details can change
                $check_in_date = $_POST['check_in_date'];
                $check_out_date = $_POST['check_out_date'];
                $payment_method = $_POST['payment_method'];
                $payment_method = strtoupper($payment_method);
    
               
                
                // Check input is empty
                $req_fields = array('check_in_date', 'check_out_date', 'payment_method');
                $errors = array_merge($errors, $this->check_req_fields($req_fields));
    
                // Checking max length
                $max_len_fields = array('check_in_date' => 10, 'check_out_date' => 10, 'payment_method' => 7);
                $errors = array_merge($errors, $this->check_max_len($max_len_fields));
    
    
                // Check_in_date and Check_out_data validation
                $result = $this->date_validationEdit($check_in_date, $check_out_date, $old_check_in_date);
    
                if($result == 1) {
                    $errors['check_in_date'] = 'Check-In Date1 is Not valid';
                    $errors['check_out_date'] = 'Check-Out Date1 is Not valid';
                    
                }

                //Payment Method validation
                if(!$this->is_valid($_POST['payment_method'])) {
                    $errors['payment_method'] = 'Payment Method  is Invalid';
                }

                //Date validation
                if(!$this->is_date($_POST['check_in_date'])) {
                    $errors['check_in_date'] = 'Check In date  is Invalid';
                }

                if(!$this->is_date($_POST['check_out_date'])) {
                    $errors['check_out_date'] = 'Check Out date  is Invalid';
                }

                
    
    
    
                $data['errors'] = $errors;
                $data['reception'] = array("username"=>$username);
                $data['room_type'] = array("type_name"=> $type_name);
                $data['reservation'] =  array("reservation_id"=> $reservation_id, "customer_id"=> $customer_id, "reception_user_id"=> $reception_user_id, "room_id"=> $room_id, "check_in_date"=> $check_in_date, "check_out_date"=> $check_out_date, "payment_method"=> $payment_method);
                $data['room'] = array("room_number"=> $room_number, "room_name"=> $room_name, "price"=> $price);
                $data['customer'] = array("first_name"=>$first_name, "last_name"=>$last_name, "contact_number"=>$contact_number, "email"=>$email, "location"=>$location);
                
                $errors = array_filter( $errors ); 
                
                if(count( $errors ) != 0) {
                    //view::load("inc/test", $data);
                    view::load("dashboard/reservation/edit", $data);
                }
                else {
                    // update process
                    $db = new Reservation();
                    
                    // reservation table update
                    $reservationDates = $db->reservationDetails($reservation_id);
                    $check_in_date1 = $reservationDates['check_in_date'];
                    $check_out_date1 = $reservationDates['check_out_date'];
    
                    $result = $db->reservationDateToZero($reservation_id);
                    
                    if($result == 1) {
                        $rooms = $db->getAvalabilityhRoom($room_number, $check_in_date, $check_out_date);
                        if($rooms == 1) {
                            $errors['check_in_date'] = 'Date already reserved Sorry';
                            $errors['check_out_date'] = 'Date already reserved Sorry';
                            
                            $result = $db->resetReservationDates($reservation_id, $check_in_date1, $check_out_date1);
                            
                            if($result == 1) {
                                $data['errors'] = $errors;
                                view::load("dashboard/reservation/edit", $data);
                                
                                
                            }
                        }
                        else {
                            
                            $data['success'] = array("suceesmsg" => "data updated");
                            $result = $db->getUpdateReservation($reservation_id, $check_in_date, $check_out_date);
                            if($result == 1) {
                                // $this->index();
                                 view::load('dashboard/reservation/edit', $data);
                                
                            }
    
    
                        }
                    }
    
                }
    
    
            }

        }    

        
    }

    //Done
    public function delete($room_number, $check_in_date, $check_out_date) {
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();    
        }
        else {
            // $db = new Reservation();
            $dbroom = new RoomDetails();
            $room = $dbroom->getRoomID($room_number);
            $room_id = $room['room_id'];
            
            // get that reservation
            $dbreservation = new Reservation();
            $result = $dbreservation->getReservationDelete($room_id, $check_in_date, $check_out_date);

            if($result == 1) {
                $this->details();
            }
            
        } 
    }

    public function paymentOnline($customer_id, $reservation_id) {
        // if(!isset($_SESSION['user_id'])) {
        //     // redirect should be home page
        //     // $dashboard = new DashboardController();
        //     // $dashboard->index();    
        // }
        // else {
            $dbcustomer = new Customer();
            $customer = $dbcustomer->getCustomer($customer_id);
            
            $dbreservation = new Reservation();
            $reservation = $dbreservation->reservationDetails($reservation_id);
            $room_id = $reservation['room_id'];
            $dbroom = new RoomDetails();
            $room = $dbroom->getRoomDetails($room_id);
            $type_id = $room['type_id'];
            $room_type_details = new RoomType();
            $room_type = $room_type_details->getRoomTypeDetail($type_id);
            $data['room_type'] = $room_type;
            $data['customer'] = $customer;
            $data['reservation'] = $reservation;
            $data['room'] = $room;
            // echo $customer_id;
            // echo $reservation_id;

            view::load('dashboard/reservation/payment',$data);

        // }
    }

    

    private function date_validation($check_in_date, $check_out_date) {
        date_default_timezone_set("Asia/Colombo");
        $current_date = date('Y-m-d');
        $time1 = strtotime($check_in_date);
        $time2 = strtotime($check_out_date);
        $check_in_date = date('Y-m-d',$time1);
        $check_out_date = date('Y-m-d',$time2);
        $result = 0;
        $validation = 0;
        if($current_date > $check_in_date || $check_in_date >= $check_out_date) {
            $result = 1;
            
        }

        return $result;
    }

    private function date_validationEdit($check_in_date, $check_out_date, $old_check_in_date) {
        date_default_timezone_set("Asia/Colombo");
        $current_date = date('Y-m-d');
        $time1 = strtotime($check_in_date);
        $time2 = strtotime($check_out_date);
        $check_in_date = date('Y-m-d',$time1);
        $check_out_date = date('Y-m-d',$time2);
        $result = 0;
        $validation = 0;


        // $current_date < $check_in_date can ahead reservation change
        if($old_check_in_date > $check_in_date || $check_in_date >= $check_out_date || $current_date > $check_out_date) {
            $result = 1;
            
        }

        return $result;
    }

    private function check_req_fields($req_fields) {
        
        $errors[] = array();

        foreach($req_fields as $field) {
            if(empty(trim($_POST[$field]))) {
                // echo "1";
                $errors[$field] = ' is required';
            }
        }

        return $errors;
    }

    private function check_max_len($max_len_fields) {
        // Check max lengths
        $errors[] = array();
    
        foreach($max_len_fields as $field => $max_len) {
            if(strlen(trim($_POST[$field])) > $max_len ) {
                // echo "2";
                $errors[$field] = ' must be less than ' . $max_len . ' characters';
            }
        }
        return $errors;
    }
    
    private function is_email($email) {
        return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i" ,$email));
    }

    private function is_valid($text) {
        return(preg_match("/^([a-zA-Z' ]+)$/", $text));
    }

    private function is_num($num) {
        return(preg_match('/^[0-9]+$/', $num));
    }

    private function is_date($date) {
        return(preg_match("/\d{4}\-\d{2}-\d{2}/", $date));
    }

    
}


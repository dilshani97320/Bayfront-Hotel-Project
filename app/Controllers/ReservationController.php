<?php 
session_start();

class ReservationController {

    public function index() {
        
        //Checking if a user is logged in
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();   
        }
        else {
            view::load('dashboard/reservation/create');
            
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

    public function view1($room_number,$max_guest, $check_in_date, $check_out_date, $type_name) {
        
        //Checking if a user is logged in
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();   
        }
        else {
            $value=1;
            $data['discount'] = array("value"=>$value);
            $data['details'] = array("check_in_date"=>$check_in_date, "check_out_date"=>$check_in_date, "type_name"=>$type_name);
            $data['reservation'] = array('room_number' => $room_number, 'max_guest' => $max_guest);
            view::load('dashboard/reservation/create', $data);
            
        }
           
    }

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

   

    public function create() {

        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();    
        }
        else {
            if(isset($_POST['submit'])) {

                // Validation
               
                
                
    
                $first_name = $_POST['first_name'];
                $first_name = ucwords($first_name);
                $last_name = $_POST['last_name'];
                $last_name = ucwords($last_name);
                $location = $_POST['location'];
                $contact_num = $_POST['contact_number'];
                $date_of_birth = $_POST['date_of_birth'];
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
                $req_fields = array('first_name', 'last_name', 'location', 'contact_number', 'date_of_birth', 'age', 'email', 'max_guest', 'room_number', 'check_in_date', 'check_out_date', 'payment_method');
                $errors = array_merge($errors, $this->check_req_fields($req_fields));
                
    
                $max_len_fields = array('first_name' => 20, 'last_name' => 20, 'location' => 30, 'contact_number' => 10, 'date_of_birth' => 12, 'age' => 3, 'email' => 30, 'max_guest' => 2, 'room_number' => 4, 'check_in_date' => 10, 'check_out_date' => 10, 'payment_method' => 6);
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

                //check Date of Birth is valid
                if(!$this->is_date($_POST['date_of_birth'])) {
                    $errors['date_of_birth'] = 'Date of Birth is Invalid';
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
                    $db = new Reservation();
                    $result = $db->getAvalabilityhRoom($room_number, $check_in_date, $check_out_date);
                    if($result == 1) {
                        $errors['room_number'] = 'Room already reserved Sorry';
                        
                    }
                }
    
                
                $errors = array_filter( $errors ); 
                
                if(count( $errors ) == 0) {
                   
                    
    
                    // Check customer already user
                    $db = new Reservation();
                    $result = $db->getEmail($email);
                    
                    if($result == 0) {
                        // Customer already not user
    
                        $data = array($first_name, $last_name, $location, $contact_num, $date_of_birth, $age, $email);
                        $result = $db->getCreateCustomer($data);
    
                        if($result == 0) {
                            $errors[] = "Data Created Unsuccessful";
                        }
                         
                    }    
                    
    
                    // Make Reservation
                    
                    // Get Customer Id
                    $customer= $db->getCustomerID($email);
                    $customer_id = $customer['customer_id'];
    
                    
    
                    // Get Room Id
                    $room = $db->getRoomID($room_number);
                    if(!empty($room)) {
                        $room_id = $room['room_id'];
                        $type = $db->getRoomType($room_id);

                        if($no_of_guest <= $type['max_guest'] ) {
                            // Date Strings convert to Date data types 
                            $time1 = strtotime($check_in_date);
                            $time2 = strtotime($check_out_date);
                            $check_in_date = date('Y-m-d',$time1);
                            $check_out_date = date('Y-m-d',$time2);
                            $reception_user_id = $_SESSION['user_id'];
                            $customer_id = (int)$customer_id;
                            $reception_user_id = (int)$reception_user_id;
                            $room_id = (int)$room_id;
                            $no_of_guest = (int)$no_of_guest;
            
            
            
                            $data = array($customer_id, $reception_user_id, $room_id, $check_in_date, $check_out_date, $no_of_guest, $payment_method);
                            $result = $db->getCreateReservation($data);
            
                            
                            if($result == 1) {
                                    // Success Process
                                    // view::load('dashboard/reservation/create', ["success"=>"Data Created Successfully"]);
                                    $this->details();
                            }
                            else {
                                // Process Unsuccessfull
                                // echo "Create Reservation process unsuccessfull<br>";
                                $errors['database'] = "Database Error"; 
                                $data['errors'] = $errors;
                                $data['reservation'] = array('first_name' => $first_name, 'last_name' => $last_name, 'location' => $location, 'contact_number' => $contact_num, 'date_of_birth' => $date_of_birth, 'age' => $age, 'email' => $email, 'max_guest' => $no_of_guest, 'room_number' => $room_number, 'check_in_date' => $check_in_date, 'check_out_date' => $check_out_date, 'payment_method' => $payment_method);
                                view::load('dashboard/reservation/create', $data);
                                // view::load('dashboard/reservation/create', ["newerrord"=>"Data Created Unsuccessfully",'reservation'=>$data['employee'], 'errors'=>$data['errors']]);
                                        
                            }
                        }
                        else {
                            $errors['max_guest'] = "No Of Guest not Valid";
                            $data['errors'] = $errors;
                            $data['reservation'] = array('first_name' => $first_name, 'last_name' => $last_name, 'location' => $location, 'contact_number' => $contact_num, 'date_of_birth' => $date_of_birth, 'age' => $age, 'email' => $email, 'max_guest' => $no_of_guest, 'room_number' => $room_number, 'check_in_date' => $check_in_date, 'check_out_date' => $check_out_date, 'payment_method' => $payment_method);
                            
                            view::load('dashboard/reservation/create', $data);
                        }
    
                        
        
                        
                    }
                    else {
                        $errors['room_number'] = "Room Number not Valid";
                        $data['errors'] = $errors;
                        $data['reservation'] = array('first_name' => $first_name, 'last_name' => $last_name, 'location' => $location, 'contact_number' => $contact_num, 'date_of_birth' => $date_of_birth, 'age' => $age, 'email' => $email, 'max_guest' => $no_of_guest, 'room_number' => $room_number, 'check_in_date' => $check_in_date, 'check_out_date' => $check_out_date, 'payment_method' => $payment_method);
                        
                        view::load('dashboard/reservation/create', $data);
                        }
                    
    
                }
                else {
                    // break process
                    
                    $data['errors'] = $errors;
                    $data['reservation'] = array('first_name' => $first_name, 'last_name' => $last_name, 'location' => $location, 'contact_number' => $contact_num, 'date_of_birth' => $date_of_birth, 'age' => $age, 'email' => $email, 'max_guest' => $no_of_guest, 'room_number' => $room_number, 'check_in_date' => $check_in_date, 'check_out_date' => $check_out_date, 'payment_method' => $payment_method);
                    
                    view::load('dashboard/reservation/create', $data);
                    
                    
                }
    
            }
        
         }
    }
    
    public function edit($room_number, $check_in_date, $check_out_date) {
        

        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();   
        }
        else {
            $db = new Reservation();
            
            

            $room = $db->getRoomID($room_number);
            $room_id = $room['room_id'];
            
            // get that reservation
            $reservation = $db->getReservationDetails($room_id, $check_in_date, $check_out_date);
            
            // get that customer details
            $customer_id = $reservation['customer_id'];
            $customer = $db->getCustomer($customer_id);

            //get that reception details
            $reception_user_id = $reservation['reception_user_id'];
            $reception = $db->getReception($reception_user_id);
            $reception_name = $reception['emp_id'];
            // echo $reception_name;

            //get room types for room number
            $room_type_id = $room['type_id'];
            $type = $db->getRoomType($room_type_id);
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

    public function delete($room_number, $check_in_date, $check_out_date) {
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();    
        }
        else {
            $db = new Reservation();
        
            $room = $db->getRoomID($room_number);
            $room_id = $room['room_id'];
            
            // get that reservation
            $result = $db->getReservationDelete($room_id, $check_in_date, $check_out_date);

            if($result == 1) {
                $this->details();
            }
            
        } 
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


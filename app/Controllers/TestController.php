<?php 
session_start();

class TestController {

    public function index() {
        view::load('dashboard/inc/formtest');
        // //Checking if a user is logged in
        // if(!isset($_SESSION['user_id'])) {
        //     view::load('dashboard/dashboard');    
        // }
        // else {
        //     view::load('dashboard/reservation/create');
            // $data = array();
            // $db = new Employee;
            // if(isset($_POST['search'])) {
            //     $search = $_POST['search'];
            //     $data['employee'] = $db->getSearchEmployee($search);
            //     //echo 'Error1';
            //     view::load('dashboard/employee/index', $data);
            // }
            // else {
            //     $data['employee'] = $db->getAllEmployee();
            //     //echo 'Error2';
            //     view::load('dashboard/employee/index', $data);
            // }
            
            
        // }
           
    }

    // public function add() {
    //     if(!isset($_SESSION['user_id'])) {
    //         view::load('home');    
    //     }
    //     else {
    //         view::load('dashboard/employee/add');
            
    //     }
         
    // }

    // public function edit($emp_id) {
    //     if(!isset($_SESSION['user_id'])) {
    //         view::load('dashboard/dashboard');    
    //     }
    //     else {
    //         $db = new Employee();
    //         $data['employee']= $db->getDataEmployee($emp_id);
    //         //echo $data['first_name'];
    //         //view::load('inc/test', $data);
    //         view::load('dashboard/employee/edit', $data);
    //     }
         
    // }

    public function create() {
        if(isset($_POST['submit'])) {

            // Validation
           
            
            //$errors = $this->validation();

            $first_name = $_POST['first_name'];
            $first_name = ucwords($first_name);
            $last_name = $_POST['last_name'];
            $first_name = ucwords($last_name);
            $location = $_POST['location'];
            $contact_num = $_POST['contact_number'];
            $date_of_birth = $_POST['date_of_birth'];
            $age = $_POST['age'];
            $email = $_POST['email'];
            $email = strtolower($email);

            $no_of_guest = $_POST['no_of_guest'];
            $room_number = $_POST['room_number'];
            $room_number = ucwords($room_number);
            $check_in_date = $_POST['check_in_date'];
            $check_out_date = $_POST['check_out_date'];

            $name_of_card = $_POST['name_of_card'];
            $name_of_card = strtoupper($name_of_card);
            $credit_card_number = $_POST['credit_card_number'];
            $expire_month = $_POST['expire_month'];
            $expire_year = $_POST['expire_year'];
            $cvv = $_POST['cvv'];

            // Check input is empty
            $errors[] = array();
            $req_fields = array('first_name', 'last_name', 'location', 'contact_number', 'date_of_birth', 'age', 'email', 'no_of_guest', 'room_number', 'check_in_date', 'check_out_date', 'name_of_card', 'credit_card_number', 'expire_month', 'expire_year', 'cvv');
            $errors = array_merge($errors, $this->check_req_fields($req_fields));

            if(empty($errors)) {
                //Continue Process
                // Checking max length
                $max_len_fields = array('first_name' => 50, 'last_name' => 100, 'location' => 50, 'contact_number' => 10, 'date_of_birth' => 10, 'age' => 3, 'email' => 50, 'no_of_guest' => 2, 'room_number' => 4, 'check_in_date' => 10, 'check_out_date' => 10, 'name_of_card' => 20, 'credit_card_number' => 19, 'expire_month' => 3, 'expire_year' => 4, 'cvv' => 3 );
                $errors = array_merge($errors, $this->check_max_len($max_len_fields));

                if(empty($errors)) {
                    //Continue Process
                }
            }
            else {
                //break process
            }

            

            // Check Email is valid
            if(!$this->is_email($_POST['email'])) {
                $errors[] = 'Email address is Invalid';
            }

            // Check Employee email already exist
            // $db = new Employee();
            // $result = $db->getEmail($email); 

            // if($result == 1) {
            //     $errors[] = 'Email address already exists';
            // }


            //Check-In Date and Check-Out Date Validation

            $result = $this->date_validation($check_in_date, $check_out_date);

            if($result == 1) {
                $errors[] = 'Check-In and Check-Date is not_valid';
            }
            else {
                // Reservation Checking Validate or not
                $db = new Reservation();
                $result = $db->getAvalabilityhRoom($room_number, $check_in_date, $check_out_date);
                if($result == 1) {
                    $errors[] = 'Room already reserved Sorry';
                }
            }

            // Checking Payment Details is Valid?

            //Have to Code

            if(empty($errors)) {
                echo "Success<br>"; 
                // Check customer already user
                $db = new Reservation();
                $result = $db->getEmail($email);
                //$customer_value = 0;
                if($result == 0) {
                    // Customer already not user
                    //$customer_value = 1;
                    $data = array($first_name, $last_name, $location, $contact_num, $date_of_birth, $age, $email);
                    $result = $db->getCreateCustomer($data);

                    if($result == 0) {
                        $errors[] = "Data Created Unsuccessful";
                    }
                    echo "Create Customer process successfull<br>"; 
                }    
                echo "Create Customer process Not Done<br>"; 
                // Make Reservation
                
                // Get Customer Id
                $customer= $db->getCustomerID($email);
                $customer_id = $customer['customer_id'];

                echo "Get Customer ID process successfull<br>"; 

                // Get Room Id
                $room = $db->getRoomID($room_number);
                $room_id = $room['room_id'];

                echo "Get Room ID process successfull<br>"; 

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


                $data = array($customer_id, $reception_user_id, $room_id, $check_in_date, $check_out_date, $no_of_guest);
                $result = $db->getCreateReservation($data);
                echo "Level1<br>";
                var_dump($result);
                if($result == 1) {
                    // Check payment details already store
                    $result = $db->getCreditCardNumber($credit_card_number);
                    // echo "Create Reservation process successfull<br>";
                    //$payment_value = 0;
                    if($result == 0) {
                        // Payment Details create store
                        $reservation = $db->getReservationID($room_id);
                        $reservation_id = $reservation['reservation_id'];
                        $data = array($reservation_id, $customer_id, $name_of_card,$credit_card_number, $expire_month, $expire_year, $cvv);
                        $result = $db->getCreatePayment($data);

                        if($result == 1) {
                            // Success Process
                            // echo "Create Payment process successfull<br>";
                            // $data['errors'] = $errors;
                            view::load('dashboard/reservation/create', ["success"=>"Data Created Successfully"]);

                        }
                        else {
                            // Process Unsuccessful
                            // Have to Code

                            $errors[] = "Database Error"; 
                            $data['errors'] = $errors;
                            $data['reservation'] = array('first_name' => $first_name, 'last_name' => $last_name, 'location' => $location, 'contact_number' => $contact_num, 'date_of_birth' => $date_of_birth, 'age' => $age, 'email' => $email, 'no_of_guest' => $no_of_guest, 'room_number' => $room_number, 'check_in_date' => $check_in_date, 'check_out_date' => $check_out_date, 'name_of_card' => $name_of_card, 'credit_card_number' => $credit_card_number, 'expire_month' => $expire_month, 'expire_year' => $expire_year, 'cvv' => $cvv );
                            view::load('dashboard/reservation/create', ["success"=>"Data Created Unsuccessfully",'reservation'=>$data['employee'], 'errors'=>$data['errors']]);
                            
                        }
                    
                    }
                    else {
                        // Success Process
                        // Have to Code
                        // echo "Create Reservation process successfull<br>";
                        view::load('dashboard/reservation/create', ["success"=>"Data Created Successfully"]);
                    }
                }
                else {
                    // Process Unsuccessfull
                    // echo "Create Reservation process unsuccessfull<br>";
                    $errors[] = "Database Error"; 
                    $data['errors'] = $errors;
                    $data['reservation'] = array('first_name' => $first_name, 'last_name' => $last_name, 'location' => $location, 'contact_number' => $contact_num, 'date_of_birth' => $date_of_birth, 'age' => $age, 'email' => $email, 'no_of_guest' => $no_of_guest, 'room_number' => $room_number, 'check_in_date' => $check_in_date, 'check_out_date' => $check_out_date, 'name_of_card' => $name_of_card, 'credit_card_number' => $credit_card_number, 'expire_month' => $expire_month, 'expire_year' => $expire_year, 'cvv' => $cvv );
                    view::load('dashboard/reservation/create', ["newerrord"=>"Data Created Unsuccessfully",'reservation'=>$data['employee'], 'errors'=>$data['errors']]);
                            
                }

                


            } 
            else {
                $data['errors'] = $errors;
                $data['reservation'] = array('first_name' => $first_name, 'last_name' => $last_name, 'location' => $location, 'contact_number' => $contact_num, 'date_of_birth' => $date_of_birth, 'age' => $age, 'email' => $email, 'no_of_guest' => $no_of_guest, 'room_number' => $room_number, 'check_in_date' => $check_in_date, 'check_out_date' => $check_out_date, 'name_of_card' => $name_of_card, 'credit_card_number' => $credit_card_number, 'expire_month' => $expire_month, 'expire_year' => $expire_year, 'cvv' => $cvv );
                // echo "Create Reservation process unsuccessfull<br>";
                view::load('dashboard/reservation/create', $data);
            }

            
            

            // Check Owner is valid
            // $result = $db->getOwner($owner_user_id);

            // if($result == 0) {
            //     $errors[] = 'Owner ID isn\'t valid';
            // }

            // $data['error'] = $errors;
            // $data['employee'] = array($owner_user_id, $first_name, $last_name, $email, $salary, $location, $contact_num);
                 
            // if(!empty($errors)) {
            //     view::load("employee/add", $data);
            // }
            // else {
            //     $data = array($owner_user_id, $first_name, $last_name, $email, $salary, $location, $contact_num);
            //     $result = $db->getCreate($data);

            //     if($result == 1) {
            //         view::load("employee/add", ["success"=>"Data Created Successfully"]);
            //     }
            //     else {
            //         view::load("employee/add", ["newerror"=>"Data Created Unsuccessfully"]);
            //     }



            // }


         }
    }

    // public function update($emp_id) {
    //     if(isset($_POST['submit'])) {

    //         // Validation
    //         $errors = array();
            
    //         //$errors = $this->validation();

    //         $owner_user_id = $_POST['owner_user_id'];
    //         $first_name = $_POST['first_name'];
    //         $last_name = $_POST['last_name'];
    //         $email = $_POST['email'];
    //         $salary = $_POST['salary'];
    //         $location = $_POST['location'];
    //         $contact_num = $_POST['contact_num'];

    //         // Check input is empty
    //         $req_fields = array('first_name', 'last_name', 'email', 'salary', 'location', 'contact_num');
    //         $errors = array_merge($errors, $this->check_req_fields($req_fields));

    //         // Checking max length
    //         $max_len_fields = array('first_name' => 50, 'last_name' => 100, 'email' => 100, 'salary' => 10, 'location' => 50, 'contact_num' => 10);
    //         $errors = array_merge($errors, $this->check_max_len($max_len_fields));

    //         // Check Email is valid
    //         if(!$this->is_email($_POST['email'])) {
    //             $errors[] = 'Email address is Invalid';
    //         }

    //         // Check Employee email already exist
    //         $db = new Employee();
    //         $result = $db->getEmailOther($email, $emp_id); 

    //         if($result == 1) {
    //             $errors[] = 'Email address Invalid or already use other';
    //         }

    //         // Check Owner is valid
    //         $result = $db->getOwner($owner_user_id);

    //         if($result == 0) {
    //             $errors[] = 'Owner ID isn\'t valid';
    //         }

    //         $data['error'] = $errors;
    //         $data['employee'] = array("emp_id"=>$emp_id, "owner_user_id"=>$owner_user_id, "first_name"=>$first_name, "last_name"=>$last_name, "email"=>$email, "salary"=>$salary, "location"=>$location, "contact_num"=>$contact_num);
                 
    //         if(!empty($errors)) {
    //             //view::load("inc/test", $data);
    //             view::load("employee/edit", $data);
    //         }
    //         else {
    //             $data1 = array($emp_id, $owner_user_id, $first_name, $last_name, $email, $salary, $location, $contact_num);
    //             $result = $db->getUpdate($data1);

    //             if($result == 1) {
    //                 view::load("employee/edit", ["success"=>"Employee Update Successfully", 'employee'=>$data['employee']]);
    //             }
    //             else {
    //                 view::load("employee/edit", ["newerror"=>"Data Update Unsuccessfully", 'employee'=>$data['employee']]);
    //             }



    //         }


    //     }
    // }

    // public function delete($emp_id) {
    //     $db = new Employee();
    //     $result = $db->remove($emp_id);

    //     if($result == 1) {
    //         $this->index();
    //     }

    // }

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
            // echo "Date is Not Valid";
            // echo "<br>";
            // $errors[] = 'Check-In and Check-Date is not_valid';
        }

        return $result;
    }

    private function check_req_fields($req_fields) {
        
        $errors = array();

        foreach($req_fields as $field) {
            if(empty(trim($_POST[$field]))) {
                $errors[$field] = $field . ' is required';
            }
        }

        return $errors;
    }

    private function check_max_len($max_len_fields) {
        // Check max lengths
        $errors = array();
    
        foreach($max_len_fields as $field => $max_len) {
            if(strlen(trim($_POST[$field])) > $max_len ) {
                $errors[$field] = $field . ' must be less than ' . $max_len . ' characters';
            }
        }
    
        return $errors;
    }
    
    private function is_email($email) {
        return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i" ,$email));
    }
    
}


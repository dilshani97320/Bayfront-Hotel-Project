<?php 
session_start();

class EmployeeController {



    public function option() {
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();
        }
        else {
            view::load('dashboard/employee/selectOption');
        }
    }


    // Done
    public function index() {
        
        //Checking if a user is logged in
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();   
        }
        else {
            $data = array();
            // $db = new Employee;
            if(isset($_POST['search'])) {
                $search = $_POST['search'];
                $db = new Employee();
                $db->setSearchEmployee($search);
                $data['employee'] = $db->getSearchEmployee();
                //echo 'Error1';
                view::load('dashboard/employee/index', $data);
            }
            else {
                $db = new Employee();
                $data['employee'] = $db->getAllEmployee();
                //echo 'Error2';
                view::load('dashboard/employee/index', $data);
            }
            
            
        }
           
    }

    //Done
    public function add() {
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();   
        }
        else {
            view::load('dashboard/employee/add');
            
        }
         
    }

    //Done
    public function edit($emp_id) {
        if(!isset($_SESSION['user_id'])) {
            // view::load('dashboard/dashboard');  
            $dashboard = new DashboardController();
            $dashboard->index();  
        }
        else {
            $db = new Employee();
            $db->setEmployee_id($emp_id);
            $data['employee']= $db->getDataEmployee();
            //echo $data['first_name'];
            //view::load('inc/test', $data);
            // echo "tharindu";
            view::load('dashboard/employee/edit', $data);
        }
         
    }


    //Done
    public function create() {
        if(!isset($_SESSION['user_id'])) {
            // view::load('dashboard/dashboard');  
            $dashboard = new DashboardController();
            $dashboard->index();  
        }
        else {
            if(isset($_POST['submit'])) {

                // Validation
                $errors[] = array();
                
                //$errors = $this->validation();
    
                $owner_user_id = $_POST['owner_user_id'];
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $email = $_POST['email'];
                $salary = $_POST['salary'];
                $location = $_POST['location'];
                $contact_num = $_POST['contact_num'];
                $post = $_POST['post'];
    
                // Check input is empty
                $req_fields = array('first_name', 'last_name', 'email', 'salary', 'location', 'contact_num');
                $errors = array_merge($errors, $this->check_req_fields($req_fields));
    
                // Checking max length
                $max_len_fields = array('first_name' => 50, 'last_name' => 100, 'email' => 100, 'salary' => 10, 'location' => 50, 'contact_num' => 10);
                $errors = array_merge($errors, $this->check_max_len($max_len_fields));
    
                // check First Name is valid
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
                if(!$this->is_num($_POST['salary'])) {
                    $errors['salary'] = 'Salary is Invalid';
                }
    
                //check Phone number is valid
                if(!$this->is_num($_POST['contact_num'])) {
                    $errors['contact_num'] = 'Contact Number is Invalid';
                }
    
                // Check Employee email already exist
                $db = new Employee();
                $db->setEmailEmployee($email);
                $result = $db->checkEmailEmployee(); 
    
                if($result == 1) {
                    $errors['email'] = 'Email address already exists';
                }
    
                // Check Phone number already exist
                $db = new Employee();
                $db->setPhoneNumberEmployee($contact_num);
                $result = $db->checkPhoneNumberEmployee(); 
    
                if($result == 1) {
                    $errors['contact_num'] = 'Contact Number already exists';
                }
    
                // Check Owner is valid
                // $result = $db->getOwner($owner_user_id);
                $db->setOwnerId($owner_user_id);
                $result = $db->checkOwner();
    
                if($result == 0) {
                    $errors['Owner_id'] = 'Owner ID isn\'t valid';
                }
                // echo $result;
                // die();

                $errors = array_filter( $errors );
                
                if(count( $errors ) == 0) {
                    $data = array($first_name, $last_name, $email, $salary, $location, $contact_num, $post);
                    $db->setCreateEmployee($data);
                    $result = $db->getCreateEmployee();
    
                    if($result == 1) {
                        // view::load("dashboard/employee/add", ["success"=>"Data Created Successfully"]);
                        // $this->index();
                        if($post == "Reception") {
                            $db->setEmailEmployee($email);
                            $employee = $db->getEmployee();
                            $emp_id = $employee['emp_id'];
                            //default reception create in reception table
                            $db1 = new Reception();
                            $db1->setEmployee_id($emp_id);
                            $result = $db1->getCreateReception();
                            if($result == 1) {
                                $this->index();
                            }
                            else {
                                view::load("dashboard/employee/add", ["newerror"=>"Data Created Unsuccessfully"]);
                            }
                            
                        }
                        else {
                            $this->index();
                        }
                    }
                    else {
                        view::load("dashboard/employee/add", ["newerror"=>"Data Created Unsuccessfully"]);
                    }
                }
                else {
                    $data['errors'] = $errors;
                    $data['employee'] = array('owner_user_id'=>$owner_user_id, 'first_name'=>$first_name, 'last_name'=>$last_name, 'email'=>$email, 'salary'=>$salary, 'location'=>$location, 'contact_num'=>$contact_num, 'post'=>$post);
                    view::load("dashboard/employee/add", $data);
                }
    
            }
        }
        
    }

    //Reception CLass must have update
    public function update($emp_id) {

        if(!isset($_SESSION['user_id'])) {
            // view::load('dashboard/dashboard');  
            $dashboard = new DashboardController();
            $dashboard->index();  
        }

        else {
            if(isset($_POST['submit'])) {

                // Validation
                $errors = array();
                
                //$errors = $this->validation();
    
                $owner_user_id = $_POST['owner_user_id'];
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $email = $_POST['email'];
                $salary = $_POST['salary'];
                $location = $_POST['location'];
                $contact_num = $_POST['contact_num'];
                $post = $_POST['post'];
    
                // Check input is empty
                $req_fields = array('first_name', 'last_name', 'email', 'salary', 'location', 'contact_num');
                $errors = array_merge($errors, $this->check_req_fields($req_fields));
    
                // Checking max length
                $max_len_fields = array('first_name' => 50, 'last_name' => 100, 'email' => 100, 'salary' => 10, 'location' => 50, 'contact_num' => 10);
                $errors = array_merge($errors, $this->check_max_len($max_len_fields));
    
                // check First Name is valid
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
                if(!$this->is_num($_POST['salary'])) {
                    $errors['salary'] = 'Salary is Invalid';
                }
    
                //check Phone number is valid
                if(!$this->is_num($_POST['contact_num'])) {
                    $errors['contact_num'] = 'Contact Number is Invalid';
                }
    
                // Check Employee email already exist
                $db = new Employee();
                $db->setEmailOtherEmployee($email, $emp_id);
                $result = $db->getEmailOtherEmployee();
    
                if($result == 1) {
                    $errors['email'] = 'Email address already use other';
                }

                // Check Employee contact number already exist
                $db->setPhoneNumberOtherEmployee($contact_num, $emp_id);
                $result = $db->getPhoneNumberOtherEmployee(); 
    
                if($result == 1) {
                    $errors['contact_num'] = 'Conatct Number already use other';
                }
    
                // Check Owner is valid

                // $result = $db->getOwner($owner_user_id);
                $db->setOwnerId($owner_user_id);
                $result = $db->checkOwner();
    
                if($result == 0) {
                    $errors[] = 'Owner ID isn\'t valid';
                }
    
                $data['errors'] = $errors;
                $data['employee'] = array("emp_id"=>$emp_id, "owner_user_id"=>$owner_user_id, "first_name"=>$first_name, "last_name"=>$last_name, "email"=>$email, "salary"=>$salary, "location"=>$location, "contact_num"=>$contact_num, "post"=>$post);
                  
                
                $errors = array_filter( $errors ); 
                
                if(count( $errors ) == 0) {
                    $data1 = array($emp_id, $first_name, $last_name, $email, $salary, $location, $contact_num, $post);
                    $db->setUpdateEmployee($data1);
                    $result = $db->getUpdateEmployee();
                    
                    if($result == 1) {
                        // Check This employee already receptionist
                        $db1 = new Reception();
                        $db1->setEmployee_id($emp_id);
                        $result = $db1->checkReception();
                        
                        if($result == 1) {
                            // Previous Reception but now not
                            if($post != "Reception") {
                                $db1->setEmployee_id($emp_id);
                                $result =$db1->removeReception();
                                //Query should run then not check it
                                
                            }
                            view::load("dashboard/employee/edit", ["success"=>"Employee Update Successfully", 'employee'=>$data['employee']]);
                        }
                        else {
                            // Previous Not Reception but now Reception 
                            if($post == "Reception") {
                                $result1= 0;
                                $db1->setEmployee_id($emp_id);
                                $result1 = $db1->getCheckDeleteReception();
                                if($result1 == 1) {
                                    // Exist the reception and is_deleted = 1
                                    $db1->getUpdateReception();
                                    // echo "1";
                                }
                                else {
                                    $result = $db1->getCreateReception();
                                    // echo "2";
                                } 
                            }
                            view::load("dashboard/employee/edit", ["success"=>"Employee Update Successfully", 'employee'=>$data['employee']]);
                        }
                        
                    }
                    else {
                        view::load("dashboard/employee/edit", ["newerror"=>"Data Update Unsuccessfully", 'employee'=>$data['employee']]);
                    }
                }
                else {
                    view::load("dashboard/employee/edit", $data);
                }
    
    
    
            }
        }


        
    }

    //Done
    public function delete($emp_id) {
        if(!isset($_SESSION['user_id'])) {
            // view::load('dashboard/dashboard');  
            $dashboard = new DashboardController();
            $dashboard->index();  
        }
        else {
            $db = new Employee();
            $db->setEmployee_id($emp_id);
            $result = $db->removeEmployee();

            if($result == 1) {
                $this->index();
            }
        }
        

    }


    private function check_req_fields($req_fields) {
        
        $errors = array();

        foreach($req_fields as $field) {
            if(empty(trim($_POST[$field]))) {
                $errors[$field] = ' is required';
            }
        }

        return $errors;
    }

    private function check_max_len($max_len_fields) {
        // Check max lengths
        $errors = array();
    
        foreach($max_len_fields as $field => $max_len) {
            if(strlen(trim($_POST[$field])) > $max_len ) {
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
    
}


<?php 

session_start();

class ReceptionController {

    public function index() {

        // Checking if a user is logged in
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();
        }

        else {
            $data = array();
            $db = new Reception();
            if(isset($_POST['search'])) {
                // Code
                $search = $_POST['search'];
                $db->setSearchReception($search);
                $data['reception'] = $db->getSearchReception();
                view::load('dashboard/employee/reception/index', $data);
            }
            else {
                $data['reception'] = $db->getAllReception();
                view::load('dashboard/employee/reception/index', $data);
            }
        }
    }

    public function edit($reception_user_id) {
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();
        }
        else {
            $db = new Reception();
            $db->setReception($reception_user_id);
            $data['reception'] = $db->getDataReception();
            view::load('dashboard/employee/reception/edit', $data);
        }
    }

    // Update password and username
    public function update() {
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();
        }
        else {
            if(isset($_POST['submit'])) {

                $errors = array();
                // Don't want to check
                $reception_user_id = $_POST['reception_user_id'];
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $email = $_POST['email'];
                $contact_num = $_POST['contact_num'];
                $location = $_POST['location'];

                // Want to check
                $username = $_POST['username'];
                $password = $_POST['password'];

                // Check input is empty
                $req_fields = array('username', 'password');
                $errors = array_merge($errors, $this->check_req_fields($req_fields));

                // Check max length
                $max_len_fields = array('username'=>10, 'password'=>15);
                $errors = array_merge($errors, $this->check_max_len($max_len_fields));
                
                // Check Username is valid
                if(!$this->is_valid($_POST['username'])) {
                    $errors['username'] = 'Username is Invalid';
                }

                // Check Password is valid
                if(!$this->is_password($_POST['password'])) {
                    $errors['password'] = 'Password is Invalid';
                }

                $data['errors'] = $errors;
                $data['reception'] = array("reception_user_id"=>$reception_user_id, "first_name"=>$first_name, "last_name"=>$last_name, "email"=>$email, "contact_num"=>$contact_num, "location"=>$location, "username"=>$username, "password"=>$password);

                $errors = array_filter($errors);

                if(count($errors) == 0) {
                    //Code
                    // get all data from reception
                    $db = new Reception();
                    $db->setReception($reception_user_id);
                    $reception = $db->getReception();
                    $emp_id = $reception['emp_id'];
                    $user_level = $reception['user_level'];
                    $db->setReception($reception_user_id);
                    $db->setEmployee_id($emp_id);
                    $db->setDataUpdate($user_level, $username, $password);
                    // $result = $db->getUpdate($reception_user_id, $emp_id, $user_level, $username, $password);
                    $result = $db->getUpdate();

                    if($result == 1) {
                        view::load("dashboard/employee/reception/edit", ["success"=>"Reception Update Successfully", 'reception'=>$data['reception']]);
                    }
                    else {
                        view::load("dashboard/employee/reception/edit", ["newerror"=>"Data Update Unsuccessfully", 'reception'=>$data['reception']]);
                    }
                }
                else {
                    view::load("dashboard/employee/reception/edit", $data);
                }
            }
        }
    }

    public function delete($reception_user_id) {
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();
        }
        else {
            // Get reception's $emp_id and $username
            $db = new Reception;
            $db->setReception($reception_user_id);
            $reception = $db->getReception();
            $data['reception'] = $reception;
            view::load("dashboard/employee/reception/deleteOption", $data);
        }
    }

    public function editPost($emp_id, $reception_user_id) {
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();
        }
        else {
            $db = new Reception();
            $db->setEmployee_id($emp_id);
            $employee = $db->getDataEmployee();
            $data['employee'] = $employee;
            $data['reception'] = array("reception_user_id"=>$reception_user_id);
            view::load("dashboard/employee/reception/editPost", $data);
        }
    }

    // update Post
    public function updatePost($emp_id, $reception_user_id) {

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
                $req_fields = array('salary');
                $errors = array_merge($errors, $this->check_req_fields($req_fields));
    
                // Checking max length
                $max_len_fields = array('salary' => 10);
                $errors = array_merge($errors, $this->check_max_len($max_len_fields));
    
                //check Salary is valid
                if(!$this->is_num($_POST['salary'])) {
                    $errors['salary'] = 'Salary is Invalid';
                }
    
                // Check Owner is valid
                // $db = new Employee();
                // $result = $db->getOwner($owner_user_id);
                $db = new Reception();
                $db->setOwnerId($owner_user_id);
                $result = $db->checkOwner();
    
                if($result == 0) {
                    $errors[] = 'Owner ID isn\'t valid';
                }
    
                $data['errors'] = $errors;
                $data['reception'] = array("reception_user_id"=>$reception_user_id);
                $data['employee'] = array("emp_id"=>$emp_id, "owner_user_id"=>$owner_user_id, "first_name"=>$first_name, "last_name"=>$last_name, "email"=>$email, "salary"=>$salary, "location"=>$location, "contact_num"=>$contact_num, "post"=>$post);
                  
                
                $errors = array_filter( $errors ); 
                
                if(count( $errors ) == 0) {
                    $data1 = array($emp_id, $first_name, $last_name, $email, $salary, $location, $contact_num, $post);
                    $db->setUpdateEmployee($data1);
                    $db->setOwnerId($owner_user_id);
                    $result = $db->getUpdateEmployee();
                    
                    if($result == 1) {
                        // Check This employee already receptionist
                        // $db1 = new Reception();
                        // $result = $db1->checkReception($emp_id);
                        $db->setEmployee_id($emp_id);
                        $result = $db->checkReception();
                        
                        if($result == 1) {
                            // Previous Reception but now not
                            if($post != "Reception") {
                                $db->setEmployee_id($emp_id);
                                $result =$db->removeReception();
                                //Query should run then not check it
                                
                            }
                            // location should change***************************************************
                            // after reception not can't go back
                            view::load("dashboard/employee/reception/editPost", ["success"=>"Employee Update Successfully", 'employee'=>$data['employee'], 'reception'=>$data['reception']]);
                        }
                        else {
                            // Previous Not Reception but now Reception 
                            if($post == "Reception") {
                                // check previous have and is_deleted =1
                                // have is_deleted =0
                                $db->setEmployee_id($emp_id);
                                $result1 = $db->getCheckDeleteReception();
                                if($result1 == 1) {
                                    // Exist the reception and is_deleted = 1
                                    $db->setEmployee_id($emp_id);
                                    $db->getUpdateReception();
                                }
                                else {
                                    $db->setEmployee_id($emp_id);
                                    $result = $db->getCreateReception();
                                }    
                            }
                            view::load("dashboard/employee/reception/editPost", ["success"=>"Employee Update Successfully", 'employee'=>$data['employee'], 'reception'=>$data['reception']]);
                        }
                        
                    }
                    else {
                        view::load("dashboard/employee/reception/editPost", ["newerror"=>"Data Update Unsuccessfully", 'employee'=>$data['employee'], 'reception'=>$data['reception']]);
                    }
                }
                else {
                    view::load("dashboard/employee/reception/editPost", $data);
                }
    
    
    
            }
        }


        
    }

    public function deleteEmployee($emp_id) {
        if(!isset($_SESSION['user_id'])) {
            // view::load('dashboard/dashboard');  
            $dashboard = new DashboardController();
            $dashboard->index();  
        }
        else {
            $db = new Reception();
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
        
        $errors = array();

        foreach($max_len_fields as $field => $max_len) {
            if(strlen(trim($_POST[$field])) > $max_len) {
                $errors[$field] = ' must be less than '. $max_len . ' characters';
            }
        }

        return $errors;
    }

    private function is_valid($text) {
        return(preg_match("/^([a-zA-Z' ]+)$/", $text));
    }

    // Only Contains numbers and length 4
    private function is_password($password) {
        return(preg_match("/^\d{4,4}$/", $password));
    }

    private function is_num($num) {
        return(preg_match('/^[0-9]+$/', $num));
    }
}
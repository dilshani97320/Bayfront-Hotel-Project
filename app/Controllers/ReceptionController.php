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
                $data['reception'] = $db->getSearchReception($search);
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
            $data['reception'] = $db->getDataReception($reception_user_id);
            view::load('dashboard/employee/reception/edit', $data);
        }
    }

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
                    $reception = $db->getReception($reception_user_id);
                    $emp_id = $reception['emp_id'];
                    $user_level = $reception['user_level'];
                    $result = $db->getUpdate($reception_user_id, $emp_id, $user_level, $username, $password);

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
}
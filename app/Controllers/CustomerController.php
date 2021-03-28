<?php 
session_start();

class CustomerController {

    public function selectOption() {
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();
        }
        else {
            view::load('dashboard/customer/selectOption');
        }
    }

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
                $db = new Customer();
                // $db->setSearchCustomer($search);
                $data['customer'] = $db->getSearchCustomer($search);
                //echo 'Error1';
                view::load('dashboard/customer/index', $data);
            }
            else {
                $db = new Customer();
                $data['customer'] = $db->getAllCustomer();
                // var_dump($data['customer']);
                // die();
                //echo 'Error2';
                view::load('dashboard/customer/index', $data);
            }
            
            
        }
           
    }

    public function details($customer_id) {
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();   
        }
        else {
            // Get Given Customer details
            $db = new Customer();
            $customer = $db->getCustomer($customer_id);

            $reservations = $db->getReservations($customer_id);

            $data['customer'] = $customer;
            $data['reservations'] = $reservations;

            view::load("dashboard/customer/view", $data);
         
            
        }
    }

    

    public function blacklistDetails($customer_id) {
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();   
        }
        else {
            // Get Given Customer details
            $db = new Customer();
            $customer = $db->getCustomer($customer_id);

            $reservations = $db->getReservationsBlacklist($customer_id);

            $data['customer'] = $customer;
            $data['reservations'] = $reservations;

            view::load("dashboard/customer/blacklistView", $data);
         
            
        }
    }

    public function blacklist() {
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
                $data['customer'] = $db->getBlacklistCustomerSeach($search);
                //echo 'Error1';
                view::load('dashboard/customer/indexBlacklist', $data);
            }
            else {
                $db = new Customer();
                $data['customer'] = $db->getAllBlacklistCustomer();
                // var_dump($data['customer']);
                // die();
                //echo 'Error2';
                // var_dump($data['customer']);
                // die();
                view::load('dashboard/customer/indexBlacklist', $data);
            }
            
            
        }
    }
}
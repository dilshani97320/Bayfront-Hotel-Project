<?php 
// session_start();

class DashboardController {

    public function index() {
        
        if(isset($_SESSION)) {
            $data = array();

            $db = new Dashboard();

            $resultRoom = $db->getRoomCount();
            $resultReservation = $db->getReservationCount();
            $resultIncome = $db->getReservationIncome();
            $resultEmployee = $db->getEmployeeCount();

            $data['details'] = array("rooms" => $resultRoom['total'], "reservations" => $resultReservation['total'], "income" => $resultIncome['total'], "employees" => $resultEmployee['total']);
            view::load('dashboard/dashboard', $data);
        }

        else {
            session_start();
            $data = array();

            $db = new Dashboard();

            $resultRoom = $db->getRoomCount();
            $resultReservation = $db->getReservationCount();
            $resultIncome = $db->getReservationIncome();
            $resultEmployee = $db->getEmployeeCount();

            $data['details'] = array("rooms" => $resultRoom['total'], "reservations" => $resultReservation['total'], "income" => $resultIncome['total'], "employees" => $resultEmployee['total']);
            view::load('dashboard/dashboard', $data);
        }
        
        // view::load('dashboard/dashboard');
           
    }

    public function index2($errors) {

        if(isset($_SESSION)) {
            $data = array();

            $db = new Dashboard();

            $resultRoom = $db->getRoomCount();
            $resultReservation = $db->getReservationCount();
            $resultIncome = $db->getReservationIncome();
            $resultEmployee = $db->getEmployeeCount();
            
            $data['errors'] = $errors;
            $data['details'] = array("rooms" => $resultRoom['total'], "reservations" => $resultReservation['total'], "income" => $resultIncome['total'], "employees" => $resultEmployee['total']);
            view::load('dashboard/dashboard', $data);
        }

        else {
            session_start();
            $data = array();

            $db = new Dashboard();

            $resultRoom = $db->getRoomCount();
            $resultReservation = $db->getReservationCount();
            $resultIncome = $db->getReservationIncome();
            $resultEmployee = $db->getEmployeeCount();
            
            $data['errors'] = $errors;
            $data['details'] = array("rooms" => $resultRoom['total'], "reservations" => $resultReservation['total'], "income" => $resultIncome['total'], "employees" => $resultEmployee['total']);
            view::load('dashboard/dashboard', $data);
        }
        
    }
}    

?>
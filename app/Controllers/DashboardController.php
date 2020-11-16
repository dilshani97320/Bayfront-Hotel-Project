<?php 
session_start();

class DashboardController {

    public function index() {
        
        $data = array();

        $db = new Dashboard();

        $resultRoom = $db->getRoomCount();
        $resultReservation = $db->getReservationCount();
        $resultIncome = $db->getReservationIncome();
        $resultEmployee = $db->getEmployeeCount();

        // echo $resultRoom['total'];
        // echo $resultEmployee['total'];
        // echo $resultReservation['total'];
        // echo $resultIncome['total'];
        $data['details'] = array("rooms" => $resultRoom['total'], "reservations" => $resultReservation['total'], "income" => $resultIncome['total'], "employees" => $resultEmployee['total']);
        view::load('dashboard/dashboard', $data);
        // view::load('dashboard/dashboard');
           
    }
}    

?>
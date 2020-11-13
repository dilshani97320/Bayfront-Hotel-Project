<?php 
session_start();

class DashboardController {

    public function index() {
        
        view::load('dashboard/dashboard');
           
    }
}    

?>
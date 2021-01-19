<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
class BookingController{
    
    public function index()
    {
        View::load('booknow');
    }


}

?>
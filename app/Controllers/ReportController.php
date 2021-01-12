<?php 
 session_start();

class ReportController {

   public function index() {
        
        //Checking if a user is logged in
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();   
        }
        else {
            view::load('dashboard/report/index');
            
        }
           
    }

    public function empdetails()
    {
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();   
        }
        else {
            //get employee details
            $employee=new Employee();//create a object from employee class(model/employee)
            $emp=$employee->getAllEmployeePdf();//get data from emplyee class /getallEmployee thamai data okkom arn emp varible akt demma
            // var_dump($emp);
            // die();
        
            $pdf = new MyEmppdfController();
//$pdf->AliasNoPages();
            $pdf->AddPage('L','A3',0);
            $pdf->headerTable();
            $pdf->viewTable($emp);
            $pdf->Ln();
            $pdf->output();

            
            //view::load('dashboard/report/employeepdf');
            
        }
    }




    public function roomdetails()
    {
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();   
        }
        else {
            //get employee details
            $room=new RoomDetails();//create a object from employee class(model/roomdetails)
            $room_details=$room->getAllRoomPdf();//get data from emplyee class /getallEmployee thamai data okkom arn emp varible akt demma
            // var_dump($emp);
            // die();
        
            $pdf = new MyRoompdfController();
//$pdf->AliasNoPages();
            $pdf->AddPage('L','A3',0);
            $pdf->headerTable();
            $pdf->viewTable($room_details);
            $pdf->Ln();
            $pdf->output();

            
            //view::load('dashboard/report/employeepdf');
            
        }
    }




    public function customerdetails()
    {
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();   
        }
        else {
            //get employee details
            $customer=new Reservation();//create a object from employee class(model/employee)
            $cust=$customer->getAllCustomerPdf();//get data from emplyee class /getallEmployee thamai data okkom arn emp varible akt demma
            // var_dump($emp);
            // die();
        
            $pdf = new MyCustomerpdfController();
//$pdf->AliasNoPages();
            $pdf->AddPage('L','A3',0);
            $pdf->headerTable();
            $pdf->viewTable($cust);
            $pdf->Ln();
            $pdf->output();

            
            //view::load('dashboard/report/employeepdf');
            
        }
    }


    public function paymentdetails()
    {
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();   
        }
        else {
            //get employee details
            $payment=new Reservation();//create a object from employee class(model/employee)
            $pay=$payment->getAllPaymentPdf();//get data from emplyee class /getallEmployee thamai data okkom arn emp varible akt demma
            // var_dump($emp);
            // die();
        
            $pdf = new MyPaymentpdfController();
//$pdf->AliasNoPages();
            $pdf->AddPage('L','A3',0);
            $pdf->headerTable();
            $pdf->viewTable($pay);
            $pdf->Ln();
            $pdf->output();

            
            //view::load('dashboard/report/employeepdf');
            
        }
    }




    public function reservationdetails()
    {
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();   
        }
        else {
            //get employee details
            $reservation=new Reservation();//create a object from employee class(model/employee)
            $res_details=$reservation->getAllReservationPdf();//get data from emplyee class /getallEmployee thamai data okkom arn emp varible akt demma
            // var_dump($emp);
            // die();
        
            $pdf = new MyReservationpdfController();
//$pdf->AliasNoPages();
            $pdf->AddPage('L','A3',0);
            $pdf->headerTable();
            $pdf->viewTable($res_details);
            $pdf->Ln();
            $pdf->output();

            
            //view::load('dashboard/report/employeepdf');
            
        }
    }



}    

?>
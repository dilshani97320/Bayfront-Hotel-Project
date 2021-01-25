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

    public function rview()
    {
        if(isset($_POST['generate'])) {
           
            // var_dump($_POST);
            // exit;
            $txtStartDate=$_POST['start_date'];
            date_default_timezone_set("Asia/Colombo");
            $txtEndDat = date('Y-m-d');
            $reser=new Report();//create a object from employee class(model/employee)
            $data['rooms']=$reser->reportt($txtStartDate, $txtEndDat);//get data from emplyee class /getallEmployee thamai data okkom arn emp varible akt demma
            $data['date'] = $txtStartDate;
            // var_dump($res_details);
            // exit;
            //  = $db->getSearchRoomAll($search);
            view::load('dashboard/report/rview', $data);
            
        }
    }
    public function reservationWebdetails()
    {
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();   
        }
        else {
           
            $data = array();
            $db = new Reservation();
            if(isset($_POST['search'])) {
                $search = $_POST['search'];
                                  
                    $data['rooms'] = $db->getSearchRoomAll($search);
                    view::load('dashboard/report/reservationView', $data);
            }
            else {
                $data['rooms'] = $db->getAllRoomAll();
                view::load('dashboard/report/reservationView', $data);
            }
        }
    }



    public function show_details($start_date,$end_date) {
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();
        }
        else {
            $db = new Reception();
            $data['report'] = $db->getAllReservation_durationPdf($start_date,$end_date);
            view::load('dashboard/report/reservation_details', $data);
        }
    }

    /*public function reservation_dateDuration()
    {
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();   
        }
        else {
            //get employee details
            $duration=new Reservation();//create a object from employee class(model/employee)
            $date=$duration->getAllReservation_durationPdf();//get data from emplyee class /getallEmployee thamai data okkom arn emp varible akt demma
            // var_dump($emp);
            // die();
        
            $pdf = new dateReportController();
//$pdf->AliasNoPages();
            $pdf->AddPage('L','A3',0);
            $pdf->headerTable();
            $pdf->viewTable($date,$start_date,$end_date);
            $pdf->Ln();
            $pdf->output();

            
            //view::load('dashboard/report/employeepdf');
            
        }
    }*/

    public function viewReservation($start_date) {
        // $txtStartDate=$_POST['start_date'];
        date_default_timezone_set("Asia/Colombo");
        $txtEndDat = date('Y-m-d');
        $reser=new Report();//create a object from employee class(model/employee)
        $rooms=$reser->reportt($start_date, $txtEndDat);//get data from emplyee class /getallEmployee thamai data okkom arn emp varible akt demma
        // $data['date'] = $txtStartDate;
        // echo "Hello";
        // die();
        $id = 1;
        $pdf = new PDFController();
//$pdf->AliasNoPages();
        // var_dump($rooms);
        // die();
        $pdf->AddPage('L','A3',0);
        $pdf->headerTable();
        $pdf->viewTable($rooms);
        $pdf->Ln();
        $pdf->output();
    }


}    

?>
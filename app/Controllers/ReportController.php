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
        
            $pdf = new MypdfController();
//$pdf->AliasNoPages();
            $pdf->AddPage('L','A3',0);
            $pdf->headerTable();
            $pdf->viewTable($emp);
            $pdf->Ln();
            $pdf->output();

            
            //view::load('dashboard/report/employeepdf');
            
        }
    }
}    

?>
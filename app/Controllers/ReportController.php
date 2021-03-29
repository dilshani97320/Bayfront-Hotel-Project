<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once 'Libs/TCPDF-main/tcpdf.php';
require_once 'PDF/BILLPDF.php';
require_once 'PDF/ReservationsPDF.php';
require_once 'PDF/ReceptionReservationPDF.php';
require_once 'PDF/ReportRangePDF.php';

class ReportController { 

    public function option($month_val=0, $year_val=0) {
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();
        }
        else {
            date_default_timezone_set("Asia/Colombo");
            $dateComponents = getdate();
    
            if($month_val != 0 && $year_val != 0) {
                $month = $month_val;
                $year = $year_val;
            }
            else {
                // $month = $dateComponents['month'];
                $month = date('m');
                // $year = $dateComponents['year'];
                $year = date('Y');
            }
            $class = "report";
            $method = "option";
            $dashboard = new DashboardController();
            $calendar = $dashboard->bookingCalendarDetails($month, $year, $class, $method);
            $data['calendar'] = $calendar;
            view::load('dashboard/reportpdf/selectOption',$data);
        }
    }  
    
    public function selectUserType() {
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();
        }
        else {
            view::load('dashboard/reportpdf/selectUserType');
        }
    }

    public function formViewRange() {
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();
        }
        else {
            view::load('dashboard/reportpdf/reportFormRange');
        }
    }

    public function generateCustomBill() {
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();
        }
        else {
            $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
            $customer_id = $POST['customer_id'];
            $first_name = $POST['first_name'];
            $last_name = $POST['last_name'];
            $email = $POST['email'];
            $contact_number = $POST['contact_number'];
            
            $total_price = $POST['total_price'];
            $amount = $POST['amount'];

            $dbcustomer = new Customer();
            $dbpayment = new Payment();
            $dbreservation = new Reservation();
            
            $customer = $dbcustomer->getCustomer($customer_id);
            $reservation = $dbreservation->getReservationsCheckOutDays($customer_id);
            // get reservation ID

            foreach($reservation as $row) {
                $reservationIDS[]= $row['reservation_id']; 
            }

            $totalPaidValue = 0;
            
            $length = count($reservationIDS);
            for($i=0; $i<$length ; $i++) {
                $paymentValuePaid = 0;
                $payment_details= $dbpayment->paymentDetails($reservationIDS[$i], $customer_id);
                if(!empty($payment_details)) {
                    foreach($payment_details as $row){
                        $paymentValuePaid = $paymentValuePaid + $row['amount'];
                    }
                }
                else {
                    $paymentValuePaid = 0;
                }
                $paymentValuePaid =  $paymentValuePaid/1000;
                $totalPaidValue = $totalPaidValue + $paymentValuePaid;
            }

            // create new PDF document
            // PDF_PAGE_ORIENTATION mean Portrait or Landscape
            // PDF_UNIT mean
            
            // date define for footer and header
            $TotalRoomPrice = 0;
            $totalDiscount = 0;
            $count = 0;
            foreach($reservation as $row) { 
                $count++;
                $discount = $row['discount_rate'];
                $totalDiscount = $totalDiscount + $discount;

                $date1=date_create($row['check_in_date']);
                $date2=date_create($row['check_out_date']);
                $diff=date_diff($date1,$date2);
                $days = $diff->format("%a");
                $total_price = $days*$row['price'];

                $total_price = $total_price;
                $real_price = $total_price - $total_price*($discount/100);

                $TotalRoomPrice = $TotalRoomPrice + $real_price;
            }
            $full_name = $first_name." ".$last_name;
            $Discount = $totalDiscount/$count;


            $pdf = new BILLPDF('p', 'mm', 'A4', true, 'UTF-8', false);
            $pdf->setData($full_name, $TotalRoomPrice, $Discount);
            

            // set document information
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Bayfront Hotel');
            $pdf->SetTitle('Customer Bill');
            $pdf->SetSubject('');
            $pdf->SetKeywords('');

            // set default header data
            $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
            $pdf->setFooterData(array(0,64,0), array(0,64,128));

            // set header and footer fonts
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

            // set default monospaced font
            $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

            // set margins
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            // set auto page breaks
            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            // set image scale factor
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

            // set some language-dependent strings (optional)
            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }

            // set default font subsetting mode
            $pdf->setFontSubsetting(true);

            // Set font
            // dejavusans is a UTF-8 Unicode font, if you only need to
            // print standard ASCII chars, you can use core fonts like
            // helvetica or times to reduce file size.
            $pdf->SetFont('dejavusans', '', 14, '', true);

            // Add a page
            // This method has several options, check the source code documentation for more information.
            $pdf->AddPage();

            $pdf->Ln(25);  // height

            date_default_timezone_set("Asia/Colombo");
            $current_date = date('Y-m-d');

            $pdf->SetFont('times', 'B', 12);
            $pdf->Cell(189, 3, 'Report as on :- '.$current_date, 0, 1, 'C');
            $pdf->Ln(5);

            
            $pdf->SetFont('times', 'B', 12);
            $pdf->Cell(35, 5, 'Full Name', 0, 0);
            $pdf->Cell(95, 5, ': '.$full_name.'', 0, 0);

            $pdf->Cell(59, 5, 'Customer ID: '.$customer_id.'', 0, 1);

            $pdf->Ln(1);

                    // 130+59 =  189
            $pdf->Cell(35, 5, 'Email', 0, 0);
            $pdf->Cell(95, 5, ': '.$email.'', 0, 0);
            $pdf->Cell(59, 5, 'Method: CASH/ONLINE ', 0, 1);

            $pdf->Ln(1);

            $pdf->Cell(35, 5, 'Contact Number', 0, 0);
            $pdf->Cell(95, 5, ': '.$contact_number.'', 0, 0);
            $pdf->Cell(59, 5, '', 0, 1);
            $pdf->Ln(1);

            $pdf->Cell(35, 5, 'Country', 0, 0);
            $pdf->Cell(95, 5, ': '.$customer['location'].'', 0, 0);
            $pdf->Cell(59, 5, '', 0, 1);

            $pdf->Ln(5);
            $pdf->SetFont('times', 'B', 15);
            $pdf->Cell(189, 5, 'Dear Customer You Have Following Reservations', 0, 1, 'C');
            $pdf->Ln(10); 

            $pdf->SetFont('times', '', 11);
            $pdf->SetFillColor(224, 235, 255);
                                                //Fill colour or not
            $pdf->Cell(20, 7, 'Re No', 0, 0 , 'C', 1);
            $pdf->Cell(60, 7, 'Room Name', 0, 0 , 'C', 1);
            $pdf->Cell(25, 7, 'Check-In ', 0, 0 , 'C', 1);
            $pdf->Cell(25, 7, 'Check-Out ', 0, 0 , 'C', 1);
            $pdf->Cell(10, 7, 'Days', 0, 0 , 'C', 1);
            $pdf->Cell(25, 7, 'Room Price', 0, 0 , 'C', 1);
            $pdf->Cell(25, 7, 'Total Price', 0, 0 , 'C', 1);
            $pdf->SetFont('times', '', 10);
            $pdf->Ln(3);


            $i = 1; // no of page start
            $max = 13; // when sl no == 6 go to next page

            $TotalRoomPrice = 0;
                // while($reservation = mysqli_fetch_array($query1)) {
            foreach($reservation as $row) {

                if (($i%$max) == 0) {
                    $pdf->AddPage();

                    $pdf->Ln(25);  // height

                    date_default_timezone_set("Asia/Colombo");
                    $current_date = date('Y-m-d');

                    $pdf->SetFont('times', 'B', 12);
                    $pdf->Cell(189, 3, 'Report as on :- '.$current_date, 0, 1, 'C');
                    $pdf->Ln(5);

                    $full_name = $first_name." ".$last_name;
                    $pdf->SetFont('times', 'B', 12);
                    $pdf->Cell(35, 5, 'Full Name', 0, 0);
                    $pdf->Cell(95, 5, ': '.$full_name.'', 0, 0);

                    $pdf->Cell(59, 5, 'Customer ID: '.$customer_id.'', 0, 1);

                    $pdf->Ln(1);

                            // 130+59 =  189
                    $pdf->Cell(35, 5, 'Email', 0, 0);
                    $pdf->Cell(95, 5, ': '.$email.'', 0, 0);
                    $pdf->Cell(59, 5, 'Payment Method: CASH', 0, 1);

                    $pdf->Ln(1);

                    $pdf->Cell(35, 5, 'Contact Number', 0, 0);
                    $pdf->Cell(95, 5, ': '.$contact_number.'', 0, 0);
                    $pdf->Cell(59, 5, '', 0, 1);
                    $pdf->Ln(1);

                    $pdf->Cell(35, 5, 'Country', 0, 0);
                    $pdf->Cell(95, 5, ': '.$customer['location'].'', 0, 0);
                    $pdf->Cell(59, 5, '', 0, 1);

                    $pdf->Ln(5);
                    $pdf->SetFont('times', 'B', 15);
                    $pdf->Cell(189, 5, 'Dear Customer You Have Following Reservations', 0, 1, 'C');
                    $pdf->Ln(10); 

                    $pdf->SetFont('times', '', 11);
                    $pdf->SetFillColor(224, 235, 255);
                                                        //Fill colour or not
                    $pdf->Cell(20, 7, 'Re No', 0, 0 , 'C', 1);
                    $pdf->Cell(60, 7, 'Room Name', 0, 0 , 'C', 1);
                    $pdf->Cell(25, 7, 'Check-In ', 0, 0 , 'C', 1);
                    $pdf->Cell(25, 7, 'Check-Out ', 0, 0 , 'C', 1);
                    $pdf->Cell(10, 7, 'Days', 0, 0 , 'C', 1);
                    $pdf->Cell(25, 7, 'Room Price', 0, 0 , 'C', 1);
                    $pdf->Cell(25, 7, 'Total Price', 0, 0 , 'C', 1);
                    $pdf->SetFont('times', '', 10);
                    $pdf->Ln(3);
                    $pdf->SetFont('times', '', 10);

                }

                $discount = $row['discount_rate'];
                $date1=date_create($row['check_in_date']);
                $date2=date_create($row['check_out_date']);
                $diff=date_diff($date1,$date2);
                $days = $diff->format("%a");
                $total_price = $days*$row['price'];
                $total_price = $total_price;
                $real_price = $total_price - $total_price*($discount/100);
                $TotalRoomPrice = $TotalRoomPrice + $real_price;
                            
                $pdf->Ln(6);
                $pdf->Cell(20, 4, $i, 0, 0 , 'C');
                $pdf->Cell(60, 4, ''.$row['room_name'].'', 0, 0 , 'C');
                $pdf->Cell(25, 4, ''.$row['check_in_date'].'', 0, 0 , 'C');
                $pdf->Cell(25, 4, ''.$row['check_out_date'].'', 0, 0 , 'C');
                $pdf->Cell(10, 4, ''.$days.'', 0, 0 , 'C');
                $pdf->Cell(25, 4, ''.$row['price'].'', 0, 0 , 'C');
                $pdf->Cell(25, 4, ''.$total_price.'', 0, 0 , 'C');
                $pdf->SetFont('times', '', 10);
                
                $i++;

            }
            
            // Close and output PDF document
            $pdf->Output('custom_bill.pdf', 'I');

        }

    }

    public function generateCustomerReservations() {
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();
        }
        else {
            $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
            $customer_id = $POST['customer_id'];
            

             // Get Given Customer details
            $dbcustomer = new Customer();
            // $dbpayment = new Payment();
            $customer = $dbcustomer->getCustomer($customer_id);

            $reservation = $dbcustomer->getReservations($customer_id);

            foreach($reservation as $row) {
                $reservationIDS[]= $row['reservation_id']; 
            }


            // create new PDF document
            // PDF_PAGE_ORIENTATION mean Portrait or Landscape
            // PDF_UNIT mean
            
            // date define for footer and header
            $TotalRoomPrice = 0;
            $totalDiscount = 0;
            $count = 0;
            $actualCount = 0;
            foreach($reservation as $row) { 
                $count++;
                // $discount = $row['discount_rate'];
                // $totalDiscount = $totalDiscount + $discount;
                if($row['check_out_status'] != NULL ) {
                    $actualCount++;
                    $date1=date_create($row['check_in_date']);
                    $date2=date_create($row['check_out_date']);
                    $diff= date_diff($date1,$date2);
                    $days = $diff->format("%a");
                    $total_price = $days*$row['price'];

                    $total_price = $total_price;
                    $real_price = $total_price;

                    $TotalRoomPrice = $TotalRoomPrice + $real_price;
                }
                
            }
            // $full_name = $first_name." ".$last_name;
            // $Discount = $totalDiscount/$count;

            // $TotalRoomPrice = 0;
            $full_name = $customer['first_name']." ".$customer['last_name'];


            $pdf = new ReservationsPDF('p', 'mm', 'A4', true, 'UTF-8', false);
            $pdf->setData($full_name, $TotalRoomPrice, $count, $actualCount);
            

            // set document information
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Bayfront Hotel');
            $pdf->SetTitle('Customer Reservations');
            $pdf->SetSubject('');
            $pdf->SetKeywords('');

            // set default header data
            $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
            $pdf->setFooterData(array(0,64,0), array(0,64,128));

            // set header and footer fonts
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

            // set default monospaced font
            $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

            // set margins
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            // set auto page breaks
            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            // set image scale factor
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

            // set some language-dependent strings (optional)
            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }

            // set default font subsetting mode
            $pdf->setFontSubsetting(true);

            // Set font
            // dejavusans is a UTF-8 Unicode font, if you only need to
            // print standard ASCII chars, you can use core fonts like
            // helvetica or times to reduce file size.
            $pdf->SetFont('dejavusans', '', 14, '', true);

            // Add a page
            // This method has several options, check the source code documentation for more information.
            $pdf->AddPage();

            $pdf->Ln(25);  // height

            date_default_timezone_set("Asia/Colombo");
            $current_date = date('Y-m-d');

            $pdf->SetFont('times', 'B', 12);
            $pdf->Cell(189, 3, 'Report as on :- '.$current_date, 0, 1, 'C');
            $pdf->Ln(5);

            
            $pdf->SetFont('times', 'B', 12);
            $pdf->Cell(35, 5, 'Full Name', 0, 0);
            $pdf->Cell(95, 5, ': '.$full_name.'', 0, 0);

            $pdf->Cell(59, 5, 'Customer ID: '.$customer['customer_id'].'', 0, 1);

            $pdf->Ln(1);

                    // 130+59 =  189
            $pdf->Cell(35, 5, 'Email', 0, 0);
            $pdf->Cell(95, 5, ': '.$customer['email'].'', 0, 0);
            $pdf->Cell(59, 5, 'Method: CASH/ONLINE ', 0, 1);

            $pdf->Ln(1);

            $pdf->Cell(35, 5, 'Contact Number', 0, 0);
            $pdf->Cell(95, 5, ': '.$customer['contact_number'].'', 0, 0);
            $pdf->Cell(59, 5, '', 0, 1);
            $pdf->Ln(1);

            $pdf->Cell(35, 5, 'Country', 0, 0);
            $pdf->Cell(95, 5, ': '.$customer['location'].'', 0, 0);
            $pdf->Cell(59, 5, '', 0, 1);

            $pdf->Ln(5);
            $pdf->SetFont('times', 'B', 15);
            $pdf->Cell(189, 5, 'Dear Customer You Have Following Reservations', 0, 1, 'C');
            $pdf->Ln(10); 

            $pdf->SetFont('times', '', 11);
            $pdf->SetFillColor(224, 235, 255);
                                                //Fill colour or not
            $pdf->Cell(20, 7, 'Re No', 0, 0 , 'C', 1);
            $pdf->Cell(60, 7, 'Room Name', 0, 0 , 'C', 1);
            $pdf->Cell(25, 7, 'Check-In ', 0, 0 , 'C', 1);
            $pdf->Cell(25, 7, 'Check-Out ', 0, 0 , 'C', 1);
            $pdf->Cell(10, 7, 'Days', 0, 0 , 'C', 1);
            $pdf->Cell(25, 7, 'Room Price', 0, 0 , 'C', 1);
            $pdf->Cell(25, 7, 'Total Price', 0, 0 , 'C', 1);
            $pdf->SetFont('times', '', 10);
            $pdf->Ln(3);


            $i = 1; // no of page start
            $max = 13; // when sl no == 6 go to next page

            $TotalRoomPrice = 0;
                // while($reservation = mysqli_fetch_array($query1)) {
            foreach($reservation as $row) {

                if (($i%$max) == 0) {
                    $pdf->AddPage();

                    $pdf->Ln(25);  // height

                    date_default_timezone_set("Asia/Colombo");
                    $current_date = date('Y-m-d');

                    $pdf->SetFont('times', 'B', 12);
                    $pdf->Cell(189, 3, 'Report as on :- '.$current_date, 0, 1, 'C');
                    $pdf->Ln(5);

                    $full_name = $customer['first_name']." ".$customer['last_name'];
                    $pdf->SetFont('times', 'B', 12);
                    $pdf->Cell(35, 5, 'Full Name', 0, 0);
                    $pdf->Cell(95, 5, ': '.$full_name.'', 0, 0);

                    $pdf->Cell(59, 5, 'Customer ID: '.$customer['customer_id'].'', 0, 1);

                    $pdf->Ln(1);

                            // 130+59 =  189
                    $pdf->Cell(35, 5, 'Email', 0, 0);
                    $pdf->Cell(95, 5, ': '.$customer['email'].'', 0, 0);
                    $pdf->Cell(59, 5, 'Payment Method: CASH', 0, 1);

                    $pdf->Ln(1);

                    $pdf->Cell(35, 5, 'Contact Number', 0, 0);
                    $pdf->Cell(95, 5, ': '.$customer['contact_number'].'', 0, 0);
                    $pdf->Cell(59, 5, '', 0, 1);
                    $pdf->Ln(1);

                    $pdf->Cell(35, 5, 'Country', 0, 0);
                    $pdf->Cell(95, 5, ': '.$customer['location'].'', 0, 0);
                    $pdf->Cell(59, 5, '', 0, 1);

                    $pdf->Ln(5);
                    $pdf->SetFont('times', 'B', 15);
                    $pdf->Cell(189, 5, 'Dear Customer You Have Following Reservations', 0, 1, 'C');
                    $pdf->Ln(10); 

                    $pdf->SetFont('times', '', 11);
                    $pdf->SetFillColor(224, 235, 255);
                                                        //Fill colour or not
                    $pdf->Cell(20, 7, 'Re No', 0, 0 , 'C', 1);
                    $pdf->Cell(60, 7, 'Room Name', 0, 0 , 'C', 1);
                    $pdf->Cell(25, 7, 'Check-In ', 0, 0 , 'C', 1);
                    $pdf->Cell(25, 7, 'Check-Out ', 0, 0 , 'C', 1);
                    $pdf->Cell(10, 7, 'Days', 0, 0 , 'C', 1);
                    $pdf->Cell(25, 7, 'Room Price', 0, 0 , 'C', 1);
                    $pdf->Cell(25, 7, 'Total Price', 0, 0 , 'C', 1);
                    $pdf->SetFont('times', '', 10);
                    $pdf->Ln(3);
                    $pdf->SetFont('times', '', 10);

                }

                // $discount = $row['discount_rate'];
                $discount = 0;
                $date1=date_create($row['check_in_date']);
                $date2=date_create($row['check_out_date']);
                $diff=date_diff($date1,$date2);
                $days = $diff->format("%a");
                $total_price = $days*$row['price'];
                $total_price = $total_price;
                $real_price = $total_price - $total_price*($discount/100);
                $TotalRoomPrice = $TotalRoomPrice + $real_price;
                            
                $pdf->Ln(6);
                $pdf->Cell(20, 4, $i, 0, 0 , 'C');
                $pdf->Cell(60, 4, ''.$row['room_name'].'', 0, 0 , 'C');
                if($row['check_out_status'] != NULL ) {
                    $pdf->Cell(25, 4, ''.$row['check_in_date'].'', 0, 0 , 'C');
                    $pdf->Cell(25, 4, ''.$row['check_out_date'].'', 0, 0 , 'C');
                    $pdf->Cell(10, 4, ''.$days.'', 0, 0 , 'C');
                    $pdf->Cell(25, 4, ''.$row['price'].'', 0, 0 , 'C');
                    $pdf->Cell(25, 4, ''.$total_price.'', 0, 0 , 'C');
                    $pdf->SetFont('times', '', 10);
                }
                else {
                    $pdf->SetFillColor(185, 59, 59);
                    $pdf->Cell(25, 4, ''.$row['check_in_date'].'', 0, 0 , 'C', 1);
                    $pdf->Cell(25, 4, ''.$row['check_out_date'].'', 0, 0 , 'C', 1);
                    $pdf->Cell(10, 4, ''.$days.'', 0, 0 , 'C');
                    $pdf->Cell(25, 4, ''.$row['price'].'', 0, 0 , 'C');
                    $pdf->Cell(25, 4, ''.$total_price.'', 0, 0 , 'C', 1);
                    $pdf->SetFont('times', '', 10);
                }
                
                
                $i++;

            }
            
            // Close and output PDF document
            $pdf->Output('customReservations_bill.pdf', 'I');

        }
    }


    public function generateReceptionReservations() {
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();
        }
        else {
            $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
            $reception_user_id = $POST['reception_id'];
            

             // Get Given Customer details
             $dbreception = new Reception();
             $dbreception->setReception($reception_user_id);
             $reception = $dbreception->getDataReception();

            $reservation = $dbreception->getReservationsReception($reception_user_id);

            foreach($reservation as $row) {
                $reservationIDS[]= $row['reservation_id']; 
            }


            // create new PDF document
            // PDF_PAGE_ORIENTATION mean Portrait or Landscape
            // PDF_UNIT mean
            
            // date define for footer and header
            $TotalRoomPrice = 0;
            $totalDiscount = 0;
            $count = 0;
            $actualCount = 0;
            foreach($reservation as $row) { 
                $count++;
                // $discount = $row['discount_rate'];
                // $totalDiscount = $totalDiscount + $discount;
                if($row['check_out_status'] != NULL ) {
                    $actualCount++;
                    $date1=date_create($row['check_in_date']);
                    $date2=date_create($row['check_out_date']);
                    $diff= date_diff($date1,$date2);
                    $days = $diff->format("%a");
                    $total_price = $days*$row['price'];

                    $total_price = $total_price;
                    $real_price = $total_price;

                    $TotalRoomPrice = $TotalRoomPrice + $real_price;
                }
                
            }
            // $full_name = $first_name." ".$last_name;
            // $Discount = $totalDiscount/$count;

            // $TotalRoomPrice = 0;
            $full_name = $reception['first_name']." ".$reception['last_name'];


            $pdf = new ReceptionReservationPDF('p', 'mm', 'A4', true, 'UTF-8', false);
            $pdf->setData($full_name, $TotalRoomPrice, $count, $actualCount);
            

            // set document information
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Bayfront Hotel');
            $pdf->SetTitle('Customer Reservations');
            $pdf->SetSubject('');
            $pdf->SetKeywords('');

            // set default header data
            $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
            $pdf->setFooterData(array(0,64,0), array(0,64,128));

            // set header and footer fonts
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

            // set default monospaced font
            $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

            // set margins
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            // set auto page breaks
            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            // set image scale factor
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

            // set some language-dependent strings (optional)
            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }

            // set default font subsetting mode
            $pdf->setFontSubsetting(true);

            // Set font
            // dejavusans is a UTF-8 Unicode font, if you only need to
            // print standard ASCII chars, you can use core fonts like
            // helvetica or times to reduce file size.
            $pdf->SetFont('dejavusans', '', 14, '', true);

            // Add a page
            // This method has several options, check the source code documentation for more information.
            $pdf->AddPage();

            $pdf->Ln(25);  // height

            date_default_timezone_set("Asia/Colombo");
            $current_date = date('Y-m-d');

            $pdf->SetFont('times', 'B', 12);
            $pdf->Cell(189, 3, 'Report as on :- '.$current_date, 0, 1, 'C');
            $pdf->Ln(5);

            
            $pdf->SetFont('times', 'B', 12);
            $pdf->Cell(35, 5, 'Full Name', 0, 0);
            $pdf->Cell(95, 5, ': '.$full_name.'', 0, 0);

            $pdf->Cell(59, 5, 'Reception ID: '.$reception['reception_user_id'].'', 0, 1);

            $pdf->Ln(1);

                    // 130+59 =  189
            $pdf->Cell(35, 5, 'Email', 0, 0);
            $pdf->Cell(95, 5, ': '.$reception['email'].'', 0, 0);
            $pdf->Cell(59, 5, 'POST: Reception ', 0, 1);

            $pdf->Ln(1);

            $pdf->Cell(35, 5, 'Contact Number', 0, 0);
            $pdf->Cell(95, 5, ': '.$reception['contact_num'].'', 0, 0);
            $pdf->Cell(59, 5, '', 0, 1);
            $pdf->Ln(1);

            $pdf->Cell(35, 5, 'Country', 0, 0);
            $pdf->Cell(95, 5, ': '.$reception['location'].'', 0, 0);
            $pdf->Cell(59, 5, '', 0, 1);

            $pdf->Ln(5);
            $pdf->SetFont('times', 'B', 15);
            $pdf->Cell(189, 5, 'Dear Reception You Have Following Reservations', 0, 1, 'C');
            $pdf->Ln(10); 

            $pdf->SetFont('times', '', 11);
            $pdf->SetFillColor(224, 235, 255);
                                                //Fill colour or not
            $pdf->Cell(20, 7, 'Re No', 0, 0 , 'C', 1);
            $pdf->Cell(60, 7, 'Room Name', 0, 0 , 'C', 1);
            $pdf->Cell(25, 7, 'Check-In ', 0, 0 , 'C', 1);
            $pdf->Cell(25, 7, 'Check-Out ', 0, 0 , 'C', 1);
            $pdf->Cell(10, 7, 'Days', 0, 0 , 'C', 1);
            $pdf->Cell(25, 7, 'Room Price', 0, 0 , 'C', 1);
            $pdf->Cell(25, 7, 'Total Price', 0, 0 , 'C', 1);
            $pdf->SetFont('times', '', 10);
            $pdf->Ln(3);


            $i = 1; // no of page start
            $max = 13; // when sl no == 6 go to next page

            $TotalRoomPrice = 0;
                // while($reservation = mysqli_fetch_array($query1)) {
            foreach($reservation as $row) {

                if (($i%$max) == 0) {
                    $pdf->AddPage();

                    $pdf->Ln(25);  // height

                    date_default_timezone_set("Asia/Colombo");
                    $current_date = date('Y-m-d');

                    $pdf->SetFont('times', 'B', 12);
                    $pdf->Cell(189, 3, 'Report as on :- '.$current_date, 0, 1, 'C');
                    $pdf->Ln(5);

                    $full_name = $reception['first_name']." ".$reception['last_name'];
                    $pdf->SetFont('times', 'B', 12);
                    $pdf->Cell(35, 5, 'Full Name', 0, 0);
                    $pdf->Cell(95, 5, ': '.$full_name.'', 0, 0);

                    $pdf->Cell(59, 5, 'Customer ID: '.$reception['reception_user_id'].'', 0, 1);

                    $pdf->Ln(1);

                            // 130+59 =  189
                    $pdf->Cell(35, 5, 'Email', 0, 0);
                    $pdf->Cell(95, 5, ': '.$reception['email'].'', 0, 0);
                    $pdf->Cell(59, 5, 'Payment Method: CASH', 0, 1);

                    $pdf->Ln(1);

                    $pdf->Cell(35, 5, 'Contact Number', 0, 0);
                    $pdf->Cell(95, 5, ': '.$reception['contact_num'].'', 0, 0);
                    $pdf->Cell(59, 5, '', 0, 1);
                    $pdf->Ln(1);

                    $pdf->Cell(35, 5, 'Country', 0, 0);
                    $pdf->Cell(95, 5, ': '.$reception['location'].'', 0, 0);
                    $pdf->Cell(59, 5, '', 0, 1);

                    $pdf->Ln(5);
                    $pdf->SetFont('times', 'B', 15);
                    $pdf->Cell(189, 5, 'Dear Reception You Have Following Reservations', 0, 1, 'C');
                    $pdf->Ln(10); 

                    $pdf->SetFont('times', '', 11);
                    $pdf->SetFillColor(224, 235, 255);
                                                        //Fill colour or not
                    $pdf->Cell(20, 7, 'Re No', 0, 0 , 'C', 1);
                    $pdf->Cell(60, 7, 'Room Name', 0, 0 , 'C', 1);
                    $pdf->Cell(25, 7, 'Check-In ', 0, 0 , 'C', 1);
                    $pdf->Cell(25, 7, 'Check-Out ', 0, 0 , 'C', 1);
                    $pdf->Cell(10, 7, 'Days', 0, 0 , 'C', 1);
                    $pdf->Cell(25, 7, 'Room Price', 0, 0 , 'C', 1);
                    $pdf->Cell(25, 7, 'Total Price', 0, 0 , 'C', 1);
                    $pdf->SetFont('times', '', 10);
                    $pdf->Ln(3);
                    $pdf->SetFont('times', '', 10);

                }

                // $discount = $row['discount_rate'];
                $discount = 0;
                $date1=date_create($row['check_in_date']);
                $date2=date_create($row['check_out_date']);
                $diff=date_diff($date1,$date2);
                $days = $diff->format("%a");
                $total_price = $days*$row['price'];
                $total_price = $total_price;
                $real_price = $total_price - $total_price*($discount/100);
                $TotalRoomPrice = $TotalRoomPrice + $real_price;
                            
                $pdf->Ln(6);
                $pdf->Cell(20, 4, $i, 0, 0 , 'C');
                $pdf->Cell(60, 4, ''.$row['room_name'].'', 0, 0 , 'C');
                if($row['check_out_status'] != NULL ) {
                    $pdf->Cell(25, 4, ''.$row['check_in_date'].'', 0, 0 , 'C');
                    $pdf->Cell(25, 4, ''.$row['check_out_date'].'', 0, 0 , 'C');
                    $pdf->Cell(10, 4, ''.$days.'', 0, 0 , 'C');
                    $pdf->Cell(25, 4, ''.$row['price'].'', 0, 0 , 'C');
                    $pdf->Cell(25, 4, ''.$total_price.'', 0, 0 , 'C');
                    $pdf->SetFont('times', '', 10);
                }
                else {
                    $pdf->SetFillColor(185, 59, 59);
                    $pdf->Cell(25, 4, ''.$row['check_in_date'].'', 0, 0 , 'C', 1);
                    $pdf->Cell(25, 4, ''.$row['check_out_date'].'', 0, 0 , 'C', 1);
                    $pdf->Cell(10, 4, ''.$days.'', 0, 0 , 'C');
                    $pdf->Cell(25, 4, ''.$row['price'].'', 0, 0 , 'C');
                    $pdf->Cell(25, 4, ''.$total_price.'', 0, 0 , 'C', 1);
                    $pdf->SetFont('times', '', 10);
                }
                
                
                $i++;

            }
            
            // Close and output PDF document
            $pdf->Output('receptionReservations_bill.pdf', 'I');

        }
    }


    public function reportRange() {
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();
        }
        else {
            date_default_timezone_set("Asia/Colombo");
            $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
            $start_date = $POST['start_date'];
            $end_date = $POST['end_date'];
            $cost = $POST['cost'];

            $errors[] = array();

            $result_start_date = $this->is_date($start_date);
            $result_end_date = $this->is_date($start_date);
            $result_cost = $this->is_num($cost);

            if($result_start_date == 0 || $result_end_date == 0) {
                $errors['date'] = 'Dates is Not valid';
            }

            if($result_cost == 0) {
                $errors['cost'] = 'Value is Not valid';
            }

            if($end_date < $start_date) {
                $errors['date'] = 'Dates is Not valid';
            }

            $datetime1 = date_create($start_date);
            $datetime2 = date_create($end_date);
  
            $interval = date_diff($datetime1, $datetime2);
            // echo $start_date;
            // echo $end_date;
            $days_value = $interval->format('%R%a ');
            $month_value = $interval->format('%R%m ');
            
            // echo $days_value;
            // echo "<br>";
            // echo $month_value;
            // echo "<br>";
            if($days_value < 28 || $days_value < 0) {
                $errors['date'] = 'Date Range is Must Month';
            }

            $errors = array_filter( $errors ); 
            $data['report'] = array("start_date"=> $start_date, "end_date"=> $end_date, "cost"=> $cost);  
            if(count( $errors ) != 0) {
                $data['errors'] = $errors;
                view::load('dashboard/reportpdf/reportFormRange', $data);
            }
            else {
                $customerReservation = new Reservation();

                // About Customers
                $customerResult1= $customerReservation->getCountCustomers($start_date, $end_date);
                $customerCount = $customerResult1['count'];

                // echo $customerCount;
                // echo "<br>";
                // Have to modify according to date
                
                $customerResult2= $customerReservation->getCountCheckedInCustomers($start_date, $end_date);
                $customerCheckedInCount = $customerResult2['count'];

                // echo $customerCheckedInCount;
                // echo "<br>";
                            
                 // Same checked in custmer may can blacklist
                $customerResult3= $customerReservation->getCountCheckedInNotCustomers($start_date, $end_date);
                $customerBlackListCount = $customerResult3['count'];

                // echo $customerBlackListCount;
                // echo "<br>";

                // Most reservation customer
                $customerActualPercentage = ($customerCheckedInCount/$customerCount)*100;
                $customerResult4 = $customerReservation->getMostReservationCustomers($start_date, $end_date);
                // $customerBlackListCount = $customerResult3['count'];

                $max = 0;
                foreach($customerResult4 as $row) {
                    if($max < $row['count']) {
                        $max = $row['count'];
                        $full_name = $row['first_name'].' '.$row['last_name'];
                    }
                }

                $customerMostReservationsName = $full_name;
                // echo $customerMostReservationsName;
                // echo "<br>";

                // About Employees
                $receptions = new Reception();
                $employee = new Employee();
                $reservation = new Reservation();

                // About Customers

                // All Employees
                $employeeResult1= $employee->getCountEmployees();
                $employeeCount = $employeeResult1['count'];

                // echo $employeeCount;
                // echo "<br>";

                // All Reception Employees
                $employeeResult2= $receptions->getCountReceptionEmployees();
                $employeeReceptionCount = $employeeResult2['count'];

                // echo $employeeReceptionCount;
                // echo "<br>";

                $employeeOtherCount = $employeeCount - $employeeReceptionCount;
                $employeeReservationGuranteePercentage = ($employeeReceptionCount/$employeeCount)*100;

                // echo $employeeReservationGuranteePercentage;
                // echo "<br>";

                // Most reservation reception
                $employeeResult3 = $reservation->getMostReservationReception($start_date, $end_date);
                $maxReception = 0;
                foreach($employeeResult3 as $row) {
                    if($maxReception < $row['count']) {
                        $maxReception = $row['count'];
                        $full_nameReception = $row['first_name'].' '.$row['last_name'];
                    }
                }

                // echo $full_nameReception;
                // echo "<br>";


                // About Reservations

                // All reservations
                $reservationResult1= $reservation->getCountAllReservations($start_date, $end_date);
                $reservationAllCount = $reservationResult1['count'];
                // echo $reservationAllCount;
                // echo "<br>";

                // All accept reservations
                $reservationResult2= $reservation->getCountAllAcceptReservations($start_date, $end_date);
                $reservationAllAcceptCount = $reservationResult2['count'];
                // echo $reservationAllAcceptCount;
                // echo "<br>";

                 // All checked in reservations
                 $reservationResult3= $reservation->getCountAllCheckedInReservations($start_date, $end_date);
                 $reservationAllCheckedInCount = $reservationResult3['count'];
                //  echo $reservationAllCheckedInCount;
                //  echo "<br>";

                 $reservationAllNotCheckedInCount = $reservationAllAcceptCount - $reservationAllCheckedInCount;
                //  echo $reservationAllNotCheckedInCount;
                //  echo "<br>";

                  // All online and walking guest in reservations
                  $reservationResult4= $reservation->getCountAllWalkingGuestReservations($start_date, $end_date);
                  $reservationAllWalkingGuestCount = $reservationResult4['count'];
                  $reservationAllOnlineCount = $reservationAllAcceptCount - $reservationAllWalkingGuestCount;

                //   echo $reservationAllOnlineCount;
                //   echo "<br>";

                //   echo $reservationAllWalkingGuestCount;
                //   echo "<br>";

                //   All online and cash payment reservations
                  $reservationResult5= $reservation->getCountAllOnlinePaymentReservations($start_date, $end_date);
                  $reservationAllOnlinePaymentCount = $reservationResult5['count'];

                  $reservationAllCashPaymentCount = $reservationAllAcceptCount - $reservationAllOnlinePaymentCount;

                //   echo $reservationAllOnlinePaymentCount;
                //   echo "<br>";

                //   echo $reservationAllCashPaymentCount;
                //   echo "<br>";

                // most income source
                if($reservationAllOnlineCount > $reservationAllWalkingGuestCount) {
                    $most_income_source = "Online";
                }
                else {
                    $most_income_source = "Walking Guest";
                }

                // echo $most_income_source;
                // echo "<br>";

                // most income Payment source
                if($reservationAllOnlinePaymentCount > $reservationAllCashPaymentCount) {
                    $most_income_payment_source = "ONLINE";
                }
                else {
                    $most_income_payment_source = "CASH";
                }

                // echo $most_income_payment_source;
                // echo "<br>";

                // most income room name
                $reservationResult6 = $reservation->getMostReservationIncomeRoom($start_date, $end_date);
                $maxRoom = 0;
                foreach($reservationResult6 as $row) {
                    if($maxRoom < $row['count']) {
                        $maxRoom = $row['count'];
                        $room_name = $row['room_name'];
                    }
                }

                // echo $room_name;
                // echo "<br>";

                // About Income

                // expect_total_income
                $TotalRoomPrice = 0;
                $reservationResult7 = $reservation->getExpectReservationIncome($start_date, $end_date);
                foreach($reservationResult7 as $row) { 
                    
                    $discount = $row['discount_rate'];
                    // $totalDiscount = $totalDiscount + $discount;
                    $date1=date_create($row['check_in_date']);
                    $date2=date_create($row['check_out_date']);
                    $diff=date_diff($date1,$date2);
                    $days = $diff->format("%a");
                    $total_price = $days*$row['price'];
    
                    $total_price = $total_price;
                    $real_price = $total_price - $total_price*($discount/100);
                    // Service charge
                    // echo $real_price;
                    // echo "=";
                    
                    $real_price_total = $real_price + $real_price*(10/100);
                    // echo $real_price_total;
                    // echo "<br>";
                    $TotalRoomPrice = $TotalRoomPrice + $real_price;
                }

                $expect_total_room_price = $TotalRoomPrice;

                // echo $expect_total_room_price;
                // echo "<br>";

                $totalAmountAccount = 0;
            
              
                $dbpayment = new Payment();

                foreach($reservationResult7 as $row){
                    $paymentValuePaid = 0;
                    $payment_details= $dbpayment->paymentDetails($row['reservation_id'], $row['customer_id']);
                    if(!empty($payment_details)) {
                        foreach($payment_details as $row){
                            $paymentValuePaid = $paymentValuePaid + $row['amount'];
                        }
                    }
                    else {
                        $paymentValuePaid = 0;
                    }
                    $paymentValuePaid =  $paymentValuePaid/1000;
                    $totalAmountAccount = $totalAmountAccount + $paymentValuePaid;
                }

                $total_amount_from_reservations = $totalAmountAccount; 
                // echo $total_amount_from_reservations;
                // echo "<br>";

                // echo gettype($cost);
                // echo "<br>";
                $month_count = (float)$month_value;
                $cost_value = (int)$cost;
                $total_cost = $cost_value*$month_count;
                // echo $total_cost;
                // echo "<br>";

                // total salary payment
                $employee = new Employee();
                $incomeResult3= $employee->getCountAllEmployee();
                // per month payment
                $employeePayment = $incomeResult3['sum'];
                $total_employeePayment = $employeePayment*$month_count;
                // echo $total_employeePayment;
                // echo "<br>";

                $total_profit = $total_amount_from_reservations - $total_cost - $total_employeePayment;
                // echo $total_employeePayment;
                // echo "<br>";

                 // create new PDF document
                // PDF_PAGE_ORIENTATION mean Portrait or Landscape
                // PDF_UNIT mean
                $pdf = new ReportRangePDF('p', 'mm', 'A4', true, 'UTF-8', false);

                // set document information
                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetAuthor('BayfrontHotel');
                $pdf->SetTitle('Range Report PDF');
                $pdf->SetSubject('');
                $pdf->SetKeywords('');

                // set default header data
                $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
                $pdf->setFooterData(array(0,64,0), array(0,64,128));

                // set header and footer fonts
                $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
                $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

                // set default monospaced font
                $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

                // set margins
                $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
                $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
                $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

                // set auto page breaks
                $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

                // set image scale factor
                $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

                // set some language-dependent strings (optional)
                if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                    require_once(dirname(__FILE__).'/lang/eng.php');
                    $pdf->setLanguageArray($l);
                }

                // set default font subsetting mode
                $pdf->setFontSubsetting(true);

                // Set font
                // dejavusans is a UTF-8 Unicode font, if you only need to
                // print standard ASCII chars, you can use core fonts like
                // helvetica or times to reduce file size.
                $pdf->SetFont('dejavusans', '', 14, '', true);

                // Add a page
                // This method has several options, check the source code documentation for more information.
                $pdf->AddPage();

                $pdf->Ln(25);  // height
                date_default_timezone_set("Asia/Colombo");
                $current_date = date('Y-m-d');
                $pdf->SetFont('times', 'B', 12);
                $pdf->Cell(189, 3, 'Report as on :- '.$current_date, 0, 1, 'C');
                $pdf->Ln(5);

                $pdf->SetFillColor(185, 59, 59);

                $pdf->SetFont('times', 'B', 15);
                $pdf->Cell(100, 5, 'About Customers', 0, 0,'', 1);
                $pdf->Cell(40, 5, '', 0, 0);

                $pdf->SetFont('times', 'B', 12);
                $pdf->Cell(20, 5, 'Start Date', 0, 0);
                $pdf->Cell(40, 5, ': '.$start_date.'', 0, 1);

                $pdf->Ln(1);

                $pdf->SetFont('times', 'B', 12);
                $pdf->Cell(15, 5, '', 0, 0);
                $pdf->Cell(100, 5, 'Total Number of Customers Access Reservations', 0, 0);
                $pdf->Cell(25, 5, ': '.$customerCount.'', 0, 0);

                $pdf->Cell(20, 5, 'End Date', 0, 0);
                $pdf->Cell(40, 5, ': '.$end_date.'', 0, 1);

                $pdf->Ln(1);

                $pdf->SetFont('times', 'B', 12);
                $pdf->Cell(15, 5, '', 0, 0);
                $pdf->Cell(100, 5, 'Total Number of Customers Check-in Reservations', 0, 0);
                $pdf->Cell(25, 5, ': '.$customerCheckedInCount.'', 0, 0);

                $pdf->Cell(20, 5, '', 0, 0);
                $pdf->Cell(40, 5, '', 0, 1);

                $pdf->Ln(1);

                $pdf->SetFont('times', 'B', 12);
                $pdf->Cell(15, 5, '', 0, 0);
                $pdf->Cell(100, 5, 'Total Number of Black List Customers', 0, 0);
                $pdf->Cell(25, 5, ': '.$customerBlackListCount.'', 0, 0);

                $pdf->Cell(20, 5, '', 0, 0);
                $pdf->Cell(40, 5, '', 0, 1);

                $pdf->Ln(1);

                $pdf->SetFont('times', 'B', 12);
                $pdf->Cell(15, 5, '', 0, 0);
                $pdf->Cell(100, 5, 'Actual Customer Percentage', 0, 0);
                $pdf->Cell(25, 5, ': '.$customerActualPercentage.'%', 0, 0);

                $pdf->Cell(20, 5, '', 0, 0);
                $pdf->Cell(40, 5, '', 0, 1);

                $pdf->Ln(1);
                $pdf->SetFillColor(63, 209, 82);
                $pdf->SetFont('times', 'B', 12);
                $pdf->Cell(15, 5, '', 0, 0);
                $pdf->Cell(100, 5, 'Most Reservations Check In Customer', 0, 0);
                $pdf->Cell(50, 5, ': '.$customerMostReservationsName.'', 0, 0, '', 1);

                $pdf->Cell(20, 5, '', 0, 0);
                $pdf->Cell(40, 5, '', 0, 1);

                $pdf->Ln(5);
                $pdf->SetFillColor(185, 59, 59);
                $pdf->SetFont('times', 'B', 15);
                $pdf->Cell(100, 5, 'About Employees', 0, 0, '', 1);
                $pdf->Cell(35, 5, '', 0, 0);

                $pdf->SetFont('times', 'B', 12);
                $pdf->Cell(20, 5, '', 0, 0);
                $pdf->Cell(40, 5, '', 0, 1);

                $pdf->Ln(1);
                $pdf->SetFont('times', 'B', 12);
                $pdf->Cell(15, 5, '', 0, 0);
                $pdf->Cell(100, 5, 'Total Number of Hotel Mangement Staff', 0, 0);
                $pdf->Cell(25, 5, ': '.$employeeCount.'', 0, 0);

                $pdf->Cell(20, 5, '', 0, 0);
                $pdf->Cell(40, 5, '', 0, 1);

                $pdf->Ln(1);

                $pdf->SetFont('times', 'B', 12);
                $pdf->Cell(15, 5, '', 0, 0);
                $pdf->Cell(100, 5, 'Total Number of Reception Employees', 0, 0);
                $pdf->Cell(25, 5, ': '.$employeeReceptionCount.'', 0, 0);

                $pdf->Cell(20, 5, '', 0, 0);
                $pdf->Cell(40, 5, '', 0, 1);

                $pdf->Ln(1);

                $pdf->SetFont('times', 'B', 12);
                $pdf->Cell(15, 5, '', 0, 0);
                $pdf->Cell(100, 5, 'Total Number of Other Employees', 0, 0);
                $pdf->Cell(25, 5, ': '.$employeeOtherCount.'', 0, 0);

                $pdf->Cell(20, 5, '', 0, 0);
                $pdf->Cell(40, 5, '', 0, 1);

                $pdf->Ln(1);

                $pdf->SetFont('times', 'B', 12);
                $pdf->Cell(15, 5, '', 0, 0);
                $pdf->Cell(100, 5, 'Reservation Guarantee Employee Percentage', 0, 0);
                $pdf->Cell(25, 5, ': '.$employeeReservationGuranteePercentage.'%', 0, 0);

                $pdf->Cell(20, 5, '', 0, 0);
                $pdf->Cell(40, 5, '', 0, 1);

                $pdf->Ln(1);
                $pdf->SetFillColor(63, 209, 82);
                $pdf->SetFont('times', 'B', 12);
                $pdf->Cell(15, 5, '', 0, 0);
                $pdf->Cell(100, 5, 'Most Reservations Handle Receptionist', 0, 0);
                $pdf->Cell(50, 5, ': '.$full_nameReception.'', 0, 0, '', 1);

                $pdf->Cell(20, 5, '', 0, 0);
                $pdf->Cell(40, 5, '', 0, 1);


                $pdf->Ln(5);

                $pdf->SetFillColor(185, 59, 59);
                $pdf->SetFont('times', 'B', 15);
                $pdf->Cell(100, 5, 'About Reservations', 0, 0, '', 1);
                $pdf->Cell(35, 5, '', 0, 0);

                $pdf->SetFont('times', 'B', 12);
                $pdf->Cell(20, 5, '', 0, 0);
                $pdf->Cell(40, 5, '', 0, 1);

                $pdf->Ln(1);
                $pdf->SetFont('times', 'B', 12);
                $pdf->Cell(15, 5, '', 0, 0);
                $pdf->Cell(100, 5, 'Total Number of Reservations System Do ', 0, 0);
                $pdf->Cell(25, 5, ': '.$reservationAllCount.'', 0, 0);

                $pdf->Cell(20, 5, '', 0, 0);
                $pdf->Cell(40, 5, '', 0, 1);

                $pdf->Ln(1);

                $pdf->SetFont('times', 'B', 12);
                $pdf->Cell(15, 5, '', 0, 0);
                $pdf->Cell(100, 5, 'Total Number of Accept Reservations ', 0, 0);
                $pdf->Cell(25, 5, ': '.$reservationAllAcceptCount.'', 0, 0);

                $pdf->Cell(20, 5, '', 0, 0);
                $pdf->Cell(40, 5, '', 0, 1);

                $pdf->Ln(1);

                $pdf->SetFont('times', 'B', 12);
                $pdf->Cell(15, 5, '', 0, 0);
                $pdf->Cell(100, 5, 'Total Number of Accept Reservations Check In', 0, 0);
                $pdf->Cell(25, 5, ': '.$reservationAllCheckedInCount.'', 0, 0);

                $pdf->Cell(20, 5, '', 0, 0);
                $pdf->Cell(40, 5, '', 0, 1);

                $pdf->Ln(1);

                $pdf->SetFont('times', 'B', 12);
                $pdf->Cell(15, 5, '', 0, 0);
                $pdf->Cell(100, 5, 'Total Number of Accept Reservations Not Check In', 0, 0);
                $pdf->Cell(25, 5, ': '.$reservationAllNotCheckedInCount.'', 0, 0);

                $pdf->Cell(20, 5, '', 0, 0);
                $pdf->Cell(40, 5, '', 0, 1);

                $pdf->Ln(1);

                $pdf->SetFont('times', 'B', 12);
                $pdf->Cell(15, 5, '', 0, 0);
                $pdf->Cell(100, 5, 'Total Number of Accept Online Reservations', 0, 0);
                $pdf->Cell(25, 5, ': '.$reservationAllOnlineCount.'', 0, 0);

                $pdf->Cell(20, 5, '', 0, 0);
                $pdf->Cell(40, 5, '', 0, 1);

                $pdf->Ln(1);

                $pdf->SetFont('times', 'B', 12);
                $pdf->Cell(15, 5, '', 0, 0);
                $pdf->Cell(100, 5, 'Total Number of Accept Walking Guest Reservations', 0, 0);
                $pdf->Cell(25, 5, ': '.$reservationAllWalkingGuestCount .'', 0, 0);

                $pdf->Cell(20, 5, '', 0, 0);
                $pdf->Cell(40, 5, '', 0, 1);

                $pdf->Ln(1);

                $pdf->SetFont('times', 'B', 12);
                $pdf->Cell(15, 5, '', 0, 0);
                $pdf->Cell(100, 5, 'Total Number of Accept Online Payment Reservations', 0, 0);
                $pdf->Cell(25, 5, ': '.$reservationAllOnlinePaymentCount.'', 0, 0);

                $pdf->Cell(20, 5, '', 0, 0);
                $pdf->Cell(40, 5, '', 0, 1);

                $pdf->Ln(1);

                $pdf->SetFont('times', 'B', 12);
                $pdf->Cell(15, 5, '', 0, 0);
                $pdf->Cell(100, 5, 'Total Number of Accept Cash Payment Reservations', 0, 0);
                $pdf->Cell(25, 5, ': '.$reservationAllCashPaymentCount.'', 0, 0);

                $pdf->Cell(20, 5, '', 0, 0);
                $pdf->Cell(40, 5, '', 0, 1);

                $pdf->Ln(1);


                $pdf->SetFillColor(63, 209, 82);

                $pdf->SetFont('times', 'B', 12);
                $pdf->Cell(15, 5, '', 0, 0);
                $pdf->Cell(100, 5, 'Most Reservations Income Source', 0, 0);
                $pdf->Cell(50, 5, ': '.$most_income_source.'', 0, 0, '', 1);

                $pdf->Cell(20, 5, '', 0, 0);
                $pdf->Cell(40, 5, '', 0, 1);

                $pdf->Ln(1);

                $pdf->SetFont('times', 'B', 12);
                $pdf->Cell(15, 5, '', 0, 0);
                $pdf->Cell(100, 5, 'Most Reservations Income Payment Source', 0, 0);
                $pdf->Cell(50, 5, ': '.$most_income_payment_source.'', 0, 0, '', 1);

                $pdf->Cell(20, 5, '', 0, 0);
                $pdf->Cell(40, 5, '', 0, 1);

                $pdf->Ln(1);

                $pdf->SetFont('times', 'B', 12);
                $pdf->Cell(15, 5, '', 0, 0);
                $pdf->Cell(100, 5, 'Most Reservations Income Room', 0, 0);
                $pdf->Cell(50, 5, ': '.$room_name.'', 0, 0, '', 1);

                $pdf->Cell(20, 5, '', 0, 0);
                $pdf->Cell(40, 5, '', 0, 1);

                $pdf->Ln(1);


                $pdf->Ln(5);
                $pdf->SetFillColor(185, 59, 59);
                $pdf->SetFont('times', 'B', 15);
                $pdf->Cell(100, 5, 'About Income', 0, 0, '', 1);
                $pdf->Cell(35, 5, '', 0, 0);

                $pdf->SetFont('times', 'B', 12);
                $pdf->Cell(20, 5, '', 0, 0);
                $pdf->Cell(40, 5, '', 0, 1);

                $pdf->SetFillColor(63, 209, 82);
                $pdf->Ln(1);
                $pdf->SetFont('times', 'B', 12);
                $pdf->Cell(15, 5, '', 0, 0);
                $pdf->Cell(100, 5, 'Total Amount of Expect From Reservations', 0, 0);
                $pdf->Cell(50, 5, ': Rs.'.$expect_total_room_price.'', 0, 0, '', 1);

                $pdf->Cell(20, 5, '', 0, 0);
                $pdf->Cell(40, 5, '', 0, 1);

                $pdf->Ln(1);

                $pdf->SetFont('times', 'B', 12);
                $pdf->Cell(15, 5, '', 0, 0);
                $pdf->Cell(100, 5, 'Total Amount From Reservations', 0, 0);
                $pdf->Cell(50, 5, ': Rs.'.$total_amount_from_reservations.'', 0, 0, '', 1);

                $pdf->Cell(20, 5, '', 0, 0);
                $pdf->Cell(40, 5, '', 0, 1);

                $pdf->Ln(1);

                $pdf->SetFont('times', 'B', 12);
                $pdf->Cell(15, 5, '', 0, 0);
                $pdf->Cell(100, 5, 'Total Amount for Maintainance', 0, 0);
                $pdf->Cell(50, 5, ': Rs.'.$total_cost.'', 0, 0, '', 1);

                $pdf->Cell(20, 5, '', 0, 0);
                $pdf->Cell(40, 5, '', 0, 1);

                $pdf->Ln(1);

                $pdf->SetFont('times', 'B', 12);
                $pdf->Cell(15, 5, '', 0, 0);
                $pdf->Cell(100, 5, 'Total Amount for Employess Salaries', 0, 0);
                $pdf->Cell(50, 5, ': Rs.'.$total_employeePayment.'', 0, 0, '', 1);

                $pdf->Cell(20, 5, '', 0, 0);
                $pdf->Cell(50, 5, '', 0, 1);

                $pdf->Ln(1);
                $pdf->SetFillColor(185, 59, 59);
                $pdf->SetFont('times', 'B', 12);
                $pdf->Cell(15, 5, '', 0, 0);
                $pdf->Cell(100, 5, 'Total Amount for Profit from Reservations', 0, 0);
                $pdf->Cell(50, 5, ': Rs.'.$total_profit.'', 0, 0,'', 1);

                $pdf->Cell(20, 5, '', 0, 0);
                $pdf->Cell(40, 5, '', 0, 1);

                $pdf->Ln(1);

            }

            if(count( $errors ) == 0) {
                // Close and output PDF document
                $pdf->Output('range_report.pdf', 'I');
            }
            

          
        }
    }

    private function is_num($num) {
        return(preg_match('/^[0-9]+$/', $num));
    }

    private function is_date($date) {
        return(preg_match("/\d{4}\-\d{2}-\d{2}/", $date));
    }
}
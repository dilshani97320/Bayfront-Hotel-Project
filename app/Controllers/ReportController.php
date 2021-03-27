<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once 'Libs/TCPDF-main/tcpdf.php';
require_once 'PDF/BILLPDF.php';
require_once 'PDF/ReservationsPDF.php';

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

}
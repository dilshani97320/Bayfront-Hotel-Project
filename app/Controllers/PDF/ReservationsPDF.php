<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


require_once 'Libs/TCPDF-main/tcpdf.php';

class ReservationsPDF extends TCPDF {

    public function setData($full_name, $TotalRoomPrice, $count, $actualCount){

        $this->full_name = $full_name;
        $this->totalRoomPrice = $TotalRoomPrice;
        $this->count = $count;
        $this->actualCount = $actualCount;

    }

    public function Header() {
        $imageFile = K_PATH_IMAGES.'logo.png';
        $this->Image($imageFile, 30, 10, 40, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        $this->Ln(5);  // font name size style
        $this->setFont('helvetica', 'B', 15);

        // 189 is total width of A4 page, height, border, line
        // Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $caligh='T', $valigh='M')

        $this->Cell(189, 5, 'Bayfront Hotel Mangement', 0, 1, 'C');
        $this->SetFont('helvetica', '', 10);
        $this->Cell(189, 3, '502, Bypass road', 0, 1, 'C');
        $this->Cell(189, 3, 'Weligama, Sri Lanka', 0, 1, 'C');
        // $this->Cell(189, 3, '1200, Bangladesh', 0, 1, 'C');
        $this->Cell(189, 3, 'Phone: +94 76 729 3945', 0, 1, 'C');
        $this->Cell(189, 3, 'Email: bayfrontweli45@gmail.com', 0, 1, 'C');
        $this->SetFont('helvetica', 'B', 13);
        $this->Ln(3); // space

        // Report type Name
        $this->Cell(189, 3, ''.$this->full_name.' Hotel Reservation(s) Bill', 0, 1, 'C');
        // $this->Ln(3);
    }

    public function Footer() {
        $this->SetY(-100); // Position at 15mm from bottom
        $this->Ln(5);
        $this->SetFont('times', 'B', 12);
        

        $this->SetFont('times', 'B', 12);
        $this->Cell(125, 5, '', 0, 0);
        $this->Cell(40, 5, 'Number of Reservations', 0, 0, 'R');
        $this->SetFont('times', '', 12);
        $this->Cell(20, 5, ''. $this->count.'', 0, 0, 'R');
        $this->Ln(6);

        $this->SetFont('times', 'B', 12);
        $this->Cell(125, 5, '', 0, 0);
        $this->Cell(40, 5, 'Number of Acutal Reservations', 0, 0, 'R');
        $this->SetFont('times', '', 12);
        $this->Cell(20, 5, ''. $this->actualCount.'', 0, 0, 'R');
        $this->Ln(6);

        
        // MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='',, $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
        $this->SetFont('times', 'B', 12);
        $this->Cell(125, 5, '', 0, 0);
        $this->Cell(40, 5, 'Subtotal', 0, 0, 'R');
        $this->SetFont('times', '', 12);
        $this->Cell(20, 5, ''.$this->totalRoomPrice.'', 0, 0, 'R');
        $this->Ln(6);

        

        $serviceCharge = $this->totalRoomPrice*(10/100);

        $this->SetFont('times', 'B', 12);
        $this->Cell(125, 5, '', 0, 0);
        $this->Cell(40, 5, 'Service Charge', 0, 0, 'R');
        $this->SetFont('times', '', 12);
        $this->Cell(20, 5, ''.$serviceCharge.'', 0, 0, 'R');
        $this->Ln(6);

        $this->SetFont('times', 'B', 12);
        $this->Cell(125, 5, '', 0, 0);
        $this->Cell(40, 5, 'Tax', 0, 0, 'R');
        $this->SetFont('times', '', 12);
        $this->Cell(20, 5, '0', 0, 0, 'R');
        $this->Ln(10);

        $Amount = $this->totalRoomPrice + $serviceCharge;
        $Amount = number_format($Amount, 2, '.', '');
        $this->SetFont('times', '', 11);
        $this->SetFillColor(224, 235, 255);
        $this->SetFont('times', 'B', 12);
        $this->Cell(115, 10, '', 0, 0);
        $this->Cell(40, 10, 'Invoice Total', 0, 0, 'C',1);
        $this->SetFont('times', '', 15);
        $this->Cell(30, 10, 'Rs. '.$Amount.'', 0, 0, 'C', 1);
        $this->Ln(6);


        $this->SetFont('times', 'B', 10);
        $this->Ln(15);
        $this->SetFont('times', 'B', 10);
        $this->Cell(20, 1, '___________________________', 0, 0);
        $this->Cell(118,1, '', 0, 0);
        $this->Cell(51, 1, '_____________________', 0, 1);
        
        $this->Cell(20, 5, 'Reception/Owner Signature', 0, 0);
        $this->Cell(118,5, '', 0, 0);
        $this->Cell(51, 5, 'Customer Signature',0,1);

        $this->Cell(7, 1, '', 0, 0);
        $this->Cell(182, 5, '', 0, 1);
        $this->Ln(15 );

        // Set font
        $this->SetFont('helvetica', 'I', 8);

        // Page number
        date_default_timezone_set("Asia/Colombo");
        $today = date("F j, Y/ g:i A", time());

        $this->Cell(25, 5, 'Generation Date Time: '.$today, 0, 0, 'L');
        $this->Cell(164, 5, 'Page '.$this->getAliasNumPage(). ' of '.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
    
    }
}
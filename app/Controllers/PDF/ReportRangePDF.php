<?php


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


require_once 'Libs/TCPDF-main/tcpdf.php';

class ReportRangePDF extends TCPDF {

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
    $this->Cell(189, 3, 'Hotel Summary Report', 0, 1, 'C');
    // $this->Ln(3);
}
public function Footer() {
    $this->SetY(-40); // Position at 15mm from bottom
    $this->SetFont('times', 'B', 10);
    $this->Ln(15);
    $this->SetFont('times', 'B', 10);
    $this->Cell(20, 1, '___________________________', 0, 0);
    $this->Cell(118,1, '', 0, 0);
    $this->Cell(51, 1, '_____________________', 0, 1);
    
    $this->Cell(20, 5, 'Owner Signature', 0, 0);
    $this->Cell(118,5, '', 0, 0);
    $this->Cell(51, 5, 'Reception(Main) Signature',0,1);

    $this->Ln(5 );

    // Set font
    $this->SetFont('helvetica', 'I', 8);

    // Page number
    date_default_timezone_set("Asia/Colombo");
    $today = date("F j, Y/ g:i A", time());

    $this->Cell(25, 5, 'Generation Date Time: '.$today, 0, 0, 'L');
    $this->Cell(164, 5, 'Page '.$this->getAliasNumPage(). ' of '.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');

}
}
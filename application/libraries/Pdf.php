<?php
include APPPATH.'third_party/fpdf/fpdf.php';

class PDF extends FPDF{
    // Page header
    function Header()
    {
        // Logo
        $this->Image(base_url().'assets/img/fdnb/logo.jpg',10,6,30);
       // Arial bold 15
        $this->SetFont('Arial','B',16);
        // Move to the right
        $this->Cell(40);
        // Title
        $this->Cell(30,20,utf8_decode('FDNB - Force de Défense National du BURUNDI'),0,0,'L');
        // Line break
        $this->Ln(20);
        $this->Line(10,40,200,40);
    }

    // Page footer
    function Footer()
    {
        $this->Line(10,290,200,290);
        // Position at 1.5 cm from bottom
        $this->SetY(-10);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,utf8_decode("Ceci est un rapport ayant des donnees de test"),0,0,'C');
        // $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
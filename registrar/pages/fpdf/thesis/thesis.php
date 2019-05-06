<?php

require_once("fpdf.php");

$pdf = new FPDF();
$pdf -> AddPage();

$pdf -> SetTitle("Thesis", true);

$pdf -> SetFont('Arial','B', 12);
$pdf -> SetTextColor(253, 12, 120);

$pdf -> Cell(95, 10, "City College of Tagaytay", 1, 0,'C');
$pdf -> Cell(95, 10, "City College of Tagaytay", 1, 1,"C"); 

$pdf -> Output();
?>
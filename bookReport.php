<?php
require('fpdf.php');
include_once 'db.inc.php';

$sql = "SELECT * FROM books ORDER BY name ASC;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'Knygu ataskaita',0,1,'C');
$pdf->Ln(10);

$pdf->SetFont('Arial','',12);
$pdf->Cell(90,10,'Knygos pavadinimas',1);
$pdf->Cell(90,10,'Knygos autorius',1);
$pdf->Cell(50,10,'ISBN',1);
$pdf->Cell(50,10,'Leidimo metai',1);
$pdf->Cell(50,10,'Turimas kiekis',1);
$pdf->Ln();

while($row=mysqli_fetch_assoc($result)){
    $pdf->Cell(90,10,$row['name'],1);
    $pdf->Cell(90,10,$row['author'],1);
    $pdf->Cell(50,10,$row['isbn'],1);
    $pdf->Cell(50,10,$row['y'],1);
    $pdf->Cell(50,10,$row['quantity'],1);
    $pdf->Ln();
}
$pdf->Output('D', 'ataskaita.pdf');
header("Location: books.php");


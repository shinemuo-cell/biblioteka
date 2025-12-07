<?php
require('fpdf.php');
include_once 'db.inc.php';

$sql = "SELECT * FROM books ORDER BY name ASC;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10,'Knygu ataskaita',0,1,'C');
$pdf->Ln(10);

$pdf->SetFont('Arial','',9);
if($resultCheck>0){
    $pdf->Cell(50,7,'Knygos pavadinimas',1);
    $pdf->Cell(50,7,'Knygos autorius',1);
    $pdf->Cell(30,7,'ISBN',1);
    $pdf->Cell(30,7,'Leidimo metai',1);
    $pdf->Cell(30,7,'Turimas kiekis',1);
    $pdf->Ln();

    while($row=mysqli_fetch_assoc($result)){
        $pdf->Cell(50,7,$row['name'],1);
        $pdf->Cell(50,7,$row['author'],1);
        $pdf->Cell(30,7,$row['isbn'],1);
        $pdf->Cell(30,7,$row['y'],1);
        $pdf->Cell(30,7,$row['quantity'],1);
        $pdf->Ln();
    }
}else{
    $pdf->Cell(0,10,'Knygų nėra',0,1,'C');
}

$pdf->Output('D', 'ataskaita.pdf');



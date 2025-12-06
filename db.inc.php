<?php
#kodas skirtas prijungti db prie svetaines (naudojau xampp)

#duomenys turi buti nustatyti default, taip kad keisti nereikia
$dbServername="localhost";
$dbUsername="root";
$dbPassword='';
$dbName="library";//db pavadinimas (pas mane toks)
// $dbPort=3307;//pas mane buvo problemos su port todel reikalinga sita eilute
#jei port nekeitet tai tiesiog istrinkit eilute is cia ir apatinej eil.

$conn=mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
// prid4ti dbport jei reikia

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
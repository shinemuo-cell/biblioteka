<?php
#kodas skirtas prijungti db prie svetaines (naudojau xampp)

$dbServername="localhost";
$dbUsername="root";
$dbPassword='';
$dbName="library";//db pavadinimas (pas mane toks)
#duomenys turi buti nustatyti default, taip kad keisti nereikia

$conn=mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);

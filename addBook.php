<?php

session_start();
include_once 'db.inc.php';


if (isset($_POST['submit'])) {
    
 
    if ($_SESSION['role'] !== 'admin' && $_SESSION['role'] !== 'employee') {

        header("Location: books.php?error=unauthorized_access");
        exit();
    }


    $name = mysqli_real_escape_string($conn, $_POST['bookNames']);
    $added_quantity = mysqli_real_escape_string($conn, $_POST['addQuantity']);

    if (!is_numeric($added_quantity) || $added_quantity < 1) {

        header("Location: books.php?error=invalidquantity");
        exit();
    }


    $sql = "UPDATE books SET quantity = quantity + '$added_quantity' WHERE name = '$name';";


    if (mysqli_query($conn, $sql)) {

        header("Location: books.php?success=quantityupdated");
        exit(); 
    } else {

        header("Location: books.php?error=db_update_failed");
        exit();
    }
} else {

    header("Location: books.php");
    exit();
}
?>
<?php
include_once 'db.inc.php';

// Apsauga nuo SQL injekciju
$name = mysqli_real_escape_string($conn, $_POST['bookNames']);
$added_quantity = mysqli_real_escape_string($conn, $_POST['addQuantity']);

if (!is_numeric($added_quantity) || $added_quantity < 1) {
    header("Location: ../books.php?error=invalidquantity");
    exit();
}

// Naudojame 'quantity = quantity + $added_quantity'
$sql = "UPDATE books SET quantity = quantity + '$added_quantity' WHERE name = '$name';";

if (mysqli_query($conn, $sql)) {
    header("Location: ../books.php?success=quantityupdated");
} else {
    header("Location: ../books.php?error=db_update_failed");
}
exit();
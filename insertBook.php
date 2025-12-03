<?php
include_once 'db.inc.php';

$name = mysqli_real_escape_string($conn, $_POST['name']);
$author = mysqli_real_escape_string($conn, $_POST['author']);
$isbn = mysqli_real_escape_string($conn, $_POST['isbn']);
$y = mysqli_real_escape_string($conn, $_POST['y']);
$quantity = mysqli_real_escape_string($conn, $_POST['quantity']);

$sql = "INSERT INTO books (name, author, y, isbn, quantity)
         VALUES ('$name', '$author', '$y', '$isbn', '$quantity');";

if (mysqli_query($conn, $sql)) {
    header("Location: ../books.php?success=bookadded");
} else {

    header("Location: ../books.php?error=db_insert_failed");
}
exit();
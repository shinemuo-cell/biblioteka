<?php
include 'db.inc.php';

session_start();
if ($_SESSION['role'] !== 'admin' && $_SESSION['role'] !== 'employee') {
    die("Neturite teisės atlikti šios operacijos.");
}

$user_id = $_GET['id'] ?? null;
$book_name = $_GET['book_name'] ?? null;
$book_id = $_GET['book_id'] ?? null; 

if ($user_id && $book_name) {
    $sql_delete = "DELETE FROM taken_books WHERE user_id = ? AND name = ?";
    $stmt_delete = $conn->prepare($sql_delete);
    $stmt_delete->bind_param("is", $user_id, $book_name);
    $delete_success = $stmt_delete->execute();
    $stmt_delete->close();
} else {
    header("Location: ../skaitytojai.php?error=missing_parameters");
    exit();
}



if ($book_id && $delete_success) {
    $updateQuantitySql = "UPDATE books SET quantity = quantity + 1 WHERE id = ?";
    $stmt_update = $conn->prepare($updateQuantitySql);
    $stmt_update->bind_param("i", $book_id);
    $stmt_update->execute();
    $stmt_update->close();
    
if ($book_id) {

    header("Location: ../books.php?return=success"); 
} else {

    header("Location: ../books.php?return=fail");
}

exit();
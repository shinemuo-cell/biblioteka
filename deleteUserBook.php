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


if ($delete_success && $book_id) {
    $updateQuantitySql = "UPDATE books SET quantity = quantity + 1 WHERE id = ?";
    $stmt_update = $conn->prepare($updateQuantitySql);
    $stmt_update->bind_param("i", $book_id);
    
    if ($stmt_update->execute()) {

        header("Location: ../skaitytojai.php?return=success");
    } else {

        header("Location: ../skaitytojai.php?return=book_quantity_update_fail");
    }
    $stmt_update->close();
} elseif ($delete_success) {

    header("Location: ../skaitytojai.php?return=delete_success_no_quantity_update");
} else {

    header("Location: ../skaitytojai.php?return=delete_fail");
}

exit();
?>
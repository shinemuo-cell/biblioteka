<?php
include_once 'db.inc.php';
session_start();

if ($_SESSION['role'] !== 'admin') {
    die("Neturite teisės trinti darbuotojų.");
}

if (isset($_GET['id'])) {

    $employee_id = (int) $_GET['id'];
    
    $sql = "DELETE FROM employees WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $employee_id);
    
    if ($stmt->execute()) {
        header("Location: ../darbuotojai.php?delete=success");
    } else {
        header("Location: ../darbuotojai.php?delete=error");
    }
    $stmt->close();

} else {
    header("Location: ../darbuotojai.php");
}
exit();
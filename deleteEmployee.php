<?php
include_once 'db.inc.php';


if (isset($_GET['id'])) {

    $employee_id = (int) $_GET['id'];
    

    $sql = "DELETE FROM employees WHERE id = '$employee_id';";
    

    if (mysqli_query($conn, $sql)) {

        header("Location: ../darbuotojai.php?delete=success");
    } else {

        header("Location: ../darbuotojai.php?delete=error");
    }
} else {

    header("Location: ../darbuotojai.php");
}
exit();
<?php
session_start();
include 'db.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loginname = $_POST['loginname'];
    $password = $_POST['password'];
    $role = $_POST['role']; 

    if ($role == "user") {
        $sql = "SELECT * FROM user WHERE loginname = ?";
    } elseif ($role == "employee") {
        $sql = "SELECT * FROM employee WHERE loginname = ?";
    } elseif ($role == "admin") {
        $sql = "SELECT * FROM admin WHERE loginname = ?";
    }
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $account = $result->fetch_assoc();

    if ($account && password_verify($password, $account['pass'])) {
        $_SESSION["id"] = $account["id"];
        $_SESSION["username"] = $account["loginname"];
        $_SESSION["role"]= $role;

        if ($role == 'admin') {
            header("Location: ../darbuotojai.php");
        } elseif ($role == 'employee') {
            header("Location: ../skaitytojai.php");
        } else {
            header("Location: ../user.php");
        }
        exit;

    } else {
        header("Location: ../loginPage.php");
    }

}

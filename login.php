<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role']; 

    if ($role == "user") {
        $sql = "SELECT * FROM user WHERE username = ?";
    } elseif ($role == "employee") {
        $sql = "SELECT * FROM employee WHERE username = ?";
    } elseif ($role == "admin") {
        $sql = "SELECT * FROM admin WHERE username = ?";
    }
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $account = $result->fetch_assoc();

    if ($account && password_verify($password, $account['password'])) {
        $_SESSION["id"] = $account["id"];
        $_SESSION["username"] = $account["username"];
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
        echo "Neteisingas prisijungimas!";
    }

}

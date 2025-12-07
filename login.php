<?php
session_start();
include 'db.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loginname = $_POST['loginname'];
    $password = $_POST['password'];
    $role = $_POST['role']; 
    $sql;
    if ($role == "user") {
        $sql = "SELECT * FROM users WHERE loginname = ?";
    } elseif ($role == "employee") {
        $sql = "SELECT * FROM employees WHERE loginname = ?";
    } elseif ($role == "admin") {
        $sql = "SELECT * FROM admins WHERE loginname = ?";
    }
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $loginname);
    $stmt->execute();
    $result = $stmt->get_result();
    $account = $result->fetch_assoc();
	var_dump($account);
var_dump($password);
    if ($account && $password === $account['pass']) {
        $_SESSION["id"] = $account["id"];
        $_SESSION["username"] = $account["loginname"];
        $_SESSION["role"]= $role;

        if ($role == 'admin') {
            header("Location: darbuotojai.php");
        } elseif ($role == 'employee') {
            header("Location: skaitytojai.php");
        } else {
            header("Location: user.php");
        }
        exit;

    } else {
        header("Location: loginPage.php");
	exit;
    }

}

<?php
session_start();
include_once 'db.inc.php';

if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'user') {
    die("Neturite teisės atlikti šio veiksmo.");
}


if (isset($_POST['submit'])) {
    
    $user_id = $_SESSION['id']; 

   
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
   
    $number = $_POST['pazymejimas']; 

    
    $sql = "UPDATE users 
            SET name = ?, 
                surname = ?, 
                email = ?, 
                phone = ?, 
                number = ? 
            WHERE id = ?";

    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
   
        $stmt->bind_param("sssssi", $name, $surname, $email, $phone, $number, $user_id);
        
        if ($stmt->execute()) {
         
            header("Location: user.php?update=success");
            exit();
        } else {
         
            echo "Klaida atnaujinant duomenis: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Klaida ruošiant užklausą: " . $conn->error;
    }

} else {
   
    header("Location: user.php");
    exit();
}
?>
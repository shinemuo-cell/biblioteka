<?php
#kodas skirtas prijungti db prie svetaines (naudojau xampp)

$dsn = "mysql:host=localhost;dbname=library";
#host nurodo kur pasiekti svetaine (standartinis, keistis neturetu)
#dbname db pavadinimas, as pasivadinau library, pas jus gali buti kitaip (jei ka pasikeiskit i savo)

$dbusername = "root";
$dbpassword = "";
#standartiniai dauomenys (pas visus default vienodai nebent pasikeitet arba naudojat mac)

try{
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die ("Connection failed: " . $e->getMessage());
}


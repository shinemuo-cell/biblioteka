<?php
include_once 'db.inc.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Darbuotojai</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>
        <header>
            <b><a class="logo">Bibliotekos valdymo sistema</a></b>
            <nav>
                <b><a class="pageLink">Knygos</a></b>
                <b><a class="pageLink">Skaitytojai</a></b>
                <b><a class="pageLink">Darbuotojai</a></b>
                <b><a class="pageLink">Atsijungti</a></b>
            </nav>
        </header>
        <main>
            <h1>Darbuotojai</h1>
            <div>
                <?php
                    $sql="SELECT * FROM employees;";
                    $result=mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);
                    if($resultCheck>0){
                        while($row=mysqli_fetch_assoc($result)){
                            echo "<div>
                            <p>". $row["name"]."</p>
                            <p>". $row["surname"]."</p>
                            <p>". $row["email"]."</p>
                            <p>". $row["phone"]."</p>
                            
                            </div>";
                        }
                    }else{
                        echo "<p>Darbuotoju nera</p>";
                    }
                    
                ?>
            </div>
        </main>
        <footer>
            Kaunas, 2025. © Kristina DB, Viltė I., Vasarė M.
        </footer>
    </body>
</html>


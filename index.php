<?php
// Prisijungimas prie duomenų bazės jos ner da
include_once 'db.inc.php'; 
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bibliotekos valdymo sistema</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
        crossorigin="anonymous">
    </head>
    <body>
        <header>
            <b><a class="logo">Bibliotekos valdymo sistema</a></b>
            <nav>
                <a class="pageLink" href="books.php">Knygos</a>
                <a class="pageLink" href="user.php">Paskyra</a> 
                <a class="pageLink" href="darbuotojai.html">Darbuotojai</a>
                <a class="pageLink">Atsijungti</a>
            </nav>
        </header>
        
        <main>
            <div class="container text-center py-5">
                <h1>Sveiki atvykę į Bibliotekos Valdymo Sistemą</h1>
                
                <div class="buttonContainer mt-5">
                    <a href="books.php" class="btn btn-lg btn-secondary">
                        Peržiūrėti knygas
                    </a>
                    <a href="user.php" class="btn btn-lg btn-secondary">
                        Mano paskyra
                    </a>
                </div>
            </div>
        </main>
        
        <footer>
            Kaunas, 2025. © Kristina DB, Viltė I., Vasarė M.
        </footer>
        <script src="script.js">
        </script>
    </body>
</html>
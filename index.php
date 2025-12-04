<?php
// Prisijungimas prie duomenų bazės jos ner da
include_once 'db.inc.php'; 
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pagrindinis</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
        crossorigin="anonymous">
    </head>
    <body>
        <header>
            <b><a class="logo" href="index.php">Bibliotekos valdymo sistema</a></b>
            <nav>
                <a class="pageLink" >Pagrindinis</a>
                <a class="pageLink" >Prisijungti</a> 
            </nav>
        </header>
        
        <main>
            <h3>Puslapio zemelapis</h3>
            <h3>Duomenys</h3>
        </main>
        
        <footer>
            Kaunas, 2025. © Kristina DB, Viltė I., Vasarė M.
        </footer>
        <script src="script.js">
        </script>
    </body>
</html>
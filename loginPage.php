<?php
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
                <a class="pageLink" href="index.php">Pagrindinis</a>
                <a class="pageLink" href="loginPage.php" >Prisijungti</a> 
            </nav>
        </header>
        <main>
            <h3>Prisijungti</h3>
            <div>
                <form method="POST" action="login.php">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Prisijungimo vardas</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="loginname">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Slaptazodis</label>
                        <input type="password" class="form-control" id="formGroupExampleInput2" name="password">
                    </div>
                    <select class="form-select" aria-label="Default select example" name="role">
                    <option selected>Vartotojo tipas</option>
                    <option value="user">Skaitytojas</option>
                    <option value="employee">Darbuotojas</option>
                    <option value="admin">Administratorius</option>
                    </select>
                    <button type="submit">Prisijungti</button>
                </form>
                <a href="registration.php">Sukurti paskyra</a>
            </div>
        </main>
        
        <footer>
            Kaunas, 2025. © Kristina DB, Viltė I., Vasarė M.
        </footer>
        <script src="script.js">
        </script>
    </body>
</html>
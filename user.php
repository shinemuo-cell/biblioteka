<?php
// Prisijungimas prie duomenų baz
include_once 'db.inc.php'; 

// 1. Pavyzdiniai duomenys (is db bus kai bus db)
$vardas = "Vardas";
$pavarde = "Pavardė";
$epastas = "vardas.pavarde@gmail.com";
$telNr = "+37000000000";
$pazymejimoNr = "0000000000";

// 2. Pavyzdiniai Isduotų Knygų Duomenys (is db kai bus)
$isduotosKnygos = [
    ['Pavadinimas1', 'Autorius1', '1', '2026-01-10'],
    ['Pavadinimas2', 'Autorius2', '2', '2026-02-15'],
    ['Pavadinimas3', 'Autorius3', '3', '2026-01-28'],
    // Pridėta daugiau eilučių, kad atspindėtų pavyzdį nuotraukoje:
    ['Pavadinimas4', 'Autorius4', '4', '2026-03-01'],
    ['Pavadinimas5', 'Autorius5', '5', '2026-03-05'],
    ['Pavadinimas6', 'Autorius6', '6', '2026-03-10'],
];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Paskyra</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" crossorigin="anonymous">
        
        <style>
            .user-info-section {
                padding: 20px;
                border: 1px solid #ccc;
                margin-bottom: 40px;
                background-color: #50688a;
            }
            .user-info-section p {
                margin-bottom: 10px;
            }
            .user-info-section .d-flex {
                justify-content: flex-end;
            }
        </style>
    </head>
    <body>
        <header>
            <b><a class="logo" href="index.php">Bibliotekos valdymo sistema</a></b>
            <nav>
                <a class="pageLink" href="books.php">Knygos</a>
                <a class="pageLink" href="user.php">Paskyra</a> 
                <a class="pageLink" href="darbuotojai.html">Darbuotojai</a>
                <a class="pageLink">Atsijungti</a>
            </nav>
        </header>
        
        <main>
            <div class="container p-5">
                <div class="user-info-section mb-5">
                    
                    <p><strong>Vartotojas:</strong> <?php echo $vardas . ' ' . $pavarde; ?></p>
                    <p><strong>E. paštas:</strong> <?php echo $epastas; ?></p>
                    <p><strong>Tel. nr.:</strong> <?php echo $telNr; ?></p>
                    <p><strong>Pažymėjimo nr.:</strong> <?php echo $pazymejimoNr; ?></p>
                    
                    <div class="d-flex align-items-end justify-content-end">
                        <button class="btn btn-secondary" onclick="editUserOpenForm()">Keisti duomenis</button>
                    </div>
                </div>

                <h3 class="mb-4">Knygos:</h3>
                
                <table class="table table-light table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>Pavadinimas</th>
                            <th>Autorius</th>
                            <th>ISBN</th>
                            <th>Grąžinimo data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($isduotosKnygos as $knyga) {
                            echo "<tr>";
                            echo "<td>" . $knyga[0] . "</td>";
                            echo "<td>" . $knyga[1] . "</td>";
                            echo "<td>" . $knyga[2] . "</td>";
                            echo "<td>" . $knyga[3] . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
                
                <div class="text-center mt-4">
                    <a href="#" class="text-danger" style="color: #f7a5a5 !important;">Panaikinti paskyrą</a>
                </div>
				<div class="formStyle" id="editUser">
                <form action="updateUser.php" method="POST">
                    <div class="formContent">
                        <h3>Keisti duomenis</h3>
                        <label>Vardas</label><br>
                        <input type="text" id="name" name="name" value="<?php echo $vardas; ?>"><br>
                        <label>Pavardė</label><br>
                        <input type="text" id="surname" name="surname" value="<?php echo $pavarde; ?>"><br>
                        <label>E. paštas</label><br>
                        <input type="email" id="email" name="email" value="<?php echo $epastas; ?>"><br>
                        <label>Tel. nr.</label><br>
                        <input type="tel" id="phone" name="phone" value="<?php echo $telNr; ?>"><br>
                        <label>Pažymėjimo nr.</label><br>
                        <input type="text" id="pazymejimas" name="pazymejimas" value="<?php echo $pazymejimoNr; ?>"><br>
                        <button type="submit" name="submit" >Išsaugoti</button><br>
                    </div>
                </form>
                <button onclick="editUserCloseForm()">Uždaryti langą</button>
            </div>
                
            </div> </main>
        
        <footer>
            Kaunas, 2025. © Kristina DB, Viltė I., Vasarė M.
        </footer>
        <script src="script.js"></script>
    </body>
</html>
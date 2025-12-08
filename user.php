<?php
include_once 'db.inc.php'; 
session_start();


if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    die("Neturite prieigos prie šio puslapio!");
}

$userId = $_SESSION['id'];

$sql_user = "SELECT name, surname, email, phone, number FROM users WHERE id = ?";
$stmt_user = $conn->prepare($sql_user);
$stmt_user->bind_param("i", $userId);
$stmt_user->execute();
$result_user = $stmt_user->get_result();

if ($userRow = $result_user->fetch_assoc()) {

    $vardas = htmlspecialchars($userRow['name']);
    $pavarde = htmlspecialchars($userRow['surname']);
    $epastas = htmlspecialchars($userRow['email']);
    $telNr = htmlspecialchars($userRow['phone']);
    $pazymejimoNr = htmlspecialchars($userRow['number']);
} else {
    die("Vartotojo duomenys nerasti.");
}
$stmt_user->close();

$isduotosKnygos = []; 


$sql_taken_books = "SELECT name, author, isbn, end_date FROM taken_books WHERE user_id = ?;";
$stmt = $conn->prepare($sql_taken_books);

if ($stmt) {
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result_taken_books = $stmt->get_result();

    while ($row = $result_taken_books->fetch_assoc()) {
        $isduotosKnygos[] = [
            $row['name'], 
            $row['author'], 
            $row['isbn'],     
            $row['end_date']
        ];
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Paskyra</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" crossorigin="anonymous">
    </head>
    <body>
        <header>
            <b><a class="logo" href="index.php">Bibliotekos valdymo sistema</a></b>
            <nav>
                <a class="pageLink" href="books.php">Knygos</a>
                <a class="pageLink" href="user.php">Paskyra</a> 
                <a class="pageLink" href="logout.php">Atsijungti</a>
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
                        <button class="btn-universal" onclick="editUserOpenForm()">Keisti duomenis</button>
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
                        if (empty($isduotosKnygos)) {
                            echo "<tr><td colspan='4' class='text-center'>Jūs neturite paimtų knygų.</td></tr>";
                        } else {
                            foreach ($isduotosKnygos as $knyga) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($knyga[0]) . "</td>";
                                echo "<td>" . htmlspecialchars($knyga[1]) . "</td>";
                                echo "<td>" . htmlspecialchars($knyga[2]) . "</td>"; // Čia dabar rodomas ISBN
                                echo "<td>" . htmlspecialchars($knyga[3]) . "</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
                
                <div class="text-center mt-4">
                     <a href="#" class="text-danger" style="color: #f7a5a5 !important;" onclick="alert('Susisiekite su administratoriumi dėl paskyros trynimo.'); return false;">Panaikinti paskyrą</a>
                </div>

                <div class="formStyle" id="editUser" style="display:none;"> <form action="updateUser.php" method="POST">
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
                            
                            <button type="submit" name="submit" class="btn-universal">Išsaugoti</button><br>
                        </div>
                    </form>
                    <div class="form-buttons-container">
                        <button onclick="editUserCloseForm()" class="btn-universal">Uždaryti langą</button>
                    </div>
                </div>
                
            </div> 
        </main>
        
        <footer>
            Kaunas, 2025. © Kristina DB, Viltė I., Vasarė M.
        </footer>
        <script src="script.js"></script>
    </body>
</html>
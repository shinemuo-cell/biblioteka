<?php
include_once 'db.inc.php';
if ($_SESSION['role'] !== 'admin') {
    die("Neturite prieigos prie šio puslapio!");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Darbuotojai</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
        crossorigin="anonymous">
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
            <div class="buttonContainer">
                <button type="button" onclick="newEmployeeOpenForm()">Pridėti naują darbuotoją</button>
            </div>
            
            <div class="listContainer">
                <?php
                    $sql="SELECT * FROM employees;";
                    $result=mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);
                    if($resultCheck>0){
                        echo "<table class='table table-dark table-striped mt-4'>
                                <thead>
                                    <tr>
                                        <th>Vardas</th>
                                        <th>Pavardė</th>
                                        <th>El. paštas</th>
                                        <th>Tel. nr.</th>
                                        <th>Veiksmai</th>
                                    </tr>
                                </thead>
                                <tbody>";
                        while($row=mysqli_fetch_assoc($result)){
                            echo "<tr>
                                    <td>". htmlspecialchars($row["name"])."</td>
                                    <td>". htmlspecialchars($row["surname"])."</td>
                                    <td>". htmlspecialchars($row["email"])."</td>
                                    <td>". htmlspecialchars($row["phone"])."</td>
                                    <td>
                                        <button class='btn btn-warning btn-sm' onclick='editEmployeeOpenForm(" . $row["id"] . ")'>Redaguoti</button>
                                        <a href='deleteEmployee.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm' onclick=\"return confirm('Ar tikrai norite ištrinti darbuotoją?');\">Ištrinti</a>
                                    </td>
                                  </tr>";
                        }
                        echo "</tbody></table>";
                    }else{
                        echo "<p>Darbuotojų nėra</p>";
                    }
                ?>
            </div>
            <div class="formStyle" id="newEmployee">
                <form action="insertEmployee.php" method="POST">
                    <div class="formContent">
                        <h3>Pridėti naują darbuotoją</h3>
                        <label>Vardas</label><br>
                        <input type="text" name="name" required><br>
                        <label>Pavardė</label><br>
                        <input type="text" name="surname" required><br>
                        <label>E. paštas</label><br>
                        <input type="email" name="email" required><br>
                        <label>Tel. nr.</label><br>
                        <input type="tel" name="phone"><br>
                        <button type="submit" name="submit">Pridėti</button><br>
                    </div>
                </form>
                <button onclick="newEmployeeCloseForm()">Uždaryti</button>
            </div>
            
            <div class="formStyle" id="editEmployee">
                <form action="updateEmployee.php" method="POST" id="editEmployeeForm">
                    <div class="formContent">
                        <h3>Redaguoti darbuotojo duomenis</h3>
                        <input type="hidden" name="id" id="edit_id"> <label>Vardas</label><br>
                        <input type="text" id="edit_name" name="name" required><br>
                        <label>Pavardė</label><br>
                        <input type="text" id="edit_surname" name="surname" required><br>
                        <label>E. paštas</label><br>
                        <input type="email" id="edit_email" name="email" required><br>
                        <label>Tel. nr.</label><br>
                        <input type="tel" id="edit_phone" name="phone"><br>
                        <button type="submit" name="submit">Išsaugoti</button><br>
                    </div>
                </form>
                <button onclick="editEmployeeCloseForm()">Uždaryti</button>
            </div>
            </main>
        <footer>
            Kaunas, 2025. © Kristina DB, Viltė I., Vasarė M.
        </footer>
    </body>
</html>


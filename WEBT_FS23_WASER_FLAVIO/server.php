<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>HCWK Lageranmeldung</title>
    <link rel="icon" type="image/png" href="img/favicon.jpg"> 
    <link rel="stylesheet" href="sylesheet.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <!-- Navigation -->
    <nav class="w3-bar w3-white myclass-stickynav">
        <img src="img/logo.jpg" class="w3-bar-item w3-image myclass-logo">
        <a href="index.html" class="w3-bar-item w3-button">Home</a>
    </nav>
    <div class="w3-container">
        <?php
            session_start();
            function validate_parameters() {
                if (!isset($_POST['vorname'])) {
                    echo "<p>Parameter 'Vorname' ist benötigt</p>";
                    return false;
                }
                if (!isset($_POST['nachname'])) {
                    echo "<p>Parameter 'Nachname' ist benötigt</p>";
                    return false;
                }
                if (!isset($_POST['mannschaft'])) {
                    echo "<p>Parameter 'Mannschaft' ist benötigt</p>";
                    return false;
                }
                if (!isset($_POST['email'])) {
                    echo "<p>Parameter 'E-Mail' ist benötigt</p>";
                    return false;
                }
                if (!isset($_POST['geburtstag'])) {
                    echo "<p>Parameter 'geburtstag' ist benötigt</p>";
                    return false;
                }

                return true;
            }

            function alert($level, $title, $message) {
                if($level == "success") {
                    echo "
                    <div class='w3-panel w3-green'>
                        <h3>$title</h3>
                        <p>$message</p>
                    </div>";
                }
                if($level == "info") {
                    echo "
                    <div class='w3-panel w3-blue'>
                        <h3>$title</h3>
                        <p>$message</p>
                    </div>";
                }
                if($level == "error") {
                    echo "
                    <div class='w3-panel w3-red'>
                        <h3>$title</h3>
                        <p>$message</p>
                    </div>";
                }
            }
            
            if(validate_parameters()){
                // Create connection
                $conn = mysqli_connect("flawasch.mysql.db.internal", "flawasch_hslu", "UbXGbs1kvLPcWdfULoxx", "flawasch_hslu");
                if (!$conn) { 
                    echo "<p>Database connection failed</p>";
                }         
                // Check connection
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }

                if($_COOKIE['angemeldet'] == true){
                    alert("info", "Anmeldung nicht übermittlet", "Du bist bereits für das Lager angemeldet");
                } else {
                    $_SESSION['vorname'] = $_POST['vorname'];
                    $_SESSION['nachname'] = $_POST['nachname'];
                    $_SESSION['mannschaft'] = $_POST['mannschaft'];
                    $_SESSION['email'] = $_POST['email'];
                    $_SESSION['geburtstag'] = $_POST['geburtstag'];
                    $_SESSION['bemerkungen'] = $_POST['bemerkungen'];

                    $vorname = $_SESSION['vorname'];
                    $nachname = $_SESSION['nachname'];
                    $mannschaft = $_SESSION['mannschaft'];
                    $email = $_SESSION['email'];
                    $geburtstag = $_SESSION['geburtstag'];
                    $bemerkungen = $_SESSION['bemerkungen'];
                    
                    $sql = "INSERT INTO webt_mep (vorname, nachname, mannschaft, email, bemerkungen, geburtstag)
                    VALUES ('$vorname', '$nachname', '$mannschaft', '$email', '$bemerkungen', '$geburtstag')";

                    if ($conn->query($sql) === TRUE) {
                        alert("success", "Übermittelt", "Die Anmeldung wurde erfolgreich gespeichert.");
                        setcookie("angemeldet", true);
                    } else {
                        alert("error", "Fehler", "Die Anmeldung konnte nicht verarbeitet werden.");
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }

            }

        ?>

        <h1>Daten</h1>
        <ul class="w3-ul">
            <li><?php echo $_SESSION['vorname']; ?></li>
            <li><?php echo $_SESSION['nachname']; ?></li>
            <li><?php echo $_SESSION['mannschaft']; ?></li>
            <li><?php echo $_SESSION['email']; ?></li>
            <li><?php echo $_SESSION['geburtstag']; ?></li>
            <li><?php echo $_SESSION['bemerkungen']; ?></li>
        </ul>

        <h2>Angemeldete Personen</h2>
        <table class="w3-table">
            <tr>
                <th>ID</th>
                <th>Vorname</th>
                <th>Nachname</th>
                <th>Mannschaft</th>
                <th>Anmeldung</th>
            </tr>
            <?php 
            $sql = "SELECT id, vorname, nachname, mannschaft, timestamp FROM webt_mep WHERE ID < 100";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["vorname"]. "</td><td>" . $row["nachname"]. "</td><td>" . $row["mannschaft"]. "</td><td>" . $row["timestamp"]. "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
            ?>
        </table>
    </div>
    <?php mysqli_close($conn);?>
</body>
<footer class="myclass-colorinverse myclass-footer">
    <h6>© <span id="year"></span> HC Weggis-Küssnacht by Flavio Waser</h6>
</footer>
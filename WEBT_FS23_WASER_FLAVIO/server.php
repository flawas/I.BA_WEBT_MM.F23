<?php

    // Datenbank Server
    $server = "flawasch.mysql.db.internal";
    $username = "flawasch_hslu";
    $password = "UbXGbs1kvLPcWdfULoxx";
    $database = "flawasch_hslu";

    $conn = mysqli_connect($server, $username, $password, $database);
    if (!$conn) { 
        echo "<p>Database connection failed</p>";

    // Validierung und Speicherung
    function validate() {
        if (!isset($_POST['vorname'])) {
            echo "<p>Parameter 'Vorname' ist benötigt</p>";
            return false;
        }
        if (!isset($_POST['nachname'])) {
            echo "<p>Parameter 'Nachname' ist benötigt</p>";
            return false;
        }
        if (!isset($_POST['Mannschaft'])) {
            echo "<p>Parameter 'Mannschaft' ist benötigt</p>";
            return false;
        }
        if (!isset($_POST['geburtstag'])) {
            echo "<p>Parameter 'geburtstag' ist benötigt</p>";
            return false;
        }
        if (!isset($_POST['email'])) {
            echo "<p>Parameter 'E-Mail' ist benötigt</p>";
            return false;
        }
        return true;
    }

    if(validate()) {
        $conn = mysqli_connect($server, $username, $password, $database);
        if (!$conn) { 
            echo "<p>Database connection failed</p>";
        } else {
            $vorname = $_POST['vorname'];
            $nachname = $_POST['nachname'];
            $mannschaft = $_POST['mannschaft'];
            $geburtstag = $_POST['geburtstag'];
            $email = $_POST['email'];
            $bemerkungen = $_POST['bemerkungen'];
    
            $sql = "INSERT INTO webt_mep (vorname, nachname, mannschaft, geburstag, email, bemerkungen)
                VALUES ($vorname, $nachname, $mannschaft, $geburtstag, $email, $bemerkungen)";
    
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
                $res = true;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
    
            
            if ($res) {
                echo "<p>Besten Dank für Ihre Anmeldung.</p>";
            } else {
                echo "<p>Ein Fehler ist aufgetreten.</p>";
            }
            mysqli_close($conn);        
        }

    }

?>
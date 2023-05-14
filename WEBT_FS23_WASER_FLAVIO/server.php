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
            $_SESSION['vorname'] = $_POST['vorname'];
            $_SESSION['nachname'] = $_POST['nachname'];
            $_SESSION['mannschaft'] = $_POST['mannschaft'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['geburtstag'] = $_POST['geburtstag'];
            $_SESSION['bemerkungen'] = $_POST['bemerkungen'];
            
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

            $vorname = $_SESSION['vorname'];
            $nachname = $_SESSION['nachname'];
            $mannschaft = $_SESSION['mannschaft'];
            $email = $_SESSION['email'];
            $geburtstag = $_SESSION['geburtstag'];
            $bemerkungen = $_SESSION['bemerkungen'];

            $sql = "INSERT INTO webt_mep (vorname, nachname, mannschaft, email, bemerkungen, geburtstag)
                VALUES ('$vorname', '$nachname', '$mannschaft', '$email', '$bemerkungen', '$geburtstag')";

            if($_COOKIE['angemeldet'] == true){
                alert("info", "Nicht übermittlet", "Du bist bereits angemeldet");
            } else {
                if ($conn->query($sql) === TRUE) {
                    alert("success", "Übermittelt", "Die Anmeldung wurde erfolgreich gespeichert.");
                    setcookie("angemeldet", true);
                    $res = true;
                } else {
                    alert("error", "Fehler", "Die Anmeldung konnte nicht verarbeitet werden.");
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
        
        
                if ($res) {
                    echo "<p>Besten Dank für Ihre Anmeldung.</p>";
                } else {
                    echo "<p>Ein Fehler ist aufgetreten.</p>";
                }  
            }

            mysqli_close($conn);
        }

    ?>
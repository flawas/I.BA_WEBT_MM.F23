<!DOCTYPE html>
<html>
    <head>
        <title>Übung 1: Anmeldung zum Newsletter</title>
        <meta charset="utf8">
    </head>
    <body>
<?php
function validateParameters() {
    if (!isset($_POST['email'])) {
        echo "<p>Parameter 'email' ist benötigt</p>";
        return false;
    }
    if (!isset($_POST['kategorie'])) {
        echo "<p>Parameter 'kategorie' ist benötigt</p>";
        return false;
    }
    $kategorie = intval($_POST['kategorie']);
    if ($kategorie < 1 || $kategorie > 3) {
        echo "<p>Parameter 'kategorie' muss eine Ganzzahl im Bereich 1-3 sein.</p>";
        return false;
    }
    return true;
}

if (validateParameters()) {
    $conn = mysqli_connect("flawasch.mysql.db.internal", "flawasch_hslu", "UbXGbs1kvLPcWdfULoxx", "flawasch_hslu");
    if (!$conn) { 
        echo "<p>Database connection failed</p>";
    } else {
        $email = $_POST['email'];
        $kategorie = intval($_POST['kategorie']);

        // TODO: $email und $kategorie in Tabelle mailing_list einfügen
        //       Resulat der Ausführung in $res speichern

        $sql = "INSERT INTO mailing_list (email, kategorie)
            VALUES ('$email', $kategorie)";

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
    </body>
</html>
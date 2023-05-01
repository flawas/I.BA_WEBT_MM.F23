<!DOCTYPE html>
<html>
    <head>
        <title>Übung 1: Newsletter versenden: Status</title>
        <meta charset="utf8">
    </head>
    <body>
<?php

function validateParameters() {
    if (!isset($_POST['betreff'])) {
        echo "<p>Parameter 'betreff' ist benötigt</p>";
        return false;
    }
    if (!isset($_POST['text'])) {
        echo "<p>Parameter 'text' ist benötigt</p>";
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

function versendeMails($conn, $betreff, $text, $kategorie) {
    // TODO: Die SQL-Query zur Abfrage der Email nach Kategorie einfügen
    //       Resultat in $res speichern
    $conn = mysqli_connect("flawasch.mysql.db.internal", "flawasch_hslu", "UbXGbs1kvLPcWdfULoxx", "flawasch_hslu");
    if (!$conn) { 
        echo "<p>Database connection failed</p>";
    } else {
        $sql = "SELECT * FROM 'mailing_list'";
        $result = $conn->query($sql);

    if ($result) {
        // TODO: Für jeden Eintrag (while-loop):
        // * (1d) die Emailadresse ausgeben
        // * (1e) das Mail verschicken (Aufruf der Funktion mail)
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "E-Mail: " . $row["email"]. " - Kategorie: " . $row["kategorie"]. "<br>";
            }
          } else {
            echo "0 results";
          }

    } else {
        echo "<p>Ein Fehler ist aufgetreten.</p>";
    }
}

// main
if (validateParameters()) {
    $conn = mysqli_connect("flawasch.mysql.db.internal", "flawasch_hslu", "UbXGbs1kvLPcWdfULoxx", "flawasch_hslu");
    if (!$conn) { 
        echo "<p>Database connection failed</p>";
    } else {
        versendeMails($conn, $_POST['betreff'], $_POST['text'], intval($_POST['kategorie']));
        mysqli_close($conn);        
    }
}
?>
    </body>
</html>
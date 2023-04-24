<!DOCTYPE html>
<html>
    <head>
        <title>Berechneter Gesamtwiderstand</title>
        <meta charset="utf8">
    </head>
    <body>
<?php

// TODO: Übernehmen Sie hier Funktion calculateResistance aus Übung 3a der Serie
//       "Interaktive Webapplikationen" und nehmen Sie Anpassungen vor, welche
//       für PHP notwendig sind.


function validateParameters() {
    $valid = true;
    
    // Prüfe Existenz
    if (!isset($_POST['r1'])) {
        echo "<p>Parameter 'r1' wird benötigt</p>";
        $valid = false;
    }
    if (!isset($_POST['r2'])) {
        echo "<p>Parameter 'r2' wird benötigt</p>";
        $valid = false;
    }
    if (!isset($_POST['wiring'])) {
        echo "<p>Parameter 'wiring' wird benötigt</p>";
        $valid = false;
    }

    return $valid;
}

if (validateParameters()) {
    // TODO: Parameter auslesen und Berechnung des Idealgewichts
    
    // TODO: Ausgabe des Idealgewichts
    
}
?>
    <a href="resistanceForm.html">Zurück zum Formular</a>
    </body>
</html>
<?php

    // Datenbank Server


    // Validierung und Speicherung
    function validate() {
        if (!isset($_POST['email'])) {
            echo "<p>Parameter 'E-Mail' ist benötigt</p>";
            return false;
        }
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
        return true;
    }

    if()

?>
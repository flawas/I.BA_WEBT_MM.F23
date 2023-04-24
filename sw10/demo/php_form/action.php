<!DOCTYPE html>
<html>
    <head>
        <title>Beispiel: Welcome Resultat</title>
        <meta charset="utf8">
        <link href="webt.css" rel="stylesheet">
    </head>
    <body>
        <h1>Beispiel: Welcome Resultat</h1>
    <?php
    if(!isset($_POST['vorname'])) {
        echo "Fehler: Request-Parameter 'vorname' nicht gesetzt"; return;
    } else if ($_POST['vorname'] == "") {
        echo "Fehler Request-Parameter 'vorname' darf nicht leer sein"; return;
    } else {
        echo "<p>Hallo " . $_POST['vorname'] . "</p>";
    }    
    ?>
    </body> 
</html>
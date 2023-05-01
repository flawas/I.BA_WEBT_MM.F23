<!DOCTYPE html>
<html>

<head>
    <title>Beispiel: Geburtstag | Abfrage</title>
    <meta charset="utf8">
<link href="webt.css" rel="stylesheet">
</head>

<body>
    <h1>Beispiel: Geburtstag</h1>
    <h2>Abfrage</h2>

<?php

// Aufbau der Verbindung zur Datenbank
$conn = mysqli_connect("localhost", "root", "", "people");
if (!$conn) {
    // Abbruch, falls keine Verbindung hergestellt werden konnte
    echo "<p>Database connection failed</p>"; return;
}


echo "<p>Folgende Einträge befinden sich nun in der Datenbank:</p>";

// Zeige alle Einträge in der Datenbank an
$query = "select name, day from birthdays;";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);

// Gehe über alle Einträge und zeige diese an
if ($res) {
    echo "<ul>";
    while( $row = mysqli_fetch_assoc($res) ) {
        echo "<li>" . $row['name']. " hat am " . $row['day'] . " Geburtstag.</li>";
    }
    echo "</ul>";
} else {
    echo "<p>Fehler beim Auslesen der People-Datenbank</p>";
} 

mysqli_close($conn);
    ?>
    
</body>

</html>
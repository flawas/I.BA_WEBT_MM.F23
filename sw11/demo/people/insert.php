<!DOCTYPE html>
<html>

<head>
    <title>Beispiel: Geburtstag | Einfügen</title>
    <meta charset="utf8">
<link href="webt.css" rel="stylesheet">
</head>

<body>
    <h1>Beispiel: Geburtstag</h1>
    <h2>Einfügen</h2>

<?php

// Parameterprüfung
if (!isset($_GET['name'])) {
    echo "<p>Parameter 'name' nicht gesetzt</p>"; return;
}
if (!isset($_GET['day'])) {
    echo "<p>Parameter 'day' nicht gesetzt</p>"; return;
}

// Aufbau der Verbindung zur Datenbank
$conn = mysqli_connect("localhost", "root", "", "people");
if (!$conn) {
    // Abbruch, falls keine Verbindung hergestellt werden konnte
    echo "<p>Database connection failed</p>"; return;
}

// Eigentlich eher ein POST-Request, aber GET erlaubt
// die einfachere Verwendung ohne Formular
$name = $_GET['name'];
$day = $_GET['day'];

// Einfügen des Eintrags in die Datenbank
$query = "insert into birthdays (name, day) values (?, ?)";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'ss', $name, $day);
$res = mysqli_stmt_execute($stmt);

// Überprüfe das Resultat der Einfügeoperation
if ($res) {
    echo "<p>Eintrag erfolgreich eingefügt.</p>";
} else {
    echo "<p>Fehler beim Einfügen des Eintrags.</p>";
}

mysqli_close($conn);
    ?>
</body>

</html>
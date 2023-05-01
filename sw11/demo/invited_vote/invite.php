<!DOCTYPE html>
<html>
<head>
    <title>Beispiel: Invited-Vote | Einladung</title>
    <meta charset="utf8">
    <link href="webt.css" rel="stylesheet">
</head>

<body>
    <h1>Beispiel: Invited-Vote</h1>
    <h2>Neuen Benutzer einladen</h2>
    <form action="invite.php" method="POST">
        <label for="email">Email:</label>
        <input type="text" name="email">
        <button type="submit">Einladen</button>
    </form>

<?php 
if (isset($_POST['email'])) {
    // Erstelle zufälliges Token
    $token = bin2hex(random_bytes(24));

    // Speicherung des Eintrags in der Tabelle VOTE
    $conn = mysqli_connect("localhost", "root", "", "invited_vote");
    $stmt = mysqli_prepare($conn, "insert into vote (email, token) values (?, ?)");
    mysqli_stmt_bind_param($stmt, 'ss', $_POST['email'], $token);

    if (mysqli_stmt_execute($stmt)) {
        // Sende Einladungsmail (ggf. URL an Speicherort von vote_forn anpassen)
        $message = "Please use the following link to vote:\r\n"
                    . "http://localhost/invited_vote/vote_form.php?email=" . $_POST['email'] . "&token=" . $token. "\r\n";

        mail($_POST['email'], "Einladung zum Abstimmen", $message, 'From: vote@localhost');

    } else {
        // Fehlerfall: Benachrichtige Benutzer
        echo "<p>" . $_POST['email'] . " konnte nicht hinzugefuegt werden!</p>";
    }

    mysqli_close($conn);
}
?>

</body>

</html>
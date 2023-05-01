<!DOCTYPE html>
<html>

<head>
    <title>Beispiel: Invited-Vote | Resultate</title>
    <meta charset="utf8">
    <link href="webt.css" rel="stylesheet">
</head>

<body>
<?php
$question = "Wie finden Sie das Wetter Heute?";
$responses = [ "spitze", "sensationell", "fantastisch", "super" ];

$conn = mysqli_connect("localhost", "root", "", "invited_vote");

// Ist der Parameter "Option" gesetzt?
if(isset($_POST['option'])) {
    $option = intval($_POST['option']);
    if (isset($responses[$option])) {
        $stmt = mysqli_prepare($conn, "update vote set vote = ? where email = ? and token = ?");
        mysqli_stmt_bind_param($stmt, 'iss', $option, $_POST['email'], $_POST['token']);
        $res = mysqli_stmt_execute($stmt);
        if (!$res || mysqli_affected_rows($conn) == 0) {
            echo "<p>Bei der Abstimmung ist ein Fehler aufgetreten.</p>";
        }
    }
}
?>
    <h1>Beispiel: Invited-Vote</h1>
    <h2>Resultate</h2>

<?php
// Abfrage der Abstimmenden auf der Tabelle VOTE
$query = "select email, vote from vote;";
$stmt = mysqli_prepare($conn, $query);

mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);

if ($res) {
    while($row = mysqli_fetch_assoc($res)) {
      echo "<p>" . $row['email']. ": ";
      if ($row['vote'] != null) {
         echo $responses[$row['vote']] . "</p>";
      } else {
        echo "noch nicht abgestimmt</p>";
      }
    }
} else {
    echo "<p>Beim Anzeigen der Resultate ist ein Fehler aufgetreten.</p>";
}

mysqli_close($conn);
?>

    </body>
</html>
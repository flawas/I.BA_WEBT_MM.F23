<!DOCTYPE html>
<html>

<head>
    <title>Beispiel: SQL Injection</title>
    <meta charset="utf8">
    <link href="webt.css" rel="stylesheet">
</head>

<body>
    <h1>Beispiel: SQL Injection</h1>
<?php
$conn = mysqli_connect("localhost", "root", "", "sql_inject");

$date_from = $_GET['from']; // Parameter aus URL
$user = 'eve'; // from session
$query = "select text from reports where user='" . $user . "' and date_from > date(" . $date_from . ");";
echo "<p>Benutze folgende Abfrage:<br>" . $query. "</p>";

echo "<p>Resultate:</p>";
$res = mysqli_query($conn, $query);
if ($res) {
  while( $row = mysqli_fetch_assoc($res) ) {
    echo $row['text'] . "<br>";
  }
}
?>
</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <title>Beispiel: SQL Injection (fixed)</title>
    <meta charset="utf8">
    <link href="webt.css" rel="stylesheet">
</head>

<body>
    <h1>Beispiel: SQL Injection (fixed)</h1>
<?php
$conn = mysqli_connect("localhost", "root", "", "sql_inject");

$date_from = $_GET['from']; // Parameter aus URL
$user = 'eve'; // from session
$query = "select text from reports where user=? and date_from > date(?);";
echo "<p>Benutze folgende Abfrage:<br>" . $query. "</p>";

echo "<p>Resultate:</p>";

$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'ss' , $user, $date_from);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);

if ($res) {
  while( $row = mysqli_fetch_assoc($res) ) {
    echo $row['text'] . "<br>";
  }
}
?>
</body>

</html>
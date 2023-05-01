<!DOCTYPE html>
<html>

<head>
    <title>Beispiel: Invited-Vote | Abstimmung</title>
    <meta charset="utf8">
    <link href="webt.css" rel="stylesheet">
</head>

<body>

<?php
$question = "Wie finden Sie das Wetter heute?";
$responses = [ "spitze", "sensationell", "fantastisch", "super" ];

if (!isset($_GET['email']) || !isset($_GET['token'])) {
    echo "<body><p>Input parameters 'email' and 'token' are required</p></body></html>";
    return;
}
?>
    <h1>Beispiel: Invited-Vote</h1>
    <h2>Abstimmen</h2>
    <form name="vote" action="vote.php" method="post">
        <p><?php echo $question; ?></p>
        <input type="hidden" name="email" value="<?php echo $_GET['email']?>">
        <input type="hidden" name="token" value="<?php echo $_GET['token']?>">
        <?php
        for($i = 0; $i < count($responses); ++$i)  {
            echo '<input type="radio" name="option" value="'. $i . '">' . $responses[$i] . '<br>';
        }
        ?>
        <button type="submit">Abstimmen</button>
    </form>
</body>

</html>
<!DOCTYPE html>
<html>
<head>
    <title>Beispiel: Multiple-Choice Abstimmung</title>
    <meta charset="utf8">
    <link href="webt.css" rel="stylesheet">
</head>
<body>
    <h1>Beispiel: Multiple-Choice Abstimmung</h1>
<?php
    $question = "Wie finden Sie das Wetter Heute?";
    $responses = [ "spitze", "sensationell", "fantastisch", "super" ];  
?>

    <form name="vote" action="vote.php" method="post">
        <h2>Abstimmung</h2>
        <p><?php echo $question; ?></p>

        <?php
        for($i = 0; $i < count($responses); ++$i)  {
            echo '<input type="radio" name="option" value="'. $i . '">' . $responses[$i] . '<br>';
        }
        ?>
        
        <button type="submit">Abstimmen</button>
    </form>
</body>
</html>
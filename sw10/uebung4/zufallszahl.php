<!DOCTYPE html>
<html>

<head>
    <title>Übung 4: Zufallszahl</title>
    <meta charset="utf8">
    <style>
        .red   { color: red; }
        .green { color: green; }
    </style>
</head>

<body>
    <form action="zufallszahl.php" method="POST">
        <?php
        // Berechnung der Zufallszahl
        $zahl = mt_rand() / (mt_getrandmax() / 100);

        // TODO: Paragraph mit Zahl ausgeben. Klasse green, falls < 50 sonst Klasse red.
        if($zahl < 50){
            echo "<p class='green'>$zahl</p>";
        } else if ($zahl > 50){
            echo "<p class='red'>$zahl</p>";
        } else {
            echo "Calculate Error.";
        }

        ?>
        <input type="hidden" name="action" value="random">
        <button type="submit">berechne Zufallszahl</button>
    </form>
</body>

</html>
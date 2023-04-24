<!DOCTYPE html>
<html>
    <head>
        <title>Beispiel: Globale vs. lokale Variablen</title>
        <link href="webt.css" rel="stylesheet">
    </head>
    <body>
    <h1>Beispiel: Globale vs. lokale Variablen</h1>
    <?php
    $var = "global";

    function test() {
        $var = "local";
        global $var;
        echo $var;
    }

    test();
    ?>
    </body>
</html>
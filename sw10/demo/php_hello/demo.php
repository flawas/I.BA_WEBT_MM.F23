<!DOCTYPE html>
<html>
    <head>
        <title>Beispiel: Elementare PHP-Sprachfeatures</title>
        <link href="webt.css" rel="stylesheet">
    </head>
    <body>
        <h1>Beispiel: Elementare PHP-Sprachfeatures</h1>
    <?php
    // strings und magic quotes
   $abc = "Beispiel Text";
   echo("<p>" . $abc . "</p>\n");

    // if-condition
    $number = 1;
    if ($number == 1) {
        echo("Number is one.<br>\n");
    } else {
        echo("Number is not one.<br>\n");
    }

    // while-loop
   $counter = 10;
   while ($counter > 0) {
       echo("<p>Counter is $counter </p>\n");
       $counter--;
   }
    ?>
    </body>
</html>
<!DOCTYPE html>
<html>

<head>
    <title>Beispiel: Multiple-Choice Abstimmungsresultat</title>
    <meta charset="utf8">
    <link href="webt.css" rel="stylesheet">
</head>

<body>
    <h1>Beispiel: Multiple-Choice Abstimmungsresultat</h1>
    <?php
    $question = "Wie finden Sie das Wetter Heute?";
    $responses = [ "spitze", "sensationell", "fantastisch", "super" ];  

    // Falls der Option-Parameter gesetzt ist: Abstimmen.
    if(isset($_POST['option'])) {
        $option = intval($_POST['option']);
        if (isset($responses[$option])) {
            store_count($option, get_count($option) + 1);
        }
    }

    // Ausgabe der Resultate für jede Option
    $i = 0;
    while($i < count($responses))  {
        print $responses[$i] . ":" . get_count($i) . "<br>";
        $i = $i + 1;
    }

    // Abfrage der Anzahl Stimmen für eine Option
    function get_count($option) {
        if (!file_exists("votes_$option")) { return 0; }

        $vote_in = fopen("votes_$option", "r");
        $count = fgets($vote_in);
        fclose($vote_in);  
        return intval($count);
    }

    // Speichere einen neuen Wert für eine bestimmte Option
    function store_count($option, $count) {
        $vote_write = fopen("votes_$option", "w");
        fwrite($vote_write, $count);
        fclose($vote_write);
    }
    ?>
</body>

</html>
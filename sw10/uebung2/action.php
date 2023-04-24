<!DOCTYPE html>
<html>

<head>
    <title>Hallo</title>
    <meta charset="utf8">
</head>

<body>
    <?php
    // TODO: Prüfen, ob Parameters 'name' gesetzt ist (ersetzen Sie true)
    if (isset($_POST['name']))  {
        
        // TODO: Ausgabe des Parameters 'name'
        echo "Hello "'name'"";
        
    } else {
        echo "<p>Parameter 'name' nicht gesetzt</p>";
    }
    ?>
</body>

</html>
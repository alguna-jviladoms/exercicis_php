<?php 

/*
    PHPDoc:
        PASO 1: los datos llegan con GET MIRAR SI LA URL LLEVA LOS DATOS
        PASO 2:
*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultafo PAS 1</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>¿QUE HA LLEGADO AL SERVER?</h1>

    <h2>$_GET</h2>
    <pre><?php print_r($_GET); ?></pre>
    
    <h2>$_POST</h2>
    <pre><?php print_r($_POST); ?></pre>

    <p><a href="pas1-formulari.html">Volver</a></p>

</body>
</html>
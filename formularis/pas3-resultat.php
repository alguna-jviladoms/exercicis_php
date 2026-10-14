<?php 

/**
 * PAS 3: Una sola pàgina
 * fins ara teniem dos fitxers, el formulari i el resultat
 * mira com es fa la peticio y decideix en funció d'aquesta
 * la primera visita es GET i al quan es prem el boto 
 * d'enviar es fa el POST
 */

$name = '';
$email = '';
$day = '';

// var de control 
$sent = false;

// array predifined server nosa da la info del server

echo "<pre>";
print_r($_SERVER);
echo "</pre>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultafo PAS 2</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <h1>Dades recollides:</h1>

    <ul>
        <li>Nom: <?= $name ?></li>
        <li>Email: <?= $email ?></li>
        <li>Dia: <?= $day ?></li>
    </ul>

    <p>El nom te <?= strlen($name) ?> caràcters.</p>

</body>
</html>
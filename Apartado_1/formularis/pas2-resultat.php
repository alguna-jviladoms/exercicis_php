<?php 
/**
 * trim paar sacar los espacios vacios innecesarios
*/
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$day = trim($_POST['day'] ?? 'sense triar');

echo "<p>El nombre es " . $name . " :) </p>"
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
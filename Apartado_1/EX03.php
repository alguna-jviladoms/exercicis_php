<?php

$nom = 'Papito';
$cognom = 'Mota';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Three ways to show a p</title>
</head>
<body>
    
    <p>Somos bilinguals en este curso</p>
    <h1>Tres formas y el mismo resultado</h1>

    <!-- Way number 1: php escribe all the ettiquete on <p> -->
    <?php echo "<p>Hola, $nom $cognom</p>" ?>

    <!-- Forma numero 2: HTML esta out and php solo pone the valor of the variable -->
    <p>Hello, <?= $nom . ' ' . $cognom?></p>

    <!-- Forma number three: El de toda la life -->
    <p>Hola Pepito</p>

</body>
</html>
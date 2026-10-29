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
// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
    $name = trim($_POST["name"] ?? '');
    $email = trim($_POST["email"] ?? '');
    $day = trim($_POST["day"] ?? 'sense triar');
    $sent = true;
}


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

    <?php if ( $sent ): ?> 
        <p>Inscripció rebuda: <?= htmlspecialchars($name) ?> (<?= htmlspecialchars($email) ?>), <?= htmlspecialchars($day) ?>.</p>
    
    <?php endif;?>

    <!-- <form action="pas3-resultat.php" method="post"> -->
    <!-- es lo mismo -->
    <form method="post">
        <label for="name">Nom:</label>
        <input type="text" id="name" name="name">

        <label for="email">Email:</label>
        <input type="email" name="email" id="email">

        <label for="day">Dia: </label>
        <select name="day" id="day">
            <option value="divendres">Divendres</option>
            <option value="dissabte">Dissabte</option>
        </select>
        <button>Inscriure'm</button>
    </form>


</body>
</html>
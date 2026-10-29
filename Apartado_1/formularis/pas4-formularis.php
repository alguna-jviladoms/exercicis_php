<?php 

/**
 * PAS 4: Validar control d'errorsi escapar
 */

$name = '';
$email = '';
$day = '';
// var de control 
$sent = false;
$errors = [];

// si recibimos los datos
if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
    $name = trim($_POST["name"] ?? '');
    $email = trim($_POST["email"] ?? '');
    $day = trim($_POST["day"] ?? 'sense triar');
    
    // validar los errores
    if ( $name === '' ){
    $errors['name'] = 'El nom es obligatori.';
    }

    if ( $email === '' ){
    $errors['email'] = 'El email es obligatori.';
    } elseif ( filter_var( $email, FILTER_VALIDATE_EMAIL ) === false ) {
        // si ha añadido un formato de email correcto
        $errors['email'] = 'El format del email no es correcte.';
    }

    if ( $day !== 'divendres' && $day !== 'dissabte' ){
    $errors['day'] = 'Has de triar un dia.';
    }

    // si el count del array es 0 significa que no hay errores
    if ( count($errors) == 0 ) {
        $sent = true;
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado PAS 4</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <?php if ( $sent ): ?> 
        <p>Inscripció rebuda: <?= htmlspecialchars($name) ?></p>
        <p>El teu email es: <?= htmlspecialchars($email) ?></p>
        <p>T'esperem el dia <?= htmlspecialchars($day) ?>.</p>
    <?php else: ?>
        <!-- novalidate en el form para ver los errores desde el php ( SERVER ) -->
        <!-- <form action="pas4-resultat.php" method="post"> -->
        <!-- es lo mismo -->
        <form method="post" novalidate>
            <label for="name">Nom:</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($name) ?>">
            <?php if(isset($errors['name'])): ?>
                <p class="error"> <?= $errors['name']?> </p>
            <?php endif; ?>

            <label for="email">Correu:</label>
            <input type="text" id="email" name="email" value="<?= htmlspecialchars($email) ?>">
            <?php if(isset($errors['email'])): ?>
                <p class="error"> <?= $errors['email']?> </p>
            <?php endif; ?>

            <label for="day">Dia: </label>
            <select name="day" id="day">
                <option value="divendres" <?= $day === 'divendres' ? 'selected' : '' ?>>
                    Divendres
                </option>
                <option value="dissabte" <?= $day === 'divendres' ? 'selected' : '' ?>>
                    Dissabte
                </option>
            </select>
            <?php if( isset($errors['day']) ): ?>
                    <p class="error"><?= $errors['day'] ?></p>
            <?php endif; ?>

            <button>Inscriure'm</button>

        </form>

        <?php endif;?>

</body>
</html>
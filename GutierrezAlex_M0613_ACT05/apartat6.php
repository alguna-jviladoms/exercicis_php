<?php
declare(strict_types=1);

$botiga = 'BitBazar';   // variable global

/**
 * Versió incorrecta: intenta utilitzar $botiga sense rebre-la.
 * Dona un Warning a propòsit (és el de l'exercici).
 *
 * @return string
 */
function mostra(): string
{
    return 'Som a ' . $botiga;
}

/**
 * Versió correcta: el nom entra per un paràmetre.
 *
 * @param string $nom Nom de la botiga
 * @return string
 */
function mostraBe(string $nom): string
{
    return "Som a $nom";
}

/**
 * Compta amb una variable local: es reinicia a cada crida.
 *
 * @return int
 */
function comptaLocal(): int
{
    $n = 0;
    $n++;
    return $n;
}

/**
 * Compta amb una variable static: conserva el valor entre crides.
 *
 * @return int
 */
function comptaStatic(): int
{
    static $n = 0;
    $n++;
    return $n;
}

/*
 * Exercici 1: warning exacte que apareix al log en carregar la pàgina:
 *
 *   PHP Warning:  Undefined variable $botiga in .../M0613_ACT05/apartat6.php on line 14
 *
 * (a la pàgina surt com "Warning: Undefined variable $botiga in ... on line 14").
 * La funció no veu $botiga perquè és una variable de fora: dins d'una funció només existeixen
 * els seus paràmetres i les seves variables locals.
 *
 * Exercici 2: comptaLocal() dona 1, 1, 1 perquè $n es crea de nou a cada crida i mor quan la
 * funció acaba. comptaStatic() dona 1, 2, 3 perquè una variable static no es destrueix en
 * acabar la funció: recorda el seu valor entre crides.
 */
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="estils.css">
    <title>Apartat 6 · Variables locals i globals</title>
    
</head>
<body>
<header><h1>BitBazar</h1><p>Apartat 6 · Variables locals i globals</p></header>
<main>
    <h2>Exercici 1 · Compartir informació amb paràmetres</h2>
    <p>Versió incorrecta (genera un warning de prova): "<?= mostra() ?>"</p>
    <p>Versió correcta: "<?= htmlspecialchars(mostraBe($botiga)) ?>"</p>

    <h2>Exercici 2 · Comparar memòria local i persistent</h2>
    <p>comptaLocal(): <?= comptaLocal() ?>, <?= comptaLocal() ?>, <?= comptaLocal() ?></p>
    <p>comptaStatic(): <?= comptaStatic() ?>, <?= comptaStatic() ?>, <?= comptaStatic() ?></p>
</main>
<footer>BitBazar · <?= date('Y') ?></footer>
</body>
</html>

<?php
declare(strict_types=1);

/**
 * Calcula la superfície d'una sala rectangular.
 *
 * @param float $base    Amplada de la sala
 * @param float $altura  Profunditat de la sala
 * @return float Superfície calculada
 */
function area(float $base, float $altura): float
{
    return $base * $altura;
}

/**
 * Indica si un magatzem ja no té unitats disponibles.
 *
 * @param int $unitats Unitats disponibles
 * @return bool true si la quantitat és zero o negativa
 */
function esgotat(int $unitats): bool
{
    return $unitats <= 0;
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="estils.css">
    <title>Apartat 5 · Tipus estrictes en PHP</title>
    
</head>
<body>
<header><h1>BitBazar</h1><p>Apartat 5 · Tipus estrictes en PHP</p></header>
<main>
    <h2>area() amb mesures diferents</h2>
    <p>area(6.5, 2.4) = <?= area(6.5, 2.4) ?></p>
    <p>area(8, 3) = <?= area(8, 3) ?> (un enter també es pot utilitzar com a float)</p>
    <p>esgotat(0) = <?= esgotat(0) ? 'true' : 'false' ?> · esgotat(12) = <?= esgotat(12) ? 'true' : 'false' ?></p>

    <h2>area('6.5', 2.4) amb strict_types activat</h2>
    <?php
    try {
        echo '<p>' . area('6.5', 2.4) . '</p>';
    } catch (TypeError $e) {
        echo '<p class="missatge error">Error de tipus: ' . htmlspecialchars($e->getMessage()) . '</p>';
    }
    ?>
    <p class="missatge">Missatge exacte: <code>area(): Argument #1 ($base) must be of type float, string given</code>
        (PHP hi afegeix "called in ... on line N").</p>

    <h2>Arreglat amb (float)</h2>
    <p>area((float) '6.5', 2.4) = <?= area((float) '6.5', 2.4) ?></p>
    <?php
    /*
     * És millor que PHP m'avisi en lloc de convertir pel seu compte perquè una conversió
     * automàtica pot amagar errors: si per equivocació passo '3 metres' o 'abc', sense
     * strict_types PHP ho convertiria en silenci (o a 0) i el programa donaria un resultat
     * incorrecte sense cap avís. Amb strict_types l'error surt aviat i exactament on és,
     * i quan faig la conversió amb (float) es veu al codi que ho he decidit jo.
     */
    ?>
</main>
<footer>BitBazar · <?= date('Y') ?></footer>
</body>
</html>

<?php
declare(strict_types=1);

/**
 * Mostra directament l'import amb l'impost estàndard. No torna cap valor.
 *
 * @param float $base Preu sense IVA
 * @return void
 */
function preuAmbIvaEcho(float $base): void
{
    echo $base * 1.21;
}

/**
 * Calcula l'import final amb l'impost estàndard i el retorna.
 *
 * @param float $base Preu sense IVA
 * @return float Preu amb IVA
 */
function preuAmbIva(float $base): float
{
    return $base * 1.21;
}

/**
 * Presenta una quantitat amb dos decimals i la moneda EUR.
 *
 * @param float $preu Preu a formatar
 * @return string Preu formatat, p. ex. "1.234,50 EUR"
 */
function formatPreu(float $preu): string
{
    return number_format($preu, 2, ',', '.') . ' EUR';
}

$preus = [46.80, 112.35, 67.25];

$total = 0.0;
foreach ($preus as $preu) {
    $total += preuAmbIva($preu);
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="estils.css">
    <title>Apartat 3 · Mostrar o retornar dades</title>
    
</head>
<body>
<header><h1>BitBazar</h1><p>Apartat 3 · Mostrar o retornar dades</p></header>
<main>
    <h2>Exercici 1 · Sortida directa i valor retornat</h2>
    <p>Amb echo: <?php preuAmbIvaEcho(175.0); ?></p>
    <p>Amb return: <?= preuAmbIva(175.0) ?></p>
    <p>Amb return i format: <?= formatPreu(preuAmbIva(175.0)) ?></p>

    <h2>Exercici 2 · Reutilitzar els imports calculats</h2>
    <p>Imports inicials: <?= implode(', ', $preus) ?></p>
    <p>Total final: <strong><?= formatPreu($total) ?></strong></p>
    <p>Import màxim final: <strong><?= formatPreu(preuAmbIva(max($preus))) ?></strong></p>
    <?php
    /*
     * Amb preuAmbIvaEcho() no puc fer-ho: la funció escriu el valor directament per pantalla
     * i torna void (res). No tinc cap valor per sumar-lo dins del foreach, ni per passar-lo
     * a formatPreu() o a max(). Una crida com formatPreu(preuAmbIvaEcho(100.0)) donaria un
     * TypeError, perquè formatPreu() espera un float i rep null. Amb echo el valor ja s'ha
     * escrit i no se'n pot fer res més; amb return, qui crida decideix què fer-ne.
     */
    ?>
</main>
<footer>BitBazar · <?= date('Y') ?></footer>
</body>
</html>

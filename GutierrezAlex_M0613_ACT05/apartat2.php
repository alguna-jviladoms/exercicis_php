<?php
declare(strict_types=1);

/**
 * Mostra una salutació personalitzada per a una persona.
 *
 * @param string $nom Nom de la persona a saludar
 * @return void
 */
function saluda(string $nom): void
{
    echo '<p>Hola i benvingut/da a BitBazar, ' . htmlspecialchars($nom) . '!</p>';
}

/**
 * Mostra la fitxa resum d'un article del catàleg.
 *
 * @param string $nom   Nom del producte
 * @param float  $preu  Import de l'article
 * @param int    $estoc Quantitat disponible
 * @return void
 */
function targeta(string $nom, float $preu, int $estoc): void
{
    echo '<div class="targeta" style="border: 1px solid #ccc; padding: 10px; margin: 5px;">';
    echo '<h3>' . htmlspecialchars($nom) . '</h3>';
    echo '<p class="preu">' . number_format($preu, 2, ',', '.') . ' EUR</p>';
    echo '<p>' . $estoc . ' unitats</p>';
    echo '</div>';
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="estils.css">
    <title>Apartat 2 · Els paràmetres</title>
</head>
<body>
<header><h1>BitBazar</h1><p>Apartat 2 · Informació rebuda per les funcions</p></header>
<main>
    <h2>Exercici 1 · Salutacions personalitzades</h2>
    <?php
    saluda('Berta');
    saluda('Iu');
    saluda('Nora');
    ?>

    <h2>Exercici 2 · Fitxes d'articles</h2>
    <div class="graella">
        <?php
        targeta('Llibreta digital', 42.50, 12);
        targeta('Càmera compacta', 418.75, 2);
        targeta('Llum de lectura USB', 18.90, 15);
        ?>
    </div>

    <h2>Exercici 3 · Detectar arguments desordenats</h2>
    <?php
    /*
     * Crida amb l'ordre canviat: targeta(42.50, 'Llibreta digital', 12);
     * Els arguments van per ordre: el primer valor va al primer paràmetre ($nom, string),
     * el segon al segon ($preu, float)... Com que hi ha strict_types=1, PHP no converteix
     * res pel seu compte i llança un error d'arguments
     */
    echo '<p class="missatge error">La crida invertida provocaria un TypeError perquè el preu ocuparia el lloc del nom.</p>';
    targeta('Llibreta digital', 42.50, 12);
    ?>
</main>
<footer>BitBazar · <?= date('Y') ?></footer>
</body>
</html>

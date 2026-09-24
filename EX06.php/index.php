<?php


$price = 99.99;
$price_decimal = number_format($price, 2, ",", ".");

const IVA = 0.21;
$IVA_decimal = number_format($price * IVA, 4, ",", ".");
$total = $price * ( 1 + IVA );
$total_decimal = number_format($total, 2, ",", ".");

$stock = 134;
$ref = "PIK-123456789";

const SHOP_NAME = "PokeMerch";
const CURRENCY = "€";
const PARTNER_DISCOUNT = 0.02;

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda <?= SHOP_NAME ?></title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Tienda <?= SHOP_NAME ?></h1>
        <p>Esto es una tienda online de figuras pokémon</p>
    </header>

    <main>
        <article class="prod">
            <h2>Figura Pikachu</h2>
            <p class="desc">Figurita de tamaño medio de un pikachu</p>
            <p class="price">Preu sense IVA: <?= "$price_decimal " . CURRENCY?></p>
            <p class="price">IVA (21%): <?= $IVA_decimal . ' ' . CURRENCY ?></p>
            <p class="price">TOTAL: <?= $total_decimal . ' ' . CURRENCY?> </p>

            <p class="stock">Unitats disponibles: <?= $stock ?> / 300</p>
            <p class="ref"><?= $ref ?></p>

        </article>

        <!-- ERROR FORZADO AL CAMBAIR LA CONSTANTE -->
        <?php #echo PARTNER_DISCOUNT = 199 ?>

        <footer>
            <p>Footer de PokeMerch</p>
    </footer>
    </main>
</body>
</html>
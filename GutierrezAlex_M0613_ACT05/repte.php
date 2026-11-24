<?php
declare(strict_types=1);

$productes = [
    ['nom' => 'Llibreta digital',      'categoria' => 'papereria',
     'preu' => 42.50,  'estoc' => 12],
    ['nom' => 'Càmera compacta',       'categoria' => 'imatge',
     'preu' => 418.75, 'estoc' => 2],
    ['nom' => "Llum d'escriptori LED1", 'categoria' => 'il·luminacio',
     'preu' => 67.90,  'estoc' => 0],
    ['nom' => 'Micròfon USB',          'categoria' => 'audio',
     'preu' => 94.50,  'estoc' => 5],
    ['nom' => 'Cable multipropòsit',   'categoria' => 'accessoris',
     'preu' => 16.80,  'estoc' => 25],
    ['nom' => 'Motxilla urbana',       'categoria' => 'accessoris',
     'preu' => 58.00,  'estoc' => 0],
];

/**
 * Calcula l'import final aplicant una taxa d'impost.
 *
 * @param float $base Import abans de l'impost
 * @param float $iva  Taxa d'impost en decimal. Per defecte 0.21
 * @return float Import final arrodonit a 2 decimals
 */
function preuAmbIva(float $base, float $iva = 0.21): float
{
    return round($base * (1 + $iva), 2);
}

/**
 * Formata una quantitat amb separadors catalans i la moneda EUR.
 *
 * @param float $preu Preu a formatar
 * @return string Preu formatat
 */
function formatPreu(float $preu): string
{
    return number_format($preu, 2, ',', '.') . ' EUR';
}

/**
 * Determina la disponibilitat d'un article.
 *
 * @param int $estoc Unitats disponibles
 * @return string 'Esgotat', 'Últimes unitats' (3 o menys) o 'Disponible'
 */
function estatEstoc(int $estoc): string
{
    if ($estoc <= 0) {
        return 'Esgotat';
    }
    if ($estoc <= 3) {
        return 'Últimes unitats';
    }
    return 'Disponible';
}

/**
 * Filtra els articles per categoria; amb 'totes' conserva tota la llista.
 *
 * @param array  $productes Catàleg de productes
 * @param string $categoria Categoria a filtrar, o 'totes'
 * @return array Productes de la categoria (array buit si no n'hi ha cap)
 */
function filtraCategoria(array $productes, string $categoria = 'totes'): array
{
    if ($categoria === 'totes') {
        return $productes;
    }
    return array_values(array_filter(
        $productes,
        fn(array $item): bool => $item['categoria'] === $categoria
    ));
}

/**
 * Selecciona els articles amb existències. Helper compartit per altres funcions
 * perquè la regla "disponible" estigui escrita en un sol lloc.
 *
 * @param array $productes Catàleg de productes
 * @return array Productes amb estoc > 0
 */
function filtraDisponibles(array $productes): array
{
    return array_values(array_filter(
        $productes,
        fn(array $item): bool => $item['estoc'] > 0
    ));
}

/**
 * Calcula el valor acumulat de totes les unitats (sense IVA).
 *
 * @param array $productes Catàleg de productes
 * @return float Valor de l'estoc
 */
function valorEstoc(array $productes): float
{
    $total = 0.0;
    foreach ($productes as $item) {
        $total += $item['preu'] * $item['estoc'];
    }
    return round($total, 2);
}

/**
 * Construeix un resum numèric de la col·lecció d'articles.
 *
 * @param array $productes Catàleg de productes
 * @return array Array associatiu amb total, disponibles, esgotats i valor_estoc
 */
function resumCataleg(array $productes): array
{
    $total = count($productes);
    $disponibles = count(filtraDisponibles($productes));

    return [
        'total'        => $total,
        'disponibles'  => $disponibles,
        'esgotats'     => $total - $disponibles,
        'valor_estoc'  => valorEstoc($productes),
    ];
}

/**
 * Escriu l'HTML de la fitxa d'un article.
 *
 * @param array $producte Producte (claus nom, categoria, preu, estoc)
 * @return void
 */
function pintaTargeta(array $producte): void
{
    $estat = estatEstoc($producte['estoc']);
    $classe = match ($estat) {
        'Esgotat'         => 'estat-esgotat',
        'Últimes unitats' => 'estat-ultimes',
        default           => 'estat-disponible',
    };

    echo '<article class="targeta">';
    echo '<p class="categoria">' . htmlspecialchars($producte['categoria']) . '</p>';
    echo '<h3>' . htmlspecialchars($producte['nom']) . '</h3>';
    echo '<p class="preu">' . formatPreu(preuAmbIva($producte['preu'])) . '</p>';
    echo '<p class="estat ' . $classe . '">' . $estat . ' (' . $producte['estoc'] . ')</p>';
    echo '</article>';
}

/**
 * Escriu la graella sencera cridant pintaTargeta() per a cada article.
 * Si no hi ha resultats, mostra un missatge.
 *
 * @param array $productes Productes a mostrar
 * @return void
 */
function pintaGraella(array $productes): void
{
    if (count($productes) === 0) {
        echo '<p class="missatge">No hi ha cap producte en aquesta categoria.</p>';
        return;
    }

    echo '<div class="graella">';
    foreach ($productes as $producte) {
        pintaTargeta($producte);
    }
    echo '</div>';
}

/**
 * Escriu el resum del catàleg recorrent les dades amb un foreach.
 *
 * @param array $resum Resultat de resumCataleg()
 * @return void
 */
function pintaResum(array $resum): void
{
    $etiquetes = [
        'total'       => 'Productes al catàleg',
        'disponibles' => 'Disponibles',
        'esgotats'    => 'Esgotats',
        'valor_estoc' => "Valor de l'estoc",
    ];

    echo '<dl class="resum">';
    foreach ($resum as $clau => $valor) {
        $text = $clau === 'valor_estoc' ? formatPreu($valor) : (string) $valor;
        echo '<dt>' . $etiquetes[$clau] . '</dt><dd>' . $text . '</dd>';
    }
    echo '</dl>';
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="estils.css">
    <title>Repte final · El catàleg de BitBazar</title>
    
</head>
<body>
<header><h1>BitBazar</h1><p>El catàleg · imports amb impost inclòs</p></header>
<main>
    <h2>Indicadors del catàleg</h2>
    <?php pintaResum(resumCataleg($productes)); ?>

    <h2>Tots els articles</h2>
    <?php pintaGraella($productes); ?>

    <h2>Només accessoris disponibles</h2>
    <?php pintaGraella(filtraCategoria($productes, 'accessoris')); ?>

    <h2>Categoria sense resultats (llibres)</h2>
    <?php pintaGraella(filtraCategoria($productes, 'llibres')); ?>
</main>
<footer>BitBazar · <?= date('Y') ?></footer>
</body>
</html>

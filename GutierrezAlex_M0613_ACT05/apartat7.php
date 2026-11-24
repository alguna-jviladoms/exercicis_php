<?php
declare(strict_types=1);

$productes = [
    ['nom' => 'Llibreta digital',     'categoria' => 'papereria',
     'preu' => 42.50,  'estoc' => 12],
    ['nom' => 'Càmera compacta',      'categoria' => 'imatge',
     'preu' => 418.75, 'estoc' => 2],
    ['nom' => "Llum d'escriptori LED1", 'categoria' => 'il·luminacio',
     'preu' => 67.90,  'estoc' => 0],
    ['nom' => 'Micròfon USB',         'categoria' => 'audio',
     'preu' => 94.50,  'estoc' => 5],
    ['nom' => 'Cable multipropòsit',  'categoria' => 'accessoris',
     'preu' => 16.80,  'estoc' => 25],
    ['nom' => 'Motxilla urbana',      'categoria' => 'accessoris',
     'preu' => 58.00,  'estoc' => 0],
];

/**
 * Calcula el valor acumulat de les unitats disponibles.
 *
 * @param array $productes Llista d'articles del catàleg
 * @return float Valor total de les existències
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
 * Compta els articles que no tenen cap unitat disponible.
 *
 * @param array $productes Catàleg de productes
 * @return int Nombre d'articles sense existències
 */
function quantsEsgotats(array $productes): int
{
    $n = 0;
    foreach ($productes as $item) {
        if ($item['estoc'] === 0) {
            $n++;
        }
    }
    return $n;
}

/**
 * Calcula el cost mitjà dels articles. Torna 0 si no n'hi ha cap.
 *
 * @param array $productes Catàleg de productes
 * @return float Preu mitjà amb dos decimals
 */
function preuMitja(array $productes): float
{
    if (count($productes) === 0) {
        return 0.0;
    }
    $suma = 0.0;
    foreach ($productes as $item) {
        $suma += $item['preu'];
    }
    return round($suma / count($productes), 2);
}

/**
 * Selecciona els articles que encara es poden comprar.
 *
 * @param array $productes Catàleg de productes
 * @return array Productes amb estoc > 0
 */
function nomesDisponibles(array $productes): array
{
    $res = [];
    foreach ($productes as $item) {
        if ($item['estoc'] > 0) {
            $res[] = $item;
        }
    }
    return $res;
}

/**
 * Retorna l'article complet amb l'import més elevat.
 *
 * @param array $productes Catàleg de productes
 * @return array El producte més car, o un array buit si no n'hi ha cap
 */
function elMesCar(array $productes): array
{
    $mesCar = [];
    foreach ($productes as $item) {
        if ($mesCar === [] || $item['preu'] > $mesCar['preu']) {
            $mesCar = $item;
        }
    }
    return $mesCar;
}

/**
 * Prepara les dades principals del catàleg.
 *
 * @param array $productes Catàleg de productes
 * @return array Array associatiu amb les claus total, disponibles i mes_car
 */
function resumCataleg(array $productes): array
{
    return [
        'total'       => count($productes),
        'disponibles' => count(nomesDisponibles($productes)),
        'mes_car'     => elMesCar($productes),
    ];
}

$resum = resumCataleg($productes);
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="estils.css">
    <title>Apartat 7 · Consultes sobre un catàleg</title>
    
</head>
<body>
<header><h1>BitBazar</h1><p>Apartat 7 · Consultes sobre un catàleg</p></header>
<main>
    <h2>Exercici 1 · Obtenir indicadors del catàleg</h2>
    <ul>
        <li>valorEstoc(): <?= number_format(valorEstoc($productes), 2, ',', '.') ?> EUR</li>
        <li>quantsEsgotats(): <?= quantsEsgotats($productes) ?></li>
        <li>preuMitja(): <?= number_format(preuMitja($productes), 2, ',', '.') ?> EUR</li>
        <li>preuMitja([]): <?= preuMitja([]) ?> (array buit: no divideix entre zero)</li>
    </ul>

    <h2>Exercici 2 · Filtrar i seleccionar articles</h2>
    <p>nomesDisponibles(): <?= count(nomesDisponibles($productes)) ?> productes
        (<?= htmlspecialchars(implode(', ', array_column(nomesDisponibles($productes), 'nom'))) ?>)</p>
    <p>elMesCar(): <?= htmlspecialchars(elMesCar($productes)['nom']) ?></p>

    <h3>resumCataleg()</h3>
    <dl class="resum">
        <?php foreach ($resum as $clau => $valor): ?>
            <dt><?= htmlspecialchars((string) $clau) ?></dt>
            <dd><?= is_array($valor)
                ? htmlspecialchars($valor['nom']) . ' (' . number_format($valor['preu'], 2, ',', '.') . ' EUR)'
                : htmlspecialchars((string) $valor) ?></dd>
        <?php endforeach; ?>
    </dl>
</main>
<footer>BitBazar · <?= date('Y') ?></footer>
</body>
</html>

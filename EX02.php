<?php

// Declaramos una constante
const IVA = 0.21;

$producte = 'Teclat';
$base = 79.99;
$estoc = 4;

// función predefinida para redondear es el round
$total = round( $base * ( 1 * 21 ), 2);

$nom = 'Alex';
$cognom = 'Navau';
$direccio = 'Calle palomares 9969 puerta B';

?>

<h2><?php echo $producte ?> </h2>
<p>Preu amb IVA: <?=$total ?> EUR</p>
<p>Disponibilitat: <?=$estoc ?> EUR</p>

<h2><?= "DADES PERSONALS"?></h2>
<p>Nom: <strong><?= "{$nom} {$cognom} "?></strong></p>
<p>Direcció: <strong><?=$direccio ?></strong></p>
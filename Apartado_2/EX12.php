<?php
// SIMEPRE PONEMOS ESTO DONDE DECLARAMOS LAS VARIABLES
declare(strict_types=1);

// Declarar función
function pew(): void
{
     echo '<footer>¡Pew pew!</footer>';
}

// Llamar a la función
pew();

// PARAMETROS
function pew2(string $name): void
{
    echo '<footer>¡Pew pew! ' . $name . '</footer>';
}

// Llamar a la función
pew2('Juan');


function preuAmbIva (float $preu, float $iva = 0.21): float { return $preu * (1 + $iva); }
preuAmbIva(100); // 121
preuAmbIva(100, 0.10); // 110


// MUESTRA UN WARNING PORQUE NO TIENE LA VARIABLE BOTIGA EN LOCAL
$botiga = 'BitBazar';
function mostrar(): string { return 'Somos ' . $botiga; }
echo mostrar();

function compta() {
    $n = 0;
    $n++;
    return $n;
}
echo compta(); // 1
echo compta(); // 1
echo compta(); // 1

function compta2() {
    static $n = 0; // hace que se sobrescriba la variable en cada llamada a la función
    $n++;
    return $n;
}
echo compta2(); // 1
echo compta2(); // 2
echo compta2(); // 3

function valorEstoc( array $p ) {
    $total = 0.0;
    foreach ($p as $producte) {
        $total += $producte['preu'] * $producte['quantitat'];
    }
    return $total;
}

function valorEstoc2( array $p ): float {
    $total = 0.0;
    foreach ($p as $producte) {
        if ( $producte['quantitat'] > 0 ) { $res[] = $producte; }
    }
    return $total;
}
?>
<?php

echo 'Hola';
echo "<br>";
echo 'Hola', ' ', 'món';
echo '<p>Text</p>';

print 'Hola'; // retorna 1
var_dump($x); // per depurar
print_r($dades); // llegible 

$nom = 'Aina';
$edat = 19;
$actiu = true;

$nom = 'Bernat';  // es pot canviar
$total = $edat + 1;

echo $nom;

$x = 5;  // int
$x = 'cinc'; // string

$a = '10' + 5; // int
$b = '10' . 5; // '105' (string)

var_dump($a, $b);


// TEXTO SIMPLE con ''
$nom = 'Aina';
echo 'Hola $nom';

// hacer salto de linea
echo "<br>";

// Texto interpretado con ""
echo "Hola $nom";

echo "<br>";

$punts = 8;

// tres maneras distintas de imprimir, me gusta la 3ª
echo 'Hola ' . $nom . ', tens ' . $punts . ' punts';
echo "<br>";
echo "Hola $nom, tens $punts punts";
echo "<br>";
echo "Hola {$nom}, tens {$punts} punts";

define('IVA', 0.21);
const BOTIGA = 'Ca la web';

echo BOTIGA; // sense $

$total = $base * ( 1 + IVA );
// IVA = 0.10 -> ERROR FATAL

$missatge = 'Baby no me llames que yo estoy ocupado olvidando tus males';

function saluda() {
    echo $missatge; // no la veu
    $intern = 'Adeu'; // ambit local 
}

saluda();
echo $intern; // no existe

    /*
    --------------------------------------------- DECLARACIONES ---------------------------------------------
    decalre(strict_types=1); 
        // para que php deje de convertir los tipos de variable solo y se tengasn que declarar obligatoriamente

    ini_set('display_error', '1');
        // canvia el parametre només per aquesta petició

    error_reporting(E_ALL);
        // Decideix quins nivells d'error es tenen en compte ara mateix

    setlocale() · date_default_timezone_set();
        // Idioma i zona horaria per a aquest script

    --------------------------------------------- DECLARACIONES ---------------------------------------------
        */
<?php

// Definicion de una función
// function nomFuncion ( $arg1, $arg2 ) {
//              code
//              return ( opcional )
// }

function cositasConReturn (  ) {
    $var = 10;
    return $var;
}

//------------------------------------------------------------------------------------//

# Como la funcion cositas tiene un return hay que recoger el valor igualandolo en una variable.

$var_fun = cositasConReturn();

echo "La variable de la función vale: {$var_fun}";

function cositasSinReturn (  ) {
    $var = 35434534534;
    echo "Estamos dentro de la función sin return y la variable vale {$var}";
}

echo "<br>";
echo "-------------------------------------------";
echo "<br>";
cositasSinReturn();

//------------------------------------------------------------------------------------//

# Como podemos utilizar dentro de las funciones vatiables globales

$var2 = 50;

function cositasGlobales (  ) {
    // para poder usar una variable global desde la funcion hay que:
    // --> se utliza la palabra reservada global
    global $var2;
    echo "La variable global vale {$var2}";
    }
    
    echo "<br>";
    echo "-------------------------------------------";
    echo "<br>";
    cositasGlobales();

//------------------------------------------------------------------------------------//

# Recursividad --> una funcion se puede llamar a si mismo

function cositasRecursividad ( $numero ) {
    if ( $numero == 1 ) {
        return $numero;
    } else {
        return $numero * cositasRecursividad($numero -1);
    }
}

echo "<br>";
echo "-------------------------------------------";
echo "<br>";
echo 'El factorial de 7 es: ' . cositasRecursividad(7);

//------------------------------------------------------------------------------------//

?>
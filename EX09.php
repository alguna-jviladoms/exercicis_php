<?php 

$var = "10";

//------------------------------------------------------------------------------------//

    # Funciones preestablecidas en php
    # isset() --> permite saber si es una variable existente en nuestro programa
    
    if ( isset($var) ) {
        echo "Baby la variable ( $var ) si existe ";
        } else {
            echo 'Tamos jodidos manito, la variable no existe';
            }
            
            echo '<br>------------------------</br>';

    # unset() --> liberar espacio de memoria
    # (destruir) una variable
    unset($var);
    if ( isset($var) ) {
        echo "Baby la variable ( $var ) si existe ";
    } else {
        echo 'Tamos jodidos manito, la variable no existe';
    }

//------------------------------------------------------------------------------------//

    echo "<br>";

//------------------------------------------------------------------------------------//

    # gettype() --> nos retorna el tipo de variable que pasamos por parametro

    # settype() --> asignamos un tipo de dato a la variable que le pasamos por parametro

    # empty() --> mira si esta varía, no existe o el valor es 0

    # is_integer() --> es para mirar si la variable es del tipo seleccionado
    # is_double()  --> es para mirar si la variable es del tipo seleccionado
    # is_array()   --> es para mirar si la variable es del tipo seleccionado
    # is_string()  --> es para mirar si la variable es del tipo seleccionado

//------------------------------------------------------------------------------------//

    # EX1 --> for para la tabla de multiplicar del 5
    # --> check si la variable existe

    function ex1 () {
        echo '<h2>EX1 - Tabla del 5</h2>';
        echo '<div class="caja">';
        for ( $i = 0; $i <= 10; $i++ ) {
            $a = $i * 5;
            if ( isset($a) ) {
                echo "5 x $i = $a <br>";
            }
        }
        echo '</div>';
    }

//------------------------------------------------------------------------------------//

    # EX2 --> mostrar los números pares del 1 al 1000

    function ex2 () {
        echo '<h2>EX2 - Números pares del 1 al 1000</h2>';
        echo '<div class="caja numeros">';
        for ( $i = 1; $i <= 1000; $i++ ) {
            if ( $i % 2 == 0 ) {
                echo "$i ";
            }
        }
        echo '</div>';
    }

//------------------------------------------------------------------------------------//

# EX3 --> Dibuja una tabla html donde salgan las tablas de multiplicar del 1 al 10

function ex3 () {
    echo '<h2>EX3 - Tablas de multiplicar</h2>';
    echo '<table>';
    for ( $i = 0; $i < 10;  $i++ ) {
        echo "<tr>";
        for ( $j = 0; $j <= 10;  $j++ ) {
            $result = $i * $j;
            echo "<td> $i x $j = $result </td>";
        }
        echo "</tr>";
    }
    echo '</table>';
}

?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EX09</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
            color: #333;
        }

        h2 {
            color: #00695c;
            margin-top: 30px;
            border-bottom: 2px solid #00695c;
            display: inline-block;
            padding-bottom: 4px;
        }

        /* Caja genérica para ex1 y ex2 */
        .caja {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            padding: 15px;
            margin: 15px auto;
            max-width: 600px;
            text-align: left;
            line-height: 1.6;
        }

        /* Los números pares en línea, más compactos */
        .numeros {
            text-align: justify;
            font-size: 14px;
            max-height: 200px;
            overflow-y: auto;
        }

        table {
            margin: 15px auto;
            border-collapse: collapse;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        td {
            border: 1px solid #ccc;
            padding: 6px 10px;
            font-size: 13px;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e0f7fa;
        }
    </style>
</head>
<body>
    <?php ex1() ?>
    <?php ex2() ?>
    <?php ex3() ?>
</body>
</html>
<?php

// funciones con cadenas de taxto (strings)

$cadena = "Hello";

$cadena[0] = "C";

echo $cadena;
                                echo "<br>";
                                echo "----------------------------------------------";
                                echo "<br>";


// funciones preestablecidas de PHP

    # strlen --> medir la longitud de la cadena
    $cadena = "Big booty and big eyes";
    $num_caracteres = strlen($cadena);
    echo "La cadena [{$cadena}] tiene $num_caracteres caracteres";

                                echo "<br>";
                                echo "----------------------------------------------";
                                echo "<br>";

    # strpos --> retorna la casella on troba la subcadena dins de la cadena pasada
    # y retorna la primera ocurrència

    $email = "bigBooty@jviladoms.eyes";
    echo "Posició de @ a la cadena [{$email}]: " . strpos($email, "@");

                                    echo "<br>";
                                echo "----------------------------------------------";
                                echo "<br>";

    # srtcmp --> compara 2 cadenas
        # Si son iguales devuelve 0
        # Si retorna <0 la primera es mas pequeña
        # Si retorna >0 la primera es más grande

    echo "Utilizamos strcmp " . strcmp("Ale", "Pepe");

                                    echo "<br>";
                                    echo "----------------------------------------------";
                                    echo "<br>";

    # substr --> retorna la subadena de caràcters d'una
        # cadena a partir d'una posició especificadda fins
        # al final o del tamany especificat
        # La cadena original no pateix cap podificació

    $cadena2 = "Cositas cosotas casotas cansadas";
    echo $cadena2 . "<br>";
    echo "El substr de 0 a 3 és: [" . substr($cadena2, 0, 3) . "]<br>";
    echo "El substr de 21 és: [" . substr($cadena2, 21) . "]";

                                    echo "<br>";
                                    echo "----------------------------------------------";
                                    echo "<br>";

    # trim --> eliminar los espacios en blanco y saltos de linea
        # que hay al principio y al final de la cadena
    
    echo "Ejemplo con trim:" . trim("       Hola que tal        ");

                                        echo "<br>";
                                        echo "----------------------------------------------";
                                        echo "<br>";

    # ltrim --> elimina los esoacuis que hay en blanco al principio de la cadena

    echo "Ejemplo con ltrim: " . ltrim("        Hola que tal                papito");

                                        echo "<br>";
                                        echo "----------------------------------------------";
                                        echo "<br>";

    # str_replace --> substituye una cadena por otra dentro de la variable/cadena 
    $real = "Gozilla gana en todo";
    $antiga = "gana";
    $nova = "pierde";

    echo "Cadena original: [{$real}]" . "<br>";
    echo "Ejemplo srt_replace: " . str_replace($antiga, $nova, $real);

                                        echo "<br>";
                                        echo "----------------------------------------------";
                                        echo "<br>";

    # ereg_replace / eregi_replace()

    # strtolower --> passa a minusculas

    # strtoupper --> passa a majuscules

    # explode --> permet dividir una cadena segons caracters o patrons

    /*
    
        EXERCICI 1:
            - BUSCA EN PHP.NET LA FUNCIÓ: srt_word_count() Y PON UN EJEMPLO

        EXERCICI 2:
            - BUSCA EN PHP.NET LA FUNCIÓ: levenshtein() Y PON UN EJEMPLO

        EXERCICI 3:
            - BUSCA QUE ES UN OPERADOR TERNARIO Y PON UN EJEMPLO

        EXERCICI 4:
            - EXPLICAR QUE HACE LA SIGUIENTE FUNCION:

            function funcioMultipleReturns ($v1, $v2, v3) {
                $v1 = "variable1";
                $v2 = "variable2";
                $v3 = "variable3";

                return array($v1, $v2, v3);
            }

        EXERCICI 5:
            - CREA UNA FUNCIO COMPROVA_EMAIL QUE RECIBA UNA CADENA DE CARACTERES
                COMO PARÀMETRO QUE CONTIENE UN EMAIL Y HACE LAS SIGUIENTES COMPROVACIONES
                - CONVERTIR A MINUSCULAS
                - ELIMINAR TODOS LOS ESPACIOS EN BLANCO
                - COMPROVAR SI TIENE EL CARACTER @ 
                - CONTAR EL NUMERO DE CARACTERES
    */
?>
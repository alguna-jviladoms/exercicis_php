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
                compta el nombre de paraules d'una cadena de text
                str_word_count(string $string, int $format = 0, ?string $characters = null): mixed
                    - $string: La cadena d'entrada.
                    - $format (opcional):
                        - 0 (per defecte): retorna el nombre de paraules.
                        - 1: retorna un array amb totes les paraules trobades.
                        - 2: retorna un array associatiu on la clau és la posició de la paraula i el valor és la paraula.
                    - $characters (opcional): Llista de caràcters addicionals que es consideren part d'una paraula.
    */

                                        echo "<br>";
                                        echo "----------------------------------------------";
                                        echo "<br>";
                                        $str = "Hello fri3nd, you're looking good today!";

                                        // Nombre de paraules (format 0)
                                        echo str_word_count($str, 0); // Sortida: 7
                                        echo str_word_count($str, 1); // ARRAY
                                        echo str_word_count($str, 2); // array asociativo

                                        echo "<br>";
                                        echo "----------------------------------------------";
                                        echo "<br>";

    /*
        EXERCICI 2:
            - BUSCA EN PHP.NET LA FUNCIÓ: levenshtein() Y PON UN EJEMPLO
            calcula la distància de Levenshtein entre dues cadenes. Aquesta distància es 
            defineix com el nombre mínim de caràcters que cal substituir, inserir o eliminar
            per transformar la primera cadena en la segona

            levenshtein(
                string $string1,
                string $string2,
                int $insertion_cost = 1,
                int $replacement_cost = 1,
                int $deletion_cost = 1
            ): int
            - $string1 i $string2: Les dues cadenes a comparar.

            - $insertion_cost, $replacement_cost, $deletion_cost (opcionals): Costos personalitzats per a cada operació.
        */

                                        echo "<br>";
                                        echo "----------------------------------------------";
                                        echo "<br>";

                                        $input = 'carrrot';
                                        // Array de paraules per comparar
                                        $words = array('apple', 'pineapple', 'banana', 'orange',
                                                    'radish', 'carrot', 'pea', 'bean', 'potato');
                                        // Distància més curta
                                        $shortest = -1;
                                        foreach ($words as $word) {
                                            $lev = levenshtein($input, $word);
                                            // Coincidència exacta
                                            if ($lev == 0) {
                                                $closest = $word;
                                                $shortest = 0;
                                                break;
                                            }

                                            // Distància més curta
                                            if ($lev <= $shortest || $shortest < 0) {
                                                $closest  = $word;
                                                $shortest = $lev;
                                            }
                                        }

                                        echo "Paraula introduïda: $input\n";
                                        if ($shortest == 0) {
                                            echo "Coincidència exacta: $closest\n";
                                        } else {
                                            echo "Volies dir: $closest?\n";
                                        }

                                        echo "<br>";
                                        echo "----------------------------------------------";
                                        echo "<br>";

    /*
        EXERCICI 3:
            - BUSCA QUE ES UN OPERADOR TERNARIO Y PON UN EJEMPLO
            L'operador ternari (? :) és un operador condicional que permet avaluar una expressió
            i retornar un valor o un altre segons si la condició és certa o falsa. És una alternativa
            compacta a la sentència if-else, especialment útil per a assignacions simples.

            (condició) ? valor_si_cert : valor_si_fals

    */

                                        echo "<br>";
                                        echo "----------------------------------------------";
                                        echo "<br>";
                                        $str = "Hello fri3nd, you're looking good today!";

                                        // Nombre de paraules (format 0)
                                        $limit = isset($_GET['limit']) ? $_GET['limit'] : 10;

                                        /* ES LO MISMO 
                                        if (isset($_GET['limit'])) {
                                            $limit = $_GET['limit'];
                                        } else {
                                            $limit = 10;
                                        }
                                        */
                                        echo "<br>";
                                        echo "----------------------------------------------";
                                        echo "<br>";

    /*
        EXERCICI 4:
            - EXPLICAR QUE HACE LA SIGUIENTE FUNCION:

            function funcioMultipleReturns ($v1, $v2, v3) {
                $v1 = "variable1";
                $v2 = "variable2";
                $v3 = "variable3";

                return array($v1, $v2, v3);
            }

            Rep tres paràmetres ($v1, $v2, $v3), però no els utilitza per al resultat final.
            Sobreescriu cada paràmetre amb una cadena de text fixa:
            $v1 passa a ser "variable1"
            $v2 passa a ser "variable2"
            $v3 passa a ser "variable3"
            Retorna un array que conté aquestes tres cadenes.
    */
    /*
        EXERCICI 5:
            - CREA UNA FUNCIO COMPROVA_EMAIL QUE RECIBA UNA CADENA DE CARACTERES
                COMO PARÀMETRO QUE CONTIENE UN EMAIL Y HACE LAS SIGUIENTES COMPROVACIONES
                - CONVERTIR A MINUSCULAS
                - ELIMINAR TODOS LOS ESPACIOS EN BLANCO
                - COMPROVAR SI TIENE EL CARACTER @ 
                - CONTAR EL NUMERO DE CARACTERES
    */

                                        echo "<br>";
                                        echo "----------------------------------------------";
                                        echo "<br>";
                                        $str = "Hello fri3nd, you're looking good today!";

                                            function comprova_email($email) {
                                                // 1. Convertir a minúscules
                                                $email = strtolower($email);

                                                // 2. Eliminar tots els espais en blanc
                                                $email = str_replace(' ', '', $email);

                                                // 3. Comprovar si conté el caràcter @
                                                $teArrova = (strpos($email, '@') !== false);

                                                // 4. Comptar el nombre de caràcters
                                                $numCaracters = strlen($email);

                                                // Retornar els resultats en un array associatiu
                                                return [
                                                    'email_normalitzat' => $email,
                                                    'te_arrova'        => $teArrova,
                                                    'num_caracters'    => $numCaracters
                                                ];
                                            }

                                            // Exemple d'ús
                                            $resultat = comprova_email("  Usuari.Exemple@GMAIL.COM  ");
                                            print_r($resultat);
                                            /* Sortida:
                                            Array
                                            (
                                                [email_normalitzat] => usuari.exemple@gmail.com
                                                [te_arrova] => 1
                                                [num_caracters] => 25
                                            )
                                            */

                                        echo "<br>";
                                        echo "----------------------------------------------";
                                        echo "<br>";
?>
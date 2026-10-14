<?php
    /*
        EXERCICI 1: Les tres maneres
            - Crea $grups amb assignació directa: cinc grups, i fes que un vagi
              a la posició 8 i el següent sense indicar posició.
            - Crea $estils amb array() i $edicions amb range(2019, 2026).
            - Parteix una frase en paraules amb explode() i desa-la a $paraules.
            - Mostra els quatre arrays amb print_r() dins de <pre>.
            - Mostra un dels arrays amb print_r(), var_dump() i var_export().
    */

                                        echo "<br>";
                                        echo "----------------------------------------------";
                                        echo "<br>";

    # 1. Assignació directa
    # $grups[] sense índex agafa la SEGÜENT posició lliure a partir de l'últim índex
    $grups[0] = 'paquito';
    $grups[] = 'chocolatero';        // va a la 1
    $grups[8] = 'francisco';       // posició 8
    $grups[] = 'romancito';    // va a la 9, no a la 2 !!
    $grups[2] = 'orco'; // afegim un més per tenir-ne cinc

    # 2. Amb la funció array()
    $estils = array('estilo1', 'estilo2', 'estilo3');

    # 3. Amb range()
    $edicions = range(2019, 2026);

    # 4. Amb explode() -- dividim una frase per espais
    $frase = "Els concerts del festival comencen a les deu";
    $paraules = explode(" ", $frase);

    # Mostrem els quatre arrays amb print_r() dins de <pre>
    # <pre> respecta els salts de línia i els espais tal com els escrius
    echo "<pre>";
    echo "=== \$grups ===\n";
    print_r($grups);

    echo "\n=== \$estils ===\n";
    print_r($estils);

    echo "\n=== \$edicions ===\n";
    print_r($edicions);

    echo "\n=== \$paraules ===\n";
    print_r($paraules);
    echo "</pre>";

                                        echo "<br>";
                                        echo "----------------------------------------------";
                                        echo "<br>";

    # Comparem print_r, var_dump i var_export amb $estils
    echo "<pre>";
    echo "--- print_r(\$estils) ---\n";
    print_r($estils);

    echo "\n--- var_dump(\$estils) ---\n";
    var_dump($estils);

    echo "\n--- var_export(\$estils) ---\n";
    var_export($estils);
    echo "</pre>";

    /*
        Diferències observades:
            - print_r()   --> mostra el contingut llegible per humans. No indica tipus.
            - var_dump()  --> mostra el contingut AMB el tipus de cada valor i la mida.
                              És la que més fem servir per depurar errors.
            - var_export()--> mostra el contingut com a CODI PHP vàlid, és a dir, el codi
                              que tornaria a crear exactament aquest array.

        Per què després de la posició 8 el grup següent no va a la 2?
            Perquè quan fem servir $grups[] sense índex, PHP agafa la posició
            SEGÜENT LLIURE a partir de l'ÚLTIM índex assignat. Com que l'últim índex
            era 8, el següent va a 9. Els forats (2..7) queden buits i no s'omplen.
    */

                                        echo "<br>";
                                        echo "----------------------------------------------";
                                        echo "<br>";

    /*
        EXERCICI 2: L'array associatiu
            - Crea $estils com a array associatiu on la clau sigui el nom del grup
              i el valor, el seu estil musical. Posa'n dos amb assignació directa
              i dos més amb array().
            - Mostra per pantalla l'estil d'un grup concret accedint-hi per la clau.
            - Afegeix-hi un grup nou i mostra l'array sencer amb print_r().
            - Mostra quants grups hi ha amb count().
    */

    # Array associatiu: grup => estil
    # Dues assignacions directes
    $estilGrup['paquito']  = 'estilo1';
    $estilGrup['chocolatero']   = 'estilo2';

    # Dues més amb array()
    $estilGrup = array(
        'paquito'    => 'estilo1',
        'chocolatero'     => 'estilo2',
        'francisco'     => 'estilo4',
        'romancito' => 'estilo3'
    );

    # Mostrem l'estil d'un grup concret accedint per la clau
    echo "<p>L'estil de paquito és: " . $estilGrup['paquito'] . "</p>";

    # Afegim un grup nou i mostrem l'array sencer
    $estilGrup['orco'] = 'Indie estilo4';

    echo "<pre>";
    print_r($estilGrup);
    echo "</pre>";

    # Quants grups hi ha amb count()
    echo "<p>Hi ha " . count($estilGrup) . " grups.</p>";

                                        echo "<br>";
                                        echo "----------------------------------------------";
                                        echo "<br>";

    /*
        EXERCICI 3: Esborrar una casella
            - Crea un array de cinc grups amb índexs numèrics i mostra count().
            - Esborra el tercer grup amb unset() i torna a mostrar l'array i el count().
            - Afegeix-hi un grup nou amb [] i mira a quina posició ha anat a parar.
            - Explica en un comentari per què, després d'un unset(), un bucle for
              de 0 a count()-1 pot fallar.
    */

    $grupsCinc = array('paquito', 'chocolatero', 'francisco', 'romancito', 'orco');
    echo "<p>Inicialment hi ha " . count($grupsCinc) . " grups.</p>";

    # Esborrem el tercer grup (índex 2)
    unset($grupsCinc[2]);

    echo "<pre>";
    print_r($grupsCinc);
    echo "</pre>";
    echo "<p>Després d'unset() queden " . count($grupsCinc) . " grups.</p>";

    # Afegim un grup nou amb []
    $grupsCinc[] = 'La marquitos Band';
    echo "<pre>";
    print_r($grupsCinc);
    echo "</pre>";

    /*
        Per què pot fallar un bucle for de 0 a count()-1 després d'un unset()?
            Perquè count() torna el numero d'elements (4 en aquest cas), però els índexs
            NO són correlatius: tenim 0, 1, 3, 4 i 5 (falta el 2). Un bucle
            for ($i = 0; $i < count($grupsCinc); $i++) intentaria accedir a
            l'índex 2, que ja no existeix, i PHP llançaria un avís
            "Undefined array key 2". La solució és fer servir foreach,
            o recórrer amb array_values(), o comprovar amb isset().
    */

?>
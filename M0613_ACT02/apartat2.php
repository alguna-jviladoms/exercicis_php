<?php
    # Reaprofitem l'array de grups
    $grups = array('paquito', 'chocolatero', 'francisco', 'romancito', 'orco Grasses');

    /*
        EXERCICI 1: Foreach bàsic
            - Amb el teu array de grups, genera una llista <ul> amb un <li> per grup,
              fent servir foreach i la sintaxi alternativa.
            - Fes-ne una segona versió que mostri també la posició de cada grup.
    */

                                        echo "<br>";
                                        echo "----------------------------------------------";
                                        echo "<br>";

    echo "<h3>Llista de grups (sintaxi alternativa)</h3>";
    echo "<ul>";
    foreach ($grups as $grup):
        echo "<li>$grup</li>";
    endforeach;
    echo "</ul>";

    # Segona versió amb la posició
    echo "<h3>Llista de grups amb posició</h3>";
    echo "<ul>";
    foreach ($grups as $index => $grup):
        echo "<li>Grup $index: $grup</li>";
    endforeach;
    echo "</ul>";

                                        echo "<br>";
                                        echo "----------------------------------------------";
                                        echo "<br>";

    /*
        EXERCICI 2: Foreach sobre un associatiu
            - Amb l'array associatiu grup => estil, genera una taula HTML amb dues columnes.
            - Afegeix una fila al final amb el total de grups.
    */

    $estilGrup = array(
        'paquito'      => 'estilo1',
        'chocolatero'       => 'estilo2',
        'francisco'       => 'estilo3',
        'romancito'   => 'estilo4',
        'orco Grasses' => 'estilo5'
    );

    echo "<h3>Taula grup => estil</h3>";
    echo "<table border='1' cellpadding='6'>";
    echo "<tr><th>Grup</th><th>Estil</th></tr>";
    foreach ($estilGrup as $grup => $estil):
        echo "<tr><td>$grup</td><td>$estil</td></tr>";
    endforeach;
    echo "<tr><td><strong>TOTAL</strong></td><td><strong>" . count($estilGrup) . "</strong></td></tr>";
    echo "</table>";

                                        echo "<br>";
                                        echo "----------------------------------------------";
                                        echo "<br>";

    /*
        EXERCICI 3: El mateix sense foreach
            - Recorre el mateix array associatiu amb do-while i les funcions
              reset(), key(), current() i next().
            - Comprova que la sortida és idèntica a la de l'E2.
            - Escriu en un comentari quina de les dues maneres et sembla més clara i per què.
    */

    # reset() --> situa el punter a la primera casella
    # key()   --> torna l'índex on som
    # current() --> torna el valor on som
    # next()  --> avança una casella. Si ja érem al final, torna false
    # Es fa amb do-while i no amb while perquè la primera casella s'ha de llegir
    # abans de mirar si n'hi ha una de següent

    echo "<h3>Mateix contingut amb do-while i el punter</h3>";
    echo "<table border='1' cellpadding='6'>";
    echo "<tr><th>Grup</th><th>Estil</th></tr>";

    reset($estilGrup);
    do {
        $clau  = key($estilGrup);
        $valor = current($estilGrup);
        echo "<tr><td>$clau</td><td>$valor</td></tr>";
    } while (next($estilGrup));

    echo "<tr><td><strong>TOTAL</strong></td><td><strong>" . count($estilGrup) . "</strong></td></tr>";
    echo "</table>";

    /*
        Quina manera és més clara?
            El foreach. El codi és més curt, més llegible i no cal
            manipular el punter intern de l'array. El do-while amb reset/key/current/next
            és útil quan necessitem controlar explícitament el punter (per exemple per
            recórrer en ordre invers), però per a un recorregut normal és més farragós
            i més fàcil d'equivocar-se.
    */

                                        echo "<br>";
                                        echo "----------------------------------------------";
                                        echo "<br>";

    /*
        EXERCICI 4: A l'inrevés, dins d'una funció
            - Escriu la funció recorrerInvers(array $llista) que mostri els elements
              de l'últim al primer amb end(), key(), current() i prev().
            - Crida-la passant-li l'array de grups i estils.
            - Després de cridar-la, recorre l'array original amb un foreach normal
              i comprova que no s'ha vist afectat.
    */

    # end()  --> situa el punter a l'última casella
    # prev() --> retrocedeix una casella. Si ja érem a la primera, torna false

    function recorrerInvers(array $llista) {
        echo "<ul>";
        end($llista);
        do {
            $clau  = key($llista);
            $valor = current($llista);
            echo "<li>[$clau] => $valor</li>";
        } while (prev($llista));
        echo "</ul>";
    }

    echo "<h3>Recorregut invers de \$grups</h3>";
    recorrerInvers($grups);

    echo "<h3>Recorregut invers de \$estilGrup</h3>";
    recorrerInvers($estilGrup);

    # Comprovem que l'array original no s'ha vist afectat
    echo "<h3>Comprovació: \$grups després de la crida</h3>";
    echo "<ul>";
    foreach ($grups as $grup):
        echo "<li>$grup</li>";
    endforeach;
    echo "</ul>";

    /*
        La funció rep una CÒPIA de l'array (per valor), per tant
            el punter que movem dins de recorrerInvers() no afecta l'array original
            de fora. La prova de dalt ho confirma: l'ordre original es manté.
    */

?>
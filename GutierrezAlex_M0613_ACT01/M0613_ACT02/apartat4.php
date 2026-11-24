<?php
    # Una casella d'un array pot contenir un altre array.
    # Així es representa una taula de dades: cada casella és una fila i cada fila
    # és un array associatiu amb els seus camps.

    /*
        EXERCICI 1: La taula de concerts
            - Copia l'array $concerts al teu fitxer.
            - Mostra'l tot en una taula HTML amb les cinc columnes, fent servir foreach
              i la sintaxi alternativa.
            - Mostra a part el nom del tercer concert accedint-hi directament, sense bucle.
            - Formata el preu amb number_format().
    */

                                        echo "<br>";
                                        echo "----------------------------------------------";
                                        echo "<br>";

    $concerts = [
        ['nom' => 'orco Grasses', 'escenari' => 'Gran', 'hora' => '22:30', 'assistents' => 4200, 'preu' => 28.0],
        ['nom' => 'chocolatero',       'escenari' => 'Petit', 'hora' => '20:00', 'assistents' => 1850, 'preu' => 18.0],
        ['nom' => 'francisco',   'escenari' => 'Gran', 'hora' => '00:30', 'assistents' => 3600, 'preu' => 24.0],
        ['nom' => 'paquito',       'escenari' => 'Petit', 'hora' => '21:15', 'assistents' => 2100, 'preu' => 20.0],
        ['nom' => 'romancito',      'escenari' => 'Gran', 'hora' => '23:30', 'assistents' => 5100, 'preu' => 32.0],
        ['nom' => 'La marquitos Band','escenari' => 'Petit', 'hora' => '18:45', 'assistents' => 900,  'preu' => 15.0],
    ];

    # Podem accedir directament a un camp concret: primer la posició, després el camp
    # echo $concerts[0]['nom']; // romancito: primer la posició, després el camp

    echo "<h3>Cartell de concerts</h3>";
    echo "<table border='1' cellpadding='6'>";
    echo "<tr>";
    echo "<th>Nom</th><th>Escenari</th><th>Hora</th><th>Assistents</th><th>Preu</th>";
    echo "</tr>";

    foreach ($concerts as $c):
        echo "<tr>";
        echo "<td>" . $c['nom'] . "</td>";
        echo "<td>" . $c['escenari'] . "</td>";
        echo "<td>" . $c['hora'] . "</td>";
        echo "<td>" . $c['assistents'] . "</td>";
        # number_format --> formata el preu amb 2 decimals, coma decimal i punt de milers
        echo "<td>" . number_format($c['preu'], 2, ',', '.') . " €</td>";
        echo "</tr>";
    endforeach;
    echo "</table>";

    # Nom del tercer concert accedint-hi directament (índex 2)
    echo "<p>El tercer concert és: <strong>" . $concerts[2]['nom'] . "</strong></p>";

                                        echo "<br>";
                                        echo "----------------------------------------------";
                                        echo "<br>";

    /*
        EXERCICI 2: Array associatiu als dos nivells
            - Copia l'array $escenaris: és associatiu als dos nivells.
            - Mostra la capacitat de l'escenari Gran accedint-hi directament.
            - Recorre'l amb dos foreach niats: el de fora per als escenaris i el de dins
              per als camps de cadascun.
    */

    # Array associatiu als dos nivells: $colors['forts']['vermell']
    $escenaris = [
        'Gran' => [
            'capacitat' => 6000,
            'coberta'   => 'no',
            'ubicacio'  => 'Pista central',
        ],
        'Petit' => [
            'capacitat' => 2500,
            'coberta'   => 'sí',
            'ubicacio'  => 'Pavelló',
        ],
    ];

    # Accés directe a la capacitat de l'escenari Gran
    echo "<p>Capacitat de l'escenari Gran: <strong>"
         . $escenaris['Gran']['capacitat'] . "</strong> persones.</p>";

    # Recorregut amb dos foreach niats
    echo "<h3>Informació dels escenaris</h3>";
    foreach ($escenaris as $nomEscenari => $dades):
        echo "<h4>Escenari: $nomEscenari</h4>";
        echo "<ul>";
        foreach ($dades as $camp => $valor):
            echo "<li><strong>$camp:</strong> $valor</li>";
        endforeach;
        echo "</ul>";
    endforeach;

    /*
        Al foreach de fora, $dades NO és un text: és un array sencer
            (l'array intern de cada escenari). Per això cal un segon foreach per
            obrir-lo i recórrer els seus camps (capacitat, coberta, ubicacio).
    */

?>
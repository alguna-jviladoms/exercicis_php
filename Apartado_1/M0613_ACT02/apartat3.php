<?php
    # count($a)          --> quantes caselles té
    # in_array($x,$a,true)--> si el valor $x hi és. El true fa la comparació estricta
    # unset($a[2])       --> esborra una casella. Sense índex, esborra l'array sencer
    # asort/arsort       --> ordena per VALOR, de menor a major i a l'inrevés
    # ksort/krsort       --> ordena per CLAU, de menor a major i a l'inrevés
    # shuffle($a)        --> desordena a l'atzar. Compte: perd les claus
    #
    # ATENCIÓ: asort, ksort i companyia MODIFIQUEN l'array que reben: no en tornen un de nou.
    #          Si vols conservar l'original, fes-ne una còpia abans.

    $grups = array('paquito', 'chocolatero', 'francisco', 'romancito', 'orco Grasses');

    /*
        EXERCICI 1: Buscar un grup
            - Amb in_array(), comprova si dos grups concrets són al cartell i mostra
              un missatge diferent per a cada cas.
            - Escriu la funció buscaGrup(array $llista, string $grup), que torni
              la posició on és el grup o -1 si no hi és.
            - Prova-la amb un grup que hi sigui i un que no.
    */

                                        echo "<br>";
                                        echo "----------------------------------------------";
                                        echo "<br>";

    # in_array: comprova si dos grups concrets són al cartell
    if (in_array('paquito', $grups, true)) {
        echo "<p>paquito SÍ és al cartell.</p>";
    } else {
        echo "<p>paquito NO és al cartell.</p>";
    }

    if (in_array('Rosalía', $grups, true)) {
        echo "<p>Rosalía SÍ és al cartell.</p>";
    } else {
        echo "<p>Rosalía NO és al cartell.</p>";
    }

    # Funció que torna la POSICIÓ on és el grup, o -1 si no hi és
    # Fixa't: in_array() et diu SI hi és; la meva funció et dirà ON és.
    # Dins de la funció, el return surt immediatament del bucle.
    function buscaGrup(array $llista, string $grup) {
        foreach ($llista as $index => $valor) {
            if ($valor === $grup) {
                return $index;   // return surt immediatament del bucle
            }
        }
        return -1;
    }

    echo "<p>Posició de 'francisco': " . buscaGrup($grups, 'francisco') . "</p>";
    echo "<p>Posició de 'Rosalía': " . buscaGrup($grups, 'Rosalía') . "</p>";

                                        echo "<br>";
                                        echo "----------------------------------------------";
                                        echo "<br>";

    /*
        EXERCICI 2: Les quatre ordenacions
            - Crea un array associatiu grup => nombre d'assistents, amb cinc grups.
            - Fes quatre còpies i aplica a cadascuna asort(), arsort(), ksort() i krsort().
            - Mostra els quatre resultats, cadascun amb el seu títol.
            - Explica en un comentari la diferència entre asort() i ksort().
    */

    $assistents = array(
        'paquito'      => 5100,
        'chocolatero'       => 1850,
        'romancito'   => 3600,
        'francisco'       => 2100,
        'orco Grasses' => 4200
    );

    # Fem quatre còpies per conservar l'original
    $asort  = $assistents;  asort($asort);   // per VALOR ascendent
    $arsort = $assistents;  arsort($arsort); // per VALOR descendent
    $ksort  = $assistents;  ksort($ksort);   // per CLAU ascendent
    $krsort = $assistents;  krsort($krsort); // per CLAU descendent

    echo "<h3>asort() — per valor ascendent</h3><pre>";
    print_r($asort);
    echo "</pre>";

    echo "<h3>arsort() — per valor descendent</h3><pre>";
    print_r($arsort);
    echo "</pre>";

    echo "<h3>ksort() — per clau ascendent</h3><pre>";
    print_r($ksort);
    echo "</pre>";

    echo "<h3>krsort() — per clau descendent</h3><pre>";
    print_r($krsort);
    echo "</pre>";

    /*
        Diferència entre asort() i ksort():
            - asort() ordena l'array segons el VALOR (els assistents), mantenint
              l'associació clau => valor.
            - ksort() ordena l'array segons la CLAU (el nom del grup), alfabèticament.
            Per tant, amb el mateix array obtenim ordres completament diferents:
            un ens ordena per nombre d'assistents i l'altre per ordre alfabètic.
    */

                                        echo "<br>";
                                        echo "----------------------------------------------";
                                        echo "<br>";

    /*
        EXERCICI 3: Barrejar el cartell
            - Aplica shuffle() a l'array associatiu de l'exercici anterior i mostra'l amb print_r().
            - Explica què ha passat amb els noms dels grups.
            - Fes-ho bé: barreja un array on els noms dels grups siguin el valor,
              i mostra l'ordre del sorteig en una llista numerada.
    */

    $barrejat = $assistents;
    shuffle($barrejat);

    echo "<h3>shuffle() sobre l'array associatiu</h3><pre>";
    print_r($barrejat);
    echo "</pre>";

    /*
        Què ha passat amb els noms dels grups?
            shuffle() DESTRUEIX les claus: les substitueix per índexs numèrics
            correlatius (0,1,2,3,4). Els noms dels grups (que eren les CLAUS)
            s'han perdut. Només queden els valors (els assistents) barrejats.
            Per tant, shuffle() no serveix per barrejar un array associatiu
            si volem conservar la relació grup => assistents.
    */

    # Fet bé: barregem un array on els grups són el VALOR
    $nomsGrups = array_values($assistents); // array indexat amb els noms
    shuffle($nomsGrups);

    echo "<h3>Ordre del sorteig</h3>";
    echo "<ol>";
    foreach ($nomsGrups as $grup):
        echo "<li>$grup</li>";
    endforeach;
    echo "</ol>";

?>
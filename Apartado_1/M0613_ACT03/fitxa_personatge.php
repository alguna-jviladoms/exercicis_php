<?php
    # STATS BASE DEL PJ
    # 2 - Variables amb les dades del personatge: 
        # nom
        # classe
        # nivell
        # vida actual
        # força actual
        # experiència 
        # atac base per exemple

    $playerName = "PAQUITO";
    $playerClass = "WARRIOR";
    $playerLevel = 0;
    $playerHealth= 100;
    $playerStrengh = 5;
    $playerExperience = 0;
    $playerBaseAttack = 5;

    # STATS MAXIMAS
    # 1 - Cinc constants amb les regles del joc: nom del joc, vida màxima, 
    # experiència necessària per nivell, força màxima i percentatge de vida 
    # per sota del qual el personatge està ferit

    const GAMENAME = "REGNE DE LOS CHACHIS";
    const MAXHEALTH = 100;
    const MAXINJUREDHEALTH= 20;
    $maxExperience = 100 + ( $playerLevel * 10);
    const MAXSTRENGTH  = 100;

    #STATS CALCULADAS DEL PJ
    # 3 - Càlculs: 
        # percentatge de vida
        # percentatge de força
        # experiència que li falta per pujar de nivell
        # poder d'atac (creix amb el nivell)

    $healthPercentage = ($playerHealth / MAXHEALTH) * 100;
    $strenghPercentage = ($playerStrengh / MAXSTRENGTH) * 100;
    $requiredExperience = $maxExperience - $playerExperience;
    $attackPower = $playerBaseAttack + ( $playerLevel / 10 );

    # ECHO VARIABLES
    # 4 - Els percentatges es mostren arrodonits a un decimal
    $echoHealth = number_format($healthPercentage , 1, ",", ".");
    $echoStrengh = number_format($strenghPercentage , 1, ",", ".");
    $echoExperience = number_format($playerExperience , 1, ",", ".");
    $echoRequiredExperience = number_format($requiredExperience , 1, ",", ".");
    $echoAttackPower = number_format($attackPower , 1, ",", ".");
?>


<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= GAMENAME?></title>

    <!-- NO VAMOS A MENTIR, EL CSS LO HA HECHO EL CHAT,
    PERO ESO SI, LAS BARRAS SON LAS QUE HAS DADO TU -->
    <style>
        /* Reset bàsic */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #1e293b; /* Fons blau fosc */
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            color: #1e293b;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 580px;
        }

        /* Capçalera (Títol exterior) */
        .sheet-header {
            margin-bottom: 24px;
        }

        .sheet-header h1 {
            color: #ffffff;
            font-size: 24px;
            font-weight: 800;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
            text-transform: uppercase;
        }

        .sheet-header p {
            color: #94a3b8;
            font-size: 15px;
        }

        /* Targeta blanca central */
        .sheet-card {
            background-color: #ffffff;
            border-radius: 16px;
            padding: 32px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.2);
        }

        /* Informació del personatge */
        .character-info {
            margin-bottom: 28px;
        }

        .character-info h2 {
            font-size: 26px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 4px;
        }

        .character-info .subtitle {
            font-size: 14px;
            color: #64748b;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        /* --- ESTILS DE LES TEVES BARRAS --- */
        .barra { 
            background: #E1E8E8; 
            border-radius: 99px; 
            height: 14px; 
            overflow: hidden; 
            margin-bottom: 1rem; /* Mantinc el teu marge */
        }
        
        .barra span { 
            display: block; 
            height: 100%; 
            border-radius: 99px; 
        }
        
        .barra .vida { 
            background: #C2661F; 
        }
        
        .barra .mana { 
            background: #02736F; 
        }
        /* ---------------------------------- */

        /* Files d'estadístiques */
        .stat-group {
            margin-bottom: 8px; /* Redueixo una mica el marge per compensar el de .barra */
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
            font-size: 15px;
        }

        .stat-label {
            color: #334155;
            font-weight: 500;
        }

        .stat-value {
            font-weight: 600;
            color: #0f172a;
        }

        /* Files d'estadístiques només text (amb separador puntejat) */
        .text-stats {
            margin-top: 24px;
        }

        .text-stat-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 0;
            font-size: 15px;
        }

        .text-stat-row:not(:last-child) {
            border-bottom: 1px dashed #cbd5e1;
        }

        /* Etiqueta d'estat */
        .status-badge {
            display: inline-block;
            background-color: #fff7ed;
            color: #ea580c;
            font-weight: 600;
            font-size: 15px;
            padding: 8px 18px;
            border-radius: 999px;
            margin-top: 16px; /* Ajustat per compensar el marge de .barra */
        }

        /* Peu de pàgina */
        .sheet-footer {
            margin-top: 24px;
            color: #64748b;
            font-size: 13px;
        }
    </style>
</head>
<body>

    <div class="container">
        <header class="sheet-header">
            <h1><?= GAMENAME ?></h1>
            <p>Fitxa de personatge</p>
        </header>

        <main class="sheet-card">
            
            <div class="character-info">
                <!-- UTILITZEM UN ECHO AMB LA VARIABLE DEL NOM DEL PJ -->
                <h2><?= $playerName  ?></h2>
                <!-- UTILITZEM UN ECHO AMB LA VARIABLE DE CLASSE DEL PJ I EL NIVELL -->
                <p class="subtitle"><?= "{$playerClass} NIVELL {$playerLevel}" ?></p>
            </div>            
            <div class="stat-group">
                <div class="stat-header">
                    <span class="stat-label">Vida</span>
                    <!-- UTILITZEM UN ECHO AMB LA VARIABLE DEL VIDA DEL PJ -->
                    <span class="stat-value"><?= "{$echoHealth} %"  ?></span>
                </div>
                <!-- 7 - Les barres de vida i de força: l'amplada va dins de l'atribut 
                style de l'HTML de l’etiqueta <span> i la calcula PHP. La resta de valors
                , amb l'etiqueta d'imprimir -->
                <div class="barra">
                    <!-- UTILITZEN UN ECHO AMB LA VARIABLE DEL PERCENTATGE DE VIDA PERQUE S'ADAPTI LA BARRA DEL PJ -->
                    <span class="vida" style="width: <?= $healthPercentage ?>%"></span>
                </div>
            </div>

            <div class="stat-group">
                <div class="stat-header">
                    <span class="stat-label">Força</span>
                    <!-- UTILITZEN UN ECHO AMB LA VARIABLE DEL PERCENTATGE DE VIDA PERQUE S'ADAPTI LA BARRA DEL PJ -->
                    <span class="stat-value"><?= "{$echoStrengh} %"  ?></span>
                </div>
                <!-- 7 - Les barres de vida i de força: l'amplada va dins de l'atribut 
                style de l'HTML de l’etiqueta <span> i la calcula PHP. La resta de valors
                , amb l'etiqueta d'imprimir -->
                <div class="barra">
                    <span class="mana" style="width: <?= $strenghPercentage ?>%"></span>
                </div>
            </div>

            <div class="text-stats">
                <div class="text-stat-row">
                    <span class="stat-label">Poder d'atac</span>
                    <!-- 6 - Un echo amb cometes simples i concatenació amb el punt -->
                    <span class="stat-value"><?= $echoAttackPower . ' punts'  ?></span>
                </div>
                <div class="text-stat-row">
                    <span class="stat-label">Experiència</span>
                    <!-- UTILITZEM UN ECHO AMB LA VARIABLE DE LA EXPERIÈNCIA DEL PJ -->
                    <span class="stat-value"><?= "{$echoExperience} XP"  ?></span>
                </div>
                <div class="text-stat-row">
                    <span class="stat-label">Li falten</span>
                    <!-- 5 - Un echo amb cometes dobles que inclogui una variable dins del text -->
                    <!-- UTILITZEM UN ECHO AMB LA VARIABLE DE LA EXPERIÈNCIA RESTANT DEL PJ -->
                    <span class="stat-value"><?=  " {$echoRequiredExperience} punts per pujar de nivell"  ?></span>
                </div>
            </div>
            <!-- ES UNA FUNCIÓ DE PHP, JA QUE NO SABIA COM FER-HO SENSE IFS NI RES
                    ÉS UNA COMPARACUÓ DIRECTA, CUAN LA VIDA ESTA PER SOBRE DEL LIMIT ES FALSE Y PER TANT EL
                    DISPLAY ES FALSE I NO ES MOSTRA, QUAN LA VIDA ÉS INFERIOR AL LIMIT EL BONEANO PASA A SER TRUE 
                    I EL DISPLAY TAMBÉ, PEL QUE PASSA A MOSTRARSE -->
            <div class="status-badge" style="display: <?= ['none', 'inline-block'][$playerHealth < MAXINJUREDHEALTH] ?>;">
                Ferit
            </div>
        </main>
    </div>

</body>
</html>
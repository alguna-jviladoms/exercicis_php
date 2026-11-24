<?php
declare(strict_types=1);

/**
 * Mostra la capçalera de la botiga amb el nom i el lema comercial.
 * Això és un @params per declarar els paremetres que necessita i el que retorna.
 * @return void Només escriu per pantalla
 */
function capcalera(): void
{
    echo '<header><h1>BitBazar</h1><p>Accessoris digitals per a projectes creatius</p></header>';
}

/**
 * Mostra el peu de pàgina amb la marca i l'any actual.
 * Això és un @params per declarar els paremetres que necessita i el que retorna.
 * @return void Només escriu per pantalla
 */
function peu(): void
{
    echo '<footer>BitBazar · ' . date('Y') . '</footer>';
}

/**
 * Funció declarada però que NO es crida mai.
 * Això és un @params per declarar els paremetres que necessita i el que retorna.
 * @return void
 */
function funcioSenseCridar(): void
{
    echo "<p>Aquest avís no s'arriba a mostrar.</p>";
}

/*
 * Declarar una funció NO l'executa: només fa que PHP la conegui pel seu nom.
 * Fins que algú no escriu funcioSenseCridar(); el seu cos no s'executa,
 * per això a la pàgina no apareix res d'aquesta funció.
 */
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="estils.css">
    <title>Apartat 1 · Funcions senzilles</title>
    
</head>
<body>
<?php capcalera(); ?>
<main>
    <h2>Apartat 1 · Funcions senzilles</h2>
</main>
<?php
peu();
peu();
peu();
?>
</body>
</html>

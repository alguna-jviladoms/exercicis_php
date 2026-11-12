<?php
declare(strict_types=1);

/**
 * Calcula l'import final d'una compra afegint-hi una taxa d'IVA configurable.
 *
 * @param float $base Import inicial abans de l'impost
 * @param float $iva  Percentatge d'IVA expressat en decimal. Per defecte 0.21
 * @return float Import final arrodonit a 2 decimals
 */
function preuAmbIva(float $base, float $iva = 0.21): float
{
    return round($base * (1 + $iva), 2);
}

/**
 * Calcula l'import que queda després d'aplicar una rebaixa percentual.
 *
 * @param float $preu         Quantitat original abans de la rebaixa
 * @param int   $percentatge  Percentatge que es vol restar. Per defecte 10
 * @return float Quantitat resultant arrodonida a 2 decimals
 */
function aplicaDescompte(float $preu, int $percentatge = 10): float
{
    return round($preu * (1 - $percentatge / 100), 2);
}

/**
 * Genera un missatge personalitzat per iniciar una conversa.
 *
 * @param string $nom        Persona destinatària del missatge
 * @param string $salutacio  Text inicial de la salutació. Per defecte "Hola"
 * @return string Salutació completa
 */
function benvinguda(string $nom, string $salutacio = 'Hola'): string
{
    return $salutacio . ', ' . $nom . '!';
}

/*
 * Exercici 3: comprovar què passa si el paràmetre opcional es posa abans.
 *
 *     function benvinguda(string $salutacio = 'Hola', string $nom): string { ... }
 *
 * PHP 8.3 dona aquest avís en carregar el fitxer:
 *     Deprecated: Optional parameter $salutacio declared before required parameter $nom
 *     is implicitly treated as a required parameter
 * (en PHP 8.0 deia: "Deprecated: Required parameter $nom follows optional parameter $salutacio").
 * Passa perquè, si l'opcional va al mig o al principi, PHP no sabria quin valor va a quin
 * paràmetre quan en crides amb menys arguments. Els paràmetres amb valor per defecte
 * han d'anar sempre al final. L'he tornat a deixar bé (és la versió de dalt) perquè
 * el fitxer final no ha de donar cap avís al log.
 */
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="estils.css">
    <title>Apartat 4 · Valors per defecte</title>
    
</head>
<body>
<header><h1>BitBazar</h1><p>Apartat 4 · Paràmetres opcionals</p></header>
<main>
    <h2>Exercici 1 · Afegir diferents taxes a un import</h2>
    <ul>
        <li>preuAmbIva(245.50) → <?= preuAmbIva(245.50) ?> (taxa habitual del 21 %)</li>
        <li>preuAmbIva(245.50, 0.10) → <?= preuAmbIva(245.50, 0.10) ?> (taxa del 10 %)</li>
        <li>preuAmbIva(89.90, 0.04) → <?= preuAmbIva(89.90, 0.04) ?> (taxa del 4 %)</li>
    </ul>

    <h2>Exercici 2 · Calcular imports amb rebaixa</h2>
    <ul>
        <li>aplicaDescompte(135.0) → <?= aplicaDescompte(135.0) ?> (rebaixa estàndard del 10 %)</li>
        <li>aplicaDescompte(249.90, 30) → <?= aplicaDescompte(249.90, 30) ?> (rebaixa promocional del 30 %)</li>
    </ul>

    <h2>Exercici 3 · Crear salutacions diferents</h2>
    <ul>
        <li><?= htmlspecialchars(benvinguda('Júlia')) ?></li>
        <li><?= htmlspecialchars(benvinguda('Nil', 'Bon vespre')) ?></li>
    </ul>
</main>
<footer>BitBazar · <?= date('Y') ?></footer>
</body>
</html>

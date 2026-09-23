<?php

//------------------------ TEXT ORIGINAL ------------------------
/**
 * nom = 'Aina';
 * $assignatura = 'Desenvolupament Web';
 * $nota1 = 7;
 * $nota2 = 9;
 * $mitjana = $nota1 + $nota2 / 2;
 * echo '<h1>Butlleti de notes</h1>';
 * echo '<p>Alumna: $nom</p>';
 * echo '<p>Assigatura: ' + $assignatura + '</p>';
 * echo '<p>Mitjana: $mitjana</p>';
 * echo '<p>Generay el ' . date('d/m/Y') . '</p>';
 */

*/
//---------------------------------------------------------------

//------------------------ ERRORS TROBATS ------------------------

# FALTA EL $ PER DECLARAR QUE ES UNA VARIABLE
$nom = 'Aina';
# LE FALTA EL ; DEL FINAL
$assignatura = 'Desenvolupament Web';

$nota1 = 7;
$nota2 = 9;
# falten els () per declarar el ordre matematic
$mitjana = ($nota1 + $nota2) / 2;

echo '<h1>Butlleti de notes</h1>';
# AMB LES '' NOMÉS ESCRIUS TEXT PLA I NO TE EN COMPTE LES VARIABLES
echo "<p>Alumna: $nom</p>";
# A PHP ES CONCATENA AMB EL . NO AMB EL +
echo '<p>Assigatura: ' . $assignatura . '</p>';
# NO ESTA TANCAT AMB LES " PEL QUE DONA ERROR 
echo "<p>Mitjana: $mitjana</p>";

echo '<p>Generat el ' . date('d/m/Y') . '</p>';

//------------------------ ERRORS TROBATS ------------------------
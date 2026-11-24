<?php
/**
 * Configuració general del projecte.
 * Aquest fitxer NO escriu res a la pantalla.
 */
 
// Dades de la botiga
const BOTIGA_NOM    = 'Botiga ilegal';
const BOTIGA_LEMA   = 'No es pot compartir el link o la poli me pilla';
const BOTIGA_CORREU = 'info@superlegalshop.legal';
const TITOL_FORMULARI = 'Formulari de registre';
const TITOL_RESULTAT = 'Resultat del registre';
const DEFECTE = '';

// Regles de validació
const MIN_USUARI = 4;
const MIN_CLAU   = 6;
const TIPUS_CLIENT_VALID = [
    'Bueno',
    'Super bueno',
    'Increiblement bueno'
];

// Rutes
const FULL_ESTILS   = 'styles.css';
const PAG_FORMULARI = 'registre.php';
const PAG_PROCESSA  = 'processa.php';
const PAG_GRACIES   = 'gracies.php';

?>
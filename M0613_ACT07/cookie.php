<?php
// Demanem al navegador que es guardi l'hora, durant una hora
// Ara podem utilitzar les variables amb camelCase, més endavant, amb les BBDD, farem servir
// les variables amb guió baix
// phpinfo()  
ini_set('output_buffering', 'Off');
echo 'Hola';                                    // <- afegeix aquesta línia
setcookie('ultimaVisita', date('H:i:s'), time() + 3600);
// Si existeix la cookie ultimaVisita
if (isset($_COOKIE['ultimaVisita'])) {
    echo 'Hi eres a les ' . $_COOKIE['ultimaVisita'];
} else {
    echo 'Encara no hi ha cap cookie.';
}

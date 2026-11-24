<?php
session_start();

require_once 'config.php';
require_once 'funcions.php';

protegeixPaginaPrivada('privat2.php');

$titolPagina = 'Segona pàgina privada';
require 'header.php';
?>

<h2><?= salutacioPerHora() ?>, <?= htmlspecialchars($_SESSION['nom']) ?></h2>
<p>Aquesta és una altra pàgina privada.</p>
<a class="tornar" href="privat.php">Torna a la pàgina privada</a>
<a class="tornar" href="sortir.php">Tancar la sessio</a>

<?php require 'footer.php'; ?>

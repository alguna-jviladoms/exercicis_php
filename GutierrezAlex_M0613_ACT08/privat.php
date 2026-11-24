<?php
session_start();
 
require_once 'config.php';
require_once 'funcions.php';
 
protegeixPaginaPrivada('privat.php');
 
$titolPagina = 'La teva area privada';
require 'header.php';
?>
 
        <h2><?= salutacioPerHora() ?>, <?= htmlspecialchars($_SESSION['nom']) ?></h2>

        <p>Has entrat a les
           <strong><?= $_SESSION['entrada'] ?></strong>.</p>
 
        <a class="tornar" href="sortir.php">Tancar la sessio</a>
        <a class="tornar" href="privat2.php">Segona pàgina privada</a>
 
        <table>
            <?php foreach ($_SESSION as $clau => $valor): ?>
                <?php if ($clau === 'usuaris') continue; ?>
                <tr>
                    <th><?= htmlspecialchars($clau) ?></th>
                    <td><?= htmlspecialchars($valor) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

<?php
require 'footer.php';

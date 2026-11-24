<?php
session_start();          // la PRIMERA línia, sempre
 
require_once 'config.php';
require_once 'funcions.php';
 
$errors = [];
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (($_SESSION['intents'] ?? 0) >= 3) {
        $errors[] = 'Has arribat al màxim de tres intents.';
    } else {
        $usuari = is_string($_POST['usuari'] ?? null) ? trim($_POST['usuari']) : '';
        $clau = is_string($_POST['clau'] ?? null) ? $_POST['clau'] : '';
        $dades = comprovaCredencials($usuari, $clau);

        if ($dades === null) {
            $_SESSION['intents'] = ($_SESSION['intents'] ?? 0) + 1;
            $errors[] = $_SESSION['intents'] >= 3
                ? 'Has arribat al màxim de tres intents.'
                : 'Usuari o contrasenya incorrectes.';
        } else {
            unset($_SESSION['intents']);
            session_regenerate_id(true);

            $_SESSION['usuari'] = $usuari;
            $_SESSION['nom'] = $dades['nom'];
            $_SESSION['entrada'] = date('H:i:s');

            $destinacio = $_SESSION['destinacio_login'] ?? 'privat.php';
            unset($_SESSION['destinacio_login']);
            if (!in_array($destinacio, ['privat.php', 'privat2.php'], true)) {
                $destinacio = 'privat.php';
            }

            header('Location: ' . $destinacio);
            exit;
        }
    }
}

$titolPagina = 'Iniciar sessió';
require 'header.php';


?>
 
<h2>Entra al teu compte</h2>
<?php if (count($errors) > 0): ?>
    <div class="errors">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<form action="login.php" method="post">
    <label for="usuari">Nom d'usuari</label>
    <input type="text" id="usuari" name="usuari">
    <label for="clau">Contrasenya</label>
    <input type="password" id="clau" name="clau">
    <button type="submit">Entrar</button>
</form>
 


<?php
require 'footer.php';

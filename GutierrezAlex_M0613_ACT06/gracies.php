<?php require_once 'config.php'; $titolPagina = 'Gracies'; require 'header.php'; ?>
    <h2>Gràcies per registrar-te</h2>
    <img src="captures\1623061799996.jfif" alt="No soy adicto al TikTok">
    <div class="ok">
        <p>El teu compte de <?= htmlspecialchars(BOTIGA_NOM) ?> ja està actiu. Si tens cap problema, escriu-nos a <?= htmlspecialchars(BOTIGA_CORREU) ?>.</p>
    </div>
    <a class="tornar" href="<?= htmlspecialchars(PAG_FORMULARI) ?>">Registrar un altre compte</a>
<?php require 'footer.php'; ?>

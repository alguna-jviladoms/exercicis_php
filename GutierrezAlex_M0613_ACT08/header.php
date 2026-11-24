<?php
if (!isset($titolPagina)) {
    $titolPagina = 'Inici';
}
$classeMain = $classeMain ?? '';
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="utf-8">
    <title><?= htmlspecialchars($titolPagina) ?> · <?= htmlspecialchars(BOTIGA_NOM) ?></title>
    <link rel="stylesheet" href="<?= htmlspecialchars(FULL_ESTILS) ?>">
</head>
<body>
    <header>
        <h1><?= htmlspecialchars(BOTIGA_NOM) ?></h1>
        <p><?= htmlspecialchars(BOTIGA_LEMA) ?></p>
    </header>
    <main<?= $classeMain !== '' ? ' class="' . htmlspecialchars($classeMain) . '"' : '' ?>>

<p class="usuari">
<?php if (isset($_SESSION['usuari'])): ?>
    Hola, <strong><?= htmlspecialchars($_SESSION['nom']) ?></strong>
    &middot; <a href="sortir.php">Sortir</a>
<?php else: ?>
    <a href="login.php">Iniciar sessio</a>
<?php endif; ?>
</p>

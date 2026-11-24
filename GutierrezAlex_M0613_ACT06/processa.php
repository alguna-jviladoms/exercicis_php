<?php
require_once 'config.php';
require_once 'funcions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $titolPagina = 'Acces directe';
    require 'header.php';

    echo '<h2>Aqui no s\'hi arriba directament</h2>';
    echo '<a class="tornar" href="' . htmlspecialchars(PAG_FORMULARI) . '">Anar al formulari</a>';

    require 'footer.php';
    exit;
}

$user = [
    'name' => valorCamp($_POST, 'name'),
    'surname' => valorCamp($_POST, 'surname'),
    'whenWasBorn' => valorCamp($_POST, 'whenWasBorn'),
    'phone' => valorCamp($_POST, 'phone'),
    'email' => valorCamp($_POST, 'email'),
    'username' => valorCamp($_POST, 'username'),
    'street' => valorCamp($_POST, 'street'),
    'streetNumber' => valorCamp($_POST, 'streetNumber'),
    'city' => valorCamp($_POST, 'city'),
    'postalCode' => valorCamp($_POST, 'postalCode'),
    'clientType' => valorCamp($_POST, 'clientType'),
    'knowingMethod' => valorCamp($_POST, 'knowingMethod'),
    'newspaper' => isset($_POST['newspaper']) ? 'Si' : 'No',
    'politics' => isset($_POST['politics']) ? 'Si' : 'No'
];

$password = valorCamp($_POST, 'password');
$password2 = valorCamp($_POST, 'password2');
$errors = validaRegistre($user, $password, $password2);

$titolPagina = count($errors) > 0
    ? 'No s\'ha creat el compte'
    : 'Compte creat';
$classeMain = 'resultat';

require 'header.php';
?>
<?php if (count($errors) > 0): ?>
    <div class="errors">
        <h2>No s'ha pogut crear el compte</h2>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <a href="<?= htmlspecialchars(PAG_FORMULARI) ?>">Torna-hi</a>
<?php else: ?>
    <h1>Benvingut <?= htmlspecialchars($user['name']) ?></h1>
    <table>
        <tbody>
        <?php foreach ($user as $camp => $valor): ?>
            <tr>
                <th><?= etiqueta($camp) ?></th>
                <td><?= htmlspecialchars($valor) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <a class="tornar" href="<?= htmlspecialchars(PAG_GRACIES) ?>">Continuar</a>
<?php endif; ?>
<?php require 'footer.php'; ?>

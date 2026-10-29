<?php
$user = [];
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = [
        'name' => trim($_POST['name'] ?? ''),
        'surname' => trim($_POST['surname'] ?? ''),
        'whenWasBorn' => trim($_POST['whenWasBorn'] ?? ''),
        'phone' => trim($_POST['phone'] ?? ''),
        'email' => trim($_POST['email'] ?? ''),
        'username' => trim($_POST['username'] ?? ''),
        'street' => trim($_POST['street'] ?? ''),
        'streetNumber' => trim($_POST['streetNumber'] ?? ''),
        'city' => trim($_POST['city'] ?? ''),
        'postalCode' => trim($_POST['postalCode'] ?? ''),
        'clientType' => trim($_POST['clientType'] ?? ''),
        'knowingMethod' => trim($_POST['knowingMethod'] ?? ''),
        'newspaper' => isset($_POST['newspaper']) ? 'Si' : 'No',
        'politics' => isset($_POST['politics']) ? 'Si' : 'No'
    ];

    $password = trim($_POST['password'] ?? '');
    $password2 = trim($_POST['password2'] ?? '');

    $tipusClientValid = ['Bueno', 'Super bueno', 'Increiblemente bueno'];

    if ($user['name'] === '') {
        $errors[] = 'El nom es obligatori';
    }
    if ($user['surname'] === '') {
        $errors[] = 'El cognom es obligatori';
    }
    if (filter_var($user['email'], FILTER_VALIDATE_EMAIL) === false) {
        $errors[] = 'Format de email incorrecte';
    }
    if (strlen($user['username']) < 4) {
        $errors[] = "Nom d'usuari massa curt, minim 4 caràcters";
    }
    if (strlen($password) < 6) {
        $errors[] = 'Password massa curta';
    }
    if ($password !== $password2) {
        $errors[] = 'Las dues password no coincideixen';
    }
    if (!preg_match('/^[0-9]{5}$/', $user['postalCode'])) {
        $errors[] = 'Codi postal incorrecte';
    }
    if (!in_array($user['clientType'], $tipusClientValid, true)) {
        $errors[] = 'Tipus de client no vàlid';
    }
    if ($user['politics'] === 'No') {
        $errors[] = 'Es obligatorio aceptar la politica de privacidad';
    }
}

?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultat del registre</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <main class="resultat">
        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && count($errors) === 0): ?>
            <h1>Benvingut <?= htmlspecialchars($user['name']) ?></h1>
            <table>
                <tbody>
                <?php foreach ($user as $camp => $valor): ?>
                    <tr>
                        <th><?= htmlspecialchars($camp) ?></th>
                        <td><?= htmlspecialchars($valor) ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="errors">
                <h2>No s'ha pogut crear el compte</h2>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <a href="registre.html">Torna-hi</a>
        <?php endif; ?>
    </main>
</body>
</html>

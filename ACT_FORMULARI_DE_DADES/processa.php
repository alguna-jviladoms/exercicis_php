<?php 
//<>

if ( $_SERVER['REQUEST_METHOD'] == 'POST') {

#----RECOGIDA DATOS USUARIO-------------------------------------------------------------------
    $user = [
        'name' => trim($_POST['name']) ?? '',
        'surname' => trim($_POST['surname']) ?? '',
        'whenWasBorn' => trim($_POST['whenWasBorn']) ?? '',
        'phone' => trim($_POST['phone']) ?? '',

        'email' => trim($_POST['email']) ?? '',
        'username' => trim($_POST['username']) ?? '',

        'street' => trim($_POST['street']) ?? '',
        'streetNumber' => trim($_POST['streetNumber']) ?? '',
        'city' => trim($_POST['city']) ?? '',
        'postalCode' => trim($_POST['postalCode']) ?? '',

        'clientType' => $_POST['clientType'] ?? '',
        'knowingMethod' => $_POST['knowingMethod'] ?? '',

        'newspaper' => isset($_POST['newspaper']) ? 'Si': 'No',
        'politics' => isset($_POST['politics']) ? 'Si': 'No'
    ];
    $password = trim($_POST['password']) ?? '';
    $password2 = trim($_POST['password2']) ?? '';

#----RECOGIDA DATOS USUARIO-------------------------------------------------------------------

#----VALIDACION DATOS USUARIO---------------------------------------------------------------------
    $errors = [];
    if ($user['name'] == '') {
        $errors[] = 'El nom es obligatori';
    };
    if ($user['surname'] == '') {
        $errors[] = 'El cognom es obligatori';
    };
    if (filter_var($user['email'], FILTER_VALIDATE_EMAIL) === false) {
        $errors[] = 'Format de email incorrecte';
    };
    if (strlen($user['username']) < 4 ) {
        $errors[] = "Nom d'usuari massa curt, minim 4 caràcters";
    };
    if (strlen($password) < 6) {
        $errors[] = 'Password massa curta';
    };
    if ( $password != $password2 ) {
        $errors[] = 'Las dues password no coincideixen';
    };
    if ( strlen($user['postalCode']) != 5 ) {
        $errors[] = 'Codi postal amb longitud diferent a 5 xifres';
    };
    if ( $user['clientType'] === $password2 ) {
        $errors[] = 'Tipus de client no triat';
    };
    if ( $password != $password2 ) {
        $errors[] = 'Las dues password no coincideixen';
    };
    if ( $user['politics'] == 'No') {
        $errors[] = 'Es obligatorio aceptar la politica de privacidad';
    }

    if ( count($errors) == 0) {
        echo "<h1>Benvingut " . $user['name'] . "</h1>";
        echo "<table>";
        foreach ($user as $camp => $valor) {
            echo "<tr>";
            echo "<th> $camp </th>";
            echo "<td>" . htmlspecialchars($valor) . "</td>";
            echo "</tr>";
            }
        echo "</table>";

    } else {
            echo '<div style="background-color: red; padding: .5rem 1rem;">';
            echo "<h2>No s'ha pogut crear el compte</h2>";
            echo '<ul>';
            foreach ($errors as $error) {
                echo "<li>" . $error . "</li>";
            }
            echo "</ul>";        
            echo "</div>";
            echo '<a href="registre.html">Torna-hi</a></p>';
    }
#----VALIDACION DATOS USUARIO---------------------------------------------------------------------


#----RECOGIDA DATOS USUARIO EJERCICIO 1 ---------------------------------------------------------------------
    // $name = trim($_POST['name']) ?? '';
    // $surname = trim($_POST['surname']) ?? '';
    // $whenWasBorn = trim($_POST['whenWasBorn']) ?? '';
    // $phone = trim($_POST['phone']) ?? '';

    // $email = trim($_POST['email']) ?? '';
    // $username = trim($_POST['username']) ?? '';
    // $password = trim($_POST['password']) ?? '';
    // $password2 = trim($_POST['password2']) ?? '';

    // $street = trim($_POST['street']) ?? '';
    // $streetNumber = trim($_POST['streetNumber']) ?? '';
    // $city = trim($_POST['city']) ?? '';
    // $postalCode = trim($_POST['postalCode']) ?? '';

    // $clientType = $_POST['clientType'] ?? '';
    // $knowingMethod = $_POST['knowingMethod'];

    // $newspaper = isset($_POST['newspaper']) ? 'Si': 'No';
    // $politics = isset($_POST['politics']) ? 'Si': 'No';

#----RECOGIDA DATOS USUARIO EJERCICIO 1 ---------------------------------------------------------------------
}



?>

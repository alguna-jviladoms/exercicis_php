<?php
declare(strict_types=1);

require_once __DIR__ . '/config.php';

/**
 *   Recull un camp de text del formulari ja net d'espais.
 *
 * @param array  $dades Dades rebudes del formulari
 * @param string $camp  Nom del camp
 * @param string DEFECTE es la constant del valor per defecte(sempre '') 
 * @return string Valor netejat del camp
 */
function valorCamp(array $dades, string $camp): string
{
    return trim($dades[$camp] ?? DEFECTE);
}

/**
 * Comprova les dades del registre i retorna els errors trobats.
 *
 * @param array  $user      Dades de l'usuari
 * @param string $password  Contrasenya
 * @param string $password2 Repetició de la contrasenya
 * @return array Errors de validació
 */
function validaRegistre(array $user, string $password, string $password2): array
{
    $errors = [];

    if ($user['name'] === '') {
        $errors[] = 'El nom es obligatori';
    }
    if ($user['surname'] === '') {
        $errors[] = 'El cognom es obligatori';
    }
    if (filter_var($user['email'], FILTER_VALIDATE_EMAIL) === false) {
        $errors[] = 'Format de email incorrecte';
    }
    if (strlen($user['username']) < MIN_USUARI) {
        $errors[] = "Nom d'usuari massa curt, minim " . MIN_USUARI . " caràcters";
    }
    if (strlen($password) < MIN_CLAU) {
        $errors[] = 'Password massa curta, minim ' . MIN_CLAU . ' caràcters';
    }
    if ($password !== $password2) {
        $errors[] = 'Las dues password no coincideixen';
    }
    if (!preg_match('/^[0-9]{5}$/', $user['postalCode'])) {
        $errors[] = 'Codi postal incorrecte';
    }
    if (!in_array($user['clientType'], TIPUS_CLIENT_VALID, true)) {
        $errors[] = 'Tipus de client no vàlid';
    }
    if ($user['politics'] === 'No') {
        $errors[] = 'Es obligatorio aceptar la politica de privacidad';
    }

    return $errors;
}

/**
 * Converteix la clau de l'array en una etiqueta llegible.
 *
 * @param string $clau Clau de l'array
 * @return string Etiqueta per mostrar a la taula
 */
function etiqueta(string $clau): string
{
    $noms = [
        'name' => 'Nom',
        'surname' => 'Cognoms',
        'whenWasBorn' => 'Data de naixement',
        'phone' => 'Telèfon',
        'email' => 'Correu electrònic',
        'username' => "Nom d'usuari",
        'street' => 'Carrer',
        'streetNumber' => 'Número',
        'city' => 'Població',
        'postalCode' => 'Codi postal',
        'clientType' => 'Tipus de client',
        'knowingMethod' => 'Com ens has conegut?',
        'newspaper' => 'Butlletí',
        'politics' => 'Política de privacitat',
    ];

    return $noms[$clau] ?? ucfirst($clau);
}
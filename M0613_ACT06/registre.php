<?php
require_once 'config.php';
require_once 'funcions.php';
$titolPagina = 'Crea el teu compte';
require 'header.php';
?>
    <h2>Crea el teu compte</h2>
    <form action="<?= htmlspecialchars(PAG_PROCESSA) ?>" method="post">
        <button type="button" id="debugBtn" class="debug-btn">🐞 Emplenar dades de prova</button>
        <button type="button" id="debugBadBtn" class="debug-btn">🐞 Emplenar dades incorrectes</button>
        <fieldset>
            <legend>Dades personals</legend>

            <label for="name">Nom: </label>
            <input type="text" id="name" name="name">
            <label for="surname">Cognoms: </label>
            <input type="text" id="surname" name="surname">
            <label for="whenwasborn">Data de neixement: </label>
            <input type="date" id="whenwasborn" name="whenWasBorn">
            <label for="phone">Telèfon: </label>    
            <input type="tel" id="phone" name="phone">
        </fieldset>

        <fieldset>
            <legend>Dades del compte</legend>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
            <label for="username">Nom d'usuari:</label>
            <input type="text" id="username" name="username">
            <label for="password">Contrasenya:</label>
            <input type="password" id="password" name="password">
            <label for="password2">Contrasenya repetida:</label>
            <input type="password" id="password2" name="password2">
        </fieldset>

        <fieldset>
            <legend>Adreça:</legend>

            <label for="street">Carrer: </label>
            <input type="text" id="street" name="street">
            <label for="streetNumber">Numero: </label>
            <input type="text" id="streetnumber" name="streetNumber">
            <label for="city">Població: </label>
            <input type="text" id="city" name="city">
            <label for="postalCode">Codi postal: </label>
            <input type="text" id="postalcode" name="postalCode">
        </fieldset>

        <fieldset>
            <legend>Preferéncies</legend>
            <label for="client">Tipus de client:</label>
            <select name="clientType" id="client">
                <?php foreach (TIPUS_CLIENT_VALID as $tipusClient): ?>
                    <option value="<?= htmlspecialchars($tipusClient) ?>"><?= htmlspecialchars($tipusClient) ?></option>
                <?php endforeach; ?>
            </select>
            <fieldset class="fieldsetButtons">
                <legend >Com ens has conegut?</legend>
                <div>
                    <input type="radio" name="knowingMethod" id="knowingMethod" value="xarxes">
                    <p>Xarxes socials</p>
                </div>
                <div>
                    <input type="radio" name="knowingMethod" id="knowingMethod" value="amics">
                    <p>Amics</p>
                </div>
            </fieldset>
            <fieldset class="fieldsetButtons">
                <legend>Vols apuntar-te al butlletí?</legend>
                <input type="checkbox" name="newspaper" id="newspaper" value="yes">Dono consentiment per enviar-me informació comercial.
                <br>
                <input type="checkbox" name="politics" id="politics" value="yes">Acceptyo la política de privacitat.
            </fieldset>
        </fieldset>
        <button>Enviar</button>
    </form>

    <script>
        document.getElementById('debugBtn').addEventListener('click', function () {
            // Camps de text, email, tel, date, password
            const valors = {
                name:         'Joan',
                surname:      'García López',
                whenWasBorn:  '1990-05-15',
                phone:        '612345678',
                email:        'joan@example.com',
                username:     'joan_garcia',
                password:     'Prova1234',
                password2:    'Prova1234',
                street:       'Carrer Major',
                streetNumber: '42',
                city:         'Barcelona',
                postalCode:   '08001'
            };

            for (const [name, value] of Object.entries(valors)) {
                const el = document.querySelector(`[name="${name}"]`);
                if (el) el.value = value;
            }

            // Select (desplegable)
            document.querySelector('[name="clientType"]').value = 'Super bueno';

            // Radio: seleccionem "xarxes" (NO fem servir getElementById perquè tens ids duplicats)
            const radioXarxes = document.querySelector('input[name="knowingMethod"][value="xarxes"]');
            if (radioXarxes) radioXarxes.checked = true;

            // Checkboxes
            document.querySelector('[name="newspaper"]').checked = true;
            document.querySelector('[name="politics"]').checked = true;

            console.log('✅ Camps emplenats');
        });

        document.getElementById('debugBadBtn').addEventListener('click', function () {
            const valorsIncorrectes = {
                name: '',
                surname: '',
                whenWasBorn: 'data incorrecta',
                phone: 'telèfon incorrecte',
                email: 'correu@incorrecte',
                username: 'abc',
                password: '123',
                password2: '456',
                street: '',
                streetNumber: '',
                city: '',
                postalCode: '123',
            };

            for (const [name, value] of Object.entries(valorsIncorrectes)) {
                const el = document.querySelector(`[name="${name}"]`);
                if (el) el.value = value;
            }

            document.querySelector('[name="clientType"]').value = '';
            document.querySelectorAll('input[name="knowingMethod"]').forEach((radio) => {
                radio.checked = false;
            });
            document.querySelector('[name="newspaper"]').checked = false;
            document.querySelector('[name="politics"]').checked = false;

            console.log('❌ Camps incorrectes emplenats');
        });
    </script>
<?php require 'footer.php'; ?>

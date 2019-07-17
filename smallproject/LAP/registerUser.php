<?php
    include('scripts/inactivity.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AddUser</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="styles/register.css" />
    <script src="main.js"></script>
</head>
<body>
    <section>
        <div class="card">
            <form action="scripts/register.php" method="POST">
                <h2>Neuen Benutzer hinzufügen</h2>
                <input type="text" placeholder="Vorname" name="firstname" required />
                <br>
                <input type="text" placeholder="Nachname" name="lastname" required />
                <br>
                <input type="text" placeholder="Benutzername" name="username" required />
                <br>
                <input type="password" placeholder="Passwort" name="password" required/>
                <br>
                <input type="text" placeholder="PLZ" name="PLZ" required />
                <br>
                <select name="bereich">
                    <option value="1">Häuser</option>
                    <option value="2">Wohnungen</option>
                    <option value="3">Grundstücke</option>
                </select>
                <br>
                <input type="submit" name="submit" />
                <input type="reset" />
            </form>
        </div>
    </section>
</body>
</html>
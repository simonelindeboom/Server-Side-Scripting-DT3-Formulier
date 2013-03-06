<?php
# include de benodigde bestanden (require geeft een fatale fout als het niet lukt)
require('template.inc.php');

htmlOpenen('Inloggen');

echo '
	<h1>Welkom</h1>
	<p>Log hier in om te beginnen met het uploaden van je afbeeldingen</p>

	<form action="login.php" method="post">
	Gebruikersnaam: <input type="text" name="gebruikersnaam"><br>
	Wachtwoord: <input type="password" name="wachtwoord"><br>
	<input type="submit" value="Log in">
	</form>';

htmlSluiten();
?>
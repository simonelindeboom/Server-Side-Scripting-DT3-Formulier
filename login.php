<?php
session_start();

// Dit zijn de variabelen die je verkrijgt van het formulier
$usernameForm = $_POST['gebruikersnaam'];
$passwordForm = $_POST['wachtwoord'];

if ($usernameForm && $passwordForm)
{
	$mysqli = new mysqli('localhost', 'gebruikersnaam', 'wachtoord', 'database');

	if (mysqli_connect_errno()){
		printf('Kan geen verbinding maken!', mysqli_connect_error());
		exit();
	}

	// Dit zijn de variabelen die je verkrijgt van het formulier
	$usernameForm = $mysqli->real_escape_string($usernameForm);
	$passwordForm = $mysqli->real_escape_string($passwordForm);

	#query uit database
	$result = $mysqli->query('SELECT * FROM gebruikers');

	#haal uit array
	while($dataArray = $result->fetch_array())
	{
		// Dit zijn de variabelen uit de database
		$usernameDB = $mysqli->real_escape_string($dataArray['gebruikersnaam']);
		$passwordDB = $mysqli->real_escape_string($dataArray['wachtwoord']);

		//vergelijk usernameform met usernamedb, match check passwordform met paswordDB
		if($usernameForm == $usernameDB && md5($passwordForm) == $passwordDB)
		{
			$_SESSION['koekje']=$usernameDB;
			header("location:upload.php");
			// verwijs door naar upload.php
		}
		else
		{
		echo 'Er is iets misgegaan, voer opnnieuw je gebruikersnaam en wachtwoord in!
		<a href="loguit.php">Opnieuw inloggen</a>';
		}	
	}
}
else{
	echo 'Voer je gebruikersnaam en wachtwoord in!
	<a href="loguit.php">Opnieuw inloggen</a>';
	}
?>
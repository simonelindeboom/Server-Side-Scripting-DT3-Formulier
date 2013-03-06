<?php
session_start();

// Dit zijn de variabelen die je verkrijgt van het formulier
$usernameForm = $_POST['gebruikersnaam'];
$passwordForm = $_POST['wachtwoord'];

if ($usernameForm && $passwordForm)
{
	$connect = mysql_connect('localhost', 'databasename', 'password') or die('Kan geen verbinding maken!');
	mysql_select_db('tabelname', $connect) or die ('Kan database niet vinden!');

	#loop per regel, array, als niet or die
	$query = 'SELECT * FROM gebruikers'; 
	$result = mysql_query($query, $connect);

	#hier is iets mis maar ik weet het nu ook niet meer ):
	while($dataArray = mysql_fetch_array($result))
	{
		// Dit zijn de variabelen uit de database
		$usernameDB = $dataArray['gebruikersnaam'];
		$passwordDB = $dataArray['wachtwoord'];

		//vergelijk usernameform met usernamedb, match check passwordform met paswordDB
		if($usernameForm == $usernameDB && md5($passwordForm) == $passwordDB)
		{
			$_SESSION['koekje']=$usernameDB;
			header("location:upload.php");
			// verwijs door naar upload.php
		}
		else
		{
			echo 'niet ingelogd';
		}	
	}
}
else{
	echo 'Voer je gebruikersnaam en wachtwoord in!
	<a href="loguit.php">Opnieuw inloggen</a>';
	}
?>
<?php
//sessie koekje
session_start();
if(!isset($_SESSION['koekje'])){
	header("location:index.php");
}

# include de benodigde bestanden (require geeft een fatale fout als het niet lukt)
require('template.inc.php');

# geef de HTML code voor het openen van de pagina weer
htmlOpenen('Afbeeldingen toevoegen');

echo '<a href="loguit.php">Uitloggen</a>
';


echo '
	<div id="uploadForm">
	<form action="'.$_SERVER['PHP_SELF'].'" method="post" enctype="multipart/form-data">
		<label for="afbeelding">Afbeelding:</label>
			<input type="file" name="image" id="afbeelding" />
		<label for="submit"></label>
			<input type="submit" value="Voeg toe" id="submit" /><br />
	</form>
	</div>
';

#laat array zien
#print_r($_FILES);

#check errors en bewaar, echo in loop
if (isset($_FILES['image'])) {
	$errors = array();
	$allowed_ext = array('jpg', 'jpeg', 'png', 'gif');

	$file_name = $_FILES['image']['name'];
	$file_ext = strtolower(end(explode('.', $file_name))); # bestandextensie; geen hoofdletters, na punt,laatste element array voor checks

#print_r($file_ext);
	$file_size = $_FILES['image']['size'];
	$file_tmp = $_FILES['image']['tmp_name'];

	# vergelijk bestandextensie met toegestane extensies, array geeft false
	if (in_array($file_ext, $allowed_ext) === false) {
		$errors[] = 'Bestandsformaat is niet toegestaan';
	}

#print errors op scherm
#print_r($errors);


# vergelijk bestandextensie met toegestane extensies, array geeft false
	if ($file_size > 2097152) {
		$errors[] = 'Afbeelding moet kleiner zijn dan 2mb';
	}

	if (empty ($errors)) {
#upload file en verplaats
		if (move_uploaded_file($file_tmp, 'images/'.$file_name)) {
			echo 'Afbeelding toegevoegd!';
		}
	} else {
		foreach ($errors as $error) {
			echo $error, '<br />';
		}
	}
}

# Lees de inhoud van de map uit
$afbeeldingRij = scandir('images/');
$afbeeldingRij = array_reverse($afbeeldingRij);

#afbeeldingOpmaak();

# Loop de afbeelding rij af
foreach($afbeeldingRij as $afbeelding){
	if($afbeelding != '.' && $afbeelding != '..'){
		echo "\t<img src=\"images/".$afbeelding."\" width=\"150s\"/><br />\r\n";
	}
}

htmlSluiten();
?>

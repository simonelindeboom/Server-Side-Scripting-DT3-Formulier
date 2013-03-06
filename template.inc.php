<?php

# Public: Echo de HTML code voor het openen van de pagina
#
# $titel	- Een tekst die tussen de <title> en </title> tags wordt geplaatst
#
# Examples:
#
#	htmlOpenen('pagina titel');
#	# => geeft onderstaande html weer
function htmlOpenen($titel){
	# Geef de HTML openen code weer
	echo '<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<title>'.$titel.'</title>
	<link href="/style/style_normal.css" rel="Stylesheet" type="text/css" media="all" />
</head>
<body>	
	<div id="wrapper">
	';

}


# Public: Echo de HTML code voor het sluiten van de pagina
#
# Examples:
#
#	htmlSluiten();
#	# => geeft onderstaande html weer
function htmlSluiten(){
	# Geef de HTML voor het afsluiten van de pagina
	echo '
	</div>
</body>
</html>
	';
}


?>
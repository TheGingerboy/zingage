<?php
	//Contient la clef de cryptage des mots de passe
	$key = "ravioliravioligivemetheformioli";


	// Contient les informations nécessaire pour se connecter au serveur
	if (!defined('SERVER') || !defined('USER') || !defined('PASSWD') || !defined('BASE')){
		define('SERVER', 'localhost');
		define('USER', 'zingage');
		define('PASSWD', 'admin');
		define('BASE', 'zingage');
	}

	$conn = mysqli_connect(SERVER,USER,PASSWD,BASE);

	if ( !$conn ) {
	die("La connexion à échouer :  " . mysql_error());
	}

 ?>

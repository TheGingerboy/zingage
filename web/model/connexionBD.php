<?php
	// Contient la clef de cryptage des mots de passe
	$key = "ravioliravioligivemetheformioli";

	// Contient les informations nécessaire pour se connecter au serveur
	if (!defined('SERVER') || !defined('USER') || !defined('PASSWD') || !defined('BASE')){
		define('SERVER', 'localhost');
		define('USER', 'zingage');
		define('PASSWD', 'admin');
		define('BASE', 'zingage');
	}

	// MYSQLI (dépérécié)
	$conn = mysqli_connect(SERVER,USER,PASSWD,BASE);

	if ( !$conn ) {
	die("La connexion à échouer :  " . mysql_error());
	}

	// PDO
	$host = 'localhost';//server
	$db   = 'zingage';//base
	$user = 'zingage';//user
	$pass = 'admin';//passwd
	$charset = 'utf8';

	$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
	$opt = [
	PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	PDO::ATTR_EMULATE_PREPARES   => false,
	];
	$pdo = new PDO($dsn, $user, $pass, $opt);

 ?>

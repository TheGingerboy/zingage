<?php
	// Contient la clef de cryptage des mots de passe
	$key = "ravioliravioligivemetheformioli";

	// Contient les informations nécessaire pour se connecter au serveur
	$host = 'localhost';
	$db   = 'zingage';
	$user = 'zingage';
	$pass = 'admin';
	$charset = 'utf8';
	
	// PDO
	$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
	$opt = [
	PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	PDO::ATTR_EMULATE_PREPARES   => false,
	];
	$pdo = new PDO($dsn, $user, $pass, $opt);

 ?>

<?php
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

<?php

	error_reporting( ~E_DEPRECATED & ~E_NOTICE );
    /* A définir*/

	define('SERVER', 'localhost');
	define('USER', 'root');
	define('PASSWD', '');
	define('BASE', 'greenteuf');

	$conn = mysql_connect(SERVER,USER,PASSWD,BASE);
	$dbcon = mysql_select_db(BASE);

	if ( !$conn ) {
	die("La connexion à échouer :  " . mysql_error());
	}

	if ( !$dbcon ) {
	die("La connexion avec la Base de données à échouer :  " . mysql_error());
	}

 ?>

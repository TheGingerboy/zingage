<?php
	
	//recuperation de la session courante
	session_start();
	//nullification des valeurs
	$_SESSION = array();
	//destruction de la session
	session_destroy();
	//remise sur la page d'accueil
	// header( "Location: /zingage/" );
	// exit;
	echo '<h3 class="center">Déconnexion prise en compte</h3>';
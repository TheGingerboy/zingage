<?php
	session_start();
	$date_pris = $_POST['date_pris'];
	$date_retour = $_POST['date_retour'];
	$id_produit = $_POST['id_produit'];


	if ($_SESSION['nb_produit']['1']){
		$g = max($_SESSION['nb_produit']);
		$g++;
	}
	else {
		$_SESSION['nb_produit']['1'] = 1;
		$g = 1;
	}

	$_SESSION['nb_produit']["$g"] = $g;
	$_SESSION['date_pris']["$g"] = $date_pris;
	$_SESSION['date_retour']["$g"] = $date_retour;
	$_SESSION['id_produit']["$g"] = $id_produit;

	require_once('accueil.php');
?>
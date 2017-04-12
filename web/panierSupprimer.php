<?php
	session_start();
	$numero_produit = $_POST['numero_produit'];
	$_SESSION['nb_produit']["$numero_produit"] = 0;
	require_once('panier.php');
?>
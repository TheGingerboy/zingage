<?php

	session_start();

	require_once("connexionBD.php");

	//récupération des variables
	$identifiant = $_POST['identifiant'];
	$mdp = $_POST['mdp'];

	if ($identifiant) {
	  $verifid = mysql_query("SELECT identifiant_user FROM gt_user WHERE identifiant_user='$identifiant'");

	  //Verification de l'existence de l'utilisateur
	  if ($verifid && mysql_num_rows($verifid) > 0) {
	  	  //Verification du mot de passe
	  	  $verifpasswd = mysql_query("SELECT mdp_user FROM gt_user WHERE identifiant_user='$identifiant'");

	  	  $mdp2 = mysql_fetch_assoc($verifpasswd);

	  	  if ($mdp == $mdp2['mdp_user']){
				//Mise en session du compte
				$_SESSION['identifiant'] = $_POST['identifiant'];
				$_SESSION['mdp'] = $_POST['mdp'];
                $connexion=connect_db();
                $verifadmin = $connexion->query("SELECT admin_user FROM gt_user WHERE identifiant_user='$identifiant'")->fetchColumn();

				$_SESSION['admin'] = intval($verifadmin);
				require_once("accueil.php");
	  	  }

	  	  else{
		  	echo("Mot de passe incorrect, veuillez réessayer");
		  	require_once("connexion.php");
	  	  }
	  }

	  else{
	  	echo("Identifiant introuvable, veuillez réessayer");
	  	require_once("connexion.php");
	  }
	}


?>
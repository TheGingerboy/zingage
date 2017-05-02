<?php
	if(!(isset($_SESSION)))
		session_start();
	require_once("connexionBD.php");

	//récupération des variables
	$identifiant = $_POST['identifiant'];
	$mdp = $_POST['mdp'];

	$identifiant = mysql_real_escape_string(htmlspecialchars($identifiant));
	$mdp = mysql_real_escape_string(htmlspecialchars($mdp));
	$mdp = sha1($mdp);

	if ($identifiant) {
	  $verifid = mysqli_query( $conn, "SELECT identifiant_user FROM utilisateur WHERE identifiant_user='$identifiant'" );

	  //Verification de l'existence de l'utilisateur
	  if ($verifid && mysqli_num_rows($verifid) > 0) {
	  	  //Verification du mot de passe
	  	  $verifpasswd = mysqli_query( $conn, "SELECT mdp_user FROM utilisateur WHERE identifiant_user='$identifiant'" );

	  	  $mdp2 = mysqli_fetch_assoc($verifpasswd);

	  	  if ($mdp == $mdp2['mdp_user']){
				//Mise en session du compte
                
                $verifadmin = mysqli_query( $conn, "SELECT role_user FROM utilisateur WHERE identifiant_user='$identifiant'" );
                $admin = mysqli_fetch_assoc($verifadmin);
				$_SESSION['role_user'] = intval($admin);
				$_SESSION['identifiant'] = $identifiant;
				header( "Location: /zingage/" );
				exit;
	  	  }

	  	  else{
		  	echo("Mot de passe incorrect, veuillez réessayer");
			header( "Location: /zingage/connexion" );
			exit;
	  	  }
	  }

	  else{
	  	echo("Identifiant introuvable, veuillez réessayer");
		header( "Location: /zingage/connexion" );
		exit;
	  }
	}


?>
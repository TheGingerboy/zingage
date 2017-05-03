<?php
	//Si session inactive, lancer la session
	if(!(isset($_SESSION)))
		session_start();

	//Renvoie vers la page de connexion : stockage des fichiers de dépendance
	$header = dirname(dirname(__FILE__)) . "\\view\\header.php";
	$accueil = dirname(dirname(__FILE__)) . "\\view\\zingage.php";
	$footer = dirname(dirname(__FILE__)) . "\\view\\footer.php";


	//récupération des variables
	$identifiant = $_POST['identifiant'];
	$mdp = $_POST['mdp'];

	$identifiant = mysqli_real_escape_string($conn, htmlspecialchars($identifiant));
	$mdp = mysqli_real_escape_string($conn, htmlspecialchars($mdp));
 	$mdp = crypt('ravioliravioligivemetheformioli', $mdp);

	if ($identifiant) {
	  $verifid = mysqli_query( $conn, "SELECT identifiant_user FROM utilisateur WHERE identifiant_user='$identifiant'" );

		//Verification de l'existence de l'utilisateur
		if ($verifid && mysqli_num_rows($verifid) > 0) {
			//Verification du mot de passe
			$verifpasswd = mysqli_query( $conn, "SELECT mdp_user FROM utilisateur WHERE identifiant_user='$identifiant'" );
			$mdp2 = mysqli_fetch_assoc($verifpasswd);

			if (hash_equals($mdp, $mdp2['mdp_user']))
			{
			//Mise en session du compte
			$verifadmin = mysqli_query( $conn, "SELECT role_user FROM utilisateur WHERE identifiant_user='$identifiant'" );
			$admin = mysqli_fetch_assoc($verifadmin);
			$_SESSION['role_user'] = intval($admin);
			$_SESSION['identifiant'] = $identifiant;
			header( "Location: /zingage/" );
			exit;
			}

			else
			{
			echo("Mot de passe incorrect, veuillez réessayer");
			require_once(dirname(dirname(__FILE__)) . "\\view\\header.php");
			require_once(dirname(dirname(__FILE__)) . "\\view\\connexion.php");
			require_once(dirname(dirname(__FILE__)) . "\\view\\footer.php");
			}
		}

	  else
	  {
	  	echo("Identifiant introuvable, veuillez réessayer");
		require_once(dirname(dirname(__FILE__)) . "\\view\\header.php");
		require_once(dirname(dirname(__FILE__)) . "\\view\\connexion.php");
		require_once(dirname(dirname(__FILE__)) . "\\view\\footer.php");
	  }
	}


?>